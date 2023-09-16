<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class EditarUsuario extends Component
{
   
    public bool $show = false;

    public ?User $user = null;

    public function mount(User $user) 
    {

        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.editar-usuario');
    }

    public function edit()
    {
        $this->user->name = fake()->name;

        $this->user->save();

        $this->emitUp('users::updated');

        $this->show = false;
    }
}
