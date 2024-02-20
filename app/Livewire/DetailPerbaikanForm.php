<?php

namespace App\Livewire;

use App\Models\DetailPerbaikan;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class DetailPerbaikanForm extends ModalComponent
{
    use Toastable;

    public DetailPerbaikan $detailPerbaikan;
    public $perbaikan_id, $status, $biaya, $jenis_perbaikan;
    public $detailPerbaikanItems = [];

    public function render()
    {
        return view('livewire.detail-perbaikan-form');
    }

    public function addDetailPerbaikanItem()
    {
        $this->detailPerbaikanItems[] = [
            'jenis_perbaikan' => $this->jenis_perbaikan,
            'status' => $this->status,
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
        $this->status = '';
        $this->biaya = '';
    }

    protected $rules = [
        'perbaikan_id' => 'required|exists:perbaikan,id',
        'detailPerbaikanItems.*.jenis_perbaikan' => 'required',
        'detailPerbaikanItems.*.status' => 'required',
        'detailPerbaikanItems.*.biaya' => 'required|numeric',
    ];

    public function store()
    {
        $validatedData = $this->validate();
        $this->detailPerbaikan->fill($validatedData);
        $this->detailPerbaikan->save();

        $this->success($this->detailPerbaikan->wasRecentlyCreated ? 'Detail Perbaikan berhasil ditambahkan' : 'Detail Perbaikan berhasil diubah');
        $this->closeModalWithEvents([
            PerbaikanTable::class => "detailPerbaikanUpdated",
        ]);
        $this->resetCreateForm();
    }

    public function mount($rowId = null, $perbaikan_id = null)
    {
        if ($rowId) {
            $this->detailPerbaikan = DetailPerbaikan::find($rowId);
            $this->perbaikan_id = $this->detailPerbaikan->perbaikan_id;
            $this->detailPerbaikanItems = [
                [
                    'jenis_perbaikan' => $this->detailPerbaikan->jenis_perbaikan,
                    'status' => $this->detailPerbaikan->status,
                    'biaya' => $this->detailPerbaikan->biaya,
                ]
            ];
        }
        if ($perbaikan_id) {
            $this->perbaikan_id = $perbaikan_id;
        }
    }
}
