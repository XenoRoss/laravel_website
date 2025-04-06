<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->timestamps(); // Created at and updated at timestamps - auto-tracked by Laravel
            $table->string('title'); // Title of the blog post
            $table->string('slug')->unique(); // URL-friendly version of the title
            $table->longText('body'); // Main content of the blog post
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
