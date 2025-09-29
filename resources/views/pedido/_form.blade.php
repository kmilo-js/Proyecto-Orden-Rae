@php
    $val = fn($key, $default = '') => old($key, isset($pedido) ? ($pedido->{$key} ?? $default) : $default);
@endphp

<div class="space-y-6 max-w-3xl mx-auto p-6 bg-white rounded-xl shadow-lg">

    <!-- Fechas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Fecha de compra <span class="text-red-500">*</span>
            </label>
            <input
                type="date"
                name="Fecha_de_compra"
                value="{{ $val('Fecha_de_compra') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 shadow-sm"
                required>
            @error('Fecha_de_compra')
                <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Fecha de entrega <span class="text-red-500">*</span>
            </label>
            <input
                type="date"
                name="Fecha_de_entrega"
                value="{{ $val('Fecha_de_entrega') }}"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 shadow-sm"
                required
            >
            @error('Fecha_de_entrega')
                <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

    <!-- Productos (ahora como array) -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Productos del pedido <span class="text-red-500">*</span>
        </label>

        <!-- Mostrar productos existentes o al menos uno vacío -->
        @php
            $productosParaMostrar = old('productos', isset($pedido) ? $pedido->productos->map(function($p) {
                return [
                    'producto_id' => $p->ID_PRODUCTO,
                    'cantidad' => $p->pivot->Cantidad_solicitada
                ];
            })->values()->all() : [['producto_id' => null, 'cantidad' => 1]]);
        @endphp

        @foreach($productosParaMostrar as $index => $item)
            <div class="flex gap-4 mb-3 items-end">
                <div class="flex-1">
                    <select
                        name="productos[{{ $index }}][producto_id]"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                        <option value="">-- Selecciona un producto --</option>
                        @foreach ($productos as $producto)
                            <option
                                value="{{ $producto->ID_PRODUCTO }}"
                                @selected(($item['producto_id'] ?? null) == $producto->ID_PRODUCTO)
                            >
                                [{{ $producto->ID_PRODUCTO }}] {{ $producto->Referencia_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input
                        type="number"
                        name="productos[{{ $index }}][cantidad]"
                        value="{{ $item['cantidad'] ?? 1 }}"
                        min="1"
                        class="w-24 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                    >
                </div>
            </div>
        @endforeach

        @error('productos')
            <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Método de pago -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Método de pago <span class="text-red-500">*</span>
        </label>
        <select
            name="Metodo_pago"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 shadow-sm bg-white"
            required
        >
            <option value="" disabled {{ !$val('Metodo_pago') ? 'selected' : '' }}>
                -- Selecciona un método de pago --
            </option>
            <option value="credito" @selected($val('Metodo_pago') == 'credito')>
                Crédito
            </option>
            <option value="efectivo" @selected($val('Metodo_pago') == 'efectivo')>
                Efectivo
            </option>
            <option value="pago_movil" @selected($val('Metodo_pago') == 'pago_movil')>
                Pago Móvil
            </option>
            <option value="tarjeta" @selected($val('Metodo_pago') == 'tarjeta')>
                Tarjeta
            </option>
            <option value="transferencia" @selected($val('Metodo_pago') == 'transferencia')>
                Transferencia
            </option>
            <option value="voucher" @selected($val('Metodo_pago') == 'voucher')>
                Voucher
            </option>
        </select>
        @error('Metodo_pago')
            <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Total de pago -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Total de pago <span class="text-red-500">*</span>
        </label>
        <input
            type="number"
            name="Total_de_pago"
            value="{{ $val('Total_de_pago') }}"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 shadow-sm"
            required
            min="0"
            step="0.01"
        >
        @error('Total_de_pago')
            <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Estado del pedido -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Estado del pedido <span class="text-red-500">*</span>
        </label>
        <select
            name="Estado_pedido"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 shadow-sm bg-white"
            required
        >
            <option value="" disabled {{ !$val('Estado_pedido') ? 'selected' : '' }}>
                -- Selecciona un estado --
            </option>
            <option value="Cancelado" @selected($val('Estado_pedido') == 'Cancelado')>
                    Cancelado
            </option>
            <option value="Devuelto" @selected($val('Estado_pedido') == 'Devuelto')>
                    Devuelto
            </option>
            <option value="En proceso" @selected($val('Estado_pedido') == 'En proceso')>
                    En proceso
            </option>
            <option value="Entregado" @selected($val('Estado_pedido') == 'Entregado')>
                    Entregado
            </option>
            <option value="Enviado" @selected($val('Estado_pedido') == 'Enviado')>
                    Enviado
            </option>
            <option value="Pendiente" @selected($val('Estado_pedido') == 'Pendiente')>
                    Pendiente
            </option>
        </select>
        @error('Estado_pedido')
            <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <!-- Usuario Responsable -->
    <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Asignar a usuario <span class="text-red-500">*</span>
        </label>
        <select
            name="ID_USUARIO"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 shadow-sm bg-white"
            required
        >
            <option value="" disabled {{ !$val('ID_USUARIO') ? 'selected' : '' }}>
                -- Selecciona un usuario --
            </option>
            @foreach ($usuarios as $usuario)
                <option
                    value="{{ $usuario->ID_USUARIO }}"
                    @selected($val('ID_USUARIO') == $usuario->ID_USUARIO)
                >
                    [{{ $usuario->ID_USUARIO }}] {{ $usuario->Nombres }} {{ $usuario->Apellidos }}
                </option>
            @endforeach
        </select>
        @error('ID_USUARIO')
            <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                {{ $message }}
            </p>
        @enderror
    </div>

</div>