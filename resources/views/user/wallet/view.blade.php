<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boletera') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="py-12">

        <div class="relative w-full group max-w-md min-w-0 mx-auto mt-12 mb-6 break-words bg-white border shadow-2xl dark:bg-gray-800 dark:border-gray-700 md:max-w-sm rounded-2xl">
            <div class="pb-6">
                <div class="flex flex-wrap justify-center">
                    <div class="flex justify-center w-full">
                        <div class="relative">
                            @if ($wallet->image)
                                <img src="{{ $wallet->image }}" class="dark:shadow-xl border-white dark:border-gray-800 rounded-3xl align-middle border-8 absolute -m-16 -ml-18 lg:-ml-16 max-w-[150px]" />
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-24 text-center">
                    <h3 class="mb-4 text-2xl font-bold leading-normal text-gray-700 dark:text-gray-300">
                        @if ($wallet->name)
                            {{ $wallet->name }}
                        @else
                            {{ $wallet->brand->name }}
                        @endif
                    </h3>
                </div>


                <div class="relative h-6 overflow-hidden translate-y-6 rounded-b-xl">
                    <div class="absolute flex -space-x-12 rounded-b-2xl">
                        <div class="w-36 h-8 transition-colors duration-200 delay-75 transform skew-x-[35deg] bg-red-400/90 group-hover:bg-red-600/90 z-10"></div>
                        <div class="w-28 h-8 transition-colors duration-200 delay-100 transform skew-x-[35deg] bg-red-300/90 group-hover:bg-red-500/90 z-20"></div>
                        <div class="w-28 h-8 transition-colors duration-200 delay-150 transform skew-x-[35deg] bg-red-200/90 group-hover:bg-red-400/90 z-30"></div>
                        <div class="w-28 h-8 transition-colors duration-200 delay-200 transform skew-x-[35deg] bg-red-100/90 group-hover:bg-red-300/90 z-40"></div>
                        <div class="w-28 h-8 transition-colors duration-200 delay-300 transform skew-x-[35deg] bg-red-50/90 group-hover:bg-red-200/90 z-50"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="grid sm:grid-cols-2 pb-16">
            @foreach ($coupons as $coupon)
                <x-coupon
                    id="{{ $coupon->id }}"
                    type="{{ $coupon->type }}"
                    tag="{{ $coupon->tag }}"
                    valid="Consulte validez en interior">
                    <x-slot name="image">
                        {{ $coupon->image }}
                    </x-slot>
                    {{ $coupon->name }}
                </x-coupon>
            @endforeach
        </div>

    </x-bladewind::centered-content>
</x-app-layout>