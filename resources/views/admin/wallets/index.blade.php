<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Cuponeras') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="pb-12">

        <div class="grid sm:grid-cols-2 pb-16">
            @foreach ($wallets as $wallet)
                <a href="{{ route('corporate.wallets.view', $wallet->id) }}">
                    @if ($wallet->name)
                        <x-wallet-card
                            image="{{ $wallet->image }}"
                            brand="{{ $wallet->getBrand() }}"
                            name="{{ $wallet->name }}"/>
                    @else
                        <x-wallet-card
                            image="{{ $wallet->image }}"
                            brand="{{ $wallet->getBrand() }}"
                            name="{{ $wallet->brand->name }}"/>
                    @endif
                </a>
            @endforeach
        </div>

    </x-bladewind::centered-content>

</x-app-layout>
