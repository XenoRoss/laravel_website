@props([
    'title',
    'href',
    'image' => null,
    'openNewTab' => false,
])

<a href="{{ $href }}" target="{{ $openNewTab ? '_blank' : '_self' }}" class="group block transition-transform duration-300 hover:scale-105">
    <div class="bg-gray-500 rounded-lg text-center p-6 hover:shadow-lg transition-colors duration-300">
        @if ($image)
            <!-- If an image URL is provided, show the image -->
            <img src="{{ $image }}" alt="{{ $title }} Logo" class="mx-auto w-20 h-20 grayscale group-hover:grayscale-0 transition duration-300" />
        @elseif ($slot->isNotEmpty())
            <!-- If there's content provided within the component (e.g., SVG), render it -->
            <div class="text-white dark:text-gray-800">
                {{ $slot }}
            </div>
        @endif

        <p class="mt-4 text-white text-lg group-hover:text-blue-300 transition-colors duration-300">
            {{ $title }}
        </p>
    </div>
</a>