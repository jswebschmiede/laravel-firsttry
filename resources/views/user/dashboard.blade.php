<x-layout>
    <x-slot name="title">Dashboard</x-slot>

    <x-ui.section>
        @if (session()->has('loggedIn'))
            <x-ui.alert type="success">
                <p>{{ session('loggedIn') }}</p>
            </x-ui.alert>
        @endif
        @if (session()->has('postCreated'))
            <x-ui.alert type="success">
                <p>{{ session('postCreated') }}</p>
            </x-ui.alert>
        @endif
        @if (session()->has('postUpdated'))
            <x-ui.alert type="success">
                <p>{{ session('postUpdated') }}</p>
            </x-ui.alert>
        @endif
        @if (session()->has('postDeleted'))
            <x-ui.alert type="success">
                <p>{{ session('postDeleted') }}</p>
            </x-ui.alert>
        @endif

        <h1 class="text-4xl mb-12 font-bold text-center text-slate-600">Welcome, {{ auth()->user()->name }}!</h1>

        <h2 class="text-4xl mb-12 font-bold text-center text-slate-600">Your Blog Posts</h2>
        @if ($posts->isEmpty())
            <p class="text-center text-slate-600">You have no posts yet.</p>
        @else
            @foreach ($posts as $post)
                <article class="bg-gray-100 rounded-md p-6 mb-8 relative">
                    <x-post.modify :post="$post" />

                    <h2 class="text-2xl font-bold mb-4">{{ $post->title }}</h2>
                    <time class="block text-sm text-slate-600 mb-4">
                        created at: {{ $post->created_at->format('M d, Y') }}
                    </time>
                    <p>{{ $post->body }}</p>
                </article>
            @endforeach
        @endif
    </x-ui.section>
</x-layout>
