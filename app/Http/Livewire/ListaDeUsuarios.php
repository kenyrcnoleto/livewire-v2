<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class ListaDeUsuarios extends Component
{

    use WithPagination;

    public ?int $limit = 5;

   public ?string $search = null;
   public ?string $searchEmail = null;
   public ?string $sortBy = null;
   public ?string $sortDir = 'asc';

    protected $listeners = [
        'users::updated' => '$refresh'
    ];

    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'searchEmail' => ['except' => '', 'as' => 'eq'],
        'limit' => ['except' => '5', 'as' => '1'],
        'sortBy' => ['except' => ''],
        'sortDir' => ['except' => 'asc'],

    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.lista-de-usuarios', [
            'users' => User::query()
                ->when($this->search, fn(Builder $q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->when($this->searchEmail, fn(Builder $q) => $q->where('email', 'like', '%' . $this->searchEmail . '%'))
                ->when($this->sortBy, fn(Builder $q) => $q->orderBy($this->sortBy, $this->sortDir))
                ->paginate($this->limit)
        ])->layout('layouts.app',['header' => __('Users')]);
    }

    public function sort($column)
    {
        $this->sortDir = $this->sortBy == $column
            ? ($this->sortDir = $this->sortDir == 'asc' ? 'desc' : 'asc') //togle direcition
            : 'asc';
        
        // if($this->sortBy == $column) {
        //      $this->sortDir = $this->sortDir == 'asc' ? 'desc' : 'asc';
        //  } else {
        //      $this->sortDir = 'asc';
        //  }

        $this->sortBy = $column;
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
