<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ListaDeUsuarios extends Component
{

   
    protected $listeners = [
        'users::updated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.lista-de-usuarios', [
            'users' => User::all(),
        ]);
    }

    /*public function edit($id)
    {
        $user = User::find($id);

        $user->name = fake()->name;

        $user->save();
    } 
    
    botão para chamar na lista de usuarios
     <!--x-secondary-button wire:click="edit({{ $user->id }})">
                        Editar 
                    
                    </x-secondary-button-->
    */
}
