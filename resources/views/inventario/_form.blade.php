@php
    // Para edición, $inventario llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($inventario) ? ($inventario->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium mb-1">Referencia *</label>
            <input type="text" name="Referencia_producto" value="{{ $val('Referencia_producto') }}"
                    class="w-full border rounded px-3 py-2" required>
            @error('Referencia_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Categoría *</label>
            <input type="text" name="Categoria_producto" value="{{ $val('Categoria_producto') }}"
                    class="w-full border rounded px-3 py-2" required>
            @error('Categoria_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Color *</label>
        <input type="text" name="Color_producto" value="{{ $val('Color_producto') }}"
                    class="w-full border rounded px-3 py-2" required>
        @error('Color_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Cantidad de producto *</label>
        <input type="text" name="Cantidad_producto" value="{{ $val('Cantidad_producto') }}"
                class="w-full border rounded px-3 py-2" min="0" required>
        @error('Cantidad_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Estado del producto *</label>
        <select name="Estado_producto" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="DISPONIBLE" @selected($val('Estado_producto') == 'DISPONIBLE')>DISPONIBLE</option>
            <option value="AGOTADO" @selected($val('Estado_producto') == 'AGOTADO')>AGOTADO</option>
            <option value="EN PRODUCCIÓN" @selected($val('Estado_producto') == 'ENPRODUCCIÓN')>EN PRODUCCIÓN</option>
        </select>
        @error('Estado_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Usuario Responsable *</label>
        <select name="usuarios_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->ID_USUARIO }}" @selected($val('usuarios_id') == $usuario->ID_USUARIO)>
                    {{ $u->ID_USUARIO }} {{ $usuario->Nombres }} {{ $usuario->Apellidos }} 
                </option>
            @endforeach
        </select>
        @error('usuarios_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
</div>