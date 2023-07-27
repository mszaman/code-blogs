@extends('admin.layouts.app')

@section('admin-content')
    {{-- Summary Section --}}
    <div class="card card--wrapper dashboard-body-section">
        <h1 class="card-header">summary</h1>
        <div class="summary-body">
            <div class="summary-card">
            <p class="summary-card-title">users</p>
            <p class="summary-card-body">{{ $totalUsers }}</p>
            </div>
            <div class="summary-card">
            <p class="summary-card-title">posts</p>
            <p class="summary-card-body">{{ $totalPosts }}</p>
            </div>
            <div class="summary-card">
            <p class="summary-card-title">tags</p>
            <p class="summary-card-body">{{ $totalTags }}</p>
            </div>
        </div>
        </div>
    {{-- End Summary Section --}}
@endsection
