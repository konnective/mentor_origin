<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- / --}}

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
<style>
    body {
        font-family: "Nunito Sans", sans-serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
    }

    .container {
        width: 300px;
        margin: 100px auto 0;
        /*Top: 100px, right-left: auto, bottom:0px*/
    }

    .select-option {
        display: flex;
        justify-content: space-between;
        background-color: white;
        height: 50px;
        border-radius: 10px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        align-items: center;
        padding: 0 18px;
        font-size: 20px;
    }

    .select-option i {
        font-size: 25px;
        transition: transform 0.3s linear;
    }

    .container.active .select-option i {
        transform: rotate(-180deg);
    }

    .list-search-container {
        background-color: white;
        margin-top: 15px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        display: none;
    }

    .container.active .list-search-container {
        display: block;
    }

    .search-box {
        position: relative;
    }

    .search-box i {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        font-size: 20px;
        color: #3c6d76
    }

    .search-box input {
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 17px;
        padding-left: 45px;
        border-radius: 5px;
        border: 1px solid #d3cbcb;
    }

    .search-box input:focus {
        border: 2px solid #44aabc;
    }

    .list {
        margin-top: 10px;
        max-height: 250px;
        overflow: auto;
        padding-right: 7px;
    }

    .list li {
        font-size: 21px;
        height: 50px;
        padding: 10px 15px;
    }

    .list li:hover,
    li.selected {
        border-radius: 5px;
        background: #f2f2f2;
    }
</style>

<body class="main-body">
    <nav class="navd z-30 flex justify-between items-center p-6  bg-orange-400">
        <a href="{{ env('APP_URL') }}"><span class="text-black">The Mentor</span></a>
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



        </div>
    </div>
    <x-flash-message />
</body>

</html>
