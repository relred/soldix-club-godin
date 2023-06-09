<div>
    <select 
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
    wire:model="type">
        <option value="" selected="true">Seleccione una Opción</option>
        <option value="go">Go</option>
        <option value="cuida">Cuidadores</option>
        <option value="merc">Mercadito</option>
    </select>
    @if ($type)
        <div class="mt-8">
            <div class="flex text-xl mx-6">
                <p class="flex-1">Clientes al Mes</p>
                <p class="flex-1 text-right">
                    @if ($range >= 100)+@endif{{number_format($users)}}
                </p>
            </div>

            <input type="range" wire:model.debounce.5ms="range"  id="volume" min="1" max="100" value="1" step="1" class="transparent h-1.5 w-full cursor-ew-resize appearance-none rounded-lg border-transparent bg-orange-400">
            <p>Para resultados certeros de click en "Calcular" una vez haya seleccionado la cantidad correcta</p>
        </div>
        <x-bladewind::statistic
            class="grid place-content-center mt-3 bg-stone-200 rounded-xl"
            number="{{ number_format($revenue, 0, '.', ',')  }}"
            label="Ganancias Mensuales Estimadas">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 p-2 text-white rounded-2xl bg-green-700" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                    <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                    <path d="M12 6v2m0 8v2" />
                </svg>
            </x-slot>
            <button wire:click="calculate" class="mt-5 px-3 py-2 bg-orange-400 rounded-md text-white">Calcular</button>
        </x-bladewind::statistic>
        <div class="grid place-content-center">
            <button wire:click="calculate" class="mt-8 p-3 bg-orange-600 rounded-sm text-white text-xl">Siguiente</button>    
        </div>
    @endif

</div>
