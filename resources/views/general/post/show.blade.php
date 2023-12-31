@extends('general.layouts.app')

@section('content')
    <!-- Post Section -->
    <section class="post-section">
        <!-- Main Post -->
        <div class="card card--wrapper main-post">
          <img
            src="{{ isset($post->image->name) ? asset('storage/posts/'.$post->image->name) : asset('storage/posts/default-post.jpg') }}"
            alt="Laptop with air buds on its keypad."
            class="post-image"
          />
          <div class="post">
            <h1 class="post-title">{{ $post->title }}</h1>
            <div class="post-info">
              <img
                src="{{ isset($post->user->image->name) ? asset('storage/avatars/'.$post->user->image->name) : asset('storage/avatars/default-user.jpg') }}"
                alt="Author Image"
                class="author-image"
              />
              <a href="{{ route('user.show', $post->user->slug) }}" class="author-name"
                >{{ $post->user->first_name }} {{ $post->user->last_name }}</a
              >
              <p class="date">Created at - {{ $post->created_at->format('M/d/Y') }}</p>
            </div>
            <div class="tags post-tags">
              @foreach ($post->tags as $tag)
              <a href="{{ route('tag.show', $tag->slug) }}" class="post-tag">{{ $tag->name }}</a>
              @endforeach
            </div>
            <div class="post-body">{{ $post->content }}</div>
          </div>
        </div>
        <!-- End Main Post -->
        <!-- Comment Section -->
        <div class="card card-wrapper">
          <div class="comment-section">
            <!-- Comment Form -->
            <div class="create-comment">
              <h1 class="comment-header">Leave a comment</h1>
              <form action="{{ route('comment.store', $post->slug) }}" method="POST" class="comment-form" >
                <textarea
                  name="comment"
                  id="comment"
                  cols="30"
                  rows="5"
                ></textarea>
                <button type="submit" class="btn btn--create">
                  Add Comment
                </button>
                @csrf
              </form>
            </div>
            <!-- End Comment Form -->
            <!-- All Comments -->
            <div class="comments">
              <h1 class="comment-header">Comments</h1>
              @foreach ($post->comments as $comment)
                  <!-- Single Comment -->
              <div class="comment-box">
                <div class="comment-info">
                  <img
                    src="{{ isset($comment->user->image->name) ? asset('storage/avatars/'.$comment->user->image->name) : asset('storage/avatars/default-user.jpg') }}"
                    alt=""
                    class="author-image"
                  />
                  <a href="{{ route('user.show', $comment->user->slug) }}" class="author-name"
                    >{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a
                  >
                  <p class="date">{{ $comment->created_at }}</p>
                </div>
                <p class="comment-body">{{ $comment->comment }}</p>
              </div>
              <!-- End Single Comment -->
              @endforeach
            </div>
            <!-- End All Comments -->
          </div>
        </div>
        <!-- End Comment Section -->
      </section>
      <!-- End Post Section -->

      <!-- Sibebar -->
      <aside class="sidebar-section">
        <div class="sidebar">
          <div class="card sidebar-card">
            <h2 class="sidebar-header">tags</h2>
            <div class="tags sidebar-content">
              @foreach ($tags as $tag)
              <a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
              @endforeach
            </div>
          </div>
          <div class="card sidebar-card">
            <h2 class="sidebar-header">tags</h2>
            <div class="tags sidebar-content">
                @foreach ($tags as $tag)
                <a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
          </div>
          <div class="card sidebar-card">
            <h2 class="sidebar-header">tags</h2>
            <div class="tags sidebar-content">
                @foreach ($tags as $tag)
                <a href="{{ route('tag.show', $tag->slug) }}">{{ $tag->name }}</a>
                @endforeach
            </div>
          </div>
        </div>
      </aside>
      <!-- End Sidebar -->


@endsection
