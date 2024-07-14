<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cupón') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content size="small">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ auth()->user()->id . '=' . $coupon->redeem_id }}" class="mx-auto my-6" >
        <p class="text-4xl text-center mb-9 mt-4">{{ auth()->user()->id . '=' . $coupon->redeem_id }}</p>

{{--         <div class="mt-8">
            <img src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075785/assets/soldix/dummy%20images/t_ht9sxf.jpg" class="rounded-3xl">
        </div> --}}
        <h2 class="text-2xl text-center font-bold mb-4">
            {{ $coupon->name }}
        </h2>

        <div class="my-4 whitespace-normal break-words rounded-lg border border-blue-gray-50 bg-white p-4 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10 focus:outline-none">
            <p class="text-center font-light text-xl">Dias de Validez</p>
            <div class="grid grid-cols-7 mb-5">
        
                <label for="day1" class="text-center select-none">Lun</label>
                <label for="day2" class="text-center select-none">Mar</label>
                <label for="day3" class="text-center select-none">Mie</label>
                <label for="day4" class="text-center select-none">Jue</label>
                <label for="day5" class="text-center select-none">Vie</label>
                <label for="day6" class="text-center select-none">Sáb</label>
                <label for="day7" class="text-center select-none">Dom</label>
    
                <div class="inline-block m-auto">
                    <input
                        id="day1"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_monday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_monday ?: 'checked' }}/>
                </div>
                <div class="inline-block m-auto">
                    <input
                        id="day2"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_tuesday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_tuesday ?: 'checked' }}/>
                </div>
                <div class="inline-block m-auto">
                    <input
                        id="day3"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_wednesday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_wednesday ?: 'checked' }}/>
                </div>
                <div class="inline-block m-auto">
                    <input
                        id="day4"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_thursday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_thursday ?: 'checked' }}/>
                </div>
                <div class="inline-block m-auto">
                    <input
                        id="day5"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_friday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_friday ?: 'checked' }}/>
                </div>
                <div class="inline-block m-auto">
                    <input
                        id="day6"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_saturday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_saturday ?: 'checked' }}/>
                </div>
                <div class="inline-block m-auto">
                    <input
                        id="day7"
                        class="relative float-left mt-[0.15rem] p-4 rounded-[35%] border-[0.125rem] border-solid border-neutral-300 hover:cursor-pointer"
                        type="checkbox"
                        name="is_valid_sunday"
                        value="1"
                        disabled
                        {{ ! $coupon->is_valid_sunday ?: 'checked' }}/>
                </div>
              
            </div>
        </div>

        <div class="bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
            <div class="flex">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="text-lg">
                    Para cualquier duda sobre como redimir sus cupones no dude en <span class="font-medium">contactarnos</span>
                </div>
            </div>
            <div class="flex w-full items-center justify-center mt-2">
                <!-- component -->
                <button onclick="window.open('https://wa.me/+526867861084', '_blank', 'noopener,noreferrer');" class="group relative h-12 w-48 overflow-hidden rounded-2xl bg-green-500 text-lg font-bold text-white">
                  Whatsapp
                  <div class="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                </button>
            </div>
        </div>
    

        <p class="text-xs mt-6">
            No acumulable con otras promociones. Restringido a un cupón por usuario. Las imagenes son ilustrativas. Todos los productos son sujetos a disponibilidad.
        </p>
    </x-bladewind::centered-content>

</x-app-layout>
