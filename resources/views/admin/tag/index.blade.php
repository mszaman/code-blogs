@extends('admin.layouts.app')

@section('admin-content')
    {{-- Tag Index --}}
    <div class="card card--wrapper dashboard-body-section">
        <h1 class="card-header">tags</h1>
        <div class="manage-user-body">
            <table class="dashboard-table" border="1">
            <thead>
                <tr>
                <td>Tag Name</td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                <td>{{ $tag->name }}</td>
                <td class="action-cell">
                    <a href="#" class="btn btn--view"
                    >View</a
                    >
                    <a
                    href="{{ route('tag.edit', $tag->id) }}"
                    class="btn btn--edit"
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
    {{-- End Tag Index --}}
@endsection
