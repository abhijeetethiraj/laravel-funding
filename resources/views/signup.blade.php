<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login In</title>
</head>

<body>
    <div class="login">
        <h2> Create Account</h2>
        <p>Create a new account to get started and enjoy <br> seamless access to our features</p>
        <form action="/signup" method="post">
            @csrf
            <div class="input">
                <div class="name">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div class="email">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email address">

                </div>
                <div class="password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="password">
                </div>
            </div>

            <center>

                <button type="submit"> Create Account </button>
            </center>
            <p>Already have an account <a href="login.html">Log In here</a></p>
        </form>
    </div>


</body>

</html>