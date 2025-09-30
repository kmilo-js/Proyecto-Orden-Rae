@php
    // Para edición, $produccion llega definido; en creación es null.
    $val = fn($key, $default = '') => old($key, isset($produccion) ? ($produccion->{$key} ?? $default) : $default);
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
        <label class="block text-sm font-medium mb-1">Material del producto *</label>
        <input type="text" name="Material_producto" value="{{ $val('Material_producto') }}"
                class="w-full border rounded px-3 py-2" required>
        @error('Material_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Cantidad de producto *</label>
        <input type="number" name="Cantidad_producto" value="{{ $val('Cantidad_producto') }}"
                class="w-full border rounded px-3 py-2" min="0" required>
        @error('Cantidad_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Usuario *</label>
        <select name="usuarios_id" class="w-full border rounded px-3 py-2" required>
            <option value="">Seleccione un usuario</option>
            @foreach($usuarios as $u)
                <option value="{{ $u->ID_USUARIO }}" @selected($val('usuarios_id') == $u->ID_USUARIO)>
                    {{ $u->ID_USUARIO }} {{ $u->Nombres }} {{ $u->Apellidos }}
                </option>
            @endforeach
        </select>
        @error('usuarios_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Producto *</label>
        <select name="producto_id" class="w-full border rounded px-3 py-2" required>
            @foreach($productos as $p)
                <option value="{{ $p->ID_PRODUCTO }}" @selected($val('productos_id') == $p->ID_PRODUCTO)>
                    {{ $p->Referencia_producto }} 
                </option>
            @endforeach
        </select>
        @error('productos_id')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

</div>