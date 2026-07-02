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

    <form>
        @csrf

        @guest
        <input type="text" name="donor_name" placeholder="Your Name">
        <input type="email" name="donor_email" placeholder="Your Email">
        @endguest

        <input
            type="number"
            id="amount"
            placeholder="Enter Amount">

        <button
            type="button"
            id="donate-btn">
            Proceed To Pay
        </button>
    </form>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        const donateBtn = document.getElementById("donate-btn");

        donateBtn.addEventListener("click", async function() {

            const amount =
                document.getElementById("amount").value;

            if (!amount || amount <= 0) {
                alert("Please enter a valid amount");
                return;
            }

            const donorName = document.querySelector('input[name="donor_name"]')?.value;
            const donorEmail = document.querySelector('input[name="donor_email"]')?.value;
          

            const orderResponse = await fetch("/create-order", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'input[name="_token"]'
                    ).value
                },
                body: JSON.stringify({
                    amount: amount,
                    campaign_id: "{{ $campaign->id }}",
                    donor_name: donorName,
                    donor_email: donorEmail
                })
            });

            const order = await orderResponse.json();

            console.log(order);

            const options = {

                key: "rzp_test_T53I1W3nMKK3Rq",


                amount: order.amount,

                currency: order.currency,

                order_id: order.id,
                name: "ImpactGuru Donor",

                description: "Campaign Donation",

                callback_url: "/payment/callback",

                modal: {
                    ondismiss: function() {
                        window.location.href =
                            "/campaign/failed?campaign_id={{ $campaign->id }}";
                    }

                },

                theme: {
                    color: "#20c997",
                }
            };

            const rzp = new Razorpay(options);

            rzp.on('payment.failed', function(response) {

                console.log(response);

                window.location.href =
                    "/campaign/failed?campaign_id={{ $campaign->id }}";

            });

            rzp.open();
        });
    </script>
</body>

</html>