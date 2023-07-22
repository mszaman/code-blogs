@extends('layouts.app')

@section('content')
    <main class="main-section">
        <div class="dashboard-wrapper">
            @include('layouts.dash-navbar')
            <!-- Create Tag -->
            <div class="card card--wrapper dashboard-body-section">
                <h1 class="card-header">create a tag</h1>
                <div class="create-tag-body">
                <form class="dashboard-form" action="{{ route('tag.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label for="tag">tag</label>
                    <input
                        type="text"
                        name="name"
                        id="tag"
                        placeholder="Enter a new tag"
                    />
                    </div>
                    <button class="btn btn--create btn--auth">Create Tag</button>
                </form>
                </div>
            </div>
            <!-- End Create Tag -->
        </div>
    </main>

@endsection
