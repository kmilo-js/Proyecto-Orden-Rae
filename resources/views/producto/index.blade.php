<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="overflow-x-auto">
        <div class="mx-auto sm:px-6 lg:px-8">

            <!-- NOTIFICACIONES -->
            @if(session('Ok'))
                <div class="mb-6 max-w-2xl mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md" role="alert">
                    <p class="font-bold">¡OK!</p>
                    <p>{{ session('Ok') }}</p>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-6 max-w-2xl mx-auto bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md flex justify-between items-start" role="alert">
                    <div>
                        <p class="font-bold">¡Éxito!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                    <button type="button" class="text-green-500 hover:text-green-700 font-bold text-xl" onclick="this.parentElement.remove()">
                        ×
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 max-w-2xl mx-auto bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-md" role="alert">
                    <p class="font-bold">¡Error!</p>
                    <ul class="list-disc list-inside mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Botón para agregar nuevo producto -->
            <div class="flex justify-end p-2 mr-4">
                <a href="{{ route('producto.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Nuevo Producto
                </a>
            </div>

            <!-- Tabla de productos -->
            <div>
                <table id="producto" class="w-full text-base border text-center text-gray-500 dark:text-gray-700">
                    <thead class="text-base text-gray-500 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="bg-white border-b dark:bg-[#efe7dd] text-black dark:border-gray-700 border-gray-200">
                            <th class="p-2">ID</th>
                            <th>Codigo</th>
                            <th>Referencia</th>
                            <th>Color</th>
                            <th>Precio de producto</th>
                            <th>Estado de producto</th>
                            <th>Fecha de Creacion</th>
                            <th>Usuario</th>
                            <th>Categoria</th>
                            <th>Botón</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($producto as $prod)
                            <tr class="bg-white border-b dark:border-gray-700 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="p-2">{{$prod->ID_PRODUCTO}}</td>
                                <td>{{$prod->Codigo_producto}}</td>
                                <td>{{$prod->Referencia_producto}}</td>
                                <td>{{$prod->Color_producto}}</td>
                                <td>{{$prod->Precio_producto}}</td>
                                <td>{{$prod->Estado_producto}}</td>
                                <td>{{ $prod->Created_at->format('d/m/Y H:i') }}</td>
                                <td>{{$prod->usuario?->Nombres ?? 'No asignado'}}</td>
                                <td>{{$prod->categorias?->Nombre_categoria ?? 'No asignado'}}</td>
                                <td class="px-6 py-4 gap-2 flex justify-center">
                                    <a href="{{ route('producto.edit', $prod) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                        Editar
                                    </a>
                                    <form action="{{ route('producto.destroy', $prod) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('¿Deseas eliminar este producto?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">
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

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">

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
            $('#producto').DataTable({
                pageLength: 20,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
</x-app-layout>