@extends('general.layouts.app')


@section('content')
<div>
    <h1 class="tag-header">{{ $tag->name }}</h1>
    <div class="posts">
        @if (isset($tag->posts))
            @foreach ($tag->posts as $post)
            <div class="card post-item">
                <img src="{{ isset($post->image->name) ? asset('storage/posts/'.$post->image->name) : asset('storage/posts/default-post.jpg') }}" alt="" class="post-image" />
                <div class="post">
                <h1 class="post-title">
                    <a href="{{ route('post.show', $post->slug) }}"
                    >{{ $post->title }}</a
                    >
                </h1>
                <div class="post-info">
                    <img
                    src="{{ isset($post->user->image->name) ? asset('storage/avatars/'.$post->user->image->name) : asset('storage/avatars/default-user.jpg') }}"
                    alt="Author Image"
                    class="author-image"
                    />
                    <a href="../pages/profile.html" class="author-name"
                    >{{ $post->user->name }}</a
                    >
                </div>
                <div class="post-body">{{ $post->content }}</div>
                </div>
            </div>
            @endforeach
        @else
            <h1 class="tag-header">No Post Found</h1>
        @endif
    </div>
</div>
@endsection
