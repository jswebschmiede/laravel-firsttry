<x-layout>
    @section('title', 'FirstTry - Ctreate Blog Post')

    @section('content')
        <x-section>
            <h1 class="text-4xl mb-12 font-bold text-center text-slate-600">Welcome, {{ auth()->user()->name }}!</h1>

            <form class="p-8 w-full border border-slate-200 rounded-md shadow-md" action="{{ route('create-post') }}"
                method="POST">
                @csrf
                <legend class="text-xl text-center font-medium text-slate-600">Create a Blog Post</legend>
                <div class="space-y-4">
                    <label class="block">
                        <span class="block mb-2 text-sm font-medium text-slate-600">Title</span>
                        <input type="text" name="title"
                            class="block w-full px-3 py-2 border border-slate-600 rounded-md shadow-sm" />

                        @if ($errors->has('title'))
                            <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
                        @endif
                    </label>

                    <label class="block">
                        <span class="block mb-2 text-sm font-medium text-slate-600">Content</span>
                        <textarea class="block w-full px-3 py-2 border border-slate-600 rounded-md shadow-sm" name="body" cols="30"
                            rows="10"></textarea>

                        @if ($errors->has('body'))
                            <span class="text-red-500 text-sm">{{ $errors->first('body') }}</span>
                        @endif
                    </label>


                    <button type="submit"
                        class="block w-full px-3 py-2 bg-slate-600 text-white rounded-md shadow-sm hover:bg-slate-500">
                        Save
                    </button>
                </div>
            </form>
        </x-section>

        <x-section>
            <h2 class="text-4xl mb-12 font-bold text-center text-slate-600">Your Blog Posts</h2>
            @if ($posts->isEmpty())
                <p class="text-center text-slate-600">You have no posts yet.</p>
            @else
                @foreach ($posts as $post)
                    <article class="bg-gray-100 rounded-md p-6 mb-8">
                        <h2 class="text-2xl font-bold mb-4">{{ $post->title }}</h2>
                        <time class="block text-sm text-slate-600 mb-4">
                            created at: {{ $post->created_at->format('M d, Y') }}
                        </time>
                        <p>{{ $post->body }}</p>
                    </article>
                @endforeach
            @endif
        </x-section>
    @endsection
</x-layout>
