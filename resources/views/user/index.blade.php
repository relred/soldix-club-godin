<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis cupones') }}
        </h2>
    </x-slot>
    <x-bladewind::centered-content class="sm:mt-6">
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
            <x-coupon
                id=""
                image="https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075969/assets/soldix/dummy%20images/n_pr57qv.jpg"
                type="free"
                tag="Hamburguesa"
                valid="Todos los días">
                Hamburguesa con papas gratis en la compra de una del mismo tamaño.
            </x-coupon>
        </div>
    </x-bladewind::centered-content>
</x-app-layout>