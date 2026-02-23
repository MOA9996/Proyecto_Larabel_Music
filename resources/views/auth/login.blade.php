<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo electrónico')" class="text-fuchsia-900" />
            <x-text-input id="email" class="block mt-1 w-full border-fuchsia-300 focus:border-fuchsia-500 focus:ring-fuchsia-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-fuchsia-900" />
            <x-text-input id="password" class="block mt-1 w-full border-fuchsia-300 focus:border-fuchsia-500 focus:ring-fuchsia-500"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-fuchsia-300 text-fuchsia-600 shadow-sm focus:ring-fuchsia-500" name="remember">
                <span class="ms-2 text-sm text-fuchsia-700">{{ __('Recuérdame') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-fuchsia-600 hover:text-fuchsia-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-fuchsia-500" href="{{ route('password.request') }}">
                    {{ __('¿Contraseña olvidada?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Iniciar sesión') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
