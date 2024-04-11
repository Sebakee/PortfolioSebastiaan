@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('posts') }}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"></textarea>

                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2
                     rounded font-medium">Post</button>
            </div>
        </form>

        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="mb-4">
            <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600
                     text-sm">{{ $post->created_at->diffForHumans() }}</span>
            <p class="mb-2">{{ $post->body }}</p>
            @auth
            @if ($post->ownedBy(auth()->user()))
            <div>
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="text-blue-500"><img src="../../images/bin (1).png" alt="bin" class="w-16px"></button>
                </form>
            </div>
            @endif
            @endauth

            <div class="flex items-center">
                <span class="mb-1"> {{ $post->likes->count() }} </span>
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
                    <button type="submit" class="text-blue-500"><img src="{{URL::asset('/images/heart.png')}}" alt="unlike"></button>
                </form>
                @endif


                @endauth

            </div>
        </div>
        @endforeach

        {{ $posts->links() }}
        @else
        <p>there are no posts</p>
        @endif
    </div>

</div>

@endsection