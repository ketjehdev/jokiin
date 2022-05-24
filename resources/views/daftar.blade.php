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

    <title>Jokiin Aja | Daftar</title>
</head>
<body>

    <div class="banner d-flex" style="width: 100%; height: 100vh;">
        <div class="col-8 box-img bg-primary">
            <img src="{{ asset('img/daftar.jpg') }}" alt="login-bg" class="bg">
        </div>
        <div class="col-4 forum d-flex flex-column align-items-center">
            <img src="{{ asset('img/jokiin_logo.png') }}" alt="login-bg" class="bg_forum">
            <h3 class="mt-4 mb-0 text-center">Jokiin</h3>
            <p class="text-secondary text-center">- Daftar Akun -</p>

            <form action="/daftarAuth" method="POST" style="width: 100%;" class="mx-2 mt-2">
                @csrf
                <span>Name <span class="text-danger">*</span></span><br>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror mb-4" autofocus placeholder="Masukan name kamu" name="name">

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
                <button class="btn btn-success mt-4" style="width: 100%;">Masuk</button>
                <span class="text-center" style="display: block">
                    Sudah mempunyai akun jokiin? <br>
                    <a href="{{ route('login') }}">
                        login sekarang!
                    </a>
                </span>
            </form>
        </div>
    </div>s

    {{-- script API bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>