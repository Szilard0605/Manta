<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manta')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <nav class="bg-[#052a4bbb] text-left shadow-[0_5px_0_#a1c9ed] fixed top-0 left-0 w-full z-[1000]">
        <ul class="list-none m-0 p-0 overflow-hidden justify-center">
            <li class="text-white font-[Arial] text-[3vh] inline-block pt-2 pb-2 pl-5 text-center">
                <a href="/">Feladatok</a>
            </li>
            <li class="text-white font-[Arial] text-[3vh] inline-block pt-2 pl-5 text-center">
                <a href="/create_task">Új feladat</a>
            </li>

            <li class="text-white font-[Arial] text-[3vh] inline-block pt-2 pl-5 text-center float-right pr-5">
                @auth
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-ghost btn-sm cursor-pointer">Kijelentkezés</button>
                    </form>
                @endauth
                @guest
                    <form method="GET" action="/login" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-ghost btn-sm cursor-pointer">Bejelentkezés</button>
                    </form>
                @endguest
            </li>
        </ul>
    </nav>

    <main class="pt-15">
        @yield('content')
    </main>

</body>
</html>