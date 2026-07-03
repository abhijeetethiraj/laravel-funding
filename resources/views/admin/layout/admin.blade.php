<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>Admin Panel</title>

    <style>

    </style>
</head>

<body>

    <div class="sidebar">

        <h2>Admin Panel</h2>

        <a href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>

        <a href="{{ route('admin.donations') }}">
            Donations
        </a>

        <a href="{{ route('admin.campaigns')}}">
            Campaigns
        </a>

        <a href="{{ route('admin.users') }}">
            Users
        </a>



    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>