<x-layout>
    @section('title', 'FirstTry - Home')

    @section('content')
        @auth
            <section class="max-w-[960px] w-full mx-auto pt-24">
                <h1 class="text-4xl mb-12 font-bold text-center text-slate-600">Welcome, {{ auth()->user()->name }}!</h1>
                @if ($posts->isEmpty())
                    <p class="text-center text-slate-600">You have no posts yet.</p>
                @else
                    @foreach ($posts as $post)
                        <article class="bg-gray-100 rounded-md p-6 mb-8">
                            <h2 class="text-2xl font-bold mb-4">{{ $post->title }}</h2>
                            <time class="block text-sm text-slate-600 mb-4">
                                created at: {{ $post->created_at->format('M d, Y') }} by {{ auth()->user()->name }}
                            </time>
                            <p>{{ $post->body }}</p>
                        </article>
                    @endforeach
                @endif
            </section>
        @else
            <section class="flex justify-center items-center h-[calc(100%_-_68px)]">
                <div class="max-w-96 mx-auto w-full">
                    <form class="p-8 w-full border border-slate-200 rounded-md shadow-md" action="{{ route('register') }}"
                        method="POST">
                        @csrf
                        <legend class="text-xl text-center font-medium text-slate-600">Register</legend>
                        <div class="space-y-4">
                            <label class="block">
                                <span class="block mb-2 text-sm font-medium text-slate-600">Name</span>
                                <input type="text" name="name"
                                    class="block w-full px-3 py-2 border border-slate-600 rounded-md shadow-sm" />

                                @if ($errors->has('name'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                                @endif
                            </label>
                            <label class="block">
                                <span class="block mb-2 text-sm font-medium text-slate-600">Email</span>
                                <input type="email" name="email"
                                    class="block w-full px-3 py-2 border border-slate-600 rounded-md shadow-sm" />

                                @if ($errors->has('email'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                                @endif
                            </label>
                            <label class="block">
                                <span class="block mb-2 text-sm font-medium text-slate-600">Password</span>
                                <input type="password" name="password"
                                    class="block w-full px-3 py-2 border border-slate-600 rounded-md shadow-sm" />

                                @if ($errors->has('password'))
                                    <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                                @endif
                            </label>

                            <button type="submit"
                                class="block w-full px-3 py-2 bg-slate-600 text-white rounded-md shadow-sm hover:bg-slate-500">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        @endauth
    @endsection
</x-layout>
