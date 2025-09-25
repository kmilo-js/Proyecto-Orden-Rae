@php
    $val = fn($key, $default = '') => old($key, isset($usuario) ? optional($usuario)->{$key} ?? $default : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Nombres *</label>
            <input type="text" name="Nombres" value="{{ $val('Nombres') }}"
                class="w-full border rounded px-3 py-2" required
                placeholder="Ingrese sus nombres" autocomplete="given-name">
            @error('Nombres')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Apellidos *</label>
            <input type="text" name="Apellidos" value="{{ $val('Apellidos') }}"
                class="w-full border rounded px-3 py-2" required
                placeholder="Ingrese sus apellidos" autocomplete="family-name">
            @error('Apellidos')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Documento *</label>
        <input type="text" name="Documento" value="{{ $val('Documento') }}"
            class="w-full border rounded px-3 py-2" required
            placeholder="Ingrese su número de documento" autocomplete="off">
        @error('Documento')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Correo electrónico *</label>
        <input type="email" name="Correo_usuario" value="{{ $val('Correo_usuario') }}"
            class="w-full border rounded px-3 py-2" required
            placeholder="ejemplo@correo.com" autocomplete="email">
        @error('Correo_usuario')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <!-- Campos adicionales -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Teléfono</label>
            <input type="tel" name="Telefono" value="{{ $val('Telefono') }}"
                class="w-full border rounded px-3 py-2"
                placeholder="Ej: 3001234567">
            @error('Telefono')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Género</label>
            <select name="Genero" class="w-full border rounded px-3 py-2">
                <option value="">Seleccionar</option>
                <option value="M" {{ $val('Genero') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $val('Genero') == 'F' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ $val('Genero') == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('Genero')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Rol *</label>
        <select name="roles_id" class="w-full border rounded px-3 py-2" required>
            @foreach($roles as $rol)
                <option value="{{ $rol->ID_ROL }}" 
                        {{ (isset($usuario) && $usuario->roles_id == $rol->ID_ROL) ? 'selected' : '' }}>
                    {{ $rol->Nombre_rol }}
                </option>
            @endforeach
        </select>
        @error('roles_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Estado</label>
        <select name="Estado" class="w-full border rounded px-3 py-2">
            <option value="Activo" {{ $val('Estado', 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Inactivo" {{ $val('Estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('Estado')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>