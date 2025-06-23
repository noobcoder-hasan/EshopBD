<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-50 to-white py-8 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 space-y-6">
            <div class="flex justify-center mb-4">
                <x-application-logo class="h-12 w-12" />
            </div>
            <div class="mb-4 text-base text-gray-600 text-center">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>
            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
                @csrf
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex justify-end">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Confirm') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
