<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login In</title>
</head>
<body>
    <div class="login">
        <h2> Log in</h2>
        <p>Enter your email and password  to securely access your <br>  account and  manage your service</p>
        <form action="/login" method="post">
            @csrf
             <div class="input">

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

               <button> Login</button>
           </center>
        <p>Don't have an account <a href="/signup">Sign Up here</a></p>
        </form>
    </div>
        
  
</body>
</html>