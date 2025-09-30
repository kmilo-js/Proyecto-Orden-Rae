@component('mail::message')
{{ __('You have been invited to join the :team team!', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('Si no tiene una cuenta, puede crear una haciendo clic en el botón de abajo. Después de crearla, puede hacer clic en el botón de aceptar la invitación en este correo electrónico para aceptar la invitación del equipo:') }}

@component('mail::button', ['url' => route('register')])
{{ __('Crear una cuenta') }}
@endcomponent

{{ __('Si ya tienes una cuenta, puedes aceptar esta invitación haciendo clic en el botón a continuación:') }}

@else
{{ __('Puedes aceptar esta invitación haciendo clic en el botón a continuación:') }}
@endif


@component('mail::button', ['url' => $acceptUrl])
{{ __('Aceptar invitación') }}
@endcomponent

{{ __('Si no esperaba recibir una invitación a este equipo, puede descartar este correo electrónico.') }}
@endcomponent
