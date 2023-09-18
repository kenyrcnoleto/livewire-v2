<div>
    
    <x-secondary-button wire:click="download">  
        Download
    </x-secondary-button>

    <form wire:submit.prevent="save">
    <div>
                <x-input-label for="avatar" :value="__('avatar')" />
    
                <!-- .defer evita que vá para srv o tempo todo em que digita -->
                <!-- model.lazy ele valida após sair da caixa de texto -->
                @if($avatar)
                    <img src="{{ $avatar->temporaryUrl() }}" alt="" >
                @endif
                <x-text-input 
                
                    wire:model="avatar"
                    id="avatar" class="block mt-1 w-full" 
                    type="file" name="avatar" />
    
                <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
            </div>

            <x-primary-button>
                Save
            </x-primary-button>
    </form>
</div>
