@extends('layouts.blog')
<!-- This tells Blade: “Use resources/views/layouts/blog.blade.php as the base HTML layout.” -->

@section('content')
    {{ $slot }}
@endsection