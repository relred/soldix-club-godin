<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playground') }}
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
                <tr>
                    <td>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-slate-900">
                                Juan Sanchez
                            </div>
                            <div class="text-sm text-slate-500 truncate">
                                jsanchez
                            </div>
                        </div>
                    </td>
                    <td>
                        <button onclick="showModal('profile')" class="flex float-right px-3 py-2 bg-red-500 rounded-md text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="3" y1="21" x2="21" y2="21" />
                                <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                <line x1="5" y1="21" x2="5" y2="10.85" />
                                <line x1="19" y1="21" x2="19" y2="10.85" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                            </svg>
                        </button>
                    </td>
                </tr>

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
        <form action="">
            <p class="text-lg ml-2 font-semibold">Nombre</p>
            <x-bladewind::input placeholder="Ej. Hector Sánchez Gomez"  />
    
            <p class="text-lg ml-2 font-semibold">Usuario</p>
            <x-bladewind::input placeholder="Ej. hsanchez"  />
    
            <p class="text-lg ml-2 font-semibold">Contraseña</p>
            <x-bladewind::input type="password" placeholder="*********"  />
    
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
