@extends('general.layouts.app')

@section('content')
<div class="card card--wrapper auth-form">
    <h1 class="card-header">signin</h1>
    <form action="{{ route('auth.signin') }}" method="POST">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif
      <div class="form-group">
        <label for="email">email</label>
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your email."
        />
      </div>
      <div class="form-group">
        <label for="password">password</label>
        <input
          type="password"
          name="password"
          id="password"
          placeholder="Enter your password"
        />
      </div>
      <button class="btn btn--create btn--auth">Signin</button>
      @csrf
    </form>
    <p class="auth-footer">
      Don't have an account? <a href="{{ route('auth.signup') }}">Signup</a> now
    </p>
</div>
@endsection
