<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="container">
        <div class="formdata">
            <div class="login">Register</div>
            @if (Session::get('message'))
                <div style="color:aquamarine; text-align:center;">{{ Session::get('message') }}</div>
            @endif
            <form action="/registerdata" method="POST">
                @csrf
                <div class="inputdata">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Enter your name">
                    <span class="error">
                        @error('name')
                            {{ '*' . $message }}
                        @enderror
                    </span>
                </div>
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
                <div class="submit"><button type="submit">Register</button></div>
                <a href="/login" class="register">Already have account?</a>
            </form>
        </div>
    </div>
</body>

</html>
