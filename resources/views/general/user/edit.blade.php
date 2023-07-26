@extends('general.layouts.app')

@section('content')
<div class="card card--wrapper post-form">
    <h1 class="card-header">update your profile</h1>
    <form action="{{ route('user.update', $user->slug) }}" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <label for="first_name">first name</label>
        <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" />
      </div>
      <div class="form-group">
        <label for="last_name">last name</label>
        <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" />
      </div>
      <div class="form-group">
        <label for="email">email</label>
        <input
          type="email"
          name="email"
          id="email"
          value="{{ $user->email }}"
        />
      </div>
      <div class="form-group">
        <label for="phone">phone</label>
        <input type="text" name="phone" id="phone" value="{{ $user->contact->phone ?? '' }}" />
      </div>
      {{-- <div class="form-group">
        <label for="country">country</label>
        <select name="country" id="country">
          <option value="1" selected>Afghanistan</option>
          <option value="2">Bangladesh</option>
          <option value="3">Bhutan</option>
          <option value="4">India</option>
          <option value="5">Nepal</option>
          <option value="6">Pakistan</option>
          <option value="7">Sri Lanka</option>
        </select>
      </div>
      <div class="form-group">
        <label for="city">city</label>
        <select name="city" id="city">
          <option value="1" selected>Chennai</option>
          <option value="2">Chittagong</option>
          <option value="3">Dhaka</option>
          <option value="4">Karachi</option>
          <option value="5">Kathmandu</option>
          <option value="6">Thimpu</option>
          <option value="7">Colombo</option>
        </select>
      </div> --}}
      <div class="form-group">
        <label for="image">avatar</label>
        <input type="file" name="image" id="image" />
      </div>
      <button class="btn btn--create">Update</button>
      @csrf
      @method('PATCH')
    </form>
  </div>
@endsection
