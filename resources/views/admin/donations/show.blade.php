@extends('admin.layout.admin')

@section('content')

<h1>Donation Details</h1>

<p><strong>ID:</strong> {{ $donation->id }}</p>

<p><strong>Donor:</strong> {{ $donation->donor_name }}</p>

<p><strong>Email:</strong> {{ $donation->donor_email }}</p>

<p><strong>Campaign ID:</strong> {{ $donation->campaign_id }}</p>

<p><strong>Amount:</strong> ₹{{ $donation->amount }}</p>

<p><strong>Payment ID:</strong> {{ $donation->payment_id }}</p>

<p><strong>Payment Method:</strong> {{ $donation->payment_method }}</p>

<p><strong>Status:</strong> {{ $donation->payment_status }}</p>

<a href="{{ route('admin.refund.create', $donation->id) }}">
    Refund
</a>

<pre>{{ json_encode(json_decode($donation->payment_response), JSON_PRETTY_PRINT) }}</pre>

@endsection