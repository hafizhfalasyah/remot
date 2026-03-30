<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/form.css') }}">
    {{-- <link rel="stylesheet" href="/css/form.css"> --}}
    <title>ReMot | Formulir Penyewaan</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
</head>
<style>
    :root {
        --main-hue: 208;

        --text-color: #001920;
        --input-bg: hsla(var(--main-hue), 50%, 50%, 6.5%);
        --input-bg-hover: hsla(var(--main-hue), 50%, 50%, 14%);
    }
    .input-wrap {
        position: relative;
    }
    .input-wrap label {
        position: absolute;
        left: calc(1.35rem + 2px);
        transform: translateY(-80%);
        color: var(--text-color);
        pointer-events: none;
        transition: .25s;
        margin-top: 1.4rem;
    }
    .form-control {
        width: 100%;
        background-color: var(--input-bg);
        padding: 1.5rem 1.35rem calc(0.75rem - 2px) 1.35rem;
        border: none;
        outline: none;
        font-family: inherit;
        border-radius: 20px;
        color: var(--text-color);
        font-weight: 500;
        font-size: 0.95rem;
        border: 2px solid transparent;
        box-shadow: 0 0 0 0px hsla(var(--main-hue), 92%, 54%, 0.169);
        transition: 0.3s;
        margin-bottom: 20px;
    }
    .form-control:hover {
        background-color: var(--input-bg-hover);
    }
    .btn {
        display: inline-block;
        padding: 8px 18px;
        background-color: #00345b;
        color: #fff;
        font-size: 15px;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        border: none;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn:hover {
        background-color: #6CA6CD;
        color: #fff;
        text-decoration: none;
    }
    .btn-back {
        display: inline-block;
        padding: 8px 18px;
        background-color: #c9302c;
        color: #fff;
        font-size: 15px;
        line-height: 1.5;
        text-align: center;
        text-decoration: none;
        border-radius: 20px;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-back:hover {
        background-color: #d9534f;
        color: #fff;
        text-decoration: none;
    }
    .btn:focus,
    .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .form-control:invalid {
        border-color: #d9534f;
    }
    .text-danger {
        color: #d9534f;
    }
</style>
<body>
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h2>Formulir Penyewaan</h2>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <form method="POST" action="{{ url('checkout') }}" class="rent-form">
                    @csrf
                    <div class="input-wrap">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">
                                <i class="bx bx-error-circle error-icon"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <div class="input-wrap">
                        <label for="phone">No Hp</label>
                        <input type="text" class="form-control" name="phone" placeholder="Masukkan No Hp" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger">
                                <i class="bx bx-error-circle error-icon"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <div class="input-wrap">
                        <label for="pick">Tanggal Pengambilan</label>
                        <input type="date" class="form-control" name="pick">
                        @error('pick')
                            <div class="text-danger">
                                <i class="bx bx-error-circle error-icon"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <div class="input-wrap">
                        <label for="return">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="return">
                        @error('return')
                            <div class="text-danger">
                                <i class="bx bx-error-circle error-icon"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    <a href="{{ url('login') }}" class="btn-back">Back</a>
                    <button type="submit" class="btn" value="{{ $_GET['sewa'] }}" name='sewa'>Submit</button>
                </form>
            </div>
        </div>
    </main>
</body>
<script>
    let form = document.querySelector('form');
    let inputs = form.querySelectorAll('.form-control');

    form.addEventListener('submit', (event) => {
    let errors = false;

    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (!input.checkValidity()) {
        input.classList.add('is-invalid');
        errors = true;
        } else {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        }
    }

    if (errors) {
        event.preventDefault();
    }
    });
</script>
</html>
