@php
    // Para edición, $usuario llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($usuario) ? ($usuario->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Nombres *</label>
            <input type="text" name="Nombres" value="{{ $val('Nombres') }}"
                    class="w-full border rounded px-3 py-2" required>
            @error('Nombres')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Apellidos *</label>
            <input type="text" name="Apellidos" value="{{ $val('Apellidos') }}"
                    class="w-full border rounded px-3 py-2" required>
            @error('Apellidos')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Documento *</label>
        <input type="text" name="Documento" value="{{ $val('Documento') }}"
                    class="w-full border rounded px-3 py-2" required>
        @error('Documento')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Correo electronico *</label>
        <input type="email" name="Correo_usuario" value="{{ $val('Correo_usuario') }}"
                class="w-full border rounded px-3 py-2" min="0" required>
        @error('Correo_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>