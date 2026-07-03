@extends('admin.layout.admin')

@section('content')

<h1>User Details</h1>

<p><strong>ID:</strong> {{ $user->id }}</p>

<p><strong>Name:</strong> {{ $user->name }}</p>

<p><strong>Email:</strong> {{ $user->email }}</p>

<p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

<p><strong>Joined:</strong> {{ $user->created_at }}</p>

@endsection