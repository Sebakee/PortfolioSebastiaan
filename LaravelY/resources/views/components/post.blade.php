@props(['post' => $post])

<div>
    <div class="mb-4">
        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600
                     text-sm">{{ $post->created_at->diffForHumans() }}</span>
        <p class="mb-2">{{ $post->body }}</p>
        @if ($post->ownedBy(auth()->user()))
        <div>
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method("DELETE")
                <button type="submit" class="text-blue-500"><img src="../../images/bin (1).png" alt="bin" class="w-16px"></button>
            </form>
        </div>
        @endif

        <div class="flex items-center">
            <span> {{ $post->likes->count() }} </span>
            @auth
            @if(!$post->likedBy(auth()->user()))
            <form action="{{ route('posts.like', $post) }}" method="post" class="ml-1">
                @csrf
                <button type="submit" class="text-blue-500"><img src="../../images/heart (1).png" alt="like"></button>
            </form>
            @else
            <form action="{{ route('posts.like', $post) }}" method="post" class="ml-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500"><img src="../../images/heart.png" alt="unlike"> </button>
            </form>
            @endif


            @endauth

        </div>
    </div>
</div>