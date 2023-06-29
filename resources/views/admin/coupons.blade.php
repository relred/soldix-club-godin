<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cupones') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="py-12">

        @if (session('status'))
            <x-bladewind::alert
                type="success">
                {{ session('status') }}
            </x-bladewind::alert>
        @endif

        <a href="{{ route('corporate.coupons.new') }}" class="flex mb-5 ml-2 px-3 py-2 w-44 bg-red-500 rounded-md text-white mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus mr-0 mx-auto" width="20" height="25" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
                <line x1="9" y1="12" x2="15" y2="12" />
                <line x1="12" y1="9" x2="12" y2="15" />
            </svg>
            <p class="mx-auto">
                Cupón Nuevo
            </p>
        </a>

        <div class="grid sm:grid-cols-2 pb-16">
            <x-coupon
                id=""
                image="https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075785/assets/soldix/dummy%20images/t_ht9sxf.jpg"
                type="discount_percent"
                tag="40"
                valid="Todos los martes">
                Descuento en hamburguesa la compra de un combo especial.
            </x-coupon>
            <x-coupon
                id=""
                image="https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075783/assets/soldix/dummy%20images/e_btrsri.webp"
                type="2x1"
                tag="2x1"
                valid="Todos los días">
                2x1 en la compra de cualquier bebida.
            </x-coupon>
            <x-coupon
                id=""
                image="https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075930/assets/soldix/dummy%20images/caffenio-768x768_gnh99u.jpg"
                type="discount_fixed"
                tag="20"
                valid="Todos los días">
                20 Pesos de descuento en la compra de un café americano.
            </x-coupon>
        </div>


    </x-bladewind::centered-content>


</x-app-layout>
