<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all-style.css') }}">
    {{-- <link rel="stylesheet" href="/css/all-style.css"> --}}
    <title>ReMot | All Motors</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
</head>
<body>
    <section class="services" id="motors">
        <div class="services-container">
            @foreach($data as $motor)
                <div class="box">
                    <div class="box-img">
                        <img src="{{ url('/img/' . $motor->image) }}">
                    </div>
                    <p>{{ $motor->year }}</p>
                    <h3>{{ $motor->merk }}</h3>
                    <h2>Rp. {{ $motor->price }} <span>/hari</span></h2>
                    <form method="GET" action="{{ url('form') }}">
                        @auth
                            <button type="submit" class="btn" value="{{ $motor->id }}" name="sewa">Sewa Sekarang</button>
                        @else
                            <a class="btn" href="{{ route('login') }}">Sewa Sekarang</a>
                        @endauth
                    </form>
                </div>
            @endforeach
        </div>
    </section>
</body>
</html>
