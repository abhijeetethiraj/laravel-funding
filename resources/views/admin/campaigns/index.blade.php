@extends('admin.layout.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('css/index-donate.css') }}">

<h1 class="page-title">
    All Campaigns
</h1>

<form method="GET" class="search-form">

    <input
        type="text"
        name="search"
        placeholder="Search Campaign"
        value="{{ request('search') }}">

    <button>Search</button>

</form>

<table class="table">

    <tr>

        <th>ID</th>

        <th>Title</th>

        <th>Goal</th>

        <th>Raised</th>

        <th>Donors</th>

        <th>Created</th>

        <th>Action</th>

    </tr>

    @foreach($campaigns as $campaign)

    <tr>

        <td>{{ $campaign->id }}</td>

        <td>{{ $campaign->title }}</td>

        <td>₹{{ $campaign->goal_amount }}</td>

        <td>₹{{ $campaign->raised_amount }}</td>

        <td>{{ $campaign->donor_count }}</td>

        <td>{{ $campaign->created_at }}</td>

        <td>
            <a href="{{ route('admin.campaigns.show', $campaign->id) }}">
                View
            </a>
        </td>

    </tr>

    @endforeach

</table>

{{ $campaigns->withQueryString()->links() }}

@endsection