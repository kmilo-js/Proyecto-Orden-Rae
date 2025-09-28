<div class="space-y-4">
    <!-- Código Producto -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Código *</label>
        <input type="text" name="Codigo_producto" value="{{ old('Codigo_producto', $producto?->Codigo_producto) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm @error('Codigo_producto') border-red-500 @enderror">
        @error('Codigo_producto')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Referencia -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Referencia *</label>
        <input type="text" name="Referencia_producto" value="{{ old('Referencia_producto', $producto?->Referencia_producto) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm @error('Referencia_producto') border-red-500 @enderror">
        @error('Referencia_producto')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Color -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Color</label>
        <input type="text" name="Color_producto" value="{{ old('Color_producto', $producto?->Color_producto) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
    </div>

    <!-- Precio -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Precio *</label>
        <input type="number" step="0.01" name="Precio_producto" value="{{ old('Precio_producto', $producto?->Precio_producto) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm @error('Precio_producto') border-red-500 @enderror">
        @error('Precio_producto')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Estado -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Estado *</label>
        <select name="Estado_producto" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm @error('Estado_producto') border-red-500 @enderror">
            <option value="">-- Seleccione --</option>
            <option value="activo" {{ (old('Estado_producto', $producto?->Estado_producto) == 'activo') ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ (old('Estado_producto', $producto?->Estado_producto) == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
        </select>
        @error('Estado_producto')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Categoría -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Categoría *</label>
        <select name="categoria_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm @error('categoria_id') border-red-500 @enderror">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $cat)
                <option value="{{ $cat->ID_CATEGORIA }}" {{ (old('categoria_id', $producto?->categoria_id) == $cat->ID_CATEGORIA) ? 'selected' : '' }}>
                    {{ $cat->Nombre_categoria }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Usuario -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Usuario *</label>
        <select name="usuarios_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm @error('usuarios_id') border-red-500 @enderror">
            <option value="">-- Seleccione --</option>
            @foreach ($usuarios as $u)
                <option value="{{ $u->ID_USUARIO }}" {{ (old('usuarios_id', $producto?->usuarios_id) == $u->ID_USUARIO) ? 'selected' : '' }}>
                    {{ $u->Nombres }} {{ $u->Apellidos }}
                </option>
            @endforeach
        </select>
        @error('usuarios_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>