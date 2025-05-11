<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-semibold text-gray-800 leading-tight">
            Blogs
        </h1>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="blog-list bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl text-gray-800 mb-4">Blogs:</h2>
            <ul>
                @foreach ($blogs as $blog)
                    <li class="border-b border-gray-200 py-4">
                        <h3 class="text-xl text-gray-800">{{ $blog->title }}</h3>
                        <p class="text-gray-600"><strong>By:</strong> {{ $blog->username }}</p>
                        <p class="text-gray-700">{{ $blog->blog_text }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
