@extends('admin.layout.admin')
@section('content')
<h2>Admin Dashboard</h2>

<h3>Total Users : {{ $totalUsers }}</h3>

<h3>Total Campaigns : {{ $totalCampaigns }}</h3>

<h3>Total Donations : {{ $totalDonations }}</h3>

<h3>Total Raised : ₹{{ $totalAmount }}</h3>

<h3>Total Refunds : ₹{{ $totalRefundAmount }}</h3>

<h3>Available Funds : ₹{{ $availableFunds }}</h3>   
@endsection