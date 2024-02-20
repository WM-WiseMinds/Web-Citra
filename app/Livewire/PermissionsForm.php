<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;

class PermissionsForm extends ModalComponent
{
    use Toastable;
    public $permissions, $id, $name;

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.permissions-form', compact('permissions'));
    }

    public function resetCreateForm()
    {
        $this->name = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $permissions = Permission::updateOrCreate(
            ['id' => $this->id],
            ['name' => $this->name, 'guard_name' => 'web']
        );

        $this->closeModalWithEvents([
            PermissionsTable::class => 'permissionsUpdated',
        ]);

        $this->success($permissions->wasRecentlyCreated ? 'Permission telah berhasil dibuat.' : 'Permission telah berhasil diupdate.');

        $this->resetCreateForm();
    }

    public function mount($rowId = null)
    {
        if (!is_null($rowId)) {
            $permissions = Permission::findOrFail($rowId);
            $this->id = $rowId;
            $this->name = $permissions->name;
        }
    }
}
