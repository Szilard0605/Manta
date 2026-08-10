{{-- 1. Point to your layout file folder path (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- 2. Pass a dynamic title string to the layout --}}
@section('title', 'Home Page')

{{-- 3. Inject this specific HTML code into the @yield('content') placeholder --}}
@section('content')
    <div class="text-[5vh] flex flex-col justify-centet items-center">
        <strong>Új feladat létrehozása</strong>
        <span>Fasza új feladat</span>
    </div>
@endsection