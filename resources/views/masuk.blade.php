<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>MoU - {{ $title }}</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

        {{-- Bootstrap Icon --}}
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-icons.css') }}">

        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        </style>

        
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/masuk.css') }}" rel="stylesheet">
    </head>
    <body class="text-center">

        <main class="form-signin">
            <form action="/masuk" method="POST" class="needs-validation" novalidate>
                @csrf
                <h1 class="h3 mb-3 fw-normal">Masuk</h1>
                <div class="form-floating mb-3 position-relative">
                    <input type="text" name="username" class="form-control rounded-4 @error('username')is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                    <label class="form-label" for="username">Username</label>
                    @error('username')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3 position-relative">
                    <input type="password" name="password" class="form-control rounded-4 @error('password')is-invalid @enderror" id="password" placeholder="Password" value="{{ old('password') }}" required>
                    <label class="form-label" for="password">Password</label>
                    @error('password')
                        <div class="invalid-tooltip">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-secondary" type="submit">Masuk</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2022 AmbonXNobody</p>
            </form>
            {{-- <form method="POST" action="/masuk">
                <h1 class="h3 mb-3 fw-normal">Masuk</h1>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2022 AmbonXNobody</p>
            </form> --}}
        </main>

        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>