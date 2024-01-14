<x-layout>
    <x-slot name="title">Register</x-slot>
    @auth
        {{ redirect()->route('home') }}
    @endauth

    <x-ui.section>
        <div class="max-w-96 mx-auto w-full">
            <form class="p-8 w-full border border-slate-200 rounded-md shadow-md" action="{{ route('user.create') }}"
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
    </x-ui.section>
</x-layout>
