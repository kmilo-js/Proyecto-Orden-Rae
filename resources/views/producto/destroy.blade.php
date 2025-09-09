<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Eliminar Producto') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10 border border-gray-400 p-8 rounded-lg ">
    <form action="{{ route('producto.update', $producto->ID_PRODUCTO) }}" method="POST" class="p-6 flex flex-col gap-2 w-full">
        @csrf
        @method('PUT')
        <label >Referencia:</label>
        <input class="p-3" type="text" name="Referencia_producto" value="{{ $producto->Referencia_producto }}" required>
        <label>Categoría:</label>
        <input class="p-3" type="text" name="Categoria_producto" value="{{ $producto->Categoria_producto }}" required>
        <label>Color:</label>
        <input class="p-3" type="text" name="Color_producto" value="{{ $producto->Color_producto }}" required>
        <label>Cantidad:</label>
        <input class="p-3" type="number" name="Cantidad_producto" value="{{ $producto->Cantidad_producto }}" required>
    </form>
        <div class="flex justify-center mt-6">
            <a href="{{route('producto.index')}}"
            class="border border-black bg-white hover:bg-gray-300 text-black font-bold py-2 px-4 rounded-md ">
            Borrar</a>
        </div>
    </div>
</x-app-layout>