<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-2.5 bg-white border border-gray-300 rounded-lg font-semibold text-base text-gray-700 uppercase tracking-widest shadow-md hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-indigo-100 disabled:opacity-50 transition-all duration-200']) }}>
    {{ $slot }}
</button>
