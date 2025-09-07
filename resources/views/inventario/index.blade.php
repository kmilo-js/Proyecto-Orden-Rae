<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventario') }}
        </h2>
    </x-slot>

<div class="py-5">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <!-- Título principal -->
        <h1 class="font-bold text-2xl m-4">Inventario</h1>
            <!-- Contenedor de búsqueda -->
                <div class="p-2 bg-white">
                    <label for="table-search"></label>
                    <!-- Ícono de búsqueda dentro del input -->
                    <div class="relative flex justify-between pr-4 pl-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <!-- Input de búsqueda -->
                        <input
                            type="search"
                            id="table-search"
                            class="pt-2 ps-10 text-sm border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-500  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Buscar Producto"
                        >
                        <!-- Botón para agregar nuevo producto -->
                        <div>
                            <a href="{{route('producto.create')}}"
                                class=" border border-black hover:bg-gray-300 font-bold rounded-md px-5 py-3"> 
                                Nuevo
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Tabla de productos -->
                <div>
                <table id="producto" class="w-full text-base border text-center text-gray-500 dark:text-gray-700">
                    <thead class="text-base text-gray-500 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th class="p-2">ID</th>
                            <th>Referencia</th>
                            <th>Categoria</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Estado del producto</th>
                            <th>Fecha de Creacion</th>
                            <th>Botón</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventario as $items)
                            <tr class="bg-white border-b dark:border-gray-700 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="p-2">{{$items->ID_INVENTARIO}}</td>
                                <td>{{$items->Referencia_producto}}</td>
                                <td>{{$items->Categoria_producto}}</td>
                                <td>{{$items->Color_producto}}</td>
                                <td>{{$items->Cantidad_producto}}</td>
                                <td>{{$items->Estado_producto}}</td>
                                <td>{{$items->Created_at}}</td>
                                <td class="px-6 py-4">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                        Editar
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-md">
                                        Eliminar
                                    </button>
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