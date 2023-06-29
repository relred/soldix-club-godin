<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Marcas') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="py-12">

        @if (session('status'))
            <x-bladewind::alert
                type="success">
                {{ session('status') }}
            </x-bladewind::alert>
        @endif

        @if (auth()->user()->is_local_admin)
            <button onclick="showModal('register')" class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus mr-1" width="20" height="25" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="9" />
                    <line x1="9" y1="12" x2="15" y2="12" />
                    <line x1="12" y1="9" x2="12" y2="15" />
                </svg>
                Agregar
            </button>                
        @else
            <p class="mb-2 text-sm font-semibold text-gray-600">Sólo super admin puede agregar nuevos administradores.</p>
        @endif

        <x-bladewind::table
            hasShadow="true"
            striped="true">

            <x-slot name="header">
                <th>Marca</th>
                <th><span class="float-right">Acciones</span> </th>
            </x-slot>

                @foreach ($brands as $brand)
                    <tr>
                        <td>
                            <div class="ml-3">
                                <div class="text-lg font-medium text-slate-900">
                                    {{ $brand->name }}
                                </div>
                            </div>
                        </td>
                        <td>
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
    <form action="{{ route('corporate.brands.store') }}" method="POST">
        @csrf
        <p class="text-lg ml-2 font-semibold">Nombre de la Marca</p>
        <x-bladewind::input placeholder="Ej. Súper Mexicali" name="name" />

        <input 
            type="submit" 
            class="flex my-5 ml-2 px-3 py-2 bg-red-500 rounded-md text-white" 
            value="Registrar">
    </form>
</x-bladewind::modal>


</x-app-layout>
