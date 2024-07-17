<x-app-layout>

    <x-bladewind::centered-content>
        <div class="grid-cols-1">
            <x-coupon
                id=""
                type="{{ $coupon->type }}"
                tag="{{ $coupon->tag }}"
                valid="Cupon valido">
                <x-slot name="image">
                    {{ $coupon->image }}
                </x-slot>
                {{ $coupon->name }}
            </x-coupon>
        </div>

        <x-coupon-validity-days :coupon="$coupon" />

        <x-bladewind::card class="mt-8 mx-3 lg:mx-0">
            <form method="POST" action="{{ route('pos.coupon.redeem') }}">
                @csrf
                <input type="hidden" name="coupon_id" value="{{ $coupon_id }}">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <div class="text-center min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                    <button class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                        Validar operación
                    </button>
                </div>
            </form>
        </x-bladewind::card>
    </x-bladewind::centered-content>

</x-app-layout> 