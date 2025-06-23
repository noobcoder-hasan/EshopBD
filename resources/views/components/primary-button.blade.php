<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-indigo-600 via-blue-500 to-purple-600 border border-transparent rounded-lg font-bold text-base text-white uppercase tracking-widest shadow-lg hover:from-purple-600 hover:to-indigo-600 focus:outline-none focus:ring-4 focus:ring-indigo-200 transition-all duration-200']) }}>
    {{ $slot }}
</button>
