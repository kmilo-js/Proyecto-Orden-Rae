<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ __('Ventas') }}
        </h2>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-6 bg-main min-h-screen">

        <!-- Barra de acciones y búsqueda -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

        <!-- Botón Nueva Venta (centrado) -->
        <div class="mx-auto">
            <a href="{{ route('venta.create') }}" class="inline-block px-6 py-2 btn-primary rounded-md font-semibold hover:bg-[#8c5a44] transition">Nueva Venta</a>
            </div>
            </div>
        </div>

        @if (session('ok'))
            <div class="mb-6 text-green-600 font-medium text-center">
                {{ session('ok') }}
            </div>
        @endif

        <!-- Tabla de ventas -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table id="ventas" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiempo Entrega</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo Cliente</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($ventas as $v)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $v->ID_VENTA }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $v->cliente_nombre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $v->Fecha_venta?->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($v->Total_venta, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $v->Estado_venta ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $v->tiempo_entrega }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $v->tipo_cliente }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('venta.edit', $v) }}" class="text-blue-600 hover:text-blue-900 mr-2">Editar</a>
                            <form method="POST" action="{{ route('venta.destroy', $v) }}" style="display:inline" onsubmit="return confirm('¿Eliminar esta venta?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- LOGO CENTRADO -->
        <div class="mt-12 flex justify-center">
            <img src="{{ asset('Img/Logo1 - ORDER RAE.png') }}" alt="Logo ORDER RAE" class="logo-footer">
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-main pt-8 pb-6 mt-12 border-t border-line">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Contacto -->
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wide mb-3">CONTACTO</h3>
                    <hr class="border-line w-10 mb-4">
                    <p class="text-sm text-[#5a4031] mb-2">📱 (+57) 319 330 0380</p>
                    <p class="text-sm text-[#5a4031] mb-2">📱 (+57) 316 671 2526</p>
                    <p class="text-sm text-[#5a4031]">📍 Cra. 13 # 65 - 10, Bogotá</p>
                </div>

                <!-- Información -->
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wide mb-3">INFORMACIÓN</h3>
                    <hr class="border-line w-10 mb-4">
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Quiénes somos</a></li>
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Términos y condiciones</a></li>
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Preguntas frecuentes</a></li>
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Contacto</a></li>
                    </ul>
                </div>

                <!-- Mi cuenta -->
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wide mb-3">MI CUENTA</h3>
                    <hr class="border-line w-10 mb-4">
                    <ul class="space-y-2">
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Acceder – Registrarse</a></li>
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Cambiar contraseña</a></li>
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Pedidos</a></li>
                        <li><a href="#" class="text-sm text-[#5a4031] hover:text-primary">Aceptación de términos y condiciones y políticas de datos</a></li>
                    </ul>
                </div>

                <!-- Síguenos -->
                <div>
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wide mb-3">SÍGUENOS</h3>
                    <hr class="border-line w-10 mb-4">
                    <div class="flex space-x-4">
                        <a href="#" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('Img/Instagram (2).png') }}" alt="Instagram" class="w-8 h-8 rounded-full p-1 bg-main">
                        </a>
                        <a href="#" class="hover:scale-110 transition-transform">
                            <img src="{{ asset('Img/Facebook (2).png') }}" alt="Facebook" class="w-8 h-8 rounded-full p-1 bg-main">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- DataTables CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(function() {
            $('#ventas').DataTable({
                pageLength: 10,
                dom: 'Bfrtip',
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
                },
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>

    <style>
        .bg-main { background-color: #f8f4f1; }
        .text-dark { color: #333; }
        .border-line { border-color: #a7927d; }
        .btn-primary { background-color: #764b36; color: white; }
        .btn-secondary { background-color: #e0e0e0; color: #333; }
        .logo-footer { width: 120px; height: auto; }
    </style>
</x-app-layout>