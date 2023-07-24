@extends('general.layouts.app')

@section('content')
<div class="card card--wrapper post-form">
    <h1 class="card-header">create a post</h1>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">title</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Enter a title for your post."
            />
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" id="image" />
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <textarea
                name="content"
                id="content"
                rows="10"
                placeholder="Enter content for your post."
            ></textarea>
        </div>

        <!-- <div class="form-group">
        <label for="tags">laravel</label>
        <input type="checkbox" name="tags[]" id="tags" />
        </div> -->
        <!-- CHECKBOX -->
        <div class="form-group">
            <label for="" class="label__tags">Select Tags</label>
            <div class="checkbox-group">
                <!-- Single CheckBox -->
                @foreach ($tags as $tag)
                <label class="checkbox" for="myCheckboxId-{{ $tag->id }}">
                <input
                    class="checkbox-input"
                    type="checkbox"
                    name="names[]"
                    id="myCheckboxId-{{ $tag->id }}"
                />
                <div class="checkbox-box"></div>
                {{ $tag->name }}
                </label>
                @endforeach
                <!-- End Single CheckBox -->
            </div>
        </div>
        <!-- END CHECKBOX -->
        <button class="btn btn--create">Create</button>
    </form>
</div>
@endsection
