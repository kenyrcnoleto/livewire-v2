<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Hello extends Component
{
    public ?string $text = '';

    public $user = null;

    protected array $rules = [
        'text' => ['required', 'min:3']
    ];

    public function mount()
    {
        $this->user = auth()->user();
        ray(__METHOD__ . '::'. now()->toString());
    }

    public function render()
    {
        return view('livewire.hello', [
            'user' => $this->user
        ]);
    }

    public function boot()
    {
        ray(__METHOD__ . '::'. now()->toString());
    }

    public function booted()
    {
        ray(__METHOD__ . '::'. now()->toString());
    }

  

    public function hydrate()
    {
        ray(__METHOD__ . '::'. now()->toString());
    }

    public function dehydrate()
    {
        ray(__METHOD__ . '::'. now()->toString());
    }

    public function updating($prop, $value)
    {
        //ray(__METHOD__, compact('a','b'));
    }
    
    public function updated($prop)
    {
        $this->validateOnly($prop);
        ray(__METHOD__ . '::'. now()->toString());
    }
}
