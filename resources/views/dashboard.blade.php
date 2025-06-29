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
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex space-x-4">
                            <!-- Search Input -->
                            <input type="text" placeholder="Search products..." class="p-2 border border-slate-300 rounded-md bg-slate-50 text-slate-800 focus:border-blue-700 focus:ring-2 focus:ring-blue-200 transition" id="searchInput">
                            
                            <!-- Search Button -->
                            <button id="searchButton" class="p-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition font-semibold">
                                Search
                            </button>
                            
                            <!-- Filter Dropdown -->
                                
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

                    </div>

                    <hr class="my-6">

                    <h3 class="text-2xl mb-4 text-slate-800">Available Products:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-slate-100 p-4 rounded-md shadow-sm">
                                <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}">
                                <h4 class="text-xl font-semibold text-slate-800">{{ $product->product_name }}</h4>
                                <p class="text-lg text-blue-800">৳{{ number_format($product->product_price, 2) }}</p>
                                <a href="{{ route('product.details', ['product_id' => $product->product_id]) }}" class="block mt-2">
                                    <button class="rounded-md bg-slate-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-700 transition">
                                        Details
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
