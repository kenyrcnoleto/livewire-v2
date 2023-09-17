<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AvatarUsuario extends Component
{
    use WithFileUploads;

    public $avatar;

    public function render()
    {
        return view('livewire.avatar-usuario');
    }

    public function save()
    {
        // ray(
        //     $this->avatar
        // );
        $this->validate([
            'avatar' => 'required|image|max:1024', // 1MB Max
        ]);

        $ref = $this->avatar->store('public');

        $user = auth()->user();
        $user->avatar = $ref;
        $user->save();
    }
}
