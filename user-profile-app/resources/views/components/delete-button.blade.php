<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600']) }} onclick="return confirm('Are you sure you want to delete?')">
    {{ $slot }}
</button>