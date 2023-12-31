<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Rules\CustomRule;

class CriarUsuario extends Component
{
    public ?string $name = null;

    public ?string $email = null;

    //cada regra corresponde a propriedade pública inserida anteriormente

    /*pode trocar a propriedade pelo método
    protected array $rules = [
        'name' => ['required', 'min:3', 'max:255'],
        'email'=> ['required', 'email', 'max:255', new CustomRule()],
    ]; */

    protected function rules() 
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],
        ];
    }


    public function render()
    {
        return view('livewire.criar-usuario');
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function save()
    {
        sleep(2);
        $this->validate();
        if($this->name == 'teste') {
            
            $this->addError('name', 'uuu Jeremias!!Deu ruim');
            //ray($this->getErrorBag()->get('name'));
        } 

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => 'qualquer-coisa'
        ]);

        $this->emit('user::created');
        $this->reset('name', 'email');

       // ray('oi');
    }
}
