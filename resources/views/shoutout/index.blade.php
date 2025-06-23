<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-blue-50">
        <header class="bg-white shadow-sm border-b border-indigo-100">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-indigo-900">Community Shoutouts</h1>
                        <p class="mt-1 text-gray-600">Share your thoughts and connect with others</p>
                    </div>
                    <div class="hidden sm:block">
                        <span class="inline-flex items-center px-4 py-2 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                            </svg>
                            Live Feed
                        </span>
                    </div>
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-8 transform animate-fade-in-down">
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-12">
                <!-- Shoutout Form Section -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-indigo-50">
                        <div class="p-6">
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-r from-indigo-500 to-blue-500 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ Auth::user()->name }}</h3>
                                    <p class="text-sm text-gray-500">Share your thoughts</p>
                                </div>
                            </div>

                            <form action="{{ url('/shoutout') }}" method="POST" class="space-y-4">
                                @csrf
                                <div class="relative">
                                    <textarea 
                                        id="message" 
                                        name="message" 
                                        class="w-full px-4 py-3 border-2 border-indigo-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all resize-none"
                                        rows="4" 
                                        placeholder="What's on your mind?"
                                        required
                                    ></textarea>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" 
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105 transition-all duration-200 shadow-md"
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
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-indigo-50">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Community Stats</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-indigo-50 rounded-xl">
                                <div class="text-2xl font-bold text-indigo-600">{{ count($shoutouts) }}</div>
                                <div class="text-sm text-gray-600">Total Shoutouts</div>
                            </div>
                            <div class="text-center p-4 bg-blue-50 rounded-xl">
                                <div class="text-2xl font-bold text-blue-600">{{ now()->format('H:i') }}</div>
                                <div class="text-sm text-gray-600">Current Time</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shoutouts Feed -->
                <div class="lg:col-span-8">
                    <div class="space-y-6">
                        @foreach($shoutouts as $shoutout)
                            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-indigo-50 transition-all duration-200 transform hover:-translate-y-1">
                                <div class="p-6">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="h-12 w-12 rounded-full bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center text-white font-bold text-lg shadow-lg transform group-hover:scale-110 transition-transform duration-200">
                                                {{ substr($shoutout->username, 0, 1) }}
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between mb-2">
                                                <h4 class="text-lg font-semibold text-gray-900 truncate">{{ $shoutout->username }}</h4>
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    {{ $shoutout->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                            <p class="text-gray-700 leading-relaxed mb-4">{{ $shoutout->message }}</p>
                                            
                                            <!-- Interaction Buttons -->
                                            <div class="flex items-center space-x-12 border-t border-gray-100 pt-4">
                                                <button 
                                                    class="like-button flex items-center space-x-2 text-gray-500 hover:text-pink-600 transition-colors duration-200 px-3 py-2"
                                                    data-shoutout-id="{{ $shoutout->id }}"
                                                >
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                    </svg>
                                                    <span class="font-medium">Like</span>
                                                    <span class="likes-count text-sm">(0)</span>
                                                </button>

                                                <button 
                                                    class="reply-button flex items-center space-x-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 px-3 py-2"
                                                    data-shoutout-id="{{ $shoutout->id }}"
                                                >
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                                    </svg>
                                                    <span class="font-medium">Reply</span>
                                                    <span class="replies-count text-sm">(0)</span>
                                                </button>

                                                <button 
                                                    class="share-button flex items-center space-x-2 text-gray-500 hover:text-green-600 transition-colors duration-200 px-3 py-2"
                                                    data-shoutout-id="{{ $shoutout->id }}"
                                                    data-shoutout-text="{{ $shoutout->message }}"
                                                >
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                                    </svg>
                                                    <span class="font-medium">Share</span>
                                                </button>
                                            </div>

                                            <!-- Reply Form (Hidden by default) -->
                                            <div class="reply-form hidden mt-4 pt-4 border-t border-gray-100">
                                                <form class="space-y-4">
                                                    <textarea 
                                                        class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                                                        rows="2"
                                                        placeholder="Write your reply..."
                                                    ></textarea>
                                                    <div class="flex justify-end space-x-3">
                                                        <button type="button" 
                                                            class="cancel-reply px-4 py-2 text-gray-600 hover:text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors"
                                                        >
                                                            Cancel
                                                        </button>
                                                        <button type="submit" 
                                                            class="px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform hover:scale-105 transition-all duration-200 shadow-md"
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

/* Add smooth transitions for interaction buttons */
.like-button,
.reply-button,
.share-button {
    position: relative;
    transform: translateY(0);
    transition: all 0.2s ease;
}

.like-button:hover,
.reply-button:hover,
.share-button:hover {
    transform: translateY(-1px);
}

.like-button:active,
.reply-button:active,
.share-button:active {
    transform: translateY(0);
}

/* Reply form animation */
.reply-form {
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.reply-form:not(.hidden) {
    opacity: 1;
    transform: translateY(0);
}

/* Add styles for buttons */
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
    background: linear-gradient(rgba(255,255,255,0.1), rgba(255,255,255,0));
    transform: translateY(-100%);
    transition: transform 0.3s ease-out;
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
                document.querySelector('.space-y-6').innerHTML = data.shoutoutsHtml;
                form.reset();
                
                // Show success message
                const successAlert = document.createElement('div');
                successAlert.className = 'mb-8 transform animate-fade-in-down';
                successAlert.innerHTML = `
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">${data.successMessage}</p>
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
            if (this.classList.contains('text-pink-600')) {
                this.classList.remove('text-pink-600');
                likesCount.textContent = `(${currentCount - 1})`;
            } else {
                this.classList.add('text-pink-600');
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
