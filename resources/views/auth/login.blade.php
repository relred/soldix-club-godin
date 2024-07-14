<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <img class="w-full" src="https://res.cloudinary.com/de6hiq5n4/image/upload/v1682900896/assets/soldix/a_n87auu.jpg" alt="Soldix Club">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Login Name -->
        <div>
            <x-input-label for="loginname" :value="__('Celular / Correo electrónico')" />
            <x-text-input id="loginname" class="block mt-1 w-full" type="text" name="loginname" :value="old('loginname')" required autofocus/>
            <x-input-error :messages="$errors->get('loginname')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button>
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-center mt-7">
            ¿No tienes cuenta?
            <a href="https://wa.me/+526867861084" target="_blank" class="ml-2 underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="#">
                {{ __('¡Contáctanos para obtenerla!') }}
            </a>
        </div>
    </form>
</x-guest-layout>
