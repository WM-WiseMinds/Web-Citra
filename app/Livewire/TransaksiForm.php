<?php

namespace App\Livewire;

use App\Models\Transaksi;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class TransaksiForm extends ModalComponent
{
    public $biaya, $jumlah, $total_biaya, $id, $user_id, $transaksi, $user;

    public function render()
    {
        $user = User::all();
        return view('livewire.transaksi-form', compact('user'));
    }

    public function resetCreateForm()
    {
        $this->biaya = '';
        $this->jumlah = '';
        $this->total_biaya = '';
    }

    public function store()
    {
        $this->validate([
            'biaya' => 'required',
            'jumlah' => 'required',
            'total_biaya' => 'required',
        ]);

        if ($this->id) {
            $transaksi = Transaksi::find($this->id);
            $transaksi->update([
                'biaya' => $this->biaya,
                'jumlah' => $this->jumlah,
                'total_biaya' => $this->total_biaya,
            ]);
            // $transaksi->user()->sync($this->user_id);
        } else {
            $transaksi = Transaksi::create([
                'biaya' => $this->biaya,
                'jumlah' => $this->jumlah,
                'total_biaya' => $this->total_biaya,
            ]);
            // $transaksi->user()->attach($this->user_id);
        }

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        $this->transaksi = Transaksi::all();
        $this->user = User::all();
        if (!is_null($rowId)) {
            $transaksi = Transaksi::findOrFail($rowId);
            $this->id = $transaksi->id;
            $this->biaya = $transaksi->biaya;
            $this->jumlah = $transaksi->jumlah;
            $this->total_biaya = $transaksi->total_biaya;
            $this->user_id = $transaksi->user_id;

        
        }
    }
}
