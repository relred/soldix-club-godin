<a 
    @if (auth()->user()->role_id == App\Models\Role::IS_CORPORATE)
        href="{{ route('corporate.coupons.edit', $id) }}"
    @else
        href="{{ route('coupon', $id) }}"
    @endif
    class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2 select-none">
    <div class="rounded-lg bg-white p-4 shadow-xl mx-2 my-3">
        <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">

            <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                @if (isset($image))
                    <img src="{{ $image }}" class="absolute inset-0 min-h-full"/>
                @else
                    <img src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1683075785/assets/soldix/dummy%20images/t_ht9sxf.jpg" class="absolute inset-0 min-h-full"/>
                @endif
            </div>

            <div class="absolute bottom-3 left-5 text-xl text-center text-white font-bold uppercase drop-shadow-2xl" style="text-shadow: 0.025em 0 black, 0 0.025em black, -0.025em 0 black, 0 -0.025em black;">{{ $valid }}</div>


            <div class="absolute uppercase right-0 top-0 z-10 select-none rounded-lg rounded-br-none rounded-tl-none bg-blue-400 px-3 py-2 text-sm font-medium text-white">
                @switch($type)
                    @case('discount_percent')
                        <div class="flex">
                            <p class="flex text-4xl">{{ $tag }}</p>
                            <p class="flex">%</p> 
                        </div>
                        @break
                    @case('discount_fixed')
                        <div class="flex">
                            <p class="flex text-xl">$</p> 
                            <p class="flex text-4xl">{{ $tag }}</p>
                        </div>
                        @break
                    @case('free')
                        <div>
                            <p class="text-lg font-bold text-gray-700 m-0 text-center hidden sm:block">{{ $tag }}</p>
                            <p class="text-xl font-bold m-0 text-center">Gratis</p>
                        </div>
                        @break
                    @case('2x1')
                        <div>
                            <p class="text-4xl lowercase text-center">{{ $tag }}</p>
                        </div>
                        @break
                    @default
                @endswitch
            </div>
        </div>

        <div class="text-center text-xl mt-2">
            {{ $slot }}
            <p class="text-xs mt-2">*Términos y condiciones dentro del cupón.</p>
        </div>
    </div>
</a>