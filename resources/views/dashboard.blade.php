<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight animate-fade-in">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-slate-100 to-slate-200 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg animate-slide-up">
                <div class="p-6 text-slate-900">

                    <!-- Search and Filter Section -->
                    <div class="flex justify-between items-center mb-6 animate-fade-in-delay">
                        <div class="flex space-x-4">
                            <!-- Search Input -->
                            <div class="relative group">
                                <input type="text" placeholder="Search products..." class="p-2 border border-slate-300 rounded-md bg-slate-50 text-slate-800 focus:border-blue-700 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:shadow-md group-hover:border-blue-500" id="searchInput">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            <!-- Search Button -->
                            <button id="searchButton" class="p-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 transition-all duration-300 font-semibold hover:scale-105 hover:shadow-lg active:scale-95 transform">
                                <span class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    <span>Search</span>
                                </span>
                            </button>
                            
                            <!-- Filter Dropdown -->
                            <div class="relative group">
                                <select class="p-2 border border-slate-300 rounded-md bg-slate-50 text-slate-800 focus:border-blue-700 focus:ring-2 focus:ring-blue-200 transition-all duration-300 group-hover:shadow-md group-hover:border-blue-500 appearance-none pr-8" id="filterSelect">
                                    <option value="">Filter by Brand</option>
                                    <option value="brand1">Brand 1</option>
                                    <option value="brand2">Brand 2</option>
                                    <option value="brand3">Brand 3</option>
                                    <!-- Add more filter options as needed -->
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400 group-focus-within:text-blue-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Filters Button -->
                        <button id="applyFilters" class="p-2 bg-green-600 text-white rounded-md hover:bg-green-800 transition-all duration-300 font-semibold hover:scale-105 hover:shadow-lg active:scale-95 transform relative overflow-hidden group">
                            <span class="relative z-10 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"/>
                                </svg>
                                <span>Apply Filters</span>
                            </span>
                            <div class="absolute inset-0 bg-green-700 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                        </button>
                    </div>

                    <hr class="my-6 animate-fade-in-delay-2">

                    <h3 class="text-2xl mb-4 text-slate-800 animate-fade-in-delay-3">Available Products:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($products as $product)
                            <div class="bg-slate-100 p-4 rounded-md shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate-product-card group cursor-pointer" style="animation-delay: {{ $loop->index * 0.1 }}s">
                                <div class="relative overflow-hidden rounded-md mb-3">
                                    <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300"></div>
                                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <div class="bg-white rounded-full p-2 shadow-lg">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="text-xl font-semibold text-slate-800 group-hover:text-blue-600 transition-colors duration-300">{{ $product->product_name }}</h4>
                                <p class="text-lg text-blue-800 font-bold group-hover:text-green-600 transition-colors duration-300">৳{{ number_format($product->product_price, 2) }}</p>
                                <a href="{{ route('product.details', ['product_id' => $product->product_id]) }}" class="block mt-3">
                                    <button class="w-full rounded-md bg-slate-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-700 transition-all duration-300 transform hover:scale-105 active:scale-95 group-hover:shadow-lg">
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
        document.querySelectorAll('.text-blue-800').forEach(price => {
            price.addEventListener('mouseenter', function() {
                this.classList.add('price-pulse');
            });
            
            price.addEventListener('mouseleave', function() {
                this.classList.remove('price-pulse');
            });
        });
    </script>
</x-app-layout>
