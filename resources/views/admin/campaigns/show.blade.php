@extends('admin.layout.admin')

@section('content')

<h1>{{ $campaign->title }}</h1>

<p><strong>Description:</strong> {{ $campaign->story }}</p>

<p><strong>Goal:</strong> ₹{{ $campaign->goal_amount }}</p>

<p><strong>Raised:</strong> ₹{{ $campaign->raised_amount }}</p>

<p><strong>Donors:</strong> {{ $campaign->donor_count }}</p>

@endsection