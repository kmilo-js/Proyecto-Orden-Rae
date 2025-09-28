<div class="mb-4">
    <label class="block text-sm font-medium text-dark">Fecha de Venta</label>
    <input type="date" name="Fecha_venta" 
           value="{{ old('Fecha_venta') }}"
           class="w-full mt-1 border border-gray-300 rounded-md p-2">
    @error('Fecha_venta')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-dark">Estado de Venta</label>
    <select name="Estado_venta" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
        <option value="">Seleccionar...</option>
        <option value="completada" {{ old('Estado_venta') == 'completada' ? 'selected' : '' }}>Completada</option>
        <option value="pendiente" {{ old('Estado_venta') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="cancelada" {{ old('Estado_venta') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
    </select>
    @error('Estado_venta')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-dark">Tiempo de entrega</label>
    <select name="pedido_id" class="w-full mt-1 border border-gray-300 rounded-md p-2">
        <option value="">Seleccionar...</option>
        <option value="1" {{ old('pedido_id') == '1' ? 'selected' : '' }}>1 día</option>
        <option value="2" {{ old('pedido_id') == '2' ? 'selected' : '' }}>8 días</option>
        <option value="3" {{ old('pedido_id') == '3' ? 'selected' : '' }}>15 días</option>
        <option value="4" {{ old('pedido_id') == '4' ? 'selected' : '' }}>20 días </option>
        <option value="5" {{ old('pedido_id') == '5' ? 'selected' : '' }}>60 días </option>
    </select>
    @error('pedido_id')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-dark">Tipo de Cliente</label>
    <select name="fidelizacion_id" class="w-full mt-1 border border-gray-300 rounded-md p-2" required>
        <option value="">Seleccionar...</option>
        <option value="1" {{ old('fidelizacion_id') == '1' ? 'selected' : '' }}>Final</option>
        <option value="2" {{ old('fidelizacion_id') == '2' ? 'selected' : '' }}>Frecuente</option>
        <option value="3" {{ old('fidelizacion_id') == '3' ? 'selected' : '' }}>Mayorista</option>
    </select>
    @error('fidelizacion_id')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
</div>