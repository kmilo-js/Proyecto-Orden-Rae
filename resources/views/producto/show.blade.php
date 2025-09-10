<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Producto') }}
        </h2>
    </x-slot>
<p><strong>ID:</strong> {{ $producto->ID_PRODUCTO }}</p>
<p><strong>Referencia:</strong> {{ $producto->Referencia_producto }}</p>
<p><strong>Categoría:</strong> {{ $producto->Categoria_producto }}</p>
<p><strong>Color:</strong> {{ $producto->Color_producto }}</p>
<p><strong>Cantidad:</strong> {{ $producto->Cantidad_producto }}</p>
<p><strong>Fecha de Creación:</strong> {{ $producto->Created_at }}</p>
<a href="{{ route('producto.index') }}">Volver</a>
</x-app-layout>