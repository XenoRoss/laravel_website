<x-blog-layout>
    <div class="my-3 px-6 py-6"> 
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Write a New Blog Post</h1>

        <form method="POST" action="{{ route('blog.store') }}">
            @csrf

            <label for="title" class="block font-medium text-gray-700 dark:text-gray-300">Title:</label>
            <input type="text" id="title" name="title" class="w-full mb-4">

            <label for="body" class="block font-medium text-gray-700 dark:text-gray-300">Body (Markdown):</label>
            <textarea id="body" name="body" rows="10" class="w-full mb-6"></textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Publish
            </button>
        </form>
    </div>
</x-blog-layout>