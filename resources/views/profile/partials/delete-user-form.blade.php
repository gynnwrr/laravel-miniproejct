<section class="space-y-6">
    <style>
        h2, p, label, .text-gray-900, .text-gray-600, .text-gray-800 {
            color: #743b3b !important;
        }
        input[type="password"] {
            background-color: #FFF5F7;
            border: 1px solid #D88C9A;
            color: #743b3b;
        }
        input:focus {
            border-color: #743b3b;
            box-shadow: 0 0 0 0.2rem rgba(116, 59, 59, 0.25);
        }
        .x-danger-button,
        .x-secondary-button {
            background-color: #743b3b !important;
            border-color: #743b3b !important;
            color: #FFF5F7 !important;
        }
        .x-danger-button:hover,
        .x-secondary-button:hover {
            background-color: #D88C9A !important;
            border-color: #D88C9A !important;
            color: white !important;
        }
    </style>

    <header>
        <h2 class="text-lg font-medium">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>