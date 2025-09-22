@php
    $val = fn($key, $default = '') => old($key, isset($fidelizacion) ? ($fidelizacion->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium mb-1">Fecha de fidelización *</label>
        <input type="date" name="Fecha_de_fidelizacion" value="{{ $val('Fecha_de_fidelizacion') ? $val('Fecha_de_fidelizacion')->format('Y-m-d') : '' }}"
            class="w-full border rounded px-3 py-2" required>
        @error('Fecha_de_fidelizacion')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Total de producto *</label>
        <input type="number" name="Total_de_producto" value="{{ $val('Total_de_producto') }}"
            class="w-full border rounded px-3 py-2" min="0" required>
        @error('Total_de_producto')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
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
</div>