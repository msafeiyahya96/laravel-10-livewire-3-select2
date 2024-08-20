<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    public $createForm = false;
    public $name, $email, $role, $password;

    public function render()
    {
        $users  = ModelsUser::all();

        return view('livewire.user', compact('users'));
    }

    public function create()
    {
        $this->resetValidation();
        $this->createForm = true;
        $this->role = null;
    }

    public function batal()
    {
        $this->createForm = false;
    }

    public function store()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'role'      => 'required',
            'password'  => 'required',
        ]);
    }
}
