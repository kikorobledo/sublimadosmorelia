<x-guest-layout>

    <x-jet-authentication-card>

        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @if(session('message'))

            <div class="mb-4">

                <p class=" tracking-widest text-center" >{{ session('message') }}</p>

            </div>

        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('setpassword.store') }}">
            @csrf

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Guardar Contraseña') }}
                </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>

</x-guest-layout>
