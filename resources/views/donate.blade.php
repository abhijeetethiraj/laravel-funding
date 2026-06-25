<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/donation.css') }}">
</head>

<body>
    <h1>{{ $campaign->title }}</h1>

    <form id="donation-form" action="{{ route('donation.store') }}" method="POST" >
        @csrf

        @guest
        <input
            type="text"
            name="donor_name"
            placeholder="Your Name">

        <input
            type="email"
            name="donor_email"
            placeholder="Your Email">
        @endguest



        <input
            type="number"
            id="amount"
            name="amount"
            placeholder="Enter Amount">

        <input
            type="hidden"
            name="campaign_id"
            value="{{ $campaign->id }}">

        <input
            type="hidden"
            name="payment_id"
            id="payment_id">
        <input
            type="hidden"
            name="payment_response"
            id="payment_response">

        <button
            type="button"
            id="donate-btn">
            Proceed To Pay
        </button>
    </form>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        const donateBtn = document.getElementById("donate-btn");

        donateBtn.addEventListener("click", function() {

            const amount =
                document.getElementById("amount").value;

            if (!amount || amount <= 0) {
                alert("Please enter a valid amount");
                return;
            }

            const options = {

                key: "rzp_test_T53I1W3nMKK3Rq",


                amount: amount * 100,

                currency: "INR",

                name: "ImpactGuru Donor",

                description: "Campaign Donation",

                handler: function(response) {



                    console.log("PAYMENT SUCCESS");

                    document.getElementById("payment_id").value =
                        response.razorpay_payment_id;

                    document.getElementById("payment_response").value =
                        JSON.stringify(response);

                    console.log("ABOUT TO SUBMIT");

                    document.getElementById("donation-form").submit();



                },

                modal: {
                    ondismiss: function() {
                        console.log("Payment Cancelled");
                    }
                },

                theme: {
                    color: "#20c997",
                }
            };

            const rzp = new Razorpay(options);

            rzp.on('payment.failed', function(response) {

                console.log(response.error);

                window.location.href =
                    window.location.href =
                    "/campaign/failed?campaign_id={{ $campaign->id }}";

            });

            rzp.open();
        });
    </script>
</body>

</html>