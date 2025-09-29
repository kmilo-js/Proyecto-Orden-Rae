<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Editar Categoría</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('categoria._form', ['categoria' => $categoria])

                    <div class="pt-4 flex gap-3">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
                        <a href="{{ route('categorias.index') }}" class="px-4 py-2 border rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>