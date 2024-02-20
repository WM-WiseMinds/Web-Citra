<?php

namespace App\Livewire;

use App\Models\BookingService;
use App\Models\DetailPerbaikan;
use App\Models\Perbaikan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class PerbaikanForm extends ModalComponent
{
    use Toastable;

    public Perbaikan $perbaikan;

    public $user, $booking_service, $user_id, $bookingservice_id, $persetujuan, $keterangan, $user_name, $jenis_barang, $kerusakan;
    public $updatingPersetujuanOnly = false;

    public function render()
    {
        // $booking_service = BookingService::all();
        return view('livewire.perbaikan-form');
    }

    public function switchToPersetujuanMode()
    {
        $this->updatingPersetujuanOnly = true;
    }

    public function switchToCreatOrUpdateMode()
    {
        $this->updatingPersetujuanOnly = false;
    }

    public function resetCreateForm()
    {
        $this->user_id = '';
        $this->bookingservice_id = '';
        $this->persetujuan = '';
        $this->keterangan = '';
    }

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'bookingservice_id' => 'required|exists:bookingservice,id',
        'persetujuan' => 'required',
        'keterangan' => 'required',
    ];

    public function store()
    {
        $validatedData = $this->validate();
        $persetujuanSebelumnya = $this->perbaikan->persetujuan;
        $this->perbaikan->fill($validatedData);
        $this->perbaikan->save();


        $this->success($this->perbaikan->wasRecentlyCreated ? 'Perbaikan berhasil ditambahkan' : 'Perbaikan berhasil diubah');

        $this->closeModalWithEvents([
            PerbaikanTable::class => "perbaikanUpdated",
        ]);


        $this->resetCreateForm();

        if ($this->perbaikan->wasRecentlyCreated) {
            $bookingService = BookingService::find($this->perbaikan->bookingservice_id);
            if ($bookingService) {
                $bookingService->status = 'Diproses';
                $bookingService->save();
            }
        }

        // Membuat atau memperbarui transaksi ketika persetujuan adalah 'Perbaiki'
        if ($this->updatingPersetujuanOnly && $this->perbaikan->persetujuan === 'Perbaiki') {
            $this->createOrUpdateTransaksi();
        }

        // Menghapus transaksi ketika persetujuan berubah dari 'Perbaiki' ke status lain
        if ($this->updatingPersetujuanOnly && $persetujuanSebelumnya === 'Perbaiki' && $this->perbaikan->persetujuan !== 'Perbaiki') {
            $this->deleteTransaksi();
        }
    }

    public function mount($rowId = null, $updatingPersetujuanOnly = false)
    {
        $this->perbaikan = $rowId ? Perbaikan::find($rowId) : new Perbaikan();
        $this->user_id = auth()->user()->id;
        $this->user_name = auth()->user()->name;
        $this->booking_service = BookingService::all();
        $this->persetujuan = 'Menunggu';

        if ($rowId) {
            $this->perbaikan = Perbaikan::find($rowId);
            if ($updatingPersetujuanOnly) {
                $this->updatingPersetujuanOnly = $this->perbaikan->persetujuan;
            }
        }

        if ($this->perbaikan->exists) {
            $this->user_id = $this->perbaikan->user_id;
            $this->user_name = $this->perbaikan->user->name;
            $this->bookingservice_id = $this->perbaikan->bookingservice_id;
            $this->persetujuan = $this->perbaikan->persetujuan;
            $this->keterangan = $this->perbaikan->keterangan;


            if ($this->bookingservice_id) {
                $bookingService = BookingService::find($this->bookingservice_id);
                if ($bookingService) {
                    $this->jenis_barang = $bookingService->jenis_barang;
                    $this->kerusakan = $bookingService->kerusakan;
                }
            }
        } else if ($this->bookingservice_id) {

            $this->getDetailBookingService($this->bookingservice_id);
        }
    }

    public function getDetailBookingService($bookingservice_id)
    {
        $booking_service = BookingService::find($bookingservice_id);
        $this->jenis_barang = $booking_service->jenis_barang;
        $this->kerusakan = $booking_service->kerusakan;
    }

    // protected function hitungJumlahDetailPerbaikan($perbaikanId)
    // {
    //     $jumlah = DetailPerbaikan::where('perbaikan_id', $perbaikanId)->count();
    //     return $jumlah;
    // }

    // protected function hitungTotalBiaya($perbaikanId)
    // {
    //     $perbaikan = Perbaikan::find($perbaikanId);
    //     $totalBiaya = 0;

    //     foreach ($perbaikan->detailPerbaikan as $detail) {
    //         $totalBiaya += $detail->biaya;
    //     }

    //     return $totalBiaya;
    // }

    protected function createOrUpdateTransaksi()
    {
        $jumlahDetailPerbaikan = DetailPerbaikan::where('perbaikan_id', $this->perbaikan->id)->count();
        $totalBiaya = DetailPerbaikan::where('perbaikan_id', $this->perbaikan->id)->sum('biaya');

        $transaksi = Transaksi::updateOrCreate(
            ['perbaikan_id' => $this->perbaikan->id],
            ['jumlah' => $jumlahDetailPerbaikan, 'total_biaya' => $totalBiaya]
        );

        if ($transaksi->wasRecentlyCreated) {
            $this->success('Transaksi berhasil dibuat.');
        } else {
            $this->success('Transaksi berhasil diperbarui.');
        }
    }

    protected function deleteTransaksi()
    {
        Transaksi::where('perbaikan_id', $this->perbaikan->id)->delete();
        $this->success('Transaksi terkait berhasil dihapus.');
    }
}
