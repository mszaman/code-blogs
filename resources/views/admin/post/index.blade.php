@extends('admin.layouts.app')


@section('admin-content')
<div class="card card--wrapper dashboard-body-section">
    <h1 class="card-header">all posts</h1>
    <div class="dashboard-post-body">
      <table class="dashboard-table" border="1">
        <thead>
          <tr>
            <td>title</td>
            <td>content</td>
            <td>tags</td>
            <td>action</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <td>{{ $post->title }}</td>
            <td>
              {{ $post->content }}
            </td>
            <td class="cell-tag">
              @foreach ($post->tags as $tag)
              <a class="tag" href="">{{ $tag->name }}</a>,
              @endforeach
            </td>
            <td class="action-cell">
              <a href="../../pages/show-post.html" class="btn btn--view"
                >View</a
              >
              <a href="../../pages/edit-post.html" class="btn btn--edit"
                >Edit</a
              >
              <form action="">
                <button class="btn btn--delete">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
