@php
    // Para edición, $producto llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($producto) ? ($producto->{$key} ?? $default) : $default);
@endphp


<div class="space-y-4">
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Código *</label>
        <input type="text" name="Codigo_producto" value="{{ $val('Codigo_producto') }}"
            class="w-full border rounded px-3 py-2" required>
        @error('Codigo_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Referencia *</label>
        <input type="text" name="Referencia_producto" value="{{ $val('Referencia_producto') }}"
            class="w-full border rounded px-3 py-2" required>
        @error('Referencia_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Color del producto *</label>
        <input type="text" name="Color_producto" value="{{ $val('Color_producto') }}"
            class="w-full border rounded px-3 py-2" min="0" step="0.01" required>
        @error('Color_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>


    <div>
        <label class="block text-sm font-medium mb-1">Precio de producto *</label>
        <input type="number" name="Precio_producto" value="{{ $val('Precio_producto') }}"
            class="w-full border rounded px-3 py-2" min="0" step="0.01" required>
        @error('Precio_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Estado de producto</label>
        <select name="Estado_producto" class="w-full border rounded px-3 py-2">
            <option value="activo" {{ $val('Estado_producto') == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ $val('Estado_producto') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('Estado_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Categoría *</label>
        <select name="categoria_id" class="w-full border rounded px-3 py-2" required>
            <option value="">Seleccione una categoría</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->ID_CATEGORIA }}" @selected($val('categoria_id') == $cat->ID_CATEGORIA)>
                    {{ $cat->Nombre_categoria }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>


    <div>
        <label class="block text-sm font-medium mb-1">Usuario *</label>
        <select name="usuarios_id" class="w-full border rounded px-3 py-2" required>
            <option value="">Seleccione un usuario</option>
            @foreach($usuarios as $u)
                <option value="{{ $u->ID_USUARIO }}" @selected($val('usuarios_id') == $u->ID_USUARIO)>
                    [{{ $u->ID_USUARIO }}] {{ $u->Nombres }} {{ $u->Apellidos }}
                </option>
            @endforeach
        </select>
        @error('usuarios_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>