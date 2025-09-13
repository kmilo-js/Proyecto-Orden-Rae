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
        <input type="text" name="calidad_producto" value="{{ $val('Cantidad_producto') }}"
                class="w-full border rounded px-3 py-2" min="0" required>
        @error('Estado_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Estado del producto *</label>
        <select name="Estado_producto" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Selecciona --</option>
            <option value="Disponible" @selected($val('Estado_producto') == 'Disponible')>Disponible</option>
            <option value="Agotado" @selected($val('Estado_producto') == 'Agotado')>Agotado</option>
            <option value="En Producción" @selected($val('Estado_producto') == 'En Producción')>En Producción</option>
        </select>
        @error('Estado_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
</div>