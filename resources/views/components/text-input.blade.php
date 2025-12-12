@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm backdrop-blur-sm transition-all duration-300']) !!}>