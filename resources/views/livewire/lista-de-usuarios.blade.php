<div>
   
    <div class="mb-4">
        <x-text-input wire:model="search" placeholder="search..." />
        <x-text-input wire:model="searchEmail" placeholders="Email Search..." />
        <select  wire:model="limit">
            <option value="5">5</option>
            <option value="15">15</option>
            <option value="50">50</option>
        </select>
        
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sort('name')">
                    @if($sortBy == 'name')
                        <span>@if($sortDir == 'asc')down @else up @endif</span>
                    @endif
                    Nome
                </th>
                
                <th scope="col" class="px-6 py-3 cursor-pointer" wire:click="sort('email')">
                    @if($sortBy == 'email')
                        <span>@if($sortDir == 'asc')down @else up @endif</span>
                    @endif

                    E-mail
                </th>

                <th scope="col" class="px-6 py-3">

                </th>

            </tr>

        </thead>

        <tbody>
            @foreach($users as $user)

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                    {{ $user->name }}

                </th>

                <td class="px-6 py-4">

                    {{ $user->email }}

                </td>

                <td class="px-6 py-4">

                <!-- Sempre que estiver trabalhando com componentes filhos dentro de foreach principalmente
                utilizar o wire:key="edit-user-{{$user->id }}" para não se perder livewire-v2 -->
                    <livewire:editar-usuario :user="$user" wire:key="edit-user-{{$user->id }}"/>
                   

                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
</div>
