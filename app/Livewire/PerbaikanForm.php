<?php

namespace App\Livewire;

use App\Models\BookingService;
use App\Models\Perbaikan;
use App\Models\Transaksi;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PerbaikanForm extends ModalComponent
{
    public $perbaikan, $persetujuan, $keterangan, $id, $user_id, $booking_service, $user, $bookingservice_id, $tanggal_booking, $transaksi, $transaksi_id;


    public function render()
    {
        $perbaikan = Perbaikan::all();
        $user = User::all();
        $booking_service = BookingService::all();
        $transaksi = Transaksi::all();
        // dd($booking_service);

        return view('livewire.perbaikan-form', compact('user', 'booking_service','transaksi', 'perbaikan'));
    }

    public function resetCreateForm()
    {
        $this->user_id = '';
        $this->bookingservice_id = '';
        $this->transaksi_id = '';
        $this-> persetujuan = '';
        $this-> keterangan = '';
        $this->tanggal_booking = '';

    }

    public function store ()
    {
        $this->validate([
            'user_id' => 'required',
            'bookingservice_id' => 'required', // 'booking_service_id' => 'required|exists:booking_service,id
            'transaksi_id'=> 'required',
            'persetujuan' => 'required',
            'keterangan' => 'required',
            'tanggal_booking' => 'required',
        ]);

        if ($this->id) {
            $perbaikan = Perbaikan::find($this->id);
            $perbaikan->update([
                'user_id' => $this->user_id,
                'bookingservice_id' => $this->bookingservice_id,
                'transaksi_id' => $this->transaksi_id,
                'persetujuan' => $this->persetujuan,
                'keterangan' => $this->keterangan,
                'tanggal_booking' => $this->tanggal_booking,

            ]);

        } else {
            $perbaikan = Perbaikan::create([
                'user_id' => $this->user_id,
                'bookingservice_id' => $this->bookingservice_id,
                'transaksi_id' => $this->transaksi_id,
                'persetujuan' => $this->persetujuan,
                'keterangan' => $this->keterangan,
                'tanggal_booking' => $this->tanggal_booking,

            ]);
        }
        $this->closeModalWithEvents([
            PerbaikanTable::class => "perbaikanUpdated",
        ]);


        $this->resetCreateForm();

    }

    public function mount($rowId = null)
    {
        $this->perbaikan = Perbaikan::all();
        $this->user = User::all();
        $this->booking_service = BookingService::all();
        $this->transaksi = Transaksi::all();
        if (!is_null ($rowId)) {
            $perbaikan = Perbaikan::findOrFail($rowId);
            $this->id = $perbaikan->id;
            $this->persetujuan = $perbaikan->persetujuan;
            $this->keterangan = $perbaikan->keterangan;
            $this->tanggal_booking = $perbaikan->tanggal_booking;
            $this->user_id = $perbaikan->user_id;
            $this->bookingservice_id = $perbaikan->bookingservice->pluck('id')->toArray();
            $this->transaksi_id = $perbaikan->transaksi->pluck('id')->toArray();

        }
    }
}
