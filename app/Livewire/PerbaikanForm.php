<?php

namespace App\Livewire;

use App\Models\BookingService;
use App\Models\Perbaikan;
use App\Models\Transaksi;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class PerbaikanForm extends ModalComponent
{
    use Toastable;

    public Perbaikan $perbaikan;

    public $user, $booking_service, $user_id, $bookingservice_id, $persetujuan, $keterangan, $user_name, $jenis_barang, $kerusakan;

    public function render()
    {
        // $booking_service = BookingService::all();
        return view('livewire.perbaikan-form');
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
        $this->perbaikan->fill($validatedData);
        $this->perbaikan->save();

        $this->success($this->perbaikan->wasRecentlyCreated ? 'Perbaikan berhasil ditambahkan' : 'Perbaikan berhasil diubah');

        $this->closeModalWithEvents([
            PerbaikanTable::class => "perbaikanUpdated",
        ]);


        $this->resetCreateForm();

        // Hapus data booking service yang sesuai dari tabelnya
        if ($this->perbaikan->wasRecentlyCreated) {
            $bookingService = BookingService::find($this->perbaikan->bookingservice_id);
            if ($bookingService) {
                $bookingService->status = 'Diproses';
                $bookingService->save();
            }
        }
    }

    public function mount($rowId = null)
    {
        $this->perbaikan = $rowId ? Perbaikan::find($rowId) : new Perbaikan();
        $this->user_id = auth()->user()->id;
        $this->user_name = auth()->user()->name;
        $this->booking_service = BookingService::all();
        $this->persetujuan = 'Menunggu';
        if ($this->perbaikan->exists) {
            $this->user_id = $this->perbaikan->user_id;
            $this->user_name = $this->perbaikan->user->name;
            $this->bookingservice_id = $this->perbaikan->bookingservice_id;
            $this->persetujuan = $this->perbaikan->persetujuan;
            $this->keterangan = $this->perbaikan->keterangan;
        }
    }

    public function getDetailBookingService($bookingservice_id)
    {
        $booking_service = BookingService::find($bookingservice_id);
        $this->jenis_barang = $booking_service->jenis_barang;
        $this->kerusakan = $booking_service->kerusakan;
    }
}
