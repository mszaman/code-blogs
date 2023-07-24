@extends('general.layouts.app')

@section('content')
<aside class="card profile-info">
    <img src="../res/profile-image.jpg" alt="" class="profile-image" />
    <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
    <ul class="profile-info-lists">
        <li>{{ $user->role->name }}</li>
        <li>Joined on {{ $user->created_at }}</li>
        <li>{{ $user->email }}</li>
        <li>Dhaka, Bangladesh</li>
    </ul>
<div class="profile-info-buttons">
    <a
    href="../pages/edit-profile.html"
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
            <tr>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing</td>
                <td>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Est
                quasi perspiciatis, magni corporis nulla error quo nesciunt
                impedit veritatis delectus!
                </td>
                <td class="cell-tag">
                <a class="tag" href="../pages/index-tag.html">laravel</a>,
                <a class="tag" href="../pages/index-tag.html">PHP</a>
                </td>
                <td class="action-cell">
                <a href="./show-post.html" class="btn btn--view">View</a>
                <a href="./edit-post.html" class="btn btn--edit">Edit</a>
                <form action="">
                    <button class="btn btn--delete">Delete</button>
                </form>
                </td>
            </tr>
        </tbody>
    </table>
</section>
@endsection
