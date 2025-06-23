<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-indigo-800 leading-tight">
            Blogs
        </h1>
    </x-slot>

    <div class="py-12 min-h-screen bg-gradient-to-b from-[#e8edfa] to-[#f6f8fe]">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white shadow-lg rounded-2xl p-8">
                <h2 class="text-2xl text-indigo-800 mb-6 font-semibold">Blogs:</h2>
                <ul>
                    @foreach ($blogs as $blog)
                        <li class="border-b border-indigo-100 py-6">
                            <h3 class="text-xl text-indigo-800 font-bold mb-1">{{ $blog->title }}</h3>
                            <p class="text-indigo-600 mb-1"><strong>By:</strong> {{ $blog->username }}</p>
                            <p class="text-indigo-700">{{ $blog->blog_text }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
