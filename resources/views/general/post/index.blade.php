@extends('general.layouts.app')

@section('content')
<div class="posts">
    @foreach ($posts as $post)
    <div class="card post-item">
      <img src="{{ asset('storage/posts/'. $post->image->name) }}" alt="" class="post-image" />
      <div class="post">
        <h1 class="post-title">
            <a href="{{ route('post.show', $post->slug) }}"
            >{{ $post->title }}</a
          >
        </h1>
        <div class="post-info">
          <img
            src="{{ asset(isset($post->user->image->name) ? 'storage/avatars/' . $post->user->image->name : 'storage/avatars/default-user.jpg') }}"
            alt="Author Image"
            class="author-image"
          />
          <a href="{{ route('user.show', $post->user->slug) }}" class="author-name"
            >{{ $post->user->first_name }} {{ $post->user->last_name }}</a
          >
        </div>
        <div class="post-body">{{ Str::limit($post->content, 100, $end='...') }}</div>
      </div>
    </div>
    @endforeach
</div>
@endsection

