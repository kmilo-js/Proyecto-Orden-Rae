<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Botón para agregar nuevo pedido -->
            <div class="flex justify-end p-2 mr-4">
                <a href="{{ route('pedido.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Nuevo Pedido
                </a>

                <!-- ALERTA DE ÉXITO -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-4 flex justify-between items-center">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="text-green-500 hover:text-green-700 font-bold" onclick="this.parentElement.remove()">
                            ×
                        </button>
                    </div>
                @endif
            </div>

            <!-- Contenedor de DataTables con botones y buscador arriba -->
            <div class="p-4">
                <div class="mb-4">
                    <!-- Tabla -->
                    <table id="producto" class="min-w-full text-base border text-center text-gray-500 dark:text-gray-700">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">ID</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Usuarios</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Productos</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Cantidad</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Método de pago</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Total de pago</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Estado del pedido</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider" style="min-width: 120px;">Fecha de compra</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider" style="min-width: 120px;">Fecha de entrega</th>
                                <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pedidos as $pedido)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-4 py-3">{{ $pedido->ID_PEDIDO }}</td>

                                    <!-- Usuarios (una sola línea) -->
                                    <td class="px-4 py-3 truncate">
                                        @if($pedido->usuarios->isNotEmpty())
                                            @foreach($pedido->usuarios as $usuario)
                                                {{ $usuario->Nombres }} {{ $usuario->Apellidos }}
                                                @if (!$loop->last), @endif
                                            @endforeach
                                        @else
                                            <span class="text-gray-400">Sin usuario</span>
                                        @endif
                                    </td>

                                    <!-- Productos (una sola línea) -->
                                    <td class="px-4 py-3 truncate">
                                        @if($pedido->productos->isNotEmpty())
                                            @foreach($pedido->productos as $producto)
                                                {{ $producto->Referencia_producto }}
                                                @if (!$loop->last), @endif
                                            @endforeach
                                        @else
                                            <span class="text-gray-400">Sin productos</span>
                                        @endif
                                    </td>

                                    <!-- Cantidad (una sola línea) -->
                                    <td class="px-4 py-3">
                                        @if($pedido->productos->isNotEmpty())
                                            @foreach($pedido->productos as $producto)
                                                {{ $producto->pivot->Cantidad_solicitada }}
                                                @if (!$loop->last), @endif
                                            @endforeach
                                        @else
                                            <span class="text-gray-400">0</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">{{ $pedido->Metodo_pago }}</td>
                                    <td class="px-4 py-3">${{ number_format($pedido->Total_de_pago, 2, ',', '.') }}</td>
                                    <td class="px-4 py-3">{{ $pedido->Estado_pedido }}</td>
                                    <td class="px-4 py-3">{{ $pedido->Fecha_de_compra?->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3">{{ $pedido->Fecha_de_entrega?->format('d/m/Y') }}</td>

                                    <td class="px-4 py-3 flex space-x-2">
                                        <a href="{{ route('pedido.edit', $pedido->ID_PEDIDO) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1.5 px-3 rounded text-sm transition">
                                            Editar
                                        </a>
                                        <form action="{{ route('pedido.destroy', $pedido->ID_PEDIDO) }}" method="POST"
                                            onsubmit="return confirm('¿Deseas eliminar este pedido?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white font-medium py-1.5 px-3 rounded text-sm transition">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <!-- jQuery y DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Inicialización de DataTable -->
    <script>
        $(function() {
            var table = $('#producto').DataTable({
                pageLength: 20,
                dom: '<"flex justify-between items-center mb-3"<"flex space-x-2"B><"flex items-center"f>>rtip',
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        className: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-3 rounded-md text-sm'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        className: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-3 rounded-md text-sm'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        className: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-3 rounded-md text-sm'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        className: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-3 rounded-md text-sm'
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        className: 'bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-3 rounded-md text-sm'
                    }
                ],
                initComplete: function () {
                    // Personalizar el buscador
                    const searchInput = $('.dataTables_filter input');
                    searchInput
                        .addClass('border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-64')
                        .attr('placeholder', 'Buscar pedidos...');

                    // Quitar el texto "Buscar:" del label
                    $('.dataTables_filter label').contents().filter(function() {
                        return this.nodeType === 3;
                    }).remove();
                }
            });

            // Ajustar el contenedor para evitar espacio en blanco
            $('.dataTables_wrapper').css('padding', '0');
            $('.dataTables_info').css('margin-top', '1rem');
        });
    </script>

    <!-- Estilos personalizados -->
    <style>
        /* Encabezado oscuro */
        .bg-gray-800 {
            background-color: #1f2937;
        }
        .text-white {
            color: #ffffff;
        }

        /* Filas */
        .bg-white {
            background-color: #ffffff;
        }
        .divide-y > * + * {
            border-top: 1px solid #e5e7eb;
        }
        .hover\\:bg-gray-50:hover {
            background-color: #f9fafb;
        }

        /* Truncar texto para una sola línea */
        tr td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        td.truncate {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Acciones */
        .space-x-2 > * + * {
            margin-left: 0.5rem;
        }

        /* Botones de DataTables */
        .dt-button {
            margin: 0;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border-radius: 0.375rem;
            background-color: #e5e7eb;
            color: #374151;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .dt-button:hover {
            background-color: #d1d5db;
        }

        /* Paginación */
        .dataTables_paginate {
            margin-top: 1rem;
        }
        .dataTables_paginate .paginate_button {
            background: white;
            border: 1px solid #ddd;
            color: #333;
            padding: 6px 12px;
            margin: 0 2px;
            border-radius: 4px;
        }
        .dataTables_paginate .paginate_button.current {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }
    </style>
</x-app-layout>