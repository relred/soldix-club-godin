<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="py-12">

        <x-input-alerts/>

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

                <x-input-block type="text" name="corporate_name" placeholder="Ej. Corporativo del norte S.A" value="{{ old('corporate_name') }}" required>
                    Nombre de corporativo
                </x-input-block>

                <x-input-block type="text" name="corporate_suffix" placeholder="Ej. corpnorte" pattern="[a-z0-9]{3,12}" title="No puede contener espacios, mayúsculas o simbolos, y debe tener al menos 3 caracteres y un máximo de 12" required>
                    Identificador corporativo
                </x-input-block>
                
                <hr class="mb-4 mt-6">

                <p class="mb-3 text-lg">Información de administrador corporativo</p>
            @endif

            <x-input-block type="text" name="name" placeholder="Ej. Jorge sanchez" value="{{ old('name') }}" required>
                @if (auth()->user()->role_id == 3)
                    Nombre de nuevo usuario
                @else
                    Nombre del administrador corporativo
                @endif
            </x-input-block>

            <x-input-block type="text" name="username" placeholder="Ej. jsanchez" pattern="[a-z0-9]{3,16}" title="No puede contener espacios, mayúsculas o simbolos, y debe tener al menos 3 caracteres un máximo de 16" required>
                Usuario
            </x-input-block>

            <x-input-block type="password" name="password" placeholder="*********" required>
                Contraseña
            </x-input-block>
    
            <input 
                type="submit" 
                class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white" 
                value="Registrar">
        </form>

    </x-bladewind::modal>

</x-app-layout>
