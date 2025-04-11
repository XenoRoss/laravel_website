<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogPost;
use League\CommonMark\CommonMarkConverter;

class PostController extends Controller
{
    public function index()
    {
        // Get the newest blog post
        // Orders post by created_at in descending order (most recent first)
        $mainPost = BlogPost::latest()->first();
        $recentPosts = collect(); // Always defined, even if empty - to avoid crashing

        // Get the next 5 most recent blog posts, excluding the main one
        // Also verifies that blog posts exist
        if ($mainPost) {
            $recentPosts = BlogPost::latest()
                ->where('id', '!=', $mainPost->id) // Exclude the main post ID
                ->take(5) // Limit to 5 posts
                ->get();
        }

        // Pass the results into the blog.index Blade view
        return view('blog.index', compact('mainPost', 'recentPosts')); // compact() is shorthand for passing variables into the Blade view
        // In other words:
        // “Render the file at resources/views/blog/index.blade.php, and give it access to two variables: $mainPost and $recentPosts.”
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail(); // firstOrFail() will throw a 404 if it doesn't exist

        // Send the post to a blog.show Blade view
        return view('blog.show', compact('post'));
    }

    public function create() // Simple function - just renders a form
    {
        return view('blog.create');
    }

    public function store(Request $request) // Stores the newly created blog file as a new entry in MySQL
    // Goal here is to validate the form data, generate $slug from the title, parse the markdown into clean HTML, save to the database, and redirect to the new post
    {
        // Start by validating the form data
        $validated = $request->validate([ // Calls the built in Laravel method for validating input
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Convert Markdown to HTML
        $converter = new CommonMarkConverter([ // Creates a new instance of the Markdown converter
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $rawMarkdown = $validated['body']; // Holds the raw HTML for editing
        $htmlBody = $converter->convert($validated['body'])->getContent(); // Holds the HTML-converted version of the post body

        // Save the post to the database
        $post = BlogPost::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'markdown_body' => $rawMarkdown,
            'body' => $htmlBody,
        ]);

        // Redirect to the blog post page
        return redirect()->route('blog.show', $post->slug)
                            ->with('success', 'Post created!');
    }

    public function edit($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail(); // Find a post by $slug - throws a 404 if not found

        return view('blog.edit', compact('post')); // Return a new blade view and pass post data to it
    }

    public function update(Request $request, $slug) // Request does a lot behind the scenes, but basically validates and extracts clean inputs
    {
        // Start by finding the post
        $post = BlogPost::where('slug', $slug)->firstOrFail();

        // Validate the input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Convert Markdown to HTML
        $converter = new CommonMarkConverter([ // Creates a new instance of the Markdown converter
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $rawMarkdown = $validated['body']; // Holds the raw HTML for editing
        $htmlBody = $converter->convert($validated['body'])->getContent(); // Holds the HTML-converted version of the post body

        // Update the post
        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'markdown_body' => $validated['body'],
            'body' => $htmlBody,
        ]);

        // Redirect back to the post
        return redirect()->route('blog.show', $post->slug)
                            ->with('success', 'Post updated!');
    }

    public function destroy($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $post->delete();

        return redirect()
            ->route('blog.index')
            ->with('success', 'Post deleted!');
    }
}