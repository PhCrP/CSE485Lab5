<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600']) }} onclick="return confirm('Are you sure?')">
    {{ $slot }}
</button>
