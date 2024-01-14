{{-- Header Component --}}

<header class="w-full bg-white shadow-md py-4">
    <div class="flex justify-between items-center max-w-[calc(100%_-_6rem)] w-full mx-auto">
        <p class="text-3xl font-bold">
            <a title="back to Home" href="{{ route('home') }}">FirstTry</a>
        </p>
        <nav class="flex space-x-8">
            <a title="Home" href="{{ route('home') }}" class="text-slate-600 hover:text-slate-500">Home</a>
            @auth
                <a title="Dashboard" href="{{ route('dashboard') }}" class="text-slate-600 hover:text-slate-500">
                    Dashboard
                </a>
                <a title="Create Post" href="{{ route('post.create') }}" class="text-slate-600 hover:text-slate-500">
                    Create Post
                </a>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button title="Logout" type="submit" class="text-slate-600 hover:text-slate-500">Logout</button>
                </form>
            @else
                <a title="Register" href="{{ route('register') }}" class="text-slate-600 hover:text-slate-500">Register</a>
                <a title="Login" href="{{ route('login') }}" class="text-slate-600 hover:text-slate-500">Login</a>
            @endauth
        </nav>
    </div>
</header>
