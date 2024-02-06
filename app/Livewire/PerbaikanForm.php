<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use App\Models\User;
use Livewire\Component;

class PerbaikanForm extends Component
{
    public $jenis_barang, $nama, $persetujuan, $keterangan, $kerusakan, $id;

    public $user_id = [];

    public function render()
    {
        $user = User::all();
        $perbaikan = Perbaikan::all();

        return view('livewire.perbaikan-form');
    }

    public function resetCreateForm()
    {
        $this-> persetujuan = '';
        $this-> keterangan = '';
        $this-> kerusakan = '';
    }

    public function store ()
    {
        $this->validate([
            'persetujuan' => 'required',
            'keterangan' => 'required',
            'kerusakan' => 'required',
        ]);

        if ($this->id) {
            $perbaikan = Perbaikan::find($this->id);
            $perbaikan->update([
                'persetujuan' => $this->persetujuan,
                'keterangan' => $this->keterangan,
                'kerusakan' => $this->kerusakan,
            ]);
            $perbaikan->user()->sync($this->user_id);
        } else {
            $perbaikan = Perbaikan::create([

                'persetujuan' => $this->persetujuan,
                'keterangan' => $this->keterangan,
                'kerusakan' => $this->kerusakan,
            ]);
            $perbaikan->user()->attach($this->user_id);
        }

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        $perbaikan = Perbaikan::find($rowId);
        if ($perbaikan) {
            $this->id = $perbaikan->id;
            $this->persetujuan = $perbaikan->persetujuan;
            $this->keterangan = $perbaikan->keterangan;
            $this->kerusakan = $perbaikan->kerusakan;
            $this->user_id = $perbaikan->user->pluck('id')->toArray();
        }
    }
}
