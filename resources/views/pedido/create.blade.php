<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-6">Crear Nuevo Pedido </h2>

                <form action="{{ route('pedido.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @include('pedido._form', [
                        'pedido' => null,
                        'productoS'   => $productos,
                        'usuarios'    => $usuarios,
                    ])
                    <div class="pt-4 flex gap-3">
                        <button
                            type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 transition">
                            Guardar
                        </button>
                        <a href="{{ route('pedido.index') }}"
                        class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>