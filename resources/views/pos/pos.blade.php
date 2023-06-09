<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Point of Sale') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content>
            <div class="py-16 mx-4">
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
            </div>
    </x-bladewind::centered-content>


</x-app-layout>
