<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }
    </script>
    <title>The Mentor</title>
</head>

<body class="mb-48">
    <nav class="navd flex justify-between items-center p-5  bg-orange-400">
        <a href="{{ env('APP_URL') }}"><span class="text-white">The Mentor</span></a>
        {{-- <a href="/"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a> --}}
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>Manage
                        Listings</a>
                </li>
                <li>
                    <form class="inline text-white" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ env('APP_URL') }}/daily_cycles" class="hover:text-laravel">Daily Cycles</a>
                </li>
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>

    {{-- code for sidebar starts from here --}}
    <div class="flex z-20 h-screen sidebar">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex-shrink-0">
            <!-- Sidebar content -->
            <div class="p-4">
                <!-- Sidebar items -->
                <a href=""
                    class="block text-center py-2 px-4 hover:bg-gray-700 {{ Request::is('/') ? 'bg-gray-700' : '' }} ">Dashboard</a>
                <a href=""
                    class="block text-center py-2 px-4 hover:bg-gray-700  {{ Request::is('pros') ? 'bg-gray-700' : '' }}">Products</a>
                {{-- <a href="{{ route('admin.addPro') }}"
                        class="block text-center py-2 px-4 hover:bg-gray-700 {{ Request::is('addPro') ? 'bg-gray-700' : '' }} ">Add
                        Product</a> --}}
                <a href=""
                    class="block text-center py-2 px-4 hover:bg-gray-700  {{ Request::is('blogs') ? 'bg-gray-700' : '' }}">Blogs
                    Section</a>

            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 bg-gray-200">

            <main>
                {{ $slot }}
            </main>


            <x-flash-msg />
</body>

</html>
