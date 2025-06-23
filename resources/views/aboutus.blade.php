<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Us - EshopBD</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50">
        <!-- Navigation Component -->
        @include('layouts.navigation')

        <!-- Hero Section -->
        <div class="relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">About EshopBD</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Your trusted destination for quality products and exceptional shopping experiences. We're committed to bringing you the best in online retail.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mission & Values Section -->
        <div class="bg-white py-16">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                    <!-- Mission -->
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Our Mission</h2>
                        <p class="mt-6 text-lg leading-8 text-gray-600">
                            To revolutionize online shopping in Bangladesh by providing a seamless, secure, and satisfying shopping experience while supporting local businesses and artisans.
                        </p>
                    </div>
                    <!-- Values -->
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Our Values</h2>
                        <dl class="mt-6 space-y-4">
                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="flex size-7 items-center justify-center rounded-lg bg-indigo-600 text-white">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </dt>
                                <dd class="text-base leading-7 text-gray-600">Customer satisfaction is our top priority</dd>
                            </div>
                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="flex size-7 items-center justify-center rounded-lg bg-indigo-600 text-white">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </dt>
                                <dd class="text-base leading-7 text-gray-600">Quality and authenticity in every product</dd>
                            </div>
                            <div class="flex gap-x-4">
                                <dt class="flex-none">
                                    <span class="flex size-7 items-center justify-center rounded-lg bg-indigo-600 text-white">
                                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                </dt>
                                <dd class="text-base leading-7 text-gray-600">Innovation and continuous improvement</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="bg-gray-50 py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Leadership Team</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Meet the dedicated professionals who drive our vision forward and ensure we deliver excellence in every aspect of our service.
                    </p>
                </div>
                <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    <li>
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Leslie Alexander">
                        <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900">Leslie Alexander</h3>
                        <p class="text-base leading-7 text-indigo-600">Co-Founder / CEO</p>
                        <p class="mt-4 text-base leading-7 text-gray-600">15+ years of experience in e-commerce and retail innovation.</p>
                    </li>
                    <li>
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Michael Foster">
                        <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900">Michael Foster</h3>
                        <p class="text-base leading-7 text-indigo-600">Co-Founder / CTO</p>
                        <p class="mt-4 text-base leading-7 text-gray-600">Tech visionary with expertise in scalable platforms.</p>
                    </li>
                    <li>
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Sarah Johnson">
                        <h3 class="mt-6 text-lg font-semibold leading-8 text-gray-900">Sarah Johnson</h3>
                        <p class="text-base leading-7 text-indigo-600">Chief Operating Officer</p>
                        <p class="mt-4 text-base leading-7 text-gray-600">Operations expert focused on customer satisfaction.</p>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            Trusted by customers across Bangladesh
                        </h2>
                    </div>
                    <dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
                        <div class="flex flex-col bg-gray-50 p-8">
                            <dt class="text-sm font-semibold leading-6 text-gray-600">Active Customers</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">100K+</dd>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8">
                            <dt class="text-sm font-semibold leading-6 text-gray-600">Products Available</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">50K+</dd>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8">
                            <dt class="text-sm font-semibold leading-6 text-gray-600">Orders Delivered</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">500K+</dd>
                        </div>
                        <div class="flex flex-col bg-gray-50 p-8">
                            <dt class="text-sm font-semibold leading-6 text-gray-600">Customer Satisfaction</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">98%</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.footer')
    </body>
</html>