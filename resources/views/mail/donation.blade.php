<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="container">

        <div class="header">
            Thank You For Your Donation
        </div>

        <p>Hi <strong>{{ $name }}</strong>,</p>

        <p>
            We have successfully received your donation.
            Your contribution will help support the campaign.
        </p>

        <div class="details">

            <p>
                <strong>Donation Amount:</strong>
                <span class="amount">
                    ₹{{ $amount }}
                </span>
            </p>

            <p>
                <strong>Payment ID:</strong>
                {{ $paymentId }}
            </p>

        </div>

        <center>
            <a href="http://127.0.0.1:8000"
               class="btn">
                Visit ImpactGuru
            </a>
        </center>

        <div class="footer">
            Thank you for supporting ImpactGuru.
        </div>

    </div>
</body>
</html>