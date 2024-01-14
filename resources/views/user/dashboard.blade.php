<x-layout>
    <x-slot name="title">Dashboard</x-slot>

    <x-ui.section>
        <h1 class="text-4xl mb-12 font-bold text-center text-slate-600">Welcome, {{ auth()->user()->name }}!</h1>

        <h2 class="text-4xl mb-12 font-bold text-center text-slate-600">Your Blog Posts</h2>
        @if ($posts->isEmpty())
            <p class="text-center text-slate-600">You have no posts yet.</p>
        @else
            @foreach ($posts as $post)
                <article class="bg-gray-100 rounded-md p-6 mb-8 relative">
                    <div class="flex gap-4 absolute top-2 right-2">
                        <a href="{{ route('post.edit', $post) }}"
                            class="bg-slate-600 text-white px-3 py-2 rounded-md shadow-sm hover:bg-slate-500">
                            Edit
                        </a>
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="bg-red-600 text-white px-3 py-2 rounded-md shadow-sm hover:bg-red-500">
                                Delete
                            </button>
                        </form>
                    </div>

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
