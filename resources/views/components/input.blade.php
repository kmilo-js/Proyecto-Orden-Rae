@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#7A4B32] focus:ring-[#7A4B32] rounded-md shadow-sm']) !!}>
