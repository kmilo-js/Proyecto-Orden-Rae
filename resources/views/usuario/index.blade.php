<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

<div class="py-5">
    <div class="mx-auto sm:px-6 lg:px-8">
            <!-- Botón para agregar nuevo usuario-->
                <div class="flex justify-end p-2 mr-4" >                    
                        <!--Url de la ruta para usuario.create-->                        
                        <a href="{{ route('usuario.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 transition ease-in-out duration-150">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Nuevo Usuario
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
                <!-- Tabla de usuarios -->
                <div>
                <table id="producto" class="w-full text-base border text-center text-gray-500 dark:text-gray-700">
                    <thead class="text-base text-gray-500 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th class="p-2">ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Documento</th>
                            <th>Correo electronico</th>
                            <th>Contrase de usuario</th>
                            <th>Genero</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                            <th>Fecha de Creacion</th>
                            <th>Botón</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $user)
                            <tr class="bg-white border-b dark:border-gray-700 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-300">
                                <td class="p-2">{{$user->ID_USUARIO}}</td>
                                <td>{{$user->Nombres}}</td>
                                <td>{{$user->Apellidos}}</td>
                                <td>{{$user->Documento}}</td>
                                <td>{{$user->Correo_usuario}}</td>
                                <td>{{$user->Contrase_usuario}}</td>
                                <td>{{$user->Genero}}</td>
                                <td>{{$user->Telefono}}</td>
                                <td>{{$user->Estado}}</td>
                                <td>{{$user->Created_at}}</td>
                                <td class="px-6 py-4 gap-2 flex justify-center">
                                    <a href="{{ route('usuario.edit', $user) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                        Editar
                                    </a>
                                    <form action="{{ route('usuario.destroy', $user) }}" method="POST"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md"
                                        style="display:inline" onsubmit="return confirm('¿Deseas eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Eliminar</button>
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