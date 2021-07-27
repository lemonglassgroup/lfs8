@auth
    <x-panel>
        <form method="post" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     class="rounded-full mr-4"
                     alt=""
                     width="40"
                     height="60"
                >
                <h2>Want to participate?</h2>
            </header>

            <div class="mt-6 mb-6">
                <textarea name="body"
                          class="w-full text-sm bg-gray-200 p-6 rounded-xl
                                 focus:outline-none focus:ring focus:bg-white"
                          id=""
                          rows="5"
                          placeholder="Quick, think of something to say!"
                          required
                ></textarea>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a>
        or
        <a href="/login" class="hover:underline">Log In</a>
        to leave a comment.
    </p>
@endauth
