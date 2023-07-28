@extends('general.layouts.app')

@section('content')
<aside class="card profile-info">
    <img src="{{ isset($user->image->name) ? asset('storage/avatars/'.$user->image->name) : asset('storage/avatars/default-user.jpg') }}" alt="" class="profile-image" />

    <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
    <ul class="profile-info-lists">
        <li>{{ $user->role->name }}</li>
        <li>{{ $user->contact->phone ?? '' }}</li>
        <li>Joined on {{ $user->created_at }}</li>
        <li>{{ $user->email }}</li>
        <li>Dhaka, Bangladesh</li>
    </ul>
<div class="profile-info-buttons">
    <a
    href="{{ route('user.edit', $user->slug) }}"
    class="btn btn--edit btn--profile--edit"
    >Edit Profile</a
    >
    <form action="">
    <button class="btn btn--delete btn--profile--delete">
        Delete Profile
    </button>
    </form>
</div>
</aside>
<section class="card profile-posts">
    <div class="profile-posts-header">
        <h1>your posts</h1>
        <a class="btn btn--create" href="{{ route('post.create') }}">Creat Post</a>
    </div>
    <table class="profile-table">
        <thead>
            <tr>
                <td>title</td>
                <td>content</td>
                <td>tags</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 50, '...') }}</td>
                <td class="cell-tag">
                @foreach ($post->tags as $tag)
                <a class="tag" href="{{ route('tag.show', $tag->name) }}">{{ $tag->name }}</a>,
                @endforeach
                </td>
                <td class="action-cell">
                <a href="{{ route('post.show', $post->slug) }}" class="btn btn--view">View</a>
                <a href="{{ route('post.edit', $post->slug) }}" class="btn btn--edit">Edit</a>
                <form action="">
                    <button class="btn btn--delete">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
