@extends('layouts.app')

@section('title', 'Csoportok kezelése')

@section('content')

<div class="flex flex-col justify-between items-center mb-4 p-5">

    <?php 
        if (session('success')) {
            echo '<div class="flex justify-center items-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">';
            echo '<h1>' . session('success') . '</h1>';
            echo '</div>';
        }

        if(session('error')) {
            echo '<div class="flex justify-center items-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">';
            echo '<h1>' . session('error') . '</h1>';
            echo '</div>';
        }
    ?>

    <form method="POST", action="{{ route("groups.create") }}">
        @csrf
        @method('POST')
        <input type="text" name="name" placeholder="Új csoport neve" class="border border-gray-400 rounded-l px-4 py-2 w-full">
        <br/>
        <div class="flex justify-center items-center">
            <button type="submit" class="bg-blue-500 mt-4 text-white px-4 py-2 rounded-r hover:bg-blue-600">Csoport létrehozása</button>
        </div>
    </form>
</div>

<div class="grid-row grid grid-cols-5 gap-4 m-10">
    @foreach($groups as $group)
        <div class="bg-white shadow-md rounded-lg p-4 mb-4 mx-2 border border-gray-400">
            <h2 class="text-xl font-semibold mb-2 text-center">{{ $group->name }}</h2>
            <p class="text-gray-600 text-center">Csoport ID: {{ $group->id }}</p>
            <div class="flex gap-2 mt-2 items-center justify-center">
                
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="deleteGroup({{ $group->id }}, '{{ $group->name }}')">Törlés</button>
                <form id="delete-form-{{ $group->id }}" method="POST" action="{{ route('groups.delete', $group->id) }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                
                <form method="POST" action="{{ route('groups.edit', $group->id) }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Szerkesztés</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
<script>
    function deleteGroup(groupId,groupName) {
        if (confirm('Biztosan törölni szeretnéd a(z) ' + groupName + ' csoportot?')) {
            document.getElementById('delete-form-' + groupId).submit();
        }
    }
</script>

@endsection