@extends('layouts.main')
<!-- This tells Blade: “Use resources/views/layouts/main.blade.php as the base HTML layout.” -->

@section('content')
    {{ $slot }}
@endsection