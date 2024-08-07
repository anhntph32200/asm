<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h1 class="mt-3 mb-3 text-center">Register</h1>

        <div class="row justify-content-center">
            <div class="col-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST" class="p-4 shadow bg-white rounded">
                    @csrf
    
                    <div class="form-group">
                        <label for="name" class="mt-4">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="email" class="mt-4">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="password" class="mt-4">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
    
                    <div class="form-group">
                        <label for="password_confirmation" class="mt-4">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                    <a href="{{ route('login') }}">login</a><br>
    
                    <button class="btn btn-primary mt-4" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
