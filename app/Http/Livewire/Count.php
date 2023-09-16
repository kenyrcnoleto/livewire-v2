<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Count extends Component
{
    public ?string $name = "Rafael";

    public function render()
    {
        return view('livewire.count', [
            'users' => User::all(),
        ]);
    }

    public function submit()
    {
        User::factory()->create([
            'name' => $this->name
        ]);
    }

    public function send()
    {

        $this->emitTo(Todo::class, 'mudaai',  $this->name);

    }
    //todo método público consegue utilizar no front

    //pode passar paramentros do front
    public function toggle(string $type)
    {
        // if($this->name[0] === str($this->name[0])->upper()->toString()) 
        if($type == 'LOWER') {
            
            $this->name = str($this->name)->lower();

        } else {

            $this->name = str($this->name)->upper();

        }
    }

    //utilizando propriedades computadas

    public function getLastNameProperty()
    {
        return 'Jeremias';
    }
}
