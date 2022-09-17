@props(['post'])
<x-panel>
    @auth
        <form action="/{{$post->id}}/comments" method="POST" class="">
            @csrf
            <header class="flex items-center">
                <img class="rounded-xl" src="https://i.pravatar.cc/100?u={{auth()->id()}}}" alt="p"
                     width="40" height="40">
                <h2 class="ml-4">
                    <label for="commentBody">Want to participate</label>
                </h2>
            </header>
            <div class="mt-6">
                <textarea name="body" id="commentBody" cols="30" rows="5"
                    required
                    class="w-full text-sm focus:outline-none focus:ring @error('body') border border-red-500 rounded-xl @enderror"
                    placeholder="Quick think of something to say"></textarea>
                @error('body')
                <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Post
                </button>
            </div>
        </form>
    @else
        <p class="font-semibold">
            <a class="hover:underline hover:underline-offset-4 text-blue-500" href="/login"> Login to leave a
                Comment</a>
            or
            <a class="hover:underline hover:underline-offset-4 text-blue-500" href="/register"> Register</a>
        </p>
    @endauth

</x-panel>