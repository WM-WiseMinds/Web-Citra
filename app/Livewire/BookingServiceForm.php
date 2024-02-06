<?php

namespace App\Livewire;

use App\Models\BookingService;
use App\Models\User;
use Livewire\Component;

class BookingServiceForm extends Component
{
    public $tanggal_booking, $nama, $alamat, $no_hp, $jenis_barang, $kerusakan, $id;
    
    public $user_id = [];

    public function render()
    {
        $user = User::all();
        $bookingservice = BookingService::all();

        return view('livewire.booking-service-form', compact('user', 'bookingservice')) ;
    }

    public function resetCreateForm()
    {
        $this->jenis_barang = '';
        $this->nama = '';
        $this->no_hp = '';
        $this->alamat = '';
        $this->kerusakan = '';
        $this->tanggal_booking = '';
    }

    public function store()
    {
        $this->validate([
            'jenis_barang' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'kerusakan' => 'required',
            'tanggal_booking' => 'required',
        ]);

        if ($this->id) {
            $bookingservice = BookingService::find($this->id);
            $bookingservice->update([
                'jenis_barang' => $this->jenis_barang,
                'nama' => $this->nama,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'kerusakan' => $this->kerusakan,
                'tanggal_booking' => $this->tanggal_booking,
            ]);
            $bookingservice->user()->sync($this->user_id);
        } else {
            $bookingservice = BookingService::create([
                'jenis_barang' => $this->jenis_barang,
                'nama' => $this->nama,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'kerusakan' => $this->kerusakan,
                'tanggal_booking' => $this->tanggal_booking,
            ]);
            $bookingservice->user()->attach($this->user_id);
        }

        $this->closeModalWithEvents([
            BookingServiceTable::class => 'bookingServiceUpdated',
        ]);

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        
        if (!is_null($rowId)) {
            $bookingservice = BookingService::findOrFail($rowId);
            $this->id = $rowId;
            $this->tanggal_booking = $bookingservice->tanggal_booking;
            $this->nama = $bookingservice->nama;
            $this->alamat = $bookingservice->alamat;
            $this->no_hp = $bookingservice->no_hp;
            $this->jenis_barang = $bookingservice->jenis_barang;
            $this->kerusakan = $bookingservice->kerusakan;
            $this->user_id = $bookingservice->user->pluck('id')->toArray();
        }
    }
}