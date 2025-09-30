@php
    // Para edición, $inventario llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($inventario) ? ($inventario->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">
    <!-- Producto -->
    <div>
        <label class="block text-sm font-medium mb-1">Producto *</label>
        <select name="ID_PRODUCTO" class="w-full border rounded px-3 py-2" required>
            <option value="">Seleccione un producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->ID_PRODUCTO }}" 
                    {{ (old('ID_PRODUCTO', $inventario->ID_PRODUCTO ?? '') == $producto->ID_PRODUCTO) ? 'selected' : '' }}>
                    {{ $producto->Referencia_producto }}
                </option>
            @endforeach
        </select>
        @error('ID_PRODUCTO')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Cantidad -->
    <div>
        <label class="block text-sm font-medium mb-1">Cantidad de producto *</label>
        <input type="number" name="Cantidad" value="{{ old('Cantidad', $inventario->Cantidad ?? '') }}" class="w-full border rounded px-3 py-2" min="0" required>
        @error('Cantidad')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Usuario -->
    <div>
        <label class="block text-sm font-medium mb-1">Usuario Responsable *</label>
        <select name="usuarios_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->ID_USUARIO }}" 
                        {{ (old('usuarios_id', $inventario->usuarios_id ?? '') == $usuario->ID_USUARIO) ? 'selected' : '' }}>
                    {{ $usuario->Nombres }} {{ $usuario->Apellidos }}
                </option>
            @endforeach
        </select>
        @error('usuarios_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>