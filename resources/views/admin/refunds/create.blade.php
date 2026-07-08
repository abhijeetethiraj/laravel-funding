@extends('admin.layout.admin')
@section('content')

<h1>Refund Donation</h1>

<p>
    Donation ID: {{$donation->id}}
</p>

<p>
    Amount : ₹{{$donation->amount}}
</p>

<form action="{{ route('admin.refund.store') }}" method="POST">

    @csrf

    <input
        type="hidden"
        name="donation_id"
        value="{{ $donation->id }}">

    <input
        type="number"
        name="amount"
        placeholder="Refund Amount">

    <textarea
        name="reason"
        placeholder="Reason"></textarea>

    <button type="submit">
        Refund
    </button>

</form>

@endsection