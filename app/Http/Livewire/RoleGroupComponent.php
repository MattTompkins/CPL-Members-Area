<?php

namespace App\Http\Livewire;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Livewire\Component;

class RoleGroupComponent extends Component
{
    public $roleGroups;
    public $users;
    public $selectedRole;
    public $userToAdd;
    public $allUsers;

    public function mount()
    {
        $this->roleGroups = Role::all();
        $this->allUsers = User::all();
    }

    public function updatedSelectedRole($roleId)
    {
        if ($roleId) {
            $this->users = Role::findOrFail($roleId)->users;
        } else {
            $this->users = null;
        }
    }

    public function addUserToRole()
    {
        $user = User::findOrFail($this->userToAdd);
        $user->roles()->attach($this->selectedRole);

        $this->users = Role::findOrFail($this->selectedRole)->users;
        $this->userToAdd = null;
    }

    public function removeUserFromRole($userId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->detach($this->selectedRole);

        $this->users = Role::findOrFail($this->selectedRole)->users;
    }

    public function render()
    {
        return view('livewire.role-group-component');
    }
}