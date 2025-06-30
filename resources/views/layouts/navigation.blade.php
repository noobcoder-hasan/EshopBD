<nav x-data="{ open: false }" class="bg-white/70 border-b border-gray-100 shadow-lg backdrop-blur-md rounded-b-2xl sticky top-0 z-30 transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-12 w-auto fill-current text-indigo-700 drop-shadow-xl transition-transform duration-300 hover:scale-110" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:-my-px sm:ms-10 space-x-6">
                    <div class="flex items-center space-x-6">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <i class="fa-solid fa-house mr-2 text-indigo-500"></i>{{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
                            <i class="fa-solid fa-blog mr-2 text-indigo-500"></i>{{ __('Blogs') }}
                        </x-nav-link>
                        <x-nav-link :href="route('compare.index')" :active="request()->routeIs('compare.index')">
                            <i class="fa-solid fa-code-compare mr-2 text-indigo-500"></i>{{ __('Compare') }}
                        </x-nav-link>
                        <x-nav-link :href="route('shoutout.index')" :active="request()->routeIs('shoutout.index')">
                            <i class="fa-solid fa-bullhorn mr-2 text-indigo-500"></i>{{ __('Shoutout') }}
                        </x-nav-link>
                        <x-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')">
                            <i class="fa-solid fa-cart-shopping mr-2 text-indigo-500"></i>{{ __('Cart') }}
                        </x-nav-link>
                        <x-nav-link :href="route('my.orders')" :active="request()->routeIs('cart.show')">
                            <i class="fa-solid fa-box mr-2 text-indigo-500"></i>{{ __('MyOrders') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-5 font-semibold rounded-xl text-gray-600 bg-white/80 hover:text-indigo-700 hover:bg-indigo-50 focus:outline-none transition ease-in-out duration-150 shadow">
                            <div>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</div>
                            <div class="ms-2">
                                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fa-solid fa-user-pen mr-2 text-indigo-500"></i>{{ __('Profile') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket mr-2 text-indigo-500"></i>{{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none focus:bg-indigo-100 focus:text-indigo-700 transition duration-150 ease-in-out">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-house mr-2 text-indigo-500"></i>{{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
                <i class="fa-solid fa-blog mr-2 text-indigo-500"></i>{{ __('Blogs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('compare.index')" :active="request()->routeIs('compare.index')">
                <i class="fa-solid fa-code-compare mr-2 text-indigo-500"></i>{{ __('Compare') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('shoutout.index')" :active="request()->routeIs('shoutout.index')">
                <i class="fa-solid fa-bullhorn mr-2 text-indigo-500"></i>{{ __('Shoutout') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cart.show')" :active="request()->routeIs('cart.show')">
                <i class="fa-solid fa-cart-shopping mr-2 text-indigo-500"></i>{{ __('Cart') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('my.orders')" :active="request()->routeIs('cart.show')">
                <i class="fa-solid fa-box mr-2 text-indigo-500"></i>{{ __('MyOrders') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-semibold text-lg text-gray-800">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::check() ? Auth::user()->email: 'Guest' }}</div>
            </div>
            <div class="mt-3 space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <i class="fa-solid fa-user-pen mr-2 text-indigo-500"></i>{{ __('Profile') }}
                </x-responsive-nav-link>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket mr-2 text-indigo-500"></i>{{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</nav>
