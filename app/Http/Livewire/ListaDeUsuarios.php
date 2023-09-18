<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ListaDeUsuarios extends Component
{

   public ?string $search = null;

    protected $listeners = [
        'users::updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        return view('livewire.lista-de-usuarios', [
            'users' => User::query()
                ->when($this->search, fn(Builder $q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->get()
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
