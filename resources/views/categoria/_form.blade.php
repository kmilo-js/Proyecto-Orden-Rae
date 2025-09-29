@php
    $val = fn($key, $default = '') => old($key, isset($categoria) ? ($categoria->{$key} ?? $default) : $default);
@endphp

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Nombre de categoría *</label>
        <input type="text" name="Nombre_categoria" value="{{ old('Nombre_categoria', $categoria->Nombre_categoria ?? '') }}"class="w-full border rounded px-3 py-2" required>
        @error('Nombre_categoria')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Estado de categoría *</label>
        <select name="Estado_categoria" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Seleccione --</option>
            <option value="activo" {{ (old('Estado_categoria', $categoria->Estado_categoria ?? '') == 'activo') ? 'selected' : '' }}>
                Activo
            </option>
            <option value="inactivo" {{ (old('Estado_categoria', $categoria->Estado_categoria ?? '') == 'inactivo') ? 'selected' : '' }}>
                Inactivo
            </option>
        </select>
        @error('Estado_categoria')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>