<x-blog-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Post Title -->
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $post->title }}
        </h1>
        <div> <!-- Administrator Controls -->
            <!-- Edit Button -->
            @auth
                <div class="flex items-center gap-4 mb-4">
                    <div>
                        <a href="{{ route('blog.edit', $post->slug) }}"
                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white-800 font-semibold py-2 px-4 rounded">
                            Edit Post
                        </a>
                    </div>
                    <form action="{{ route('blog.destroy', $post->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white-800 font-semibold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
            @endauth
        </div>

        <!-- Date -->
        <p class="text-gray-600 dark:text-gray-400 text-sm mb-6">
            Posted on {{ $post->created_at->format('F j, Y') }}
            @if ($post->created_at != $post->updated_at)
                <span class="ml-2 italic">(Updated: {{ $post->updated_at->format('F j, Y') }})</span>
            @endif
        </p>

        <!-- Body Content -->
        <div class="prose dark:prose-invert max-w-none">
            <!-- Pulls the value from the body column of the blog_posts DB table, using the $post model passed into the Blade view -->
            {!! $post->body !!}
        </div>
    </div>
</x-blog-layout>