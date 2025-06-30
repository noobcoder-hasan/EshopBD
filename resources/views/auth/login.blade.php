<<<<<<< HEAD
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6); }
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
        
        /* Modern Classes */
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInFromLeft 1s ease-out; }
        .animate-slide-right { animation: slideInFromRight 1s ease-out; }
        .animate-fade-up { animation: fadeInUp 0.8s ease-out; }
        
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 50%, #0ea5e9 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
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
        }
        
        .card-hover:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
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
        
        .input-modern {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .input-modern:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .checkbox-modern {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .checkbox-modern:checked {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-color: #3b82f6;
        }
        
        .checkbox-modern:checked::after {
            content: '✓';
            color: white;
            font-size: 12px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 min-h-screen antialiased relative overflow-x-hidden">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="floating-shapes animate-float" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="floating-shapes animate-float" style="top: 20%; right: 15%; animation-delay: 2s;"></div>
        <div class="floating-shapes animate-float" style="bottom: 30%; left: 20%; animation-delay: 4s;"></div>
        <div class="floating-shapes animate-float" style="bottom: 10%; right: 10%; animation-delay: 1s;"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo Section -->
            <div class="text-center animate-fade-up">
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center animate-pulse-glow">
                            <i class="fas fa-shopping-cart text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
                <h2 class="text-4xl font-black gradient-text mb-2">Welcome Back</h2>
                <p class="text-white/70 text-lg">Sign in to your EShopBD account</p>
            </div>

            <!-- Login Form -->
            <div class="glassmorphism rounded-3xl p-8 border border-white/10 card-hover">
                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-xl text-green-300 text-sm">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-white/90">
                            <i class="fas fa-envelope mr-2 text-blue-400"></i>
                            Email Address
                        </label>
                        <div class="relative">
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="Enter your email">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-white/30"></i>
                            </div>
                        </div>
                        @error('email')
                            <div class="text-red-400 text-sm flex items-center space-x-1">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-white/90">
                            <i class="fas fa-lock mr-2 text-blue-400"></i>
                            Password
                        </label>
                        <div class="relative">
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="Enter your password">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" 
                                        onclick="togglePassword()"
                                        class="text-white/30 hover:text-white/60 transition-colors">
                                    <i id="password-icon" class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <div class="text-red-400 text-sm flex items-center space-x-1">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center space-x-2 cursor-pointer">
                            <input id="remember_me" 
                                   type="checkbox" 
                                   name="remember" 
                                   class="checkbox-modern">
                            <span class="text-sm text-white/70">Remember me</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm text-blue-400 hover:text-blue-300 transition-colors duration-300">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-xl font-semibold hover:scale-105 transition-all duration-300 glow-effect flex items-center justify-center space-x-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Sign In</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-transparent text-white/50">Or continue with</span>
                    </div>
                </div>

                <!-- Social Login Options -->
                <div class="grid grid-cols-2 gap-4">
                    <button class="flex items-center justify-center space-x-2 px-4 py-3 border border-white/20 rounded-xl text-white/70 hover:bg-white/10 transition-all duration-300">
                        <i class="fab fa-google text-red-400"></i>
                        <span class="text-sm">Google</span>
                    </button>
                    <button class="flex items-center justify-center space-x-2 px-4 py-3 border border-white/20 rounded-xl text-white/70 hover:bg-white/10 transition-all duration-300">
                        <i class="fab fa-facebook text-blue-400"></i>
                        <span class="text-sm">Facebook</span>
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-8">
                    <p class="text-white/60">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-300">
                            Sign up here
                        </a>
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center space-x-2 text-white/60 hover:text-white transition-colors duration-300">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                passwordIcon.className = 'fas fa-eye';
            }
        }

        // Add loading animation to form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('button[type="submit"]');
            const originalContent = button.innerHTML;
            
            button.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Signing In...
            `;
            button.disabled = true;
        });

        // Add focus effects to inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-500/20');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-500/20');
            });
        });
    </script>
</body>
</html>

