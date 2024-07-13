<div>
    @if (session('status'))
        <x-bladewind::alert
            class="mb-4"
            type="success">
            {{ session('status') }}
        </x-bladewind::alert>
    @endif

    @if (session('input_error'))
        <x-bladewind::alert
            class="mb-4"
            type="error">
            {{ session('input_error') }}
        </x-bladewind::alert>
    @endif

    @if ($errors->any())
        <x-bladewind::alert
            class="mb-4"
            type="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </x-bladewind::alert>
    @endif

</div>