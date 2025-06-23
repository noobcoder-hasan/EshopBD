<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-red-600 via-pink-600 to-red-400 border border-transparent rounded-lg font-bold text-base text-white uppercase tracking-widest shadow-lg hover:from-red-700 hover:to-pink-500 active:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-200 transition-all duration-200']) }}>
    {{ $slot }}
</button>
