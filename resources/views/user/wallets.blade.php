<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cupón') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content>
        <div class="grid sm:grid-cols-2 pb-16">
            @foreach ($wallets as $wallet)
                <a href="{{ route('public.wallets.view', $wallet->id) }}">
                    <x-wallet-card
                        image="{{ $wallet->image }}"
                        name="{{ ($wallet->name) ? $wallet->name : $wallet->brand->name }}"/>
                </a>
            @endforeach
        </div>
    </x-bladewind::centered-content>

</x-app-layout>
