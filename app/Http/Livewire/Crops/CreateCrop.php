<?php

namespace App\Http\Livewire\Crops;

use Livewire\Component;

class CreateCrop extends Component
{
    public ?string $crop = null;

    // protected array $rules = [
    //     'crop'  => ['required', 'max:50']
    // ];

    protected function rules() 
    {
        return [
            'crop'  => ['required', 'min:3', 'max:50'],
        ];
    }
    public function render()
    {
        return view('livewire..crops.create-crop');
    }

    public function save()
    {
        $this->validate();
        if($this->crop == 'teste') {
            
            $this->addError('name', 'uuu Jeremias!!Deu ruim');
            //ray($this->getErrorBag()->get('name'));
        } 
    }
}
