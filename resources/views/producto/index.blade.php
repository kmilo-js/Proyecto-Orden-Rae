<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Título principal -->
        <h1>Listado de Productos</h1>
        <div>
            <!-- Contenedor de búsqueda y filtro -->
            <div class="bg-gray-100 rounded-lg">
                <div class="pb-2 pt-2 pl-2 bg-white  flex items-center gap-2">
                    <label for="table-search" class="sr-only">Search</label>
                    <!-- Ícono de búsqueda dentro del input -->
                    <div class="relative flex">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <!-- Input de búsqueda -->
                        <input
                            type="text"
                            id="table-search"
                            class="block pt-2 ps-10 text-sm border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:placeholder-gray-500  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items"
                        >
                        <!-- Botón desplegable -->
                        <button
                            id="dropdownRadioButton"
                            data-dropdown-toggle="dropdownRadio"
                            class="inline-flex items-center text-gray-800 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5  dark:border-gray-600 dark:hover:bg-gray-300 dark:hover:border-gray-600 "
                            type="button"
                        >
                            <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"
                                />
                            </svg>
                            Last 30 days
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                    </div>
                </div>
                <!-- Tabla de productos -->
                <div>
                <table id="producto" class="w-full text-base border text-center text-gray-500 dark:text-gray-700">
                    <thead class="text-base text-gray-500 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th class="p-2">Referencia</th>
                            <th>Categoria</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Fecha de Creacion</th>
                            <th>Botón</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr class="bg-white border-b dark:border-gray-700 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="p-2">{{$producto->Referencia_producto}}</td>
                                <td>{{$producto->Categoria_producto}}</td>
                                <td>{{$producto->Color_producto}}</td>
                                <td>{{$producto->Cantidad_producto}}</td>
                                <td>{{$producto->Created_at}}</td>
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