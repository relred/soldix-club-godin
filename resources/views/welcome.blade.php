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
    <body class="bg-gradient-to-r from-[#dfb2ab] to-rose-300">
            <section>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 md:px-12 text-right bg-red-500 font-heavitas uppercase font-extrabold w-full">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-bold text-white hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Mi cuponera</a>
                        @else
                            <a href="{{ route('login') }}" class="font-bold text-white hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-bold text-white hover:text-gray-600  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarme</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <aside class="relative overflow-hidden text-black rounded-lg sm:mx-16 mx-2 sm:py-16">
                    <div class="relative z-10 max-w-screen-xl px-4  pb-20 pt-10 sm:py-24 mx-auto sm:px-6 lg:px-8">
                      <div class="max-w-xl sm:mt-1 mt-80 space-y-8 text-center sm:text-right sm:ml-auto">
                        <h2 class="text-4xl text-white font-bold sm:text-5xl">
                          Soldix Club
                        </h2>
                  
                        <a href="{{ url('/dashboard') }}" class="inline-flex text-white items-center px-6 py-3 font-medium bg-rose-500 rounded-lg hover:opacity-75">
                            Comenzar &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-right-lines-filled" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12.089 3.634a2 2 0 0 0 -1.089 1.78l-.001 2.585l-1.999 .001a1 1 0 0 0 -1 1v6l.007 .117a1 1 0 0 0 .993 .883l1.999 -.001l.001 2.587a2 2 0 0 0 3.414 1.414l6.586 -6.586a2 2 0 0 0 0 -2.828l-6.586 -6.586a2 2 0 0 0 -2.18 -.434l-.145 .068z" stroke-width="0" fill="currentColor" />
                                <path d="M3 8a1 1 0 0 1 .993 .883l.007 .117v6a1 1 0 0 1 -1.993 .117l-.007 -.117v-6a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor" />
                                <path d="M6 8a1 1 0 0 1 .993 .883l.007 .117v6a1 1 0 0 1 -1.993 .117l-.007 -.117v-6a1 1 0 0 1 1 -1z" stroke-width="0" fill="currentColor" />
                            </svg>
                        </a>
                      </div>
                    </div>
                  
                    <div class="absolute inset-0 w-full sm:my-20 sm:pt-1 pt-12 h-full ">
                      <img class="w-96" src="https://i.ibb.co/5BCcDYB/Remote2.png"  />
                    </div>
                  </aside>
                  
                  <div class="grid  place-items-center sm:mt-20">
                  <img class="sm:w-96 w-48" src="https://i.ibb.co/2M7rtLk/Remote1.png"  />
                  </div>                  
                  
                </div>

            </section>
    </body>
</html>
