{{-- 1. Point to your layout file folder path (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- 2. Pass a dynamic title string to the layout --}}
@section('title', 'Home Page')

{{-- 3. Inject this specific HTML code into the @yield('content') placeholder --}}
@section('content')
    <div class="flex justify-center">
        <h1>Welcome to My Website</h1>
        <p>This unique page content will display right beneath your always-visible navigation bar!</p>
    </div>
@endsection