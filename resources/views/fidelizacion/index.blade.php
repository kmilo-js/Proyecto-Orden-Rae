<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fidelización') }}
        </h2>
    </x-slot>

<div class="overflow-x-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Botón para agregar nuevo producto -->
                        <div class="flex justify-end p-2 mr-4">
                            <!--Url de la ruta para inventario.create-->
                            <a href="{{route('fidelizacion.create')}}"
                                class=" border border-black hover:bg-gray-300 font-bold rounded-md px-5 py-3"> 
                                Agregar nuevo cliente
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
                <!-- Tabla de productos -->
                <div>
                <table id="producto" class="w-full text-base border text-center text-gray-500 dark:text-gray-700">
                    <thead class="text-base text-gray-500 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th class="p-2">ID</th>
                            <th>Fecha de fidelizacion</th>
                            <th>Total de producto</th>
                            <th>Fecha de Creacion</th>
                            <th>Fecha de Actualización</th>
                            <th>Botón</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fidelizacion as $usuarios)
                            <tr class="bg-white border-b dark:border-gray-700 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="p-2">{{$usuarios->ID_FIDELIZACION}}</td>
                                <td>{{$usuarios->Fecha_de_fidelizacion}}</td>
                                <td>{{$usuarios->Total_de_producto}}</td>
                                <td>{{$usuarios->Created_at}}</td>
                                <td>{{$usuarios->Updated_at}}</td>
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