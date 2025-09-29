<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-6">Editar pedido</h2>

                <form action="{{ route('pedido.update', $pedido) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @include('pedido._form', [
                        'pedido' => $pedido,
                        'productos'   => $productos,
                        'usuarios'    => $usuarios,     
                    ])

                    <div class="pt-4 flex gap-3">
                        <button class="px-4 py-2 bg-red-600 text-white rounded">
                            Actualizar
                        </button>

                        <a href="{{ route('pedido.index') }}" class="px-4 py-2 border rounded">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>