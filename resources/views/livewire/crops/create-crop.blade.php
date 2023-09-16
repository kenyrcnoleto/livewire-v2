<div>


    <form method="POST" wire:submit.prevent="save">
    @csrf
    
            <div>
                <x-input-label for="crop" :value="__('Crop')" />
    
                <!-- .defer evita que vá para srv o tempo todo em que digita -->
                <!-- model.lazy ele valida após sair da caixa de texto -->
                <x-text-input 
                
                    wire:model="crop"
                    id="crop" class="block mt-1 w-full" 
                    type="text" name="crop" />
    
                    <x-input-error :messages="$errors->get('crop')" class="mt-2" />
            </div>
    
               
            <div class="flex items-center justify-end mt-4">
                
                <x-primary-button class="ml-3">
                    Criar
                </x-primary-button>
            </div>
            <div class="flex items-center justify-end mt-4">
            

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>