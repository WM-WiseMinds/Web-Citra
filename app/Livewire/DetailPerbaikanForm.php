<?php

namespace App\Livewire;

use App\Models\DetailPerbaikan;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class DetailPerbaikanForm extends ModalComponent
{
    use Toastable;

    public DetailPerbaikan $detailPerbaikan;
    public $perbaikan_id, $biaya, $jenis_perbaikan;
    public $detailPerbaikanItems = [];

    public function render()
    {
        return view('livewire.detail-perbaikan-form');
    }

    public function addDetailPerbaikanItem()
    {
        $this->detailPerbaikanItems[] = [
            'jenis_perbaikan' => $this->jenis_perbaikan,
            'biaya' => $this->biaya,
        ];
    }

    public function removeDetailPerbaikanItem($index)
    {
        unset($this->detailPerbaikanItems[$index]);
        $this->detailPerbaikanItems = array_values($this->detailPerbaikanItems);
    }

    public function resetCreateForm()
    {
        $this->perbaikan_id = '';
        $this->jenis_perbaikan = '';
        $this->biaya = '';
    }

    protected $rules = [
        'perbaikan_id' => 'required|exists:perbaikan,id',
        'detailPerbaikanItems.*.jenis_perbaikan' => 'required',
        'detailPerbaikanItems.*.biaya' => 'required|numeric',
    ];

    public function store()
    {
        $this->validate();

        foreach ($this->detailPerbaikanItems as $item) {
            if ($this->detailPerbaikan->exists) {
                $this->detailPerbaikan->update($item);
            } else {
                $detailPerbaikan = new DetailPerbaikan();
                $detailPerbaikan->perbaikan_id = $this->perbaikan_id;
                $detailPerbaikan->fill($item);
                $detailPerbaikan->save();
            }
        }


        $this->success($this->detailPerbaikan->wasRecentlyCreated ? 'Detail Perbaikan berhasil ditambahkan' : 'Detail Perbaikan berhasil diubah');
        $this->closeModalWithEvents([
            PerbaikanTable::class => "detailPerbaikanUpdated",
        ]);
        $this->resetCreateForm();
    }

    public function mount($detail_perbaikan_id = null, $perbaikan_id = null)
    {
        if ($detail_perbaikan_id) {
            $this->detailPerbaikan = DetailPerbaikan::find($detail_perbaikan_id);
            $this->perbaikan_id = $this->detailPerbaikan->perbaikan_id;
            $this->detailPerbaikanItems = [
                [
                    'jenis_perbaikan' => $this->detailPerbaikan->jenis_perbaikan,
                    'biaya' => $this->detailPerbaikan->biaya,
                ]
            ];
        } else {
            $this->detailPerbaikan = new DetailPerbaikan();
            $this->detailPerbaikanItems = [];
        }
        if ($perbaikan_id) {
            $this->perbaikan_id = $perbaikan_id;
        }
    }
}
