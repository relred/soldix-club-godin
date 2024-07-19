<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cuidadores') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content size="small" class="mt-8">
    <div class="bg-gray-100 h-screen">
        <div class="bg-white p-6  md:mx-auto">
          <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
              <path fill="currentColor"
                  d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
              </path>
          </svg>
          <div class="text-center">
              <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Cupón Redimido Con Éxito</h3>
              <p class="text-gray-600 my-2">El cupon fue procesado exitosamente.</p>
              <div class="py-10 text-center">
                <a href="{{ route('pos') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Volver 
                </a>
              </div>
          </div>
      </div>
    </div>
    </x-bladewind::centered-content>

</x-app-layout>