<div>
    <h1>LIVEWIRE COUNT COMPONENT</h1>
    <div>
       
        <x-text-input wire:model="name" />

        {{$name}}

        <x-primary-button wire:click="toggle('UPPER')">UPPER</x-prmary-button>

        <x-primary-button wire:click="toggle('LOWER')">LOWER</x-prmary-button>
        
        <x-primary-button wire:click="submit">CREATE A NEW USER</x-prmary-button>

    </div>

    <div>
        @foreach($users as $user)

            {{ $user->name }}

        @endforeach
    </div>
</div>
