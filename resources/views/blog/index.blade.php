<x-main-layout :showCreate="true">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 px-6">
        <!-- Main Blog Post: spans 9 of 12 columns on large screens -->
        <div class="lg:col-span-9 max-w-3xl w-full mx-auto">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                <a href="{{ route('blog.show', $mainPost->slug) }}">{{ $mainPost->title }}</a>
            </h1>
            <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
                Posted on {{ $mainPost->created_at->format('F j, Y') }}
            </p>
            @if ($mainPost->created_at != $mainPost->updated_at)
                <p class="text-sm text-gray-400">
                    Edited: {{ $mainPost->updated_at->format('F j, Y') }}
                </p>
            @endif
            <div class="prose dark:prose-invert">
                {!! $mainPost->body !!}
            </div>
        </div>

        <!-- Sidebar: occupies 3 of 12 columns on large screens -->
        <div class="lg:col-span-3 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg sticky top-20">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                Recent Posts
            </h2>
            <ul class="space-y-3">
                @foreach ($recentPosts as $post)
                    <li>
                        <a href="{{ route('blog.show', $post->slug) }}"
                           class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                            {{ $post->title }}
                        </a>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $post->created_at->format('M j, Y') }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-main-layout>
