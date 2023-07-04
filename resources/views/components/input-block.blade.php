@props(['disabled' => false, 'required' => false, 'type', 'name', 'placeholder', 'value' => '' , 'patter' => '', 'title' => ''])

@php
$span_classes = ($required ?? true)
            ? 'after:content-["*"] after:ml-0.5 after:text-red-500 block text-lg ml-2 font-semibold'
            : 'block text-lg ml-2 font-semibold';
@endphp


<div class="mb-3">
    <label class="block">
        <span {!! $attributes->merge(['class' => $span_classes]) !!}>
            {{ $slot }}
        </span>
        <input 
            {{ $disabled ? 'disabled' : '' }} 
            {{ $required ? 'required' : '' }} 
            {!! $attributes->merge([
                'type' => $type, 
                'name' => $name,
                'value' => $value,
                'patter' => $patter,
                'title' => $title,
                'placeholder' => $placeholder,
                'class' => 'mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-blue-500 block w-full rounded-sm text-lg font-semibold sm:text-sm focus:ring-1',
            ]) !!}
        >
    </label>
</div>