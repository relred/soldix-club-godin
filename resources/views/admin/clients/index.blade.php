<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
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
                <th>Celular</th>
                <th>Vinculo</th>
            </x-slot>

            @foreach ($clients as $client)
                <tr>
                    <td>
                        {{ $client->name }}
                    </td>
                    <td>
                        {{ $client->email }}
                    </td>
                    <td>
                        {{ $client->phone }}
                    </td>

                    <td>
                        <div class="flex mt-4">
                            <input type="text" value="{{ url('access/' . $client->email . '/' . $client->phone) }}" id="copyInput" class="flex-grow px-3 py-2 text-gray-700 border rounded-l-md focus:outline-none" readonly>
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-bladewind::table>
    </x-bladewind::centered-content>


    <x-bladewind::modal
        title="Agregar Nuevo Administrador"
        name="register"
        size="large"
        centerActionButtons="false"
        okButtonLabel=""
        cancelButtonLabel="Cerrar"
        >
        <hr class="mb-7 mt-1">
        <form action="{{ route('corporate.clients.store') }}" method="POST">
            @csrf
            <x-input-block type="text" name="name" placeholder="Ej. Hector Sánchez Gomez" value="{{ old('name') }}" required>
                Nombre 
            </x-input-block>

            <x-input-block type="text" name="email" placeholder="Ej. hsanchez@hotmail.com">
                Correo 
            </x-input-block>

            <x-input-block type="phone" name="phone" placeholder="Ej. 6865557474">
                Celular
            </x-input-block>

            <x-input-block type="text" name="password" placeholder="*********" required>
                Contraseña
            </x-input-block>

            <input 
                type="submit" 
                class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white" 
                value="Registrar">

        </form>
    </x-bladewind::modal>

</x-app-layout>