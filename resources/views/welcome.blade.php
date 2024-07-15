<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Soldix</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bladewind -->
        <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Livewire -->
        @livewireStyles
        @livewireScripts
    </head>
    <body class="bg-gradient-to-r from-[#013773] to-blue-700">
            <section>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 md:px-12 text-right bg-[#147af8] font-heavitas uppercase font-extrabold w-full">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-bold text-white hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-bold text-white hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-bold text-white hover:text-gray-600  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarme</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <div class="h-screen container mx-auto flex flex-col md:flex-row items-center text-white">
                        <img class="md:hidden mt-6 mx-8" src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1721011910/assets/soldix/yyw5dtxsaheiwpm3ssbt.png" alt="">
                        <div class="w-full lg:w-2/5 items-start p-8">
                            <img class="max-w-[90px] mb-3 hidden md:block" src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1721012578/assets/soldix/histmye8aqvlfbu2utou.png">
                            <h1 class="font-heavitas text-5xl font-extrabold md:text-5xl uppercase md:leading-tight mb-2">Cuidamos tu <span class="text-[#147af8]">Salúd. </span>
                            </h1>
                            <p class="text-lg text-gray-50">En cuidadores sabemos lo importante que es el bienestar de tus seres queridos. Por eso hemos creado un carnet exclusivo que te brinda acceso a los mejores servicios y beneficios</p>
                            <img class="mb-7 md:mb-10" src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1721012504/assets/soldix/z3wvrqvjlqsnhj63onwi.png">
                            <a href="https://wa.me/+526867861084" target="_blank"
                                class="bg-transparent text-2xl ml-6 md:ml-2 hover:bg-[#147af8] text-white font-bold hover:text-black rounded shadow hover:shadow-lg py-2 px-4 border-white border-2 hover:border-transparent">
                                Obten tu carnet</a>
                        </div>

                        <div class="items-center hidden md:flex">
                            <img src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1721009303/assets/soldix/ryfhrolz3puno3vgrspm.png">
                        </div>
                    </div>

            </section>
    </body>
</html>
