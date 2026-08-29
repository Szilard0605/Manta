{{-- 1. Point to your layout file folder path (layouts/app.blade.php) --}}
@extends('layouts.app')

{{-- 2. Pass a dynamic title string to the layout --}}
@section('title', 'Home Page')

{{-- 3. Inject this specific HTML code into the @yield('content') placeholder --}}
@section('content')
    <div class="flex flex-col justify-center w-200 m-20">
        <div class="">
            <form method='post' action='/newtask'>
                @csrf
                <label for="task_title" class="block mb-2.5 text-lg font-medium text-heading">Feladat neve:</label>
                <input type="text" id="task_title" name="task_title" class="text-[2vh] m-2 max-w-100 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                <label for="task_description" class="block mb-2.5 text-lg font-medium text-heading">Feladat leírása:</label>
                <textarea id="task_description" name="task_description" class="p-3 min-w-[80%] min-h-[30vh] m-2 border border-default-medium"></textarea>
                <br>
                <input type="submit" value="Létrehozás" class="border m-2 p-2 text-[2vh]"/>
            
            </form>
        </div>
    </div>
@endsection