<x-layout>
    <x-slot name="title">Create Post</x-slot>

    <x-ui.section>
        <form class="p-8 w-full border border-slate-200 rounded-md shadow-md" action="{{ route('post.store') }}"
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
    </x-ui.section>
</x-layout>
