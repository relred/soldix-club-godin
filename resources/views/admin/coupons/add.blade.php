<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar cupón nuevo') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="pb-12">
        
        <a class="flex w-24 mt-5 px-3 py-2 bg-red-500 rounded-md text-white hover:cursor-pointer" href="{{ route('corporate.wallets.view', $id) }}">← Volver</a>

        <livewire:add-coupon :wallet_id="$id"/>

    </x-bladewind::centered-content>

</x-app-layout>
