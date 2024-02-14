<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Marcas') }}
        </h2>
    </x-slot>

    <x-bladewind::centered-content class="py-12">

        <x-input-alerts/>

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
                <th></th>
                <th>Marca</th>
                <th><span class="float-right">Acciones</span> </th>
            </x-slot>

                @foreach ($brands as $brand)
                    <tr>
                        <td class="max-w-min">
                            <div>
                                @if ($brand->image)
                                    <img src="{{ $brand->image }}" width="100px" alt="{{ $brand->name }}">
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="ml-3">
                                <div class="text-lg font-medium text-slate-900">
                                    {{ $brand->name }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('corporate.brands.view', $brand->id) }}" class="flex mr-3 mt-2 px-3 py-2 m-auto bg-green-500 hover:bg-green-400 rounded-md text-white w-11">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-filled" width="20" height="25" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach


        </x-bladewind::table>


    </x-bladewind::centered-content>
    <x-bladewind::modal
        title="Agregar Nueva Marca"
        name="register"
        size="large"
        centerActionButtons="false"
        okButtonLabel=""
        cancelButtonLabel="Cerrar"
        >
        <hr class="mb-7 mt-1">
        <form action="{{ route('corporate.brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-input-block type="text" name="name" placeholder="Ej. Súper Mexicali" value="{{ old('name') }}" required>
                Nombre de la marca
            </x-input-block>

            <livewire:add-brand/>

        </form>
    </x-bladewind::modal>


</x-app-layout>
