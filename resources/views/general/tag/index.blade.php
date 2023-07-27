@extends('general.layouts.app')

@section('content')
<div class="card card--wrapper tags-wrapper">
    <h1 class="card-header">all tags</h1>
    <div class="tags">
        @foreach ($tags as $tag)
            <a href="../pages/index-tag.html">{{ $tag->name }}</a>
        @endforeach
    </div>
  </div>
@endsection
