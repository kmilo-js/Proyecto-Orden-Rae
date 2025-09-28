<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark">Nueva Venta</h2>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-6 bg-main min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <form id="form-venta" method="POST" action="{{ route('venta.store') }}">
                @csrf

                <!-- Cliente -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-dark">Cliente</label>
                    <select name="cliente_id" required class="w-full mt-1 border border-gray-300 rounded-md p-2">
                        <option value="">Seleccionar cliente</option>
                        @foreach($clientes as $c)
                            <option value="{{ $c->ID_CLIENTE }}">{{ $c->nombres }} {{ $c->apellidos }} - {{ $c->Telefono_cliente }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Productos -->
                <h3 class="text-lg font-bold mt-6 mb-3 text-dark">Productos</h3>
                <div id="productos-container"></div>

                <button type="button" id="btn-agregar-producto" class="mt-2 bg-primary text-white px-3 py-1 rounded text-sm">
                    + Agregar producto
                </button>

                <!-- Campos adicionales de la venta -->
                @include('venta._form', ['venta' => null])

                <!-- Totales -->
                <div class="mt-6 p-4 bg-gray-100 rounded">
                    <div class="flex justify-between text-dark">
                        <span>Subtotal:</span>
                        <span id="subtotal">$0.00</span>
                    </div>
                    <div class="flex justify-between text-dark">
                        <span>IVA (19%):</span>
                        <span id="iva">$0.00</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg mt-2 text-dark">
                        <span>Total:</span>
                        <span id="total">$0.00</span>
                    </div>
                    <!-- Campo oculto para enviar el total calculado -->
                    <input type="hidden" name="Total_venta" id="total-input" value="0.00">
                </div>

                <!-- Botones -->
                <div class="mt-6 flex gap-3">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-medium">Registrar Venta</button>
                    <a href="{{ route('venta.index') }}" class="px-4 py-2 border border-gray-300 rounded text-dark">Cancelar</a>
                </div>
            </form>
        </div>

        <!-- Plantilla para productos dinámicos -->
        <template id="fila-producto">
            <div class="producto-item flex gap-2 mb-2 items-end">
                <select name="productos[__index__][id]" class="producto-select flex-1 border rounded p-2" required>
                    <option value="">Seleccionar producto</option>
                    @foreach($productos as $p)
                        <option value="{{ $p->ID_PRODUCTO }}" data-precio="{{ $p->Precio_producto }}">
                            {{ $p->Codigo_producto }} - {{ $p->Referencia_producto }} (${{ number_format($p->Precio_producto, 2) }})
                        </option>
                    @endforeach
                </select>
                <input type="number" name="productos[__index__][cantidad]" min="1" value="1" class="cantidad-input w-20 border rounded p-2" required>
                <input type="number" step="0.01" name="productos[__index__][precio]" class="precio-input w-24 border rounded p-2" required>
                <button type="button" class="btn-eliminar bg-red-500 text-white px-2 rounded">🗑️</button>
            </div>
        </template>

        <script>
            let contador = 0;

            function agregarFila() {
                const template = document.getElementById('fila-producto').content.cloneNode(true);
                const fragment = document.createDocumentFragment();
                const select = template.querySelector('.producto-select');
                const inputs = template.querySelectorAll('input');

                // Reemplazar __index__ por el índice actual
                select.name = select.name.replace('__index__', contador);
                inputs[0].name = inputs[0].name.replace('__index__', contador);
                inputs[1].name = inputs[1].name.replace('__index__', contador);

                // Evento al cambiar producto
                select.addEventListener('change', function() {
                    const option = this.options[this.selectedIndex];
                    const precio = option.dataset.precio || 0;
                    this.closest('.producto-item').querySelector('.precio-input').value = parseFloat(precio).toFixed(2);
                    calcularTotales();
                });

                // Eliminar fila
                template.querySelector('.btn-eliminar').addEventListener('click', function() {
                    this.closest('.producto-item').remove();
                    calcularTotales();
                });

                // Eventos para recalcular al cambiar cantidad o precio
                inputs[0].addEventListener('input', calcularTotales);
                inputs[1].addEventListener('input', function() {
                    this.value = this.value.replace(',', '.');
                    calcularTotales();
                });

                fragment.appendChild(template);
                document.getElementById('productos-container').appendChild(fragment);
                contador++;
            }

            function calcularTotales() {
                let subtotal = 0;
                document.querySelectorAll('.producto-item').forEach(item => {
                    const cantidad = parseFloat(item.querySelector('.cantidad-input').value) || 0;
                    const precio = parseFloat(item.querySelector('.precio-input').value) || 0;
                    subtotal += cantidad * precio;
                });
                const iva = subtotal * 0.19;
                const total = subtotal + iva;

                document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
                document.getElementById('iva').textContent = '$' + iva.toFixed(2);
                document.getElementById('total').textContent = '$' + total.toFixed(2);
                document.getElementById('total-input').value = total.toFixed(2); // 👈 Actualiza el input oculto
            }

            // Inicializar con una fila
            document.getElementById('btn-agregar-producto').addEventListener('click', agregarFila);
            agregarFila();

            // Validación antes del envío
            document.getElementById('form-venta').addEventListener('submit', function(e) {
                const productos = document.querySelectorAll('.producto-item');
                if (productos.length === 0) {
                    alert('Debes agregar al menos un producto.');
                    e.preventDefault();
                    return;
                }

                let hayError = false;
                productos.forEach(item => {
                    const cantidad = parseFloat(item.querySelector('.cantidad-input').value);
                    const precio = parseFloat(item.querySelector('.precio-input').value);

                    if (isNaN(cantidad) || isNaN(precio) || cantidad <= 0 || precio < 0) {
                        alert('Por favor, verifica que todos los productos tengan cantidad y precio válidos.');
                        e.preventDefault();
                        hayError = true;
                        return;
                    }
                });
            });
        </script>

        <style>
            .bg-main { background-color: #f8f4f1; }
            .text-dark { color: #333; }
            .border-line { border-color: #a7927d; }
            .btn-primary { background-color: #764b36; color: white; }
        </style>
    </main>
</x-app-layout>