<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Register</title>
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
        
        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        
        .strength-weak { background: linear-gradient(90deg, #ef4444, #dc2626); }
        .strength-medium { background: linear-gradient(90deg, #f59e0b, #d97706); }
        .strength-strong { background: linear-gradient(90deg, #10b981, #059669); }
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
                            <i class="fas fa-user-plus text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-5 h-5 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
                <h2 class="text-4xl font-black gradient-text mb-2">Join EShopBD</h2>
                <p class="text-white/70 text-lg">Create your account and start shopping</p>
            </div>

            <!-- Register Form -->
            <div class="glassmorphism rounded-3xl p-8 border border-white/10 card-hover">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-white/90">
                            <i class="fas fa-user mr-2 text-blue-400"></i>
                            Full Name
                        </label>
                        <div class="relative">
                            <input id="name" 
                                   type="text" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autofocus 
                                   autocomplete="name"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="Enter your full name">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-white/30"></i>
                            </div>
                        </div>
                        @error('name')
                            <div class="text-red-400 text-sm flex items-center space-x-1">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

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
                                   autocomplete="new-password"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="Create a strong password"
                                   onkeyup="checkPasswordStrength()">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" 
                                        onclick="togglePassword('password')"
                                        class="text-white/30 hover:text-white/60 transition-colors">
                                    <i id="password-icon" class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Password Strength Indicator -->
                        <div class="password-strength-container">
                            <div id="password-strength" class="password-strength w-full"></div>
                            <div id="strength-text" class="text-xs text-white/50 mt-1"></div>
                        </div>
                        @error('password')
                            <div class="text-red-400 text-sm flex items-center space-x-1">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-semibold text-white/90">
                            <i class="fas fa-lock mr-2 text-blue-400"></i>
                            Confirm Password
                        </label>
                        <div class="relative">
                            <input id="password_confirmation" 
                                   type="password" 
                                   name="password_confirmation" 
                                   required 
                                   autocomplete="new-password"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="Confirm your password">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" 
                                        onclick="togglePassword('password_confirmation')"
                                        class="text-white/30 hover:text-white/60 transition-colors">
                                    <i id="password_confirmation-icon" class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="text-red-400 text-sm flex items-center space-x-1">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start space-x-3">
                        <input id="terms" 
                               type="checkbox" 
                               required
                               class="checkbox-modern mt-1">
                        <label for="terms" class="text-sm text-white/70 leading-relaxed">
                            I agree to the 
                            <a href="#" class="text-blue-400 hover:text-blue-300 underline">Terms of Service</a> 
                            and 
                            <a href="#" class="text-blue-400 hover:text-blue-300 underline">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-xl font-semibold hover:scale-105 transition-all duration-300 glow-effect flex items-center justify-center space-x-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Create Account</span>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-white/20"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-transparent text-white/50">Or sign up with</span>
                    </div>
                </div>

                <!-- Social Register Options -->
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

                <!-- Login Link -->
                <div class="text-center mt-8">
                    <p class="text-white/60">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-300">
                            Sign in here
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
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const passwordIcon = document.getElementById(fieldId + '-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.className = 'fas fa-eye-slash';
            } else {
                passwordInput.type = 'password';
                passwordIcon.className = 'fas fa-eye';
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('password-strength');
            const strengthText = document.getElementById('strength-text');
            
            // Remove existing classes
            strengthBar.className = 'password-strength w-full';
            
            if (password.length === 0) {
                strengthText.textContent = '';
                return;
            }
            
            let strength = 0;
            let feedback = [];
            
            // Length check
            if (password.length >= 8) {
                strength += 1;
            } else {
                feedback.push('At least 8 characters');
            }
            
            // Contains lowercase
            if (/[a-z]/.test(password)) {
                strength += 1;
            } else {
                feedback.push('Lowercase letter');
            }
            
            // Contains uppercase
            if (/[A-Z]/.test(password)) {
                strength += 1;
            } else {
                feedback.push('Uppercase letter');
            }
            
            // Contains number
            if (/[0-9]/.test(password)) {
                strength += 1;
            } else {
                feedback.push('Number');
            }
            
            // Contains special character
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 1;
            } else {
                feedback.push('Special character');
            }
            
            // Apply strength styling
            if (strength <= 2) {
                strengthBar.classList.add('strength-weak');
                strengthText.textContent = 'Weak password';
                strengthText.className = 'text-xs text-red-400 mt-1';
            } else if (strength <= 3) {
                strengthBar.classList.add('strength-medium');
                strengthText.textContent = 'Medium strength';
                strengthText.className = 'text-xs text-yellow-400 mt-1';
            } else {
                strengthBar.classList.add('strength-strong');
                strengthText.textContent = 'Strong password';
                strengthText.className = 'text-xs text-green-400 mt-1';
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
                Creating Account...
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
