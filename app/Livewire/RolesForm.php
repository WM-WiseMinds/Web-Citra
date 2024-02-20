<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Masmerise\Toaster\Toastable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesForm extends ModalComponent
{
    use Toastable;

    public $roles, $id, $name, $permissions;
    public $permissions_id = [];

    public function render()
    {
        $permissions = Permission::all(); // This ensures $permissions is always set
        $roles = Role::all();
        return view('livewire.roles-form', compact('permissions', 'roles'));
    }

    public function resetCreateForm()
    {
        $this->name = '';
        $this->permissions_id = [];
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'permissions_id' => 'required|array',
        ]);

        $role = Role::updateOrCreate(
            ['id' => $this->id],
            ['name' => $this->name, 'guard_name' => 'web']
        );

        // Dapatkan semua permissions berdasarkan id dan pastikan mereka menggunakan guard yang sama dengan role
        $permissions = Permission::whereIn('id', $this->permissions_id)->where('guard_name', 'web')->get();

        // Menggunakan syncPermissions untuk menyinkronkan permissions.
        // Ini akan menghapus semua permissions yang sebelumnya terkait dengan role ini dan menggantinya dengan yang baru.
        $role->syncPermissions($permissions);

        $this->closeModalWithEvents([
            RolesTable::class => 'rolesUpdated',
        ]);

        $this->success($role->wasRecentlyCreated ? 'Role telah berhasil dibuat.' : 'Role telah berhasil diupdate.');

        $this->resetCreateForm();

        $this->dispatch('roles-updated');
    }

    public function mount($rowId = null)
    {
        $this->permissions = Permission::all();
        if (!is_null($rowId)) {
            $this->permissions = Permission::all();
            $roles = Role::findOrFail($rowId);
            $this->id = $rowId;
            $this->name = $roles->name;
            $this->permissions_id = $roles->permissions->pluck('id')->toArray();
        }
    }
}
