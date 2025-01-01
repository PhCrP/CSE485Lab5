<button type="{{ $type ?? 'button' }}" 
    class="px-4 py-2 bg-{{ $color ?? 'blue' }}-600 text-white rounded-lg hover:bg-{{ $color ?? 'blue' }}-700 focus:outline-none focus:ring-2 focus:ring-{{ $color ?? 'blue' }}-500 {{ $size ?? 'sm' }}">
    {{ $slot }}
</button>
