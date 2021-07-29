<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Custom Authentication</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body class="antialiased">

    <div class="container">

        <h2>Login Form</h2><br>

        @if ($message = Session::get('reg'))
                <p class="text-success">{{ $message }}</p>
        @endif
        <form action="login" method="POST">
            @csrf

            

            @if ($message = Session::get('error'))
                <p class="text-danger">{{ $message }}</p>
            @endif


            <div class="form-group">
               
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                placeholder="Enter email" value="{{ old('email') }}">
                @if ($message = Session::get('emailFail'))
                    <p class="text-danger">{{ $message }}</p>
                @endif
                @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

               

            </div>

            
            <div class="form-group">
                @if ($message = Session::get('passFail'))
                    <p class="text-danger">{{ $message }}</p>
                @endif
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                placeholder="Password" value="{{ old('password') }}">
            
                
                
                @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <button type="submit" class="btn btn-primary">Log in</button>
            <a class="btn btn-primary" href="registration" role="button">Registration</a>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
