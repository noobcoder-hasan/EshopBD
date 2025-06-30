<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-pink-200 via-blue-100 to-purple-100">
        <header class="bg-white/70 shadow-xl border-b border-pink-100 backdrop-blur-md rounded-b-3xl">
            <div class="max-w-7xl mx-auto py-8 px-6 sm:px-8 lg:px-12 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-extrabold text-purple-700 flex items-center gap-3">
                        <span class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-tr from-pink-200 via-green-100 to-purple-200 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8a9 9 0 100-18 9 9 0 000 18z"/></svg>
                        </span>
                        Community Shoutouts
                    </h1>
                    <p class="mt-2 text-lg text-slate-500">Share your thoughts and connect with others</p>
                </div>
                <div class="hidden sm:block">
                    <span class="inline-flex items-center px-5 py-2 bg-pink-100/80 text-purple-700 rounded-full text-base font-semibold shadow">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                        Live Feed
                    </span>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-12 px-6 sm:px-8 lg:px-12">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-8 animate-fade-in-down">
                    <div class="bg-green-100/80 border-l-4 border-green-300 p-4 rounded-2xl shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-base font-semibold text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-12">
                <!-- Shoutout Form Section -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="bg-white/80 rounded-3xl shadow-xl overflow-hidden border border-pink-100 backdrop-blur-md">
                        <div class="p-8">
                            <div class="flex items-center space-x-5 mb-8">
                                <div class="h-14 w-14 rounded-full bg-gradient-to-br from-pink-200 via-green-100 to-purple-200 flex items-center justify-center text-white font-extrabold text-2xl shadow-lg">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-purple-700">{{ Auth::user()->name }}</h3>
                                    <p class="text-sm text-slate-400">Share your thoughts</p>
                                </div>
                            </div>

                            <form action="{{ url('/shoutout') }}" method="POST" class="space-y-5">
                                @csrf
                                <div class="relative">
                                    <textarea 
                                        id="message" 
                                        name="message" 
                                        class="w-full px-5 py-4 border-2 border-pink-100 rounded-2xl focus:ring-2 focus:ring-purple-200 focus:border-transparent transition-all resize-none bg-white/70 shadow"
                                        rows="4" 
                                        placeholder="What's on your mind?"
                                        required
                                    ></textarea>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" 
                                        class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-pink-200 via-green-100 to-purple-200 text-purple-800 font-bold rounded-2xl hover:from-pink-300 hover:to-purple-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-200 transform hover:scale-105 transition-all duration-200 shadow-lg"
                                    >
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                        </svg>
                                        Post Shoutout
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-white/80 rounded-3xl shadow-xl p-8 border border-pink-100 backdrop-blur-md">
                        <h3 class="text-lg font-bold text-purple-700 mb-6">Community Stats</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center p-5 bg-pink-50/80 rounded-2xl">
                                <div class="text-3xl font-extrabold text-pink-400">{{ count($shoutouts) }}</div>
                                <div class="text-sm text-slate-400">Total Shoutouts</div>
                            </div>
                            <div class="text-center p-5 bg-green-50/80 rounded-2xl">
                                <div class="text-3xl font-extrabold text-green-400">{{ now()->format('H:i') }}</div>
                                <div class="text-sm text-slate-400">Current Time</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shoutouts Feed -->
                <div class="lg:col-span-8">
                    <div class="space-y-8">
                        @foreach($shoutouts as $shoutout)
                            <div class="group bg-white/80 rounded-3xl shadow-lg hover:shadow-2xl border border-pink-100 transition-all duration-200 transform hover:-translate-y-1 backdrop-blur-md">
                                <div class="p-8">
                                    <div class="flex items-start space-x-6">
                                        <div class="flex-shrink-0">
                                            <div class="h-14 w-14 rounded-full bg-gradient-to-br from-pink-200 via-green-100 to-purple-200 flex items-center justify-center text-white font-extrabold text-2xl shadow-lg transform group-hover:scale-110 transition-transform duration-200">
                                                {{ substr($shoutout->username, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between mb-3">
                                                <h4 class="text-xl font-bold text-purple-700 truncate">{{ $shoutout->username }}</h4>
                                                <div class="flex items-center text-sm text-slate-400">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $shoutout->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                            <p class="text-slate-600 leading-relaxed mb-5 text-lg">{{ $shoutout->message }}</p>
                                            <!-- Interaction Buttons -->
                                            <div class="flex items-center space-x-14 border-t border-pink-100 pt-5">
                                                <button 
                                                    class="like-button flex items-center space-x-2 text-slate-400 hover:text-pink-400 transition-colors duration-200 px-4 py-2 text-lg"
                                                    data-shoutout-id="{{ $shoutout->id }}"
                                                >
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                    </svg>
                                                    <span class="font-semibold">Like</span>
                                                    <span class="likes-count text-base">(0)</span>
                                                </button>

                                                <button 
                                                    class="reply-button flex items-center space-x-2 text-slate-400 hover:text-green-400 transition-colors duration-200 px-4 py-2 text-lg"
                                                    data-shoutout-id="{{ $shoutout->id }}"
                                                >
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                    </svg>
                                                    <span class="font-semibold">Reply</span>
                                                    <span class="replies-count text-base">(0)</span>
                                                </button>

                                                
                                            </div>

                                            <!-- Reply Form (Hidden by default) -->
                                            <div class="reply-form hidden mt-5 pt-5 border-t border-pink-100">
                                                <form class="space-y-4">
                                                    <textarea 
                                                        class="w-full px-5 py-3 border-2 border-pink-100 rounded-xl focus:ring-2 focus:ring-green-200 focus:border-transparent transition-all resize-none bg-white/70 shadow"
                                                        rows="2"
                                                        placeholder="Write your reply..."
                                                    ></textarea>
                                                    <div class="flex justify-end space-x-4">
                                                        <button type="button" 
                                                            class="cancel-reply px-5 py-2 text-slate-400 hover:text-slate-600 border border-pink-100 rounded-xl hover:bg-pink-50 transition-colors"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button type="submit" 
                                                            class="px-8 py-2 bg-gradient-to-r from-green-100 to-purple-200 text-purple-800 font-bold rounded-xl hover:from-green-200 hover:to-purple-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-200 transform hover:scale-105 transition-all duration-200 shadow-lg"
                                                        >
                                                            Post Reply
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>

<style>
@keyframes fade-in-down {
    0% {
        opacity: 0;
        transform: translateY(-10px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-down {
    animation: fade-in-down 0.5s ease-out;
}

.like-button,
.reply-button,
.share-button {
    position: relative;
    transform: translateY(0);
    transition: all 0.2s cubic-bezier(.4,0,.2,1);
}

.like-button:hover {
    color: #f472b6 !important; /* pastel pink */
}
.reply-button:hover {
    color: #4ade80 !important; /* green-400 */
}

.share-button:hover {
    color: #fdba74 !important; /* orange-300 */
}

.like-button:hover,
.reply-button:hover,
.share-button:hover {
    transform: translateY(-2px) scale(1.05);
}

.like-button:active,
.reply-button:active,
.share-button:active {
    transform: translateY(0) scale(1);
}

.reply-form {
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s cubic-bezier(.4,0,.2,1);
}

.reply-form:not(.hidden) {
    opacity: 1;
    transform: translateY(0);
}

button[type="submit"] {
    position: relative;
    overflow: hidden;
}

button[type="submit"]::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(255,255,255,0.08), rgba(255,255,255,0));
    transform: translateY(-100%);
    transition: transform 0.3s cubic-bezier(.4,0,.2,1);
}

button[type="submit"]:hover::after {
    transform: translateY(0);
}

.reply-form button[type="submit"] {
    white-space: nowrap;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(form);
        const submitButton = form.querySelector('button[type="submit"]');
        
        // Disable button and show loading state
        submitButton.disabled = true;
        submitButton.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Posting...
        `;
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'same-origin'
        })
        .then(response => response.json())
        .then(data => {
            if (data.shoutoutsHtml) {
                document.querySelector('.space-y-8').innerHTML = data.shoutoutsHtml;
                form.reset();
                
                // Show success message
                const successAlert = document.createElement('div');
                successAlert.className = 'mb-8 animate-fade-in-down';
                successAlert.innerHTML = `
                    <div class="bg-green-100/80 border-l-4 border-green-300 p-4 rounded-2xl shadow">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-base font-semibold text-green-800">${data.successMessage}</p>
                            </div>
                        </div>
                    </div>
                `;
                
                const container = document.querySelector('main');
                container.insertBefore(successAlert, container.firstChild);
                
                // Remove success message after 3 seconds
                setTimeout(() => {
                    successAlert.remove();
                }, 3000);
            }
            
            // Reset button state
            submitButton.disabled = false;
            submitButton.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                Post Shoutout
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            
            // Reset button state
            submitButton.disabled = false;
            submitButton.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                Post Shoutout
            `;
        });
    });

    // Like Button Functionality
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function() {
            const shoutoutId = this.dataset.shoutoutId;
            const likesCount = this.querySelector('.likes-count');
            const currentCount = parseInt(likesCount.textContent.replace(/[()]/g, ''));
            
            // Toggle like state
            if (this.classList.contains('text-pink-400')) {
                this.classList.remove('text-pink-400');
                likesCount.textContent = `(${currentCount - 1})`;
            } else {
                this.classList.add('text-pink-400');
                likesCount.textContent = `(${currentCount + 1})`;
            }

            // Here you would typically make an API call to update the like status
            // fetch('/api/shoutouts/${shoutoutId}/like', { method: 'POST' });
        });
    });

    // Reply Button Functionality
    document.querySelectorAll('.reply-button').forEach(button => {
        button.addEventListener('click', function() {
            const shoutoutId = this.dataset.shoutoutId;
            const replyForm = this.closest('.flex-1').querySelector('.reply-form');
            
            // Toggle reply form visibility
            if (replyForm.classList.contains('hidden')) {
                // Hide all other reply forms first
                document.querySelectorAll('.reply-form').forEach(form => {
                    form.classList.add('hidden');
                });
                replyForm.classList.remove('hidden');
            } else {
                replyForm.classList.add('hidden');
            }
        });
    });

    // Cancel Reply Button Functionality
    document.querySelectorAll('.cancel-reply').forEach(button => {
        button.addEventListener('click', function() {
            const replyForm = this.closest('.reply-form');
            replyForm.classList.add('hidden');
        });
    });

    // Share Button Functionality
    document.querySelectorAll('.share-button').forEach(button => {
        button.addEventListener('click', async function() {
            const text = this.dataset.shoutoutText;
            
            try {
                if (navigator.share) {
                    await navigator.share({
                        title: 'Shared Shoutout',
                        text: text,
                        url: window.location.href
                    });
                } else {
                    // Fallback for browsers that don't support Web Share API
                    const tempInput = document.createElement('input');
                    tempInput.value = text;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    
                    // Show a temporary tooltip
                    this.querySelector('span').textContent = 'Copied!';
                    setTimeout(() => {
                        this.querySelector('span').textContent = 'Share';
                    }, 2000);
                }
            } catch (err) {
                console.error('Error sharing:', err);
            }
        });
    });
});
</script>
