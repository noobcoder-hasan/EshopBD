<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Forgot Password</title>
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
        
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% { transform: translate3d(0,0,0); }
            40%, 43% { transform: translate3d(0, -30px, 0); }
            70% { transform: translate3d(0, -15px, 0); }
            90% { transform: translate3d(0, -4px, 0); }
        }
        
        /* Modern Classes */
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-left { animation: slideInFromLeft 1s ease-out; }
        .animate-slide-right { animation: slideInFromRight 1s ease-out; }
        .animate-fade-up { animation: fadeInUp 0.8s ease-out; }
        .animate-bounce { animation: bounce 2s infinite; }
        
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
        
        .email-sent-animation {
            animation: emailSent 2s ease-in-out;
        }
        
        @keyframes emailSent {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .success-checkmark {
            animation: checkmark 0.5s ease-in-out;
        }
        
        @keyframes checkmark {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
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
                            <i class="fas fa-key text-white text-2xl"></i>
                        </div>
                        <div class="absolute -top-1 -right-1 w-5 h-5 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
                <h2 class="text-4xl font-black gradient-text mb-2">Reset Password</h2>
                <p class="text-white/70 text-lg">We'll send you a secure reset link</p>
            </div>

            <!-- Reset Form -->
            <div class="glassmorphism rounded-3xl p-8 border border-white/10 card-hover">
                <!-- Description -->
                <div class="mb-6 p-4 rounded-xl bg-blue-500/10 border border-blue-500/20">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-info-circle text-blue-400 mt-1"></i>
                        <div class="text-sm text-white/70">
                            <p class="font-semibold text-blue-400 mb-1">How it works</p>
                            <p>Enter your email address and we'll send you a secure password reset link that will allow you to create a new password.</p>
                        </div>
                    </div>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-400 flex items-center space-x-2 email-sent-animation">
                        <i class="fas fa-check-circle success-checkmark"></i>
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
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
                                   autocomplete="email"
                                   class="input-modern w-full px-4 py-3 rounded-xl text-white placeholder-white/50 focus:outline-none"
                                   placeholder="Enter your email address">
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

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-6 rounded-xl font-semibold hover:scale-105 transition-all duration-300 glow-effect flex items-center justify-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
                        <span>Send Reset Link</span>
                    </button>
                </form>

                <!-- Security Notice -->
                <div class="mt-6 p-4 rounded-xl bg-yellow-500/10 border border-yellow-500/20">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-shield-alt text-yellow-400 mt-1"></i>
                        <div class="text-sm text-white/70">
                            <p class="font-semibold text-yellow-400 mb-1">Security Reminder</p>
                            <p>The reset link will expire in 60 minutes for your security. Check your spam folder if you don't receive the email.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="text-center space-y-4">
                <a href="{{ route('login') }}" 
                   class="inline-flex items-center space-x-2 text-white/60 hover:text-white transition-colors duration-300">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Login</span>
                </a>
                
                <div class="text-white/40 text-sm">
                    <span>Don't have an account? </span>
                    <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 font-semibold transition-colors duration-300">
                        Sign up here
                    </a>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="text-center">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center space-x-2 text-white/50 hover:text-white transition-colors duration-300">
                    <i class="fas fa-home"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Add loading animation to form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = document.querySelector('button[type="submit"]');
            const originalContent = button.innerHTML;
            
            button.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Sending Email...
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

        // Add success animation when status is present
        if (document.querySelector('.email-sent-animation')) {
            setTimeout(() => {
                const icon = document.querySelector('.success-checkmark');
                icon.style.transform = 'scale(1.2)';
                setTimeout(() => {
                    icon.style.transform = 'scale(1)';
                }, 200);
            }, 500);
        }
    </script>
</body>
</html>
