<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Posty</title>
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li class="flex-auto pr-4">
                <img src="../../images/letter-y.png" alt="y">
            </li>
            <li class="flex-auto">
                <a href="" class="p-3">Home</a>
            </li>

            <li class="flex-auto">
                <a href="{{ route('posts') }}" class="p-3">Post</a>
            </li>
        </ul>

        <ul class="flex items-center">
            @if (auth()->user())
            <li class="flex-auto">
                <a href="{{ route('users.posts', $post->user) }}" class="p-3">{{ auth()->user()->name }}</a>
            </li>
            <li class="flex-auto">
                <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @else
            <li class="flex-auto">
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li class="flex-auto">
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
            @endif


        </ul>
    </nav>
    @yield('content')
</body>

</html>