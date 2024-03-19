<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite('resources/css/auth.css')
    <title>Wydad Ac</title>
</head>

@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" id="alert">
    {{ session('error') }}
</div>
@endif

<body>


    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input name="fname" type="text" placeholder="First Name">
                @if($errors->has('firstname'))
                <div class="alert alert-danger">{{ $errors->first('firstname') }}</div>
                @endif
                <input name="lname" type="text" placeholder="Last Name">
                @if($errors->has('lastname'))
                <div class="alert alert-danger">{{ $errors->first('lastname') }}</div>
                @endif
                <input name="email" type="email" placeholder="Email">
                @if($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                <input name="password" type="password" placeholder="Password">
                @if($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{route('login')}}">
                @csrf
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input name="email" type="email" placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="{{ asset('images/Logo_Wydad_Athletic_Club.png') }}" class="logo" style="width: 25%; height:20%; margin-bottom: 4%;">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="{{ asset('images/Logo_Wydad_Athletic_Club.png') }}" class="logo" style="width: 25%; height:20%; margin-bottom: 4%;">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/auth.js')

</body>

</html>