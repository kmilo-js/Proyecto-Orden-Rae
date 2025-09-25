<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-8">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white p-6 shadow sm:rounded-lg">
                            @if ($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                    <strong>Errores de validación:</strong>
                                        <ul class="list-disc pl-5 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                            @endif
                            <form action="{{ route('inventario.update', $inventario) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('PUT')

                                @include('inventario._form', [
                                    'inventario' => $inventario,
                                    'usuarios' => $usuarios,
                                    'productos' => $productos,
                                ])

                                <div class="pt-4 flex gap-3">
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Actualizar</button>
                                    <a href="{{ route('inventario.index') }}"
                                        class="px-4 py-2 border rounded">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>