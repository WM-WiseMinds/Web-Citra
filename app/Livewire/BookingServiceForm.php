<?php

namespace App\Livewire;

use App\Models\BookingService;
use App\Models\Perbaikan;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class BookingServiceForm extends ModalComponent
{

    use Toastable;

    public BookingService $bookingservice;
    public $tanggal_booking, $jenis_barang, $kerusakan, $user_id;

    public function render()
    {
        return view('livewire.bookingservice-form');
    }

    public function resetCreateForm()
    {
        $this->user_id = '';
        $this->jenis_barang = '';
        $this->kerusakan = '';
        $this->tanggal_booking = '';
    }

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'jenis_barang' => 'required',
        'kerusakan' => 'required',
        'tanggal_booking' => 'required',
    ];

    public function store()
    {
        $validatedData = $this->validate();
        $this->bookingservice->fill($validatedData);
        $this->bookingservice->save();

        $this->success($this->bookingservice->wasRecentlyCreated ? 'Booking Service berhasil ditambahkan' : 'Booking Service berhasil diubah');

        $this->closeModalWithEvents([
            BookingServiceTable::class => 'bookingServiceUpdated',
        ]);

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        $this->bookingservice = $rowId ? BookingService::find($rowId) : new BookingService();
        $this->user_id = auth()->user()->id;
        $this->tanggal_booking = Carbon::today()->format('Y-m-d');
        if ($this->bookingservice->exists) {
            $this->bookingservice = BookingService::find($rowId);
            $this->user_id = $this->bookingservice->user_id;
            $this->jenis_barang = $this->bookingservice->jenis_barang;
            $this->kerusakan = $this->bookingservice->kerusakan;
            $this->tanggal_booking = $this->bookingservice->tanggal_booking;
        }
    }
}
