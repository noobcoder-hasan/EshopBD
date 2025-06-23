<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-blue-50 min-h-screen antialiased">
    <!-- Navbar -->
    <nav class="bg-white/90 shadow-lg backdrop-blur sticky top-0 z-30">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="https://img.icons8.com/ios-filled/50/4F46E5/shopping-cart.png" alt="Logo" class="h-8 w-8">
                <span class="text-2xl font-extrabold text-indigo-700 tracking-tight">EShopBD</span>
            </div>
            <ul class="hidden md:flex space-x-6">
                <li><a href="/login" class="text-gray-600 hover:text-indigo-700 transition">Login</a></li>
                <li><a href="/register" class="text-gray-600 hover:text-indigo-700 transition">Register</a></li>
                <li><a href="/admin/login" class="text-gray-600 hover:text-indigo-700 transition">Admin</a></li>
            </ul>
            <div class="flex items-center space-x-3">
                <!-- Search Bar -->
                <form action="{{ route('search.products') }}" method="GET" class="flex items-center bg-white rounded-full shadow px-2 py-1">
                    <input type="text" name="query" placeholder="Search products..." class="px-3 py-1 bg-transparent focus:outline-none text-sm" value="{{ request()->query('query') }}">
                    <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition text-sm">Search</button>
                </form>
                <!-- Category Filter Dropdown -->
                <form action="{{ route('home') }}" method="GET" class="flex items-center">
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
    </nav>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-indigo-500 via-blue-400 to-blue-300 py-16 mb-10 shadow-lg">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
            <div class="mb-8 md:mb-0 md:w-1/2">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 leading-tight drop-shadow">Welcome to <span class="text-yellow-300">EShopBD</span></h1>
                <p class="text-lg text-blue-100 mb-6">Discover the best products at unbeatable prices. Shop now and enjoy a seamless experience!</p>
                <a href="#products" class="inline-block px-8 py-3 bg-yellow-400 text-indigo-900 font-bold rounded-full shadow-lg hover:bg-yellow-300 transition">Shop Now</a>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://img.icons8.com/ios-filled/150/ffffff/shopping-bag.png" alt="Shopping" class="w-48 h-48 drop-shadow-xl">
            </div>
        </div>
    </section>

    <!-- Body -->
    <div id="products" class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center transition-transform transform hover:-translate-y-2 hover:shadow-2xl group">
                    <div class="w-full h-48 flex items-center justify-center mb-4 overflow-hidden rounded-xl bg-gray-50">
                        <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}" class="object-contain h-40 group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <h3 class="text-lg font-bold text-indigo-700 mb-1 text-center">{{ $product->product_name }}</h3>
                    <p class="text-gray-500 text-sm mb-2 text-center line-clamp-2">{{ $product->product_description }}</p>
                    <p class="text-green-600 font-semibold text-lg mb-4">&#2547;{{ $product->product_price }}</p>
                    <!-- Details Button -->
                    @if (Auth::check())
                        <a href="{{ route('product.details', $product->product_id) }}" class="mt-auto inline-block bg-indigo-600 text-white py-2 px-6 rounded-full shadow hover:bg-indigo-700 transition">View Details</a>
                    @else
                        <a href="{{ route('login') }}" class="mt-auto inline-block bg-indigo-600 text-white py-2 px-6 rounded-full shadow hover:bg-indigo-700 transition">View Details</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
