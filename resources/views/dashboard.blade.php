<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight animate-fade-in">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="simplecard overflow-hidden shadow-xl sm:rounded-2xl animate-slide-up border border-blue-100 bg-white">
                <div class="p-8 text-blue-900">

                    <!-- Modern Search and Filter Section -->
                    <div class="flex flex-wrap justify-between items-center mb-10 gap-4 animate-fade-in-delay">
                        <form action="{{ route('search.products') }}" method="GET" class="flex items-center bg-white rounded-full shadow px-2 py-1 border border-blue-100">
                            <input type="text" name="query" placeholder="Search products..." class="px-3 py-2 bg-transparent focus:outline-none text-sm text-blue-900 placeholder-blue-400" value="{{ request()->query('query') }}">
                            <button type="submit" class="px-4 py-2 simplebtn font-semibold rounded-full ml-2">Search</button>
                        </form>
                        <form action="{{ route('dashboard') }}" method="GET" class="flex items-center">
                            <select name="category" class="p-2 bg-white text-blue-900 rounded-full shadow hover:bg-blue-50 text-sm border border-blue-100">
                                <option value="">Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="ml-2 px-4 py-2 simplebtn font-semibold rounded-full">Filter</button>
                        </form>
                    </div>

                    <hr class="my-8 border-blue-100 animate-fade-in-delay-2">

                    <h3 class="text-3xl mb-6 font-bold text-blue-700 animate-fade-in-delay-3">Available Products:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
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

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes product-card {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .animate-fade-in { animation: fade-in 0.6s ease-out; }
        .animate-fade-in-delay { animation: fade-in 0.6s ease-out 0.2s both; }
        .animate-fade-in-delay-2 { animation: fade-in 0.6s ease-out 0.4s both; }
        .animate-fade-in-delay-3 { animation: fade-in 0.6s ease-out 0.6s both; }
        .animate-slide-up { animation: slide-up 0.8s ease-out; }
        .animate-product-card { animation: product-card 0.6s ease-out both; }
        .simplecard {
            background: #fff;
            border: 1px solid #dbeafe;
            box-shadow: 0 4px 24px 0 #e0e7ef1a;
        }
        .simplebtn {
            background: #e0e7ef;
            color: #2563eb;
            border: none;
            border-radius: 9999px;
            box-shadow: 0 2px 8px 0 #dbeafe33;
            transition: box-shadow 0.3s, background 0.3s, transform 0.3s;
        }
        .simplebtn:hover {
            background: #dbeafe;
            box-shadow: 0 4px 16px 0 #dbeafe55;
            transform: scale(1.04);
        }
    </style>

    <script>
        // Search button functionality with loading animation
        document.getElementById('searchButton').addEventListener('click', function() {
            const button = this;
            const originalContent = button.innerHTML;
            
            // Add loading animation
            button.classList.add('loading');
            button.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Searching...
            `;
            
            var searchTerm = document.getElementById('searchInput').value;
            if (searchTerm) {
                setTimeout(() => {
                    window.location.href = window.location.pathname + '?search=' + encodeURIComponent(searchTerm);
                }, 500);
            } else {
                // Reset button if no search term
                setTimeout(() => {
                    button.classList.remove('loading');
                    button.innerHTML = originalContent;
                }, 1000);
            }
        });

        // Apply Filters button functionality with loading animation
        document.getElementById('applyFilters').addEventListener('click', function() {
            const button = this;
            const originalContent = button.innerHTML;
            
            // Add loading animation
            button.classList.add('loading');
            button.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Applying...
            `;
            
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

            // Redirect with the query string after animation
            setTimeout(() => {
                window.location.href = window.location.pathname + queryString;
            }, 500);
        });

        // Add enter key functionality for search
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('searchButton').click();
            }
        });

        // Add smooth scroll animation for product cards
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.animate-product-card');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) scale(1)';
                    }
                });
            }, {
                threshold: 0.1
            });

            productCards.forEach(card => {
                observer.observe(card);
            });
        });

        // Add price pulse animation on hover
        document.querySelectorAll('.text-blue-600').forEach(price => {
            price.addEventListener('mouseenter', function() {
                this.classList.add('price-pulse');
            });
            
            price.addEventListener('mouseleave', function() {
                this.classList.remove('price-pulse');
            });
        });
    </script>
</x-app-layout>
