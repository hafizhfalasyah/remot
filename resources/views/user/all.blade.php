<?php
    try {
        $search = $_POST['search'];
    } catch (Exception $search) {
        $search = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all-style.css') }}">
    {{-- <link rel="stylesheet" href="/css/all-style.css"> --}}
    <title>ReMot | Semua Motor</title>
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" type="image/x-icon">
</head>
<body>
    <div class="search-container">
        <div class="heading" style="margin-top: 40px;">
            <span>SEMUA MOTOR</span>
            <h1 style="margin-bottom: 20px;">Pilih Sepeda Motor</h1>
            <div class="searchbar">
                <div class="searchbar-wrapper">
                    <div class="searchbar-left">
                        <div class="search-icon-wrapper">
                            <span class="search-icon searchbar-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="searchbar-center">
                        <div class="searchbar-input-spacer"></div>
                        <input type="text" class="searchbar-input" id="search" value="{{ $search }}" maxlength="2048" name="q" autocapitalize="off" autocomplete="off" title="Search" role="combobox" placeholder="Cari Motor ...">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- motor -->
    <div id="result">
        <div id="motors" class="services-container">
            @foreach(DB::table('motors')->get() as $motor)
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
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            readData();
            $('#search').on('input', function() {
                var search = $(this).val();
                if (search !== "") {
                    $('#result').html('<center><p style="font-size: 16px; text-align: center; margin-top: 15px;">Sedaang Mencari Data ...</p></center>');
                    $.ajax({
                        type: "get",
                        url: "{{ url('ajax') }}",
                        data: "merk=" + search,
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                } else {
                    readData();
                }
            });

            // Ketika halaman dimuat, cek apakah inputan sudah memiliki nilai default
            var defaultSearchValue = $('#search').val();
            if (defaultSearchValue !== "") {
                $('#search').trigger('input');
            }
        });

        function readData() {
            $.get("{{ url('read') }}", {},
                function (data, status) {
                    $("#result").html(data);
                }
            );
        }
    </script>
</body>
</html>
