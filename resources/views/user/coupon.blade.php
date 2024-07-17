<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cupón') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content size="small">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ url('redeem/' . $coupon->redeem_id . '/' . auth()->user()->id) }}" class="mx-auto my-6" >
        <p class="text-4xl text-center mb-9 mt-4">{{ auth()->user()->id . '=' . $coupon->redeem_id }}</p>

        <x-coupon-validity-days :coupon="$coupon" />

        <div class="bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
            <div class="flex">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="text-lg">
                    <span class="font-medium">Contáctenos</span> para agendar su producto o servicio.
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
