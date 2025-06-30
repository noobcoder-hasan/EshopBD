<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EshopBD</title>
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
            0%, 100% { box-shadow: 0 0 20px rgba(99, 102, 241, 0.3); }
            50% { box-shadow: 0 0 40px rgba(99, 102, 241, 0.6); }
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
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Modern Classes */
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInFromLeft 1s ease-out; }
        .animate-slide-right { animation: slideInFromRight 1s ease-out; }
        .animate-fade-up { animation: fadeInUp 0.8s ease-out; }
        .animate-gradient { 
            background: linear-gradient(270deg, #4f46e5, #818cf8, #6366f1, #8b5cf6);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }
        
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .floating-shapes {
            position: absolute;
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.1));
            border-radius: 50%;
            filter: blur(3px);
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
            background: linear-gradient(45deg, #6366f1, #8b5cf6, #a855f7);
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
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
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
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-color: #6366f1;
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
        
        .admin-badge {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    </style>
</head>
<body class="min-h-screen animate-gradient antialiased relative overflow-x-hidden">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="floating-shapes animate-float" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="floating-shapes animate-float" style="top: 20%; right: 15%; animation-delay: 2s;"></div>
        <div class="floating-shapes animate-float" style="bottom: 30%; left: 20%; animation-delay: 4s;"></div>
        <div class="floating-shapes animate-float" style="bottom: 10%; right: 10%; animation-delay: 1s;"></div>
    </div>

    <!-- Home Button -->
    <div class="absolute top-6 right-6 z-10 animate-fade-up">
        <a href="{{ route('home') }}" 
           class="inline-flex items-center px-4 py-2 glassmorphism rounded-xl text-white hover:bg-white/20 transition-all duration-300 ease-in-out group">
            <i class="fas fa-home mr-2 group-hover:scale-110 transition-transform"></i>
            Back to Home
        </a>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Logo Section -->
            <div class="text-center animate-fade-up">
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center animate-pulse-glow">
                            <i class="fas fa-shield-alt text-white text-3xl"></i>
                        </div>
                        <div class="absolute -top-2 -right-2">
                            <span class="admin-badge animate-pulse">Admin</span>
                        </div>
                    </div>
                </div>
                <h2 class="text-4xl font-black gradient-text mb-2">Admin Portal</h2>
                <p class="text-white/70 text-lg">Secure access to dashboard</p>
            </div>

            <!-- Login Form -->
            <div class="glassmorphism rounded-3xl p-8 border border-white/10 card-hover">
                <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-white/90">
                            <i class="fas fa-envelope mr-2 text-indigo-400"></i>
                            Admin Email
                        </label>
                        <div class="relative">
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="admin@eshopbd.com">
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

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-white/90">
                            <i class="fas fa-lock mr-2 text-indigo-400"></i>
                            Admin Password
                        </label>
                        <div class="relative">
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="••••••••">
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

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <input id="remember" 
                                   name="remember" 
                                   type="checkbox" 
                                   class="checkbox-modern">
                            <label for="remember" class="text-sm text-white/70">
                                Remember this session
                            </label>
                        </div>
                        <div class="text-xs text-white/50">
                            <i class="fas fa-shield-check mr-1"></i>
                            Secure
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 px-6 rounded-xl font-semibold hover:scale-105 transition-all duration-300 glow-effect flex items-center justify-center space-x-2">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Access Dashboard</span>
                    </button>
                </form>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mt-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 flex items-center space-x-2">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="mt-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 flex items-center space-x-2">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Please check your credentials and try again.</span>
                    </div>
                @endif

                <!-- Security Notice -->
                <div class="mt-6 p-4 rounded-xl bg-blue-500/10 border border-blue-500/20">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-info-circle text-blue-400 mt-1"></i>
                        <div class="text-sm text-white/70">
                            <p class="font-semibold text-blue-400 mb-1">Security Notice</p>
                            <p>This is a restricted admin area. All login attempts are logged and monitored for security purposes.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-white/50 text-sm">
                    <i class="fas fa-copyright mr-1"></i>
                    2024 EShopBD Admin Portal
                </p>
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
                Authenticating...
            `;
            button.disabled = true;
        });

        // Add focus effects to inputs
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-indigo-500/20');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-indigo-500/20');
            });
        });

        // Add typing animation to title
        const title = document.querySelector('.gradient-text');
        const text = title.textContent;
        title.textContent = '';
        
        let i = 0;
        const typeWriter = () => {
            if (i < text.length) {
                title.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };
        
        // Start typing animation after page load
        setTimeout(typeWriter, 1000);
    </script>
</body>
</html>