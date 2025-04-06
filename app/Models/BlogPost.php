<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    // Allow these fields to be mass-assigned (important for create() and form submissions)
    protected $fillable = [
        'title',
        'slug',
        'body',
        'markdown_body'
    ];
}