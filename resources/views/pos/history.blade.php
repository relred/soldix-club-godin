<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="mt-4">
        @foreach ($coupons as $coupon)
            <x-redeemed-coupon
                id="{{ $coupon->coupon_id }}"
                date="{{ $coupon->created_at }}"/>
        @endforeach


    </x-bladewind::centered-content>


</x-app-layout>