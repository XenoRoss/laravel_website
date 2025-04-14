<x-main-layout>
    <div class="my-3 px-6 py-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif    
    
        <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Edit Blog Post</h1>

        <form method="POST" action="{{ route('blog.update', $post->slug) }}">
            @csrf
            @method('PUT') <!-- HTML forms can't send PUT, so Laravel fakes it -->

            <label for="title" class="block font-medium text-gray-700 dark:text-gray-300">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full mb-4 dark:bg-gray-800">

            <label for="body" class="block font-medium text-gray-700 dark:text-gray-300">Body (Markdown):</label>
            <textarea id="body" name="body" rows="10" class="w-full mb-6 dark:bg-gray-800">{{ old('body', $post->markdown_body) }}</textarea>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Post
            </button>
        </form>
    </div>
</x-main-layout>
