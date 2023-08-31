<div>
    <div class="mb-0.5">
        <p class="text-lg ml-2 mb-2 font-semibold">Imagen (Opcional)</p>

        <input type="file" name="file" id="file" class="sr-only" wire:model="image" />
        <label
            for="file"
            class="relative flex min-h-[200px] bg-gray-50 items-center justify-center rounded-md border border-dashed border-[#e0e0e0] px-12 text-center"
            >
        <div>
            <span class="mb-2 block text-xl font-semibold text-[#07074D] rounded border border-[#e0e0e0] py-2 px-7">
                Seleccione una imagen
            </span>
        </div>
        </label>

        @if ($image)
            <div class="my-3">
                <img class="max-h-32" src="{{ $image->temporaryUrl() }}" alt="">
            </div>
        @endif

    </div>

    <div class="text-center">
        <input 
            wire:loading.remove
            type="submit" 
            class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white" 
            value="Registrar">
    </div>

    <div class="mx-10 my-5" wire:loading.block wire:target="image, store">
        <x-bladewind::spinner class="text-center" size="medium"  />
    </div>
</div>