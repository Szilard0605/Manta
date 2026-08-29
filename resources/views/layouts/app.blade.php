<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <nav class="bg-[#052a4bbb] text-left shadow-[0_5px_0_#a1c9ed] fixed top-0 left-0 w-full z-[1000]">
        <ul class="list-none m-0 p-0 overflow-hidden justify-center">
            <li class="text-white font-[Arial] text-[3.3vh] inline-block pt-2 pl-5 text-center">
                <a href="/">Feladatok</a>
            </li>
            <li class="text-white font-[Arial] text-[3.3vh] inline-block pt-2 pl-5 text-center">
                <a href="/newtask">Új feladat</a>
            </li>
        </ul>
    </nav>

    <main class="pt-28">
        @yield('content')
    </main>

</body>
</html>