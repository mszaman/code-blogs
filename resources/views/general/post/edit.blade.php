@extends('general.layouts.app')

@section('content')
<div class="card card--wrapper post-form">
    <h1 class="card-header">edit post</h1>
    <form action="{{ route('post.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">title</label>
        <input
          type="text"
          name="title"
          id="title"
          placeholder="Enter a title for your post."
          value="{{ $post->title }}"
        />
      </div>
      <div class="form-group">
        <label for="image">secect image for your post</label>
        <input type="file" name="image" id="image" />
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <textarea
          name="content"
          id="content"
          rows="10"
          placeholder="Enter content for your post."
        >{{ $post->content }}</textarea>
      </div>

      <!-- <div class="form-group">
        <label for="tags">laravel</label>
        <input type="checkbox" name="tags[]" id="tags" />
      </div> -->

      <!-- CHECKBOX -->
      <div class="form-group">
        <label for="" class="label__tags">Select Tags</label>
        <div class="checkbox-group">
          @foreach ($tags as $tag)
              <!-- Single CheckBox -->
            <label class="checkbox" for="myCheckboxId-{{ $tag->id }}">
                <input
                class="checkbox-input"
                type="checkbox"
                name="names[]"
                id="myCheckboxId-{{ $tag->id }}"
                value="{{ $tag->id }}"
                @checked($post->tags->contains($tag->id))
                />
                <div class="checkbox-box"></div>
                {{ $tag->name }}
            </label>
            <!-- End Single CheckBox -->
          @endforeach
        </div>
      </div>
      <!-- END CHECKBOX -->

      <button class="btn btn--create">Update</button>
      @csrf
      @method('PATCH')
    </form>
  </div>
@endsection
