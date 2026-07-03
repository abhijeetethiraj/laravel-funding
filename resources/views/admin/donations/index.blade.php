@extends('admin.layout.admin')
@section('content')

<link rel="stylesheet" href="{{ asset('css/index-donate.css') }}">
<h1 class="page-title">
    All Donations
</h1>

<form method="GET" class="search-form">
    <input type="text"
        name="search"
        placeholder="Search Name / Email / Payment ID"
        value="{{ request('search') }}">
    <button type="submit">Search</button>
</form>



<table class="table">
    <tr>
        <th>ID</th>

        <th>Action</th>

        <th>UsesId</th>

        <th>CampaignId</th>

        <th>DonorName</th>

        <th>DonorEmail</th>

        <th>Amount</th>

        <th>PaymentId</th>

        <th>CreatedAt</th>

        <th>UpdatedAt</th>

        <th>PaymentMethod</th>

        <th>PaymentResponse</th>
    </tr>

    @foreach($donations as $donation)
    <tr>
        <td>{{ $donation->id }}</td>
        <td>
            <a href="{{ route('admin.donations.show', $donation->id) }}">
                View
            </a>
        </td>

        <td>{{ $donation->user_id }}</td>

        <td>{{ $donation->campaign_id }}</td>

        <td>{{ $donation->donor_name }}</td>

        <td>{{ $donation->donor_email }}</td>

        <td>₹{{ $donation->amount }}</td>

        <td>{{ $donation->payment_id }}</td>

        <td>{{ $donation->created_at }}</td>

        <td> {{$donation->updated_at}} </td>

        <td> {{$donation->payment_method}} </td>

        <td>

            @if($donation->payment_response)

            Yes

            @else

            No

            @endif

        </td>

    </tr>
    @endforeach
</table>
{{ $donations->withQueryString()->links() }}

@endsection