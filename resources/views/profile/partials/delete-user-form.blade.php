<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-red-700">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-base text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-2 text-base bg-gradient-to-r from-red-500 to-red-700 hover:from-red-700 hover:to-red-500 shadow-lg"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 rounded-xl bg-white shadow-xl">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-red-700">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-base text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 rounded-lg border border-red-200 focus:border-red-500 focus:ring focus:ring-red-200/50"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-8 flex justify-end gap-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-6 py-2 text-base">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="px-6 py-2 text-base bg-gradient-to-r from-red-500 to-red-700 hover:from-red-700 hover:to-red-500 shadow-lg">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
