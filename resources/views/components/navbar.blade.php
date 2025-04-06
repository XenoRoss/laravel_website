@props(['showCreate' => false])

<nav class="fixed top-0 right-0 left-0 max-w-full">
    <div class="max-w-full bg-gray-200 dark:bg-gray-800">
        <div class="flex flex-col sm:flex-row sm:justify-between px-3 py-2">
            <!-- Left side, may replace with a logo eventually -->
            <a href="{{ route('home') }}" class="text-xl font-semibold text-gray-900 dark:text-white">Home</a>
            <!-- Right side, hide Create Post button behind auth and verifies if it's within the blog section-->
            <div class="flex flex-col sm:flex-row sm:justify-end space-x-4">
                @if($showCreate)
                    @auth
                        <a href="{{ route('blog.create') }}" class="text-xl font-semibold text-gray-900 dark:text-white">Create Post</a>
                    @endauth
                @endif
                <a href="{{ route('blog.index') }}" class="text-xl font-semibold text-gray-900 dark:text-white">Blog</a>
            </div>
        </div>
    </div>
</nav>
