<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <div class="formdata">
            <div class="login">Login</div>
            @if (Session::get('message'))
                <div style="color:aquamarine; text-align:center;">{{ Session::get('message') }}</div>
            @endif
            <form action="/logindata" method="POST">
                @csrf
                <div class="inputdata">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter your email">
                    <span class="error">
                        @error('email')
                            {{ '*' . $message }}
                        @enderror
                    </span>
                </div>
                <div class="inputdata">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                    <span class="error">
                        @error('password')
                            {{ '*' . $message }}
                        @enderror
                    </span>
                </div>
                <div class="rememberdata">
                    <input type="checkbox" name="remember">
                    <label for="name">Remember me</label>
                </div>
                <div class="submit"><button type="submit">Login</button></div>
                <a href="/register" class="register">Register here</a>
                <a href="{{ Route('loginwithgoogle') }}" class="loginwithgoogle">OR login with google</a>
            </form>
        </div>
    </div>
</body>

</html>
