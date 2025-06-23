@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-400 rounded-lg shadow-sm px-4 py-2 text-base transition-all duration-200']) }}>
