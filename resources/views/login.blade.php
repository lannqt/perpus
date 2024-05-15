<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        .main {
            height: 100vh;
        }

        .login-box {
            width: 500px;
            padding: 30px;
        }

        form div {
            margin: 15px;
        }
    </style>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
        <div class="login-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" required>
                </div>
                <div>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                </div>

                <div>
                    <button class="btn btn-primary form-control" type="submit">Login</button>
                </div>
            </form>
            <a href="/register">register</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>