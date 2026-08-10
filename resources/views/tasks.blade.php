{{-- 1. Point to your layout file folder path (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- 2. Pass a dynamic title string to the layout --}}
@section('title', 'Home Page')

{{-- 3. Inject this specific HTML code into the @yield('content') placeholder --}}
@section('content')

@auth
    <div class="flex justify-center flex-col items-center">
        <h1>Welcome {{ Auth::user()->name }}!</h1>
        <form method="POST" action="/logout" class="inline">
            @csrf
            <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
        </form>
        <p>Listing tasks...</p>
    </div>
@endauth

@guest
    <div class="flex justify-center flex-col items-center">
        <h1>You're not logged in!</h1>
        <form method="GET" action="/login" class="inline">
            @csrf
            <button type="submit" class="btn btn-ghost btn-sm">Login</button>
        </form>
        <p>To access the content of this page, please log in first.</p>
    </div>
@endguest

@endsection