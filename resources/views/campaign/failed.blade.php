<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>

    <link rel="stylesheet"
          href="{{ asset('css/failed.css') }}">
</head>
<body>

    <div class="failed-card">

        <div class="icon">✕</div>

        <h1>Payment Failed</h1>

        <p>
            Your donation could not be completed.
            Please try again.
        </p>

        <p class="help-text">
            If the amount was deducted from your account
            and you do not receive a confirmation email,
            please contact support.
        </p>

        <div class="buttons">

            <a href="javascript:history.back()"
               class="retry-btn">
                Retry Donation
            </a>

            <a href="/"
               class="home-btn">
                Back Home
            </a>

        </div>

    </div>

</body>
</html>