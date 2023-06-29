<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Cuponeras') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="pb-12">

        @foreach ($wallets as $wallet)
            <p>
                Hola
            </p>
        @endforeach

    </x-bladewind::centered-content>

</x-app-layout>
