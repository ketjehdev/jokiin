<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000">
    
    {{-- stylesheet API bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    {{-- favicon cariin --}}
    <link rel="icon" href="{{ asset('img/jokiin_logo.png') }}">
    
    {{-- link stylesheet asset --}}
    <link rel="stylesheet" href="{{ asset('css/authenticate.css') }}">

    {{-- link stylesheet splash --}}
    <link rel="stylesheet" href="{{ asset('css/splash.css') }}">

    <title>Jokiin Aja | Login</title>
</head>
<body>
    
    <!-- splash screen -->
    <div class="splash" style="background-color: #fff;">
        <img src="{{ asset('img/jokiin_logo.png') }}" class="fade-in">
    </div>
    <!-- end splash screen -->

    <div class="banner d-flex" style="width: 100%; height: 100vh;">
        <div class="col-8 box-img bg-primary">
            <img src="{{ asset('img/login.jpg') }}" alt="login-bg" class="bg">
        </div>
        <div class="col-4 forum d-flex flex-column align-items-center">
            <img src="{{ asset('img/jokiin_logo.png') }}" alt="login-bg" class="bg_forum">
            <h3 class="mt-4 mb-0 text-center">Jokiin</h3>
            <p class="text-secondary text-center">- Login Page -</p>

            @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 100%">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="/loginAuth" method="POST" style="width: 100%;" class="mx-2 mt-2">
                @csrf
                <span>Username <span class="text-danger">*</span></span><br>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror mb-4" autofocus placeholder="Masukan username kamu" name="username">

                <span>Password <span class="text-danger">*</span></span><br>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan password kamu" name="password">
                <button class="btn btn-primary mt-4" style="width: 100%;">Masuk</button>
                <span class="text-center" style="display: block">
                    Belum mempunyai akun jokiin? <br>
                    <a href="{{ route('daftar') }}">
                        daftar sekarang!
                    </a>
                </span>
            </form>
        </div>
    </div>

    {{-- script API bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    {{-- script js --}}
    <script src="{{ asset('js/splash.js') }}"></script>
</body>
</html>