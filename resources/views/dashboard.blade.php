<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight animate-fade-in">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-indigo-50 to-cyan-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-2xl animate-slide-up border border-blue-100">
                <div class="p-8 text-slate-800">

                    <!-- Search and Filter Section -->
<<<<<<< HEAD
                    <div class="flex justify-between items-center mb-8 animate-fade-in-delay">
                        <div class="flex space-x-4">
                            <!-- Search Input -->
                            <div class="relative group">
                                <input type="text" placeholder="Search products..." class="p-3 border border-blue-200 rounded-xl bg-white/70 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:shadow-lg group-hover:border-blue-400 group-hover:bg-white" id="searchInput">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-blue-400 group-focus-within:text-blue-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Search Button -->
                            <button id="searchButton" class="p-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-300 font-semibold hover:scale-105 hover:shadow-lg active:scale-95 transform shadow-md">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span>Search</span>
                                </span>
                            </button>
                            
                            <!-- Filter Dropdown -->
                            <div class="relative group">
                                <select class="p-3 border border-blue-200 rounded-xl bg-white/70 text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:shadow-lg group-hover:border-blue-400 group-hover:bg-white appearance-none pr-8" id="filterSelect">
                                    <option value="">Filter by Brand</option>
                                    <option value="brand1">Brand 1</option>
                                    <option value="brand2">Brand 2</option>
                                    <option value="brand3">Brand 3</option>
                                    <!-- Add more filter options as needed -->
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-blue-400 group-focus-within:text-blue-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Filters Button -->
                        <button id="applyFilters" class="p-3 bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-xl hover:from-cyan-600 hover:to-blue-600 transition-all duration-300 font-semibold hover:scale-105 hover:shadow-lg active:scale-95 transform shadow-md relative overflow-hidden group">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                                </svg>
                                <span>Apply Filters</span>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </button>
=======
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
>>>>>>> e4b8ea88e1e219e358ca7411caaab31891c48b6b
                    </div>

                    <hr class="my-8 border-blue-200 animate-fade-in-delay-2">

                    <h3 class="text-3xl mb-6 text-slate-800 font-bold animate-fade-in-delay-3 bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">Available Products:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        @foreach ($products as $product)
                            <div class="bg-white/60 backdrop-blur-sm p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 animate-product-card group cursor-pointer border border-blue-100" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <div class="relative overflow-hidden rounded-xl mb-4">
                                    <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}" class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="bg-white/90 backdrop-blur-sm rounded-full p-2 shadow-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors duration-300 mb-2">{{ $product->product_name }}</h4>
                                <p class="text-2xl text-blue-600 font-bold group-hover:text-cyan-600 transition-colors duration-300 mb-4">৳{{ number_format($product->product_price, 2) }}</p>
                                <a href="{{ route('product.details', ['product_id' => $product->product_id]) }}" class="block">
                                    <button class="w-full rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 px-4 py-3 text-sm font-semibold text-white shadow-lg hover:from-blue-600 hover:to-cyan-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-500 transition-all duration-300 transform hover:scale-105 active:scale-95 group-hover:shadow-xl">
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

<<<<<<< HEAD
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes product-card {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }

        .animate-fade-in-delay {
            animation: fade-in 0.6s ease-out 0.2s both;
        }

        .animate-fade-in-delay-2 {
            animation: fade-in 0.6s ease-out 0.4s both;
        }

        .animate-fade-in-delay-3 {
            animation: fade-in 0.6s ease-out 0.6s both;
        }

        .animate-slide-up {
            animation: slide-up 0.8s ease-out;
        }

        .animate-product-card {
            animation: product-card 0.6s ease-out both;
        }

        /* Loading animation for buttons */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            animation: loading-shimmer 1.5s infinite;
        }

        @keyframes loading-shimmer {
            0% {
                left: -100%;
            }
            100% {
                left: 100%;
            }
        }

        /* Pulse animation for price */
        .price-pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        /* Hover effects for interactive elements */
        .interactive-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .interactive-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        }

        /* Glassmorphism effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(59, 130, 246, 0.1);
        }
    </style>
=======
>>>>>>> e4b8ea88e1e219e358ca7411caaab31891c48b6b

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
