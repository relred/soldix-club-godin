<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cuidadores') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content>
        <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-lg text-green-700 mt-10" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
                <span class="font-medium">Sesión iniciada con éxito.</span> Puede comezar a escanear productos Soldix Club con cualquier escáner de su celular
            </div>
        </div>
    
{{--             <div class="py-16 mx-4">
                <p class="text-3xl m-4 font-medium">Escanee el Código</p>
                <form action="{{ route('result') }}" method="get">
                    <input 
                        class="rounded py-4 text-4xl text-center text-gray-800 bg-white w-full"
                        placeholder="***********"
                        type="number"
                        name="code"
                        autofocus/>
                    <input
                        class="w-full my-5 px-3 py-2 text-2xl bg-red-500 rounded-md text-white" 
                        type="submit" 
                        value="Ingresar">
                </form>
            </div> --}}
    </x-bladewind::centered-content>


</x-app-layout>
