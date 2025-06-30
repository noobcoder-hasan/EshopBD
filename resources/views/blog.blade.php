<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col">
            <h1 class="text-2xl font-bold text-gray-800 leading-tight">
                Blog Submission
            </h1>
            <p class="text-gray-500 text-sm mt-1">Share your latest project with the EshopBD community</p>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-blue-300 to-indigo-200 flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-2xl">
            <!-- Blog Form -->
            <div class="bg-white shadow-lg rounded-xl p-8 mb-8 border border-gray-100">
                <form action="/blog" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" value="{{ Auth::user()->name }}" readonly required>
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" id="title" name="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" required>
                    </div>
                    <div>
                        <label for="blog_text" class="block text-sm font-medium text-gray-700">Project Description</label>
                        <textarea id="blog_text" name="blog_text" rows="5" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg shadow hover:bg-blue-700 transition">Submit</button>
                </form>
            </div>
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('viewblogs') }}" class="text-blue-600 hover:underline font-medium">View Blogs</a>
            </div>
            <!-- Success Message -->
            @if (session('success'))
                <p class="text-green-600 text-center font-semibold bg-green-50 border border-green-200 rounded-lg py-2 mb-4">{{ session('success') }}</p>
            @endif
        </div>
    </div>
</x-app-layout>
