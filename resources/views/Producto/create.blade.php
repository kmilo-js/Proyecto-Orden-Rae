<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark">Crear Producto</h2>
    </x-slot>

    <main class="px-4 sm:px-6 lg:px-8 py-6 bg-main min-h-screen">
        
        <!-- Contenedor del formulario -->
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-dark">Crear Producto</h2>

            <form method="POST" action="{{ route('producto.store') }}">
                @csrf

                @include('producto._form', ['producto' => null])

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-medium">Guardar</button>
                    <a href="{{ route('producto.index') }}" class="px-4 py-2 border border-gray-300 rounded text-dark">Cancelar</a>
                </div>
            </form>
        </div>

        <!-- Estilos personalizados -->
        <style>
            .bg-main { background-color: #f8f4f1; }
            .text-dark { color: #333; }
            .border-line { border-color: #a7927d; }
            .btn-primary { background-color: #764b36; color: white; }
        </style>
    </main>
</x-app-layout>