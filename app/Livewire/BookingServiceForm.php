<?php

namespace App\Livewire;

use App\Models\BookingService;
use App\Models\Perbaikan;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class BookingServiceForm extends ModalComponent
{
    public $tanggal_booking, $perbaikan, $user, $bookingservice, $jenis_barang, $kerusakan, $id, $user_id, $perbaikan_id, $bookingservice_id;


    public function render()
    {
        $user = User::all();
        $bookingservice = BookingService::all();

        return view('livewire.bookingservice-form', compact('user', 'bookingservice')) ;
    }

    public function resetCreateForm()
    {
        $this->user_id = '';
        $this->jenis_barang = '';
        $this->kerusakan = '';
        $this->tanggal_booking = '';
    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required',
            'jenis_barang' => 'required',
            'kerusakan' => 'required',
            'tanggal_booking' => 'required',
        ]);

        if ($this->id) {
            $bookingservice = BookingService::find($this->id);
            $bookingservice->update([

                'user_id' => $this->user_id,
                'jenis_barang' => $this->jenis_barang,
                'kerusakan' => $this->kerusakan,
                'tanggal_booking' => $this->tanggal_booking,
            ]);
            // $bookingservice->user()->sync($this->user_id);
        } else {
            $bookingservice = BookingService::create([

                'user_id' => $this->user_id,
                'jenis_barang' => $this->jenis_barang,
                'kerusakan' => $this->kerusakan,
                'tanggal_booking' => $this->tanggal_booking,
            ]);
            // $bookingservice->user()->attach($this->user_id);
        }

        $this->closeModalWithEvents([
            BookingServiceTable::class => 'bookingServiceUpdated',
        ]);

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        $this->bookingservice = BookingService::all();
        $this->user = User::all();
        if (!is_null($rowId)) {

            $this->user = User::all();
            $bookingservice = BookingService::findOrFail($rowId);
            $this->id = $rowId;
            $this->jenis_barang = $bookingservice->jenis_barang;
            $this->tanggal_booking = $bookingservice->tanggal_booking;
            $this->kerusakan = $bookingservice->kerusakan;
            $this->user_id = $bookingservice->user_id;


        }
    }
}