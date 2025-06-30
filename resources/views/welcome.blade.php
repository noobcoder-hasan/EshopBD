<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EShopBD - Modern Electronics Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            overflow-x: hidden;
        }
        
        /* Modern Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 32px 0 rgba(34,212,255,0.25), 0 0 0 0 rgba(0,255,255,0.10); }
            50% { box-shadow: 0 0 64px 0 rgba(34,212,255,0.45), 0 0 0 0 rgba(0,255,255,0.18); }
        }
        
        @keyframes animatedGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .modern-bg-animated {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background: linear-gradient(120deg, #0a2540 0%, #0e2a47 40%, #193b6a 70%, #0a2540 100%);
            background-size: 300% 300%;
            opacity: 0.22;
            animation: animatedGradient 12s ease-in-out infinite;
        }
        
        .glassmorphism {
            background: rgba(34,212,255,0.13);
            backdrop-filter: blur(18px) saturate(160%);
            border: 1.5px solid rgba(34,212,255,0.18);
            box-shadow: 0 8px 32px 0 rgba(34,212,255,0.10);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #38bdf8 0%, #0ea5e9 50%, #6366f1 100%);
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 50%, #6366f1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .neon-glow {
            text-shadow: 0 0 8px #38bdf8, 0 0 16px #0ea5e9, 0 0 32px #6366f1;
        }
        
        .modern-btn {
            background: linear-gradient(90deg, #38bdf8 0%, #0ea5e9 50%, #6366f1 100%);
            color: #fff;
            border: none;
            border-radius: 9999px;
            box-shadow: 0 4px 24px 0 rgba(34,212,255,0.18);
            transition: box-shadow 0.3s, transform 0.3s;
        }
        .modern-btn:hover {
            box-shadow: 0 8px 32px 0 rgba(34,212,255,0.35);
            transform: scale(1.08);
        }
        
        @keyframes slideInFromLeft {
            0% { transform: translateX(-100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideInFromRight {
            0% { transform: translateX(100%); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeInUp {
            0% { transform: translateY(30px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        /* Modern Classes */
        .animate-float { 
            animation: float 6s ease-in-out infinite; 
            will-change: transform;
        }
        
        .animate-pulse-glow { 
            animation: pulse-glow 2s ease-in-out infinite; 
            will-change: box-shadow;
        }
        
        .animate-slide-left { 
            animation: slideInFromLeft 1s ease-out; 
            will-change: transform, opacity;
        }
        
        .animate-slide-right { 
            animation: slideInFromRight 1s ease-out; 
            will-change: transform, opacity;
        }
        
        .animate-fade-up { 
            animation: fadeInUp 0.8s ease-out; 
            will-change: transform, opacity;
        }
        
        .animate-rotate { animation: rotate 20s linear infinite; }
        
        .floating-shapes {
            position: absolute;
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(29, 78, 216, 0.1));
            border-radius: 50%;
            filter: blur(2px);
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform, box-shadow;
        }
        
        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        .text-shadow {
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        
        .glow-effect {
            position: relative;
        }
        
        .glow-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #3b82f6, #1d4ed8, #0ea5e9);
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        
        .glow-effect:hover::before {
            opacity: 0.3;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #2563eb, #1e40af);
        }
        
        /* Loading Animation */
        .loading-dots {
            display: inline-block;
        }
        
        .loading-dots::after {
            content: '';
            animation: dots 1.5s steps(5, end) infinite;
        }
        
        @keyframes dots {
            0%, 20% { content: ''; }
            40% { content: '.'; }
            60% { content: '..'; }
            80%, 100% { content: '...'; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-950 via-blue-900 to-blue-950 min-h-screen antialiased relative overflow-x-hidden">
    <div class="modern-bg-animated"></div>

    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="floating-shapes animate-float" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="floating-shapes animate-float" style="top: 20%; right: 15%; animation-delay: 2s;"></div>
        <div class="floating-shapes animate-float" style="bottom: 30%; left: 20%; animation-delay: 4s;"></div>
        <div class="floating-shapes animate-float" style="bottom: 10%; right: 10%; animation-delay: 1s;"></div>
    </div>

    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-900 via-blue-800 to-blue-950/90 shadow-lg backdrop-blur sticky top-0 z-30 border-b border-blue-800">
        <div class="container mx-auto px-6 py-4 flex flex-wrap justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="https://img.icons8.com/ios-filled/50/60A5FA/shopping-cart.png" alt="Logo" class="h-8 w-8">
                <span class="text-2xl font-extrabold text-blue-200 tracking-tight">EShopBD</span>
            </div>

            <!-- Right section: Admin + User Dropdown + Search + Category -->
            <div class="flex flex-wrap items-center space-x-6 mt-2 md:mt-0">
                
                <!-- Admin Link -->
                <a href="/admin/login" class="text-blue-200 hover:text-blue-400 transition">
                    Admin
                </a>

                <!-- User Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center space-x-2 text-blue-200 hover:text-blue-400 transition focus:outline-none">
                        <span>User</span>
                        <svg class="w-4 h-4 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        x-show="open"
                        @click.away="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-40 bg-blue-900 border border-blue-700 rounded-lg shadow-lg z-50"
                    >
                        <a href="/login" class="block px-4 py-2 text-blue-100 hover:bg-blue-800 hover:text-blue-400 transition">Login</a>
                        <a href="/register" class="block px-4 py-2 text-blue-100 hover:bg-blue-800 hover:text-blue-400 transition">Register</a>
                    </div>
                </div>

                <!-- Search and Filter -->
                <div class="flex items-center space-x-3">
                    <!-- Search Bar -->
                    <form action="{{ route('search.products') }}" method="GET" class="flex items-center bg-blue-800/80 rounded-full shadow px-2 py-1">
                        <input type="text" name="query" placeholder="Search products..." class="px-3 py-1 bg-transparent focus:outline-none text-sm text-blue-100 placeholder-blue-300" value="{{ request()->query('query') }}">
                        <button type="submit" class="px-3 py-1 bg-blue-700 text-blue-100 rounded-full hover:bg-blue-600 transition text-sm">Search</button>
                    </form>

                   
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Modern Design -->
    <section class="relative py-20 overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 mb-12 lg:mb-0 animate-slide-left">
                    <div class="space-y-8">
                        <div class="inline-flex items-center space-x-3 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20">
                            <i class="fas fa-star text-yellow-400"></i>
                            <span class="text-white/90 text-sm font-medium">Trusted by 10,000+ customers</span>
                        </div>
                        
                        <h1 class="text-5xl lg:text-7xl font-black text-white leading-tight neon-glow">
                            Welcome to 
                            <span class="gradient-text animate-pulse">EShopBD</span>
                        </h1>
                        
                        <p class="text-xl text-white/80 leading-relaxed max-w-lg">
                            Discover cutting-edge electronics with unbeatable prices. Experience the future of shopping with our innovative platform.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#products" class="group relative px-8 py-4 modern-btn font-bold rounded-full overflow-hidden transition-all duration-300 hover:scale-105">
                                <span class="relative z-10 flex items-center space-x-2">
                                    <i class="fas fa-shopping-bag"></i>
                                    <span>Shop Now</span>
                                </span>
                            </a>
                            
                            <a href="#about" class="px-8 py-4 border-2 border-white/20 text-white font-bold rounded-full hover:bg-white/10 transition-all duration-300 flex items-center space-x-2">
                                <i class="fas fa-play"></i>
                                <span>Learn More</span>
                            </a>
                        </div>
                        
                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-6 pt-8">
                            <div class="text-center">
                                <div class="text-3xl font-black text-white">1000+</div>
                                <div class="text-white/60 text-sm">Happy Customers</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-black text-white">500+</div>
                                <div class="text-white/60 text-sm">Products</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-black text-white">24/7</div>
                                <div class="text-white/60 text-sm">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-1/2 animate-slide-right">
                    <div class="relative">
                        <div class="w-96 h-96 mx-auto relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-blue-600/20 rounded-full animate-pulse-glow"></div>
                            <div class="absolute inset-4 bg-gradient-to-r from-blue-400/30 to-blue-500/30 rounded-full animate-pulse-glow" style="animation-delay: 1s;"></div>
                            <div class="absolute inset-8 bg-gradient-to-r from-blue-300/40 to-blue-400/40 rounded-full animate-pulse-glow" style="animation-delay: 2s;"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas fa-shopping-bag text-white text-8xl animate-float"></i>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full animate-float" style="animation-delay: 1s;"></div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-to-r from-green-400 to-blue-500 rounded-full animate-float" style="animation-delay: 2s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section with Modern Cards -->
    <section id="about" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 animate-fade-up">
                <h2 class="text-5xl font-black gradient-text mb-6 neon-glow">About EShopBD</h2>
                <p class="text-xl text-white/80 max-w-3xl mx-auto">Your premier destination for cutting-edge electronics and innovative technology solutions</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="animate-slide-left">
                    <div class="space-y-8">
                        <div class="glassmorphism p-8 rounded-3xl border border-white/10">
                            <h3 class="text-3xl font-bold text-white mb-6 flex items-center space-x-3">
                                <i class="fas fa-rocket text-blue-400"></i>
                                <span>Who We Are</span>
                            </h3>
                            <p class="text-white/80 mb-6 leading-relaxed">
                                EShopBD is a revolutionary electronic commerce platform in Bangladesh, pioneering the future of digital retail. We specialize in offering the latest electronics, from premium smartphones and cutting-edge laptops to smart home solutions and innovative accessories.
                            </p>
                            <p class="text-white/80 leading-relaxed">
                                Our mission is to democratize technology by providing authentic products, competitive pricing, and exceptional customer experiences. We believe in building lasting relationships through transparency, innovation, and unwavering quality standards.
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-6">
                            <div class="glassmorphism p-6 rounded-2xl text-center card-hover">
                                <div class="text-4xl font-black gradient-text mb-2">1000+</div>
                                <div class="text-white/60 text-sm">Happy Customers</div>
                            </div>
                            <div class="glassmorphism p-6 rounded-2xl text-center card-hover">
                                <div class="text-4xl font-black gradient-text mb-2">500+</div>
                                <div class="text-white/60 text-sm">Products</div>
                            </div>
                            <div class="glassmorphism p-6 rounded-2xl text-center card-hover">
                                <div class="text-4xl font-black gradient-text mb-2">24/7</div>
                                <div class="text-white/60 text-sm">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="animate-slide-right">
                    <div class="relative">
                        <div class="glassmorphism p-8 rounded-3xl border border-white/10">
                            <div class="w-full h-64 flex items-center justify-center">
                                <i class="fas fa-store text-8xl gradient-text animate-float"></i>
                            </div>
                        </div>
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full animate-float"></div>
                        <div class="absolute -bottom-4 -left-4 w-12 h-12 bg-gradient-to-r from-green-500 to-blue-600 rounded-full animate-float" style="animation-delay: 2s;"></div>
                    </div>
                </div>
            </div>

            <!-- Modern Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <div class="glassmorphism p-8 rounded-3xl border border-white/10 card-hover group">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-4">Quality Assurance</h4>
                    <p class="text-white/70 leading-relaxed">Every product is authentic with manufacturer warranty. Rigorous testing ensures premium quality standards.</p>
                </div>
                
                <div class="glassmorphism p-8 rounded-3xl border border-white/10 card-hover group">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tags text-white text-2xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-4">Best Prices</h4>
                    <p class="text-white/70 leading-relaxed">Competitive pricing with regular discounts. Our price match guarantee ensures unbeatable deals.</p>
                </div>
                
                <div class="glassmorphism p-8 rounded-3xl border border-white/10 card-hover group">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-shipping-fast text-white text-2xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-white mb-4">Lightning Fast</h4>
                    <p class="text-white/70 leading-relaxed">Express delivery across Bangladesh with real-time tracking and instant updates.</p>
                </div>
            </div>

            <!-- Why Choose Us - Modern Design -->
            <div class="gradient-bg rounded-3xl p-12 relative overflow-hidden">
                <div class="absolute inset-0 bg-black/20"></div>
                <div class="relative z-10">
                    <h3 class="text-4xl font-black text-white mb-12 text-center">Why Choose EShopBD?</h3>
                    <div class="grid md:grid-cols-2 gap-12">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4 group">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-yellow-300 text-lg"></i>
                                </div>
                                <span class="text-white text-lg">Authentic products with manufacturer warranty</span>
                            </div>
                            <div class="flex items-center space-x-4 group">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-yellow-300 text-lg"></i>
                                </div>
                                <span class="text-white text-lg">Secure payment options and easy returns</span>
                            </div>
                            <div class="flex items-center space-x-4 group">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-yellow-300 text-lg"></i>
                                </div>
                                <span class="text-white text-lg">24/7 customer support and technical assistance</span>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4 group">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-yellow-300 text-lg"></i>
                                </div>
                                <span class="text-white text-lg">Nationwide delivery with real-time tracking</span>
                            </div>
                            <div class="flex items-center space-x-4 group">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-yellow-300 text-lg"></i>
                                </div>
                                <span class="text-white text-lg">Regular deals, discounts, and loyalty rewards</span>
                            </div>
                            <div class="flex items-center space-x-4 group">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-yellow-300 text-lg"></i>
                                </div>
                                <span class="text-white text-lg">Expert product recommendations and reviews</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products - Modern Grid -->
    <section id="products" class="py-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 animate-fade-up">
                <h2 class="text-5xl font-black gradient-text mb-6 neon-glow">Featured Products</h2>
                <p class="text-xl text-white/80">Discover our curated collection of premium electronics</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($products as $product)
                    <div class="glassmorphism rounded-3xl p-6 border border-white/10 card-hover group">
                        <div class="relative mb-6">
                            <div class="w-full h-48 flex items-center justify-center overflow-hidden rounded-2xl bg-white/5">
                                <img src="{{ route('product.image', $product->product_id) }}" 
                                     alt="{{ $product->product_name }}" 
                                     class="object-contain h-40 group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center">
                                    <i class="fas fa-heart text-white"></i>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="text-lg font-bold text-white mb-2 text-center group-hover:text-blue-300 transition-colors duration-300">
                            {{ $product->product_name }}
                        </h3>
                        <p class="text-white/60 text-sm mb-4 text-center line-clamp-2">
                            {{ $product->product_description }}
                        </p>
                        <p class="text-2xl font-black gradient-text mb-6 text-center">&#2547;{{ $product->product_price }}</p>
                        
                        @if (Auth::check())
                            <a href="{{ route('product.details', $product->product_id) }}" 
                               class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-2xl font-bold text-center block hover:scale-105 transition-all duration-300 glow-effect">
                                <span class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-eye"></i>
                                    <span>View Details</span>
                                </span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-2xl font-bold text-center block hover:scale-105 transition-all duration-300 glow-effect">
                                <span class="flex items-center justify-center space-x-2">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Login to View</span>
                                </span>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
            
            <!-- Modern Call to Action -->
            <div class="text-center mt-16">
                <div class="glassmorphism p-8 rounded-3xl border border-white/10 max-w-2xl mx-auto">
                    <p class="text-white/80 mb-6 text-lg">Ready to explore the future of electronics?</p>
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}" 
                           class="inline-flex items-center space-x-3 modern-btn py-4 px-8 font-bold hover:scale-105 transition-all duration-300">
                            <i class="fas fa-rocket"></i>
                            <span>Launch Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center space-x-3 modern-btn py-4 px-8 font-bold hover:scale-105 transition-all duration-300">
                            <i class="fas fa-play"></i>
                            <span>Get Started</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Footer -->
    <footer class="glassmorphism border-t border-white/10 py-16 relative">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>
                        <span class="text-2xl font-black gradient-text">EShopBD</span>
                    </div>
                    <p class="text-white/70 leading-relaxed">Your trusted partner for cutting-edge electronics in Bangladesh.</p>
                </div>
                
                <div>
                    <h5 class="font-bold text-white mb-6 flex items-center space-x-2">
                        <i class="fas fa-link text-blue-400"></i>
                        <span>Quick Links</span>
                    </h5>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/70 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>About Us</span>
                        </a></li>
                        <li><a href="#" class="text-white/70 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Contact</span>
                        </a></li>
                        <li><a href="#" class="text-white/70 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Privacy Policy</span>
                        </a></li>
                        <li><a href="#" class="text-white/70 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <span>Terms of Service</span>
                        </a></li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="font-bold text-white mb-6 flex items-center space-x-2">
                        <i class="fas fa-headset text-blue-400"></i>
                        <span>Customer Service</span>
                    </h5>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3 text-white/70">
                            <i class="fas fa-phone text-blue-400"></i>
                            <span>+880 1234-567890</span>
                        </li>
                        <li class="flex items-center space-x-3 text-white/70">
                            <i class="fas fa-envelope text-blue-400"></i>
                            <span>support@eshopbd.com</span>
                        </li>
                        <li class="flex items-center space-x-3 text-white/70">
                            <i class="fas fa-clock text-blue-400"></i>
                            <span>24/7 Support</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h5 class="font-bold text-white mb-6 flex items-center space-x-2">
                        <i class="fas fa-share-alt text-blue-400"></i>
                        <span>Follow Us</span>
                    </h5>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-white/10 mt-12 pt-8 text-center">
                <p class="text-white/60">&copy; 2024 EShopBD. All rights reserved. | Built with ❤️ for Bangladesh</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.animate-fade-up, .animate-slide-left, .animate-slide-right').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            observer.observe(el);
        });

        // Optimized Parallax effect for floating elements
        const parallaxElements = document.querySelectorAll('.floating-shapes');
        let ticking = false;

        const updateParallax = () => {
            const scrolled = window.pageYOffset;
            parallaxElements.forEach((element, index) => {
                const speed = 0.3 + (index * 0.05); // Reduced speed for better performance
                element.style.transform = translateY(${scrolled * speed}px);
            });
            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(updateParallax);
                ticking = true;
            }
        }, { passive: true });
    </script>
</body>
</html>