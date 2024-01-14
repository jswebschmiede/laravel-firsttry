<div class="flex gap-4 absolute top-2 right-2">
    <a href="{{ route('post.edit', $post) }}"
        class="bg-slate-600 text-white px-3 py-2 rounded-md shadow-sm hover:bg-slate-500">
        Edit
    </a>
    <form action="{{ route('post.destroy', $post) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="bg-red-600 text-white px-3 py-2 rounded-md shadow-sm hover:bg-red-500">
            Delete
        </button>
    </form>
</div>
