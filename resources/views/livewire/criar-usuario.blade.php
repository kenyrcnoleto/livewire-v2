<div>


    <form method="POST" wire:submit.prevent="save">
        @csrf
    
            
            <div>
                <x-input-label for="name" :value="__('Name')" />
    
                <!-- .defer evita que vá para srv o tempo todo em que digita -->
                <!-- model.lazy ele valida após sair da caixa de texto -->
                <x-text-input 
                
                    wire:model.lazy="name"
                    id="name" class="block mt-1 w-full" 
                    type="text" name="name" />
    
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="email" :value="__('Email')" />
    
                <x-text-input 
                    wire:model="email"
                    id="email" class="block mt-1 w-full" 
                    type="text" name="email" 
                    autocomplete="username" />
    
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                
                <x-primary-button class="ml-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
    </form>
</div>



