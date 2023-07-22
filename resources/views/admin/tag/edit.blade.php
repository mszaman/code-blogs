@extends('layouts.app')

@section('content')
    <main class="main-section">
        <div class="dashboard-wrapper">
            @include('layouts.dash-navbar')
            {{-- Tag Edit --}}
            <div class="card card--wrapper dashboard-body-section">
                <h1 class="card-header">Update {{ $tag->name }}</h1>
                <div class="edit-tag-body">
                  <form class="dashboard-form" action="{{ route('tag.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                      <label for="tag">tag</label>
                      <input type="text" name="name" id="tag" value="{{ $tag->name }}" />
                    </div>
                    <button class="btn btn--create btn--auth">Update Tag</button>
                  </form>
                </div>
              </div>
            {{-- End Tag Edit --}}
        </div>
    </main>
@endsection
