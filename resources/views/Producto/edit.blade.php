<x-app-layout title="Editar Producto">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Editar Producto</h2>

        <form method="POST" action="{{ route('producto.update', $producto) }}">
            @csrf
            @method('PUT')
            @include('producto._form', ['producto' => $producto])

            <div class="mt-8 flex gap-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Actualizar</button>
                <a href="{{ route('producto.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>