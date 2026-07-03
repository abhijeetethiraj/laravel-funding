@extends('admin.layout.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('css/index-donate.css') }}">

<h1 class="page-title">
    All Users
</h1>

<form method="GET" class="search-form">

    <input
        type="text"
        name="search"
        placeholder="Search User"
        value="{{ request('search') }}">

    <button>
        Search
    </button>

</form>

<table class="table">

    <tr>

        <th>ID</th>

        <th>Name</th>

        <th>Email</th>

        <th>Role</th>

        <th>Joined</th>

        <th>Action</th>

    </tr>

    @foreach($users as $user)

    <tr>

        <td>{{ $user->id }}</td>

        <td>{{ $user->name }}</td>

        <td>{{ $user->email }}</td>

        <td>{{ ucfirst($user->role) }}</td>

        <td>{{ $user->created_at }}</td>

        <td>

            <a href="{{ route('admin.users.show', $user->id) }}">
                View
            </a>

        </td>

    </tr>

    @endforeach

</table>

{{ $users->withQueryString()->links() }}

@endsection