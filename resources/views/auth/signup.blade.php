@extends('general.layouts.app')

@section('content')
<div class="card card--wrapper auth-form">
    <h1 class="card-header">signup</h1>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('auth.register') }}" method="POST">
        <div class="form-group">
            <label for="first_name">first name</label>
            <input
            type="text"
            name="first_name"
            id="first_name"
            placeholder="Enter your First Name."
            value="{{ old('first_name') }}"
            />
        </div>
        <div class="form-group">
            <label for="last_name">last name</label>
            <input
            type="text"
            name="last_name"
            id="last_name"
            placeholder="Enter your Last Name."
            value="{{ old('last_name') }}"
            />
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your email."
            value="{{ old('email') }}"
            />
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
            value="{{ old('password') }}"
            />
        </div>
        <button class="btn btn--create btn--auth">Signup</button>
        @csrf
    </form>
    <p class="auth-footer">
        Already have an account?
        <a href="{{ route('auth.signin') }}">Signin</a> now
    </p>
</div>
@endsection
