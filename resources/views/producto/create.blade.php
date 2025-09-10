<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>
        <!-- 🚨 ALERTA DE ÉXITO -->
    @if(session('success'))
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md relative flex justify-between items-center" role="alert">
                <span class="font-semibold">{{ session('success') }}</span>
                <button onclick="this.parentElement.remove();" class="text-green-700 font-bold px-2">✕</button>
            </div>
        </div>
    @endif

    <div class="p-1 flex justify-center border border-transparent rounded-xl max-w-lg mt-10 mx-auto bg-white shadow-xl transform hover:scale-102 transition-all duration-300 ease-in-out">
        <form action="{{ route('producto.store') }}" method="POST" class="gap-6 w-full bg-[#efe7dd] p-8 rounded-lg shadow-lg">
            @csrf

            <div class="space-y-6">
                <!-- Referencia -->
                <div>
                    <label for="referencia" class="block text-[#764b36] text-lg font-semibold">Referencia:</label>
                    <input id="referencia" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="text" name="Referencia_producto">
                </div>

                <!-- Categoria -->
                <div>
                    <label for="categoria" class="block text-[#764b36] text-lg font-semibold">Categoría:</label>
                    <input id="categoria" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="text" name="Categoria_producto">
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-[#764b36] text-lg font-semibold">Color:</label>
                    <input id="color" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="text" name="Color_producto">
                </div>

                <!-- Cantidad -->
                <div>
                    <label for="cantidad" class="block text-[#764b36] text-lg font-semibold">Cantidad:</label>
                    <input id="cantidad" class="w-full p-4 rounded-lg border border-[#764b36] focus:ring-2 focus:ring-[#764b36] focus:outline-none transition-all duration-300" type="number" name="Cantidad_producto">
                </div>

                <!-- Botón de guardar -->
                <div class="flex justify-center mt-8">
                    <button type="submit" class="bg-[#764b36] text-white font-semibold py-3 px-8 rounded-lg transform hover:scale-105 hover:bg-[#5a3625] transition-all duration-200 ease-in-out shadow-md">
                        Guardar
                    </button>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>