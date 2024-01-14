<x-layout>
    <x-slot name="title">Home</x-slot>
    <x-ui.section>
        <h1 class="text-4xl mb-12 font-bold text-center text-slate-600">Blog</h1>

        @if ($posts->isEmpty())
            <p class="text-center text-slate-600">Sorry, no posts yet.</p>
        @else
            @foreach ($posts as $post)
                <article class="bg-gray-100 rounded-md p-6 mb-8 relative">
                    @if (auth()->check() && auth()->user()->id === $post->user_id)
                        <x-post.modify :post="$post" />
                    @endif

                    <h2 class="text-2xl font-bold mb-4">{{ $post->title }}</h2>
                    <time class="block text-sm text-slate-600 mb-4">
                        created at: {{ $post->created_at->format('M d, Y') }} by {{ $post->user->name }}
                    </time>
                    <p>{{ $post->body }}</p>
                </article>
            @endforeach
        @endif
    </x-ui.section>
</x-layout>
