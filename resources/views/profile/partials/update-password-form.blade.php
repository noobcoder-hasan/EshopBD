<section>
    <header>
        <h2 class="text-xl font-bold text-indigo-900">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-base text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-7">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-indigo-800 font-semibold" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-2 block w-full rounded-lg border border-indigo-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200/50" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-indigo-800 font-semibold" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-2 block w-full rounded-lg border border-indigo-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200/50" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-indigo-800 font-semibold" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-2 block w-full rounded-lg border border-indigo-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200/50" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button class="px-6 py-2 text-base">{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
