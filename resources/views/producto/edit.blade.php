<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="p-8 flex justify-center border border-transparent rounded-xl max-w-lg mt-10 mx-auto bg-white shadow-xl transform hover:scale-102 transition-all duration-300 ease-in-out">
        <form action="{{ route('producto.update', $producto->ID_PRODUCTO) }}" method="POST" class="gap-6 w-full bg-[#efe7dd] p-8 rounded-lg shadow-lg">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Referencia -->
                <div>
                    <label for="referencia" class="block text-[#764b36] text-lg font-semibold">Referencia:</label>
                    <input id="referencia" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="text" name="referencia" value="{{ $producto->Referencia_producto }}">
                </div>

                <!-- Categoria -->
                <div>
                    <label for="categoria" class="block text-[#764b36] text-lg font-semibold">Categoría:</label>
                    <input id="categoria" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="text" name="categoria" value="{{ $producto->Categoria_producto }}">
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-[#764b36] text-lg font-semibold">Color:</label>
                    <input id="color" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="text" name="color" value="{{ $producto->Color_producto }}">
                </div>

                <!-- Cantidad -->
                <div>
                    <label for="cantidad" class="block text-[#764b36] text-lg font-semibold">Cantidad:</label>
                    <input id="cantidad" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="number" name="cantidad" value="{{ $producto->Cantidad_producto }}">
                </div>

                <!-- Botón de actualizar -->
                <div class="flex justify-center mt-8">
                    <button type="submit" class="bg-[#764b36] text-white font-semibold py-3 px-8 rounded-lg transform hover:scale-105 hover:bg-[#5a3625] transition-all duration-200 ease-in-out shadow-md">
                        Actualizar
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>