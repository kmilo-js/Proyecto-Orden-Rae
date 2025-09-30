<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-marron-oscuro border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#efe7dd] focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-200 transition-colors duration-300 ease-in-out transform hover:bg-[#764b36] hover:scale-105']) }}>
    {{ $slot }}
</button>
