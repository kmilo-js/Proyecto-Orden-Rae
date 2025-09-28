<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <h2 class="text-2xl font-bold mb-6">Editar Venta #{{ $venta->ID_VENTA }}</h2>

               <form method="POST" action="{{ route('venta.update', $venta->ID_VENTA) }}">
                    @csrf @method('PUT')
                    @include('venta._form', ['venta' => $venta])
                    <div class="mt-6 flex gap-3">
                        <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-medium">Actualizar Venta</button>
                        <a href="{{ route('venta.index') }}" class="px-4 py-2 border border-gray-300 rounded text-dark">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>