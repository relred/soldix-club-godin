<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Súper Administradores') }}
        </h2>
    </x-slot>

    <div class="py-12">      
        <x-bladewind::centered-content>
            <button onclick="showModal('register')" class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white">
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
                    <th><span class="float-right">Acciones</span> </th>
                </x-slot>

                @foreach ($admins as $admin)
                    <tr>
                        <td>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-slate-900">
                                    {{ $admin->name }}
                                </div>
                                <div class="text-sm text-slate-500 truncate">
                                    {{ $admin->username }}
                                </div>
                            </div>
                        </td>
                        <td>
                            @if (auth()->user()->is_local_admin)
                                <form action="{{ route('admin.destroy',[$admin->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex float-right px-3 py-2 bg-red-500 rounded-md text-white mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </form>                                
                            @endif
                            <button onclick="showModal('profile')" class="flex float-right px-3 py-2 bg-blue-500 rounded-md text-white mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                            </button>
                        </td>    
                    </tr>
                @endforeach

            </x-bladewind::table>
        </x-bladewind::centered-content>
    </div>


    <x-bladewind::modal
        title="Agregar Nuevo Administrador"
        name="register"
        size="large"
        centerActionButtons="false"
        okButtonLabel=""
        cancelButtonLabel="Cerrar"
        >
        <hr class="mb-7 mt-1">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <p class="text-lg ml-2 font-semibold">Nombre</p>
            <x-bladewind::input placeholder="Ej. Hector Sánchez Gomez" name="name" />

            <p class="text-lg ml-2 font-semibold">Usuario</p>
            <x-bladewind::input placeholder="Ej. hsanchez" name="username" />
    
            <p class="text-lg ml-2 font-semibold">Correo Electrócino</p>
            <x-bladewind::input placeholder="Ej. hsanchez@mail.com" name="email" />

            <p class="text-lg ml-2 font-semibold">Contraseña</p>
            <x-bladewind::input type="password" placeholder="*********" name="password" />

            @if (auth()->user()->is_local_admin)
            <p class="text-lg ml-2 font-semibold">Tipo de usuario</p>
            <div>
                <input type="radio" name="is_local_admin" id="admin" class="peer hidden" checked value="0" />
                <label for="admin" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">
                  Admin
                </label>
            </div>
          
            <div>
                <input type="radio" name="is_local_admin" id="superadmin" class="peer hidden" value="1"/>
                <label for="superadmin" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-red-500 peer-checked:font-bold peer-checked:text-white">
                  Super Admin
                </label>
            </div>
            @endif
            <input 
                type="submit" 
                class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white" 
                value="Registrar">
        </form>
    </x-bladewind::modal>

    <x-bladewind::modal
        title="Perfil"
        name="profile"
        size="xl"
        okButtonLabel=""
        cancelButtonLabel="Cerrar">

        <div class="flex">
            <div class="flex-none w-48 lg:w-64 m-2 text-center">
                <x-bladewind::avatar
                    image="https://res.cloudinary.com/de6hiq5n4/image/upload/v1676696051/jsulpbuflhqzoul3qcaz.jpg"
                    size="omg" />
            </div>
            <div class="flex-1 m-2">
                <x-bladewind::list-view transparent="true">

                    <x-bladewind::list-item>

                        <div class="text-sm font-medium text-slate-900">
                            Michael K. Ocansey
                        </div>
                
                    </x-bladewind::list-item>
                    <x-bladewind::list-item>
                        <div class="text-sm font-medium text-slate-900">
                            Michael K. Ocansey
                        </div>
                    </x-bladewind::list-item>
                    <x-bladewind::list-item>
                        <div class="text-sm font-medium text-slate-900">
                            Michael K. Ocansey
                        </div>
                    </x-bladewind::list-item>    
                </x-bladewind::list-view>
            </div>
        </div>
    </x-bladewind::modal>
</x-app-layout>
