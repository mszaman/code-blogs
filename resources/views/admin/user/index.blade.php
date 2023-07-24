@extends('admin.layouts.app')

@section('admin-content')
    {{-- User Index --}}
    <div class="card card--wrapper dashboard-body-section">
        <h1 class="card-header">all users</h1>
        <div class="manage-user-body">
            <table class="dashboard-table" border="1">
                <thead>
                    <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td class="action-cell">
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn--view"
                        >View</a
                        >
                        <a
                        href="../../pages/dashboard/edit-user-role.html"
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
    {{-- End User Index --}}
@endsection
