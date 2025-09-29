@props(['width' => 150, 'height' => 40])

<img src="{{ asset('Img/Logo3-orden.png') }}" 
      alt="Logo Orden Rae"
      {{ $attributes->merge(['width' => $width, 'height' => $height, 'class' => 'logo_principal']) }} />

