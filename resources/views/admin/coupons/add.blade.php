<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar cupón nuevo') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="pb-12">

        <livewire:add-coupon :wallet_id="$id"/>

    </x-bladewind::centered-content>

</x-app-layout>
