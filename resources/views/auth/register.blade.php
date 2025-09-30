<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="Nombres" value="{{ __('Nombre') }}" />
                <x-input id="Nombres" class="block mt-1 w-full" type="text" name="Nombres" :value="old('Nombres')" required autofocus autocomplete="Nombres" />
            </div>

            <div>
                <x-label for="Apellidos" value="{{ __('Apellidos') }}" />
                <x-input id="Apellidos" class="block mt-1 w-full" type="text" name="Apellidos" :value="old('Apellidos')" required autocomplete="Apellidos" />
            </div>

            <div>
                <x-label for="Document" value="{{ __('Documento') }}" />
                <x-input id="Document" class="block mt-1 w-full" type="text" name="Document" :value="old('Document')" required autocomplete="Document" />
            </div>

            <div>
                <x-label for="Telefono" value="{{ __('Teléfono') }}" />
                <x-input id="Telefono" class="block mt-1 w-full" type="text" name="Telefono" :value="old('Telefono')" required autocomplete="Telefono" />
            </div>

            <div>
                <x-label for="Genero" value="{{ __('Género') }}" />
                <x-input id="Genero" class="block mt-1 w-full" type="text" name="Genero" :value="old('Genero')" required autocomplete="Genero" />
            </div>

            <div class="mt-4">
                <x-label for="Correo_usuario" value="{{ __('Email') }}" />
                <x-input id="Correo_usuario" class="block mt-1 w-full" type="email" name="Correo_usuario" :value="old('Correo_usuario')" required autocomplete="Correo_usuario" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#efe7dd]">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#efe7dd]">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#efe7dd]" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
