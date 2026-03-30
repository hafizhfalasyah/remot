<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}" />
    {{-- <link rel="stylesheet" href="/css/login.css" /> --}}
    <title>Masuk & Daftar Akun</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
  </head>
  <body>
    <style>
        .invalid-feedback {
            display: block;
            margin-top: 5px;
            color: red;
            font-size: 0.9rem;
        }
    </style>
        <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Masuk</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="submit" value="Masuk" class="btn solid" />
                {{-- <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                </div> --}}
            </form>

            <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Daftar</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Username" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" />
                </div>
                <input type="submit" class="btn" value="Daftar" />
                {{-- <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div> --}}
                </form>
                </div>
            </div>

        <div class="panels-container">
            <div class="panel left-panel">
            <div class="content">
                <h3>Belum punya akun ?</h3>
                <p>
                Apabila anda belum memiliki akun, silahkan buat akun anda dengan menekan tombol daftar yang ada dibawah ini.
                </p>
                <button class="btn transparent" id="sign-up-btn">
                Daftar
                </button>
            </div>
            <img src="img/register.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
            <div class="content">
                <h3>Sudah punya akun ?</h3>
                <p>
                Apabila anda sudah memiliki akun, silahkan masuk ke akun anda dengan menekan tombol masuk yang dibawah ini.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                Masuk
                </button>
            </div>
            <img src="img/login.svg" class="image" alt="" />
            </div>
        </div>
        </div>

        <script src="{{ url('/js/login.js') }}"></script>
        {{-- <script src="/js/login.js"></script> --}}
  </body>
</html>
