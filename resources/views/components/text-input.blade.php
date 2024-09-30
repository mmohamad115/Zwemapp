@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-none text-gray-900 bg-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
]) !!}>
