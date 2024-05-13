<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de cupón') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="pb-12">
        
        <a class="flex w-24 mt-5 px-3 py-2 bg-red-500 rounded-md text-white hover:cursor-pointer" href="{{ route('corporate.wallets.view', $coupon->wallet_id) }}">← Volver</a>

        <div class="max-w-md px-2 m-auto">
            <x-coupon
                id="{{ $coupon->id }}#"
                image="{{ $coupon->image }}"
                type="{{ $coupon->type }}"
                tag="{{ $coupon->tag }}"
                valid="Consulte validez en interior">
    
                <x-slot name="image">
                    {{ $coupon->image }}
                </x-slot>
    
                {{ $coupon->name }}
            </x-coupon>

        </div>
        
        <form action="{{ route('corporate.coupons.update') }}" method="post">
            @csrf
            @method('PATCH')
            <div class="max-w-lg px-2 m-auto">
                @if (session('status'))
                    <x-bladewind::alert
                        type="error">
                        {{ session('status') }}
                    </x-bladewind::alert>
                @endif
                <input type="hidden" name="id" value="{{ $coupon->id }}">

                <p class="mt-5 mb-2 font-semibold text-xl">Días de validez</p>
                <div class="grid grid-cols-7 mb-5">
    
                    <label for="day1" class="text-center select-none">Lunes</label>
                    <label for="day2" class="text-center select-none">Martes</label>
                    <label for="day3" class="text-center select-none">Miercoles</label>
                    <label for="day4" class="text-center select-none">Jueves</label>
                    <label for="day5" class="text-center select-none">Viernes</label>
                    <label for="day6" class="text-center select-none">Sábado</label>
                    <label for="day7" class="text-center select-none">Domingo</label>
    
                    <div class="inline-block m-auto">
                        <input
                            id="day1"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_monday"
                            value="1"
                            {{ ! $coupon->is_valid_monday ?: 'checked' }}/>
                    </div>
                    <div class="inline-block m-auto">
                        <input
                            id="day2"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_tuesday"
                            value="1"
                            {{ ! $coupon->is_valid_tuesday ?: 'checked' }}/>
                    </div>
                    <div class="inline-block m-auto">
                        <input
                            id="day3"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_wednesday"
                            value="1"
                            {{ ! $coupon->is_valid_wednesday ?: 'checked' }}/>
                    </div>
                    <div class="inline-block m-auto">
                        <input
                            id="day4"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_thursday"
                            value="1"
                            {{ ! $coupon->is_valid_thursday ?: 'checked' }}/>
                    </div>
                    <div class="inline-block m-auto">
                        <input
                            id="day5"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_friday"
                            value="1"
                            {{ ! $coupon->is_valid_friday ?: 'checked' }}/>
                    </div>
                    <div class="inline-block m-auto">
                        <input
                            id="day6"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_saturday"
                            value="1"
                            {{ ! $coupon->is_valid_saturday ?: 'checked' }}/>
                    </div>
                    <div class="inline-block m-auto">
                        <input
                            id="day7"
                            class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                            type="checkbox"
                            name="is_valid_sunday"
                            value="1"
                            {{ ! $coupon->is_valid_sunday ?: 'checked' }}/>
                    </div>
                  
                </div>
    
                <p class="mt-5 mb-2 font-semibold text-xl">Duración de campaña</p>
                <div class="grid grid-cols-2">
                    <label class="ml-4 select-none" for="campain_starts">Inicio</label>
                    <label class="ml-4 select-none" for="campain_finishes">Acaba</label>
                    <input class="mx-2" type="date" name="campain_starts" id="campain_starts" value="{{ $coupon->campain_starts }}">
                    <input class="mx-2" type="date" name="campain_finishes" id="campain_finishes" value="{{ $coupon->campain_finishes }}">
                </div>
    
                <p class="mt-5 mb-2 font-semibold text-xl">Visibilidad</p>            
                    <input
                        id="is_active"
                        class="relative float-left mt-[0.15rem] p-2.5 rounded-[35%] border-[0.125rem] border-solid border-gray-700 bg-red-200 text-green-600 hover:cursor-pointer"
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ ! $coupon->is_active ?: 'checked' }}/>
                    <label for="is_active" class="ml-1 text-lg">Hacer público</label>

                <input
                    type="submit"
                    class="flex w-full my-5 px-3 py-2 bg-red-500 rounded-md text-white hover:cursor-pointer"
                    value="Guardar">
    
            </div>
        </form>

    </x-bladewind::centered-content>

</x-app-layout>