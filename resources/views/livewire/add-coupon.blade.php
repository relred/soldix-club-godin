<div class="w-full max-w-6xl rounded bg-white shadow-xl mt-5 p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
    @if ($status)
        <x-bladewind::alert
            showCloseIcon="false"
            type="success">
            {{ $status }}
        </x-bladewind::alert>
    @endif

    <div class="grid w-full place-items-center mt-2 mb-6">
        <p class="text-center mb-3 font-bold text-lg text-neutral-600">Tipo de descuento</p>
        <div class="grid w-[40rem] grid-cols-4 gap-2 rounded-xl bg-gray-200 p-2">
            <div>
                <input type="radio" id="discount_fixed" name="type" value="discount_fixed" wire:model="type" class="peer hidden" checked />
                <label wire:click="unset_tag" for="discount_fixed" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-red-500 peer-checked:font-bold peer-checked:text-white">Fijo</label>
            </div>
    
            <div>
                <input type="radio" id="discount_percent" name="type" value="discount_percent" wire:model="type" class="peer hidden" />
                <label wire:click="unset_tag" for="discount_percent" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-red-500 peer-checked:font-bold peer-checked:text-white">Porcentual</label>
            </div>
    
            <div>
                <input type="radio" id="free" name="type" value="free" wire:model="type" class="peer hidden" />
                <label wire:click="unset_tag" for="free" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-red-500 peer-checked:font-bold peer-checked:text-white">Producto Gratis</label>
            </div>
    
            <div>
                <input type="radio" id="2x1" name="type" value="2x1" wire:model="type" class="peer hidden" />
                <label wire:click="unset_tag" for="2x1" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-red-500 peer-checked:font-bold peer-checked:text-white">2x1</label>
            </div>
        </div>
    </div>

    <div class="md:flex items-center -mx-10">
        <div class="w-full md:w-1/2 mb-10 md:mb-0">
            <x-coupon
                id=""
                image="{{ $image }}"
                type="{{ $type }}"
                tag="{{ $tag }}"
                valid="Todos los martes">
                @if ($name)
                    {{ $name }}
                @else
                    Descuento en hamburguesa la compra de un combo especial.
                @endif
                <x-slot name="image">
                    @if ($image)
                        {{ $image->temporaryUrl() }}
                    @else
                        {{ 'https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075785/assets/soldix/dummy%20images/t_ht9sxf.jpg' }}
                    @endif
                </x-slot>
            </x-coupon>
        </div>
        <div class="w-full md:w-1/2 px-10">
            <p class="text-center mb-3 font-bold text-lg text-neutral-600">Información de cupón</p>
            <div class="mb-5">
                <input
                    type="text"
                    id="name"
                    placeholder="Título"
                    class="w-full rounded-sm border border-[#e0e0e0] bg-white mb-0.5 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    wire:model.debounce.5ms="name"
                />

                @if ($type == '2x1')
                    <div class="grid grid-cols-3">
                        <input
                            type="text"
                            id="tag"
                            name="tag"
                            class="w-full rounded-sm border border-[#e0e0e0] bg-white mb-0.5 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            wire:model.debounce.5ms="first2x1"
                        />
                        <p class="text-center font-bold text-gray-500 text-2xl mt-2">x</p>
                        <input
                            type="text"
                            id="tag"
                            name="tag"
                            class="w-full rounded-sm border border-[#e0e0e0] bg-white mb-0.5 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            wire:model.debounce.5ms="second2x1"
                        />
                    </div>
                @elseif ($type == 'free')
                    <input
                        type="text"
                        id="tag"
                        name="tag"
                        placeholder="Producto"
                        class="w-full rounded-sm border border-[#e0e0e0] bg-white mb-0.5 py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        wire:model.debounce.5ms="tag"
                    />
                @elseif ($type == 'discount_fixed')
                    <input
                        type="number"
                        id="tag"
                        name="tag"
                        placeholder="Descuento en pesos"
                        class="w-full rounded-sm border border-[#e0e0e0] bg-white mb-0.5 py-3 px-6 text-base font-medium text-[#6B7280] text-center outline-none focus:border-[#6A64F1] focus:shadow-md"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                        wire:model.debounce.5ms="tag"
                    />
                @else
                    <input
                        type="number"
                        id="tag"
                        name="tag"
                        placeholder="Porcentaje de descuento"
                        class="w-full rounded-sm border border-[#e0e0e0] bg-white mb-0.5 py-3 px-6 text-base font-medium text-[#6B7280] text-center outline-none focus:border-[#6A64F1] focus:shadow-md"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                        wire:model.debounce.5ms="tag"
                    />
                @endif
    
                <div class="mb-0.5">
                    <input type="file" wire:model="image" id="file" class="sr-only" />
                    <label
                      for="file"
                      class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] px-12 text-center"
                    >
                    <div>
                        <span class="mb-2 block text-xl font-semibold text-[#07074D] rounded border border-[#e0e0e0] py-2 px-7">
                            Seleccione una imagen
                        </span>
                    </div>
                    </label>
                </div>
            </div>
            <div class="mb-0.5">
                <div class="grid grid-cols-2">
                    <label class="" for="campain_start">Inicio</label>
                    <label for="campain_finishes">Acaba</label>
                </div>
                <input type="date" name="campain_start" id="campain_start">
                <input type="date" name="campain_finishes" id="campain_finishes">
            </div>

            <input
                wire:click="store({{ $wallet_id }})"
                wire:loading.remove
                wire:target="image, store"
                type="submit"
                class="flex w-full my-5 px-3 py-2 bg-red-500 rounded-md text-white hover:cursor-pointer" 
                value="Registrar">

            <div class="text-center my-5" wire:loading.block wire:target="image, store">
                <x-bladewind::spinner class="text-center" size="medium"  />
            </div>
        </div>
    </div>
</div>
