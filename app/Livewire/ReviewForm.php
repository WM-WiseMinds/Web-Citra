<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use App\Models\Review;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;

class ReviewForm extends ModalComponent
{
    use Toastable;

    public Review $review;
    public $user_id, $perbaikan_id, $rating, $comment, $user_name, $jenis_barang, $perbaikan;

    public function render()
    {
        return view('livewire.review-form');
    }

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'perbaikan_id' => 'required|exists:perbaikan,id',
        'rating' => 'required|numeric|min:1|max:5',
        'comment' => 'required|string',
    ];

    public function store()
    {
        $validatedData = $this->validate();

        $this->review->fill($validatedData);

        $this->review->save();

        $this->success('Review berhasil disimpan.');

        $this->closeModalWithEvents([
            ReviewTable::class => 'reviewUpdated',
        ]);
    }

    public function mount($rowId = null, $perbaikan_id = null)
    {
        $this->review = $rowId ? Review::findOrFail($rowId) : new Review();
        $this->perbaikan = Perbaikan::findOrFail($perbaikan_id);
        $this->perbaikan_id = $perbaikan_id;
        $this->user_id = auth()->user()->id;
        $this->user_name = auth()->user()->name;
        $this->jenis_barang = $this->perbaikan->bookingservice->jenis_barang;

        if ($this->review->exists) {
            $this->user_id = $this->review->user_id;
            $this->perbaikan_id = $this->review->perbaikan_id;
            $this->rating = $this->review->rating;
            $this->comment = $this->review->comment;
        }
    }
}
