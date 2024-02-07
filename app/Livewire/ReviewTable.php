<?php

namespace App\Livewire;

use App\Models\Review;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ReviewTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Detail::make()
                ->showCollapseIcon()
                ->view('details.review-detail')
        ];
    }

    public function datasource(): Builder
    {
        return Review::query()
            ->leftJoin('users', 'review.user_id', '=', 'users.id')
            ->leftJoin('bookingservice', 'review.bookingservice_id', '=', 'bookingservice.id')
            ->select('review.*', 'users.name as user_name', 'bookingservice.jenis_barang', 'bookingservice.kerusakan')
        ;
    }

    public function relationSearch(): array
    {
        return [
            'user' => ['name'],
            'bookingservice' => ['jenis_barang', 'kerusakan'],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_name')
            ->add('jenis_barang')
            ->add('kerusakan')
            ->add('rating')
            ->add('comment')
            ->add('review_date');
    }

    public function columns(): array
    {
        return [
            Column::make('ID','id')
                ->searchable()
                ->sortable(),
            Column::make('Jenis Barang','jenis_barang')
                ->searchable()
                ->sortable(),
            Column::make('Rating','rating')
                ->searchable()
                ->sortable(),
            Column::make('Kerusakan','kerusakan')
                ->searchable()
                ->sortable(),
            Column::make('Review Date','review_date')
                ->searchable()
                ->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Review $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
