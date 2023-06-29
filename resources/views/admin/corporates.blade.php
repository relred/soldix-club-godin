<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="py-12">

        @if (session('status'))
            <x-bladewind::alert
                type="success">
                {{ session('status') }}
            </x-bladewind::alert>
        @endif

        <button onclick="showModal('register')" class="flex mb-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus mr-1" width="20" height="25" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="12" r="9" />
                <line x1="9" y1="12" x2="15" y2="12" />
                <line x1="12" y1="9" x2="12" y2="15" />
            </svg>
            Agregar
        </button>

        <x-bladewind::table
            hasShadow="true"
            striped="true">

            <x-slot name="header">
                <th>Usuario</th>
                <th>Correo</th>
                <th><span class="float-right">Acciones</span> </th>
            </x-slot>

            @if (auth()->user()->role_id == App\Models\Role::IS_ADMIN)
                @foreach ($corporates as $corporate)
                    <tr>
                        <td>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-slate-900">
                                    {{ $corporate->name }}
                                </div>
                                <div class="text-sm text-slate-500 truncate">
                                    {{ $corporate->admin_user()->name }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-base text-slate-900">
                                {{ $corporate->admin_user()->email }}
                            </div>
                        </td>
                        <td>
                            <button class="flex float-right px-3 py-2 bg-blue-500 rounded-md text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($corporates as $corporate)
                    <tr>
                        <td>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-slate-900">
                                    {{ $corporate->name }}
                                </div>
                                <div class="text-sm text-slate-500 truncate">
                                    {{ $corporate->username }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-base text-slate-900">
                                {{ $corporate->email }}
                            </div>
                        </td>
                        <td>
                            <button class="flex float-right px-3 py-2 bg-blue-500 rounded-md text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach 
            @endif

        </x-bladewind::table>
    </x-bladewind::centered-content>


    <x-bladewind::modal
        title="Agregar Nuevo Usuario Corporativo"
        name="register"
        size="large"
        centerActionButtons="false"
        okButtonLabel=""
        cancelButtonLabel="Cerrar"
        >
        <hr class="mb-7 mt-1">
        <form action="
            @if (auth()->user()->role_id == 3)
                {{ route('corporate.store') }}
            @else
                {{ route('admin.corporate.store') }}
            @endif
            " method="POST">
            @csrf

            @if (auth()->user()->role_id == 4)
                <p class="mb-3 text-lg">Información de corporativo</p>
                <p class="text-lg ml-2 font-semibold">Nombre de corporativo</p>
                <x-bladewind::input placeholder="Ej. Corporativo del norte S.A" name="corporate_name" />

                <p class="text-lg ml-2 font-semibold">Identificador corporativo</p>
                <x-bladewind::input placeholder="Ej. corpnorte" name="corporate_suffix" />
                
                <hr class="mb-4 mt-6">

                <p class="mb-3 text-lg">Información de administrador corporativo</p>
            @endif

            @if (auth()->user()->role_id == 3)
                <p class="text-lg ml-2 font-semibold">Nombre de nuevo usuario</p>
            @else
                <p class="text-lg ml-2 font-semibold">Nombre del administrador corporativo</p>
            @endif

            <x-bladewind::input placeholder="Ej. Jorge sanchez" name="name" />

            <p class="text-lg ml-2 font-semibold">Usuario</p>
            <x-bladewind::input placeholder="Ej. jsanchez" name="username" />
    
{{--             <p class="text-lg ml-2 font-semibold">Correo Electrócino</p>
            <x-bladewind::input type="email" placeholder="Ej. contacto@corpnorte.com" name="email" /> --}}

            <p class="text-lg ml-2 font-semibold">Contraseña</p>
            <x-bladewind::input type="password" placeholder="*********" name="password" viewable="true" />
    
            <input 
                type="submit" 
                class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white" 
                value="Registrar">
        </form>

    </x-bladewind::modal>

</x-app-layout>
