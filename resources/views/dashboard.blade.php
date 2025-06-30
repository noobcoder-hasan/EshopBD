<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-slate-100 to-slate-200 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-slate-900">

                    <!-- Search and Filter Section -->
                    <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                        <!-- Search Form -->
                        <form action="{{ route('search.products') }}" method="GET" class="flex items-center bg-white rounded-full shadow px-2 py-1">
                            <input type="text" name="query" placeholder="Search products..." class="px-3 py-1 bg-transparent focus:outline-none text-sm" value="{{ request()->query('query') }}">
                            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition text-sm">Search</button>
                        </form>

                        <!-- Filter Form -->
                        <form action="{{ route('dashboard') }}" method="GET" class="flex items-center">
                            <select name="category" class="p-2 bg-indigo-600 text-white rounded-full shadow hover:bg-indigo-500 text-sm">
                                <option value="">Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="ml-2 p-2 bg-blue-600 text-white rounded-full shadow hover:bg-blue-700 transition text-sm">
                                Filter
                            </button>
                        </form>
                    </div>

                    <hr class="my-6">

                    <h3 class="text-2xl mb-4 text-slate-800">Available Products:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="simplecard p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 animate-product-card group cursor-pointer border border-blue-100 bg-white" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <div class="relative overflow-hidden rounded-xl mb-4">
                                    <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}" class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105">
                                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="bg-blue-50 rounded-full p-2 shadow">
                                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-blue-900 group-hover:text-blue-700 transition-colors duration-300 mb-2">{{ $product->product_name }}</h4>
                                <p class="text-2xl text-blue-700 font-bold group-hover:text-blue-500 transition-colors duration-300 mb-4">৳{{ number_format($product->product_price, 2) }}</p>
                                <a href="{{ route('product.details', ['product_id' => $product->product_id]) }}" class="block">
                                    <button class="w-full rounded-xl simplebtn px-4 py-3 text-sm font-semibold shadow hover:shadow-md hover:bg-blue-50 active:scale-95 group-hover:shadow-xl transition-all duration-300">
                                        <span class="flex items-center justify-center space-x-2">
                                            <span>View Details</span>
                                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </span>
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        // Search button functionality
        document.getElementById('searchButton').addEventListener('click', function() {
            var searchTerm = document.getElementById('searchInput').value;
            if (searchTerm) {
                window.location.href = window.location.pathname + '?search=' + encodeURIComponent(searchTerm);
            }
        });

        // Apply Filters button functionality
        document.getElementById('applyFilters').addEventListener('click', function() {
            var searchTerm = document.getElementById('searchInput').value;
            var selectedFilter = document.getElementById('filterSelect').value;
            var queryString = '?';

            if (searchTerm) {
                queryString += 'search=' + encodeURIComponent(searchTerm) + '&';
            }

            if (selectedFilter) {
                queryString += 'brand=' + encodeURIComponent(selectedFilter) + '&';
            }

            // Remove trailing '&' if it exists
            queryString = queryString.endsWith('&') ? queryString.slice(0, -1) : queryString;

            // Redirect with the query string
            window.location.href = window.location.pathname + queryString;
        });
    </script>
</x-app-layout>
