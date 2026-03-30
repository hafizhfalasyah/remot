@extends('user.layouts.app')

@section('content')
<!-- Home -->
<section class="home" id="home">
    <div class="text">
        <h1><span>Cari</span> sepeda <br> motor untuk disewa?</h1>
        <p style="margin-top: 20px;">Website kami menawarkan sepeda motor berkualitas tinggi untuk disewa dengan proses yang cepat dan mudah. Anda dapat memilih model sepeda motor yang diinginkan dan menentukan durasi sewa yang Anda inginkan, mulai dari beberapa jam hingga beberapa minggu. Periode sewa yang fleksibel memungkinkan Anda menyesuaikan dengan kebutuhan Anda. Nikmati pengalaman menyewa sepeda motor yang mengasyikkan bersama kami!</p>
    </div>
    <div class="form-container">
        <form method="POST" action="{{ url('all') }}">
            @csrf
            <div class="input-box">
                <span>Motor, model, atau brand</span>
                <input type="search" name="search" id="" placeholder="Apa yang anda cari ?">
            </div>
            <div class="input-box">
                <span>Tgl Pengambilan</span>
                <input type="date" name="" id="">
            </div>
            <div class="input-box">
                <span>Tgl Pengembalian</span>
                <input type="date" name="" id="">
            </div>
            <input type="submit" name="form" id="" class="btn">
        </form>

        <!-- Lottiefiles -->
        <div id="lottie1">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_ztjvhpit.json"  background="transparent"  speed="1"  style="width: 600px; height: 650px; margin-top: 90px;" loop  autoplay></lottie-player>
        </div>
    </div>
</section>

<!-- Rent -->
<section class="rent" id="rent">
    <div class="heading"  style="margin-top: 120px;">
        <span>Sewa</span>
        <h1>Cara Menyewa Sepeda Motor</h1>
    </div>
    <div class="rent-container">
        <div class="box">
            <i class='bx bxs-map'></i>
            <h2>Pilih Lokasi Pengambilan</h2>
            <p>Eksplorasi dimulai dari sini! Dengan website rental motor kami, Anda dapat memilih lokasi pengambilan yang sesuai dengan kebutuhan Anda. Mulai petualangan Anda dengan sepeda motor pilihan dan nikmati pengalaman berkendara yang tak terlupakan.</p>
        </div>
        <div class="box">
            <i class='bx bxs-calendar-check'></i>
            <h2>Pilih Tanggal Pengambilan</h2>
            <p>Rencanakan petualangan Anda dengan mudah! Dengan website rental motor kami, Anda dapat memilih tanggal pengambilan yang sesuai dengan jadwal Anda. Jadikan setiap momen berharga dengan mengendarai sepeda motor impian Anda.</p>
        </div>
        <div class="box">
            <i class='bx bxs-calendar-star'></i>
            <h2>Sewa Sepeda Motor</h2>
            <p>Temukan kebebasan dan petualangan dengan sewa sepeda motor melalui website kami. Tersedia berbagai pilihan sepeda motor berkualitas tinggi untuk memenuhi kebutuhan Anda. Mulailah perjalanan Anda dan ciptakan momen tak terlupakan di atas roda dua.</p>
        </div>
    </div>
</section>

<!-- motor -->
<section class="services" id="motors" style="margin-top: 50px;">
    <div class="heading" style="margin-top: 40px;">
        <span>Motor</span>
        <h1>Temukan Sepeda Motor</h1>
    </div>
    <div class="services-container">
        @foreach(DB::table('motors')->get()->slice(0, 3) as $motor)
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
    <center>
        <div id="load-more"><a href="{{ url('all') }}">Lihat Lainnya</a></div>
    </center>
</section>

<!-- contact -->
<section class="contact" id="contact">
    <div class="container">
        <div class="left">
            <div class="form-wrapper">
                <div class="contact-heading">
                    <h1>Kontak Kami<span>.</span></h1>
                    <p class="text" style="color: #9ca7b6;">Atau Kontak Kami Melalui : <a href="mailto:remot.rentalmotor@gmail.com">Remot@gmail.com</a></p>
                </div>
                <form action="{{ route('home.post') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="input-wrap">
                        <input class="contact-input" autocomplete="off" name="first_name" type="text" required>
                        <label for="">Nama Depan</label>
                        <i class="icon fa-solid fa-address-card"></i>
                    </div>

                    <div class="input-wrap">
                        <input class="contact-input" autocomplete="off" name="last_name" type="text" required>
                        <label for="">Nama Belakang</label>
                        <i class="icon fa-solid fa-address-card"></i>
                    </div>

                    <div class="input-wrap w-100">
                        <input class="contact-input" autocomplete="off" name="email" type="text" required  style="width: 212%;">
                        <label for="">Email</label>
                        <i class="icon fa-solid fa-envelope" style="right: -245px;"></i>
                    </div>
                    <br>
                    <div class="input-wrap textarea w-100">
                        <textarea class="contact-input" autocomplete="off" name="message" required style="width: 212%;"></textarea>
                        <label for="">Pesan</label>
                        <i class="icon fa-solid fa-inbox" style="right: -245px;"></i>
                    </div>
                    <br>
                    <div class="contact-buttons">
                        <button class="btn upload">
                            <input type="submit" value="Send Message" class="btn">Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div id="lottie2">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_TNi3iOF9S4.json"  background="transparent"  speed="1"  style="width: 700px; height: 800px; margin-top: 280px;"  loop  autoplay></lottie-player>
        </div>
    </div>
</section>

<!-- Footer -->
<style>
    .social-icon {
        display: inline-block;
        font-size: 24px;
        color: #333;
        transition: transform 0.3s ease-in-out;
    }

    .social-icon:hover {
        transform: scale(1.2);
    }
</style>
<div class="copyright">
    <p>&#169; ReMot Website All Right Reserved</p>
    <div class="social">
        <a href="https://www.facebook.com" class="social-icon"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.twitter.com" class="social-icon"><i class="bx bxl-twitter"></i></a>
        <a href="https://www.instagram.com" class="social-icon"><i class="bx bxl-instagram"></i></a>
    </div>
</div>

<script>
    let loadMoreBtn = document.querySelector('#load-more');
    let currentItem = 3;

    loadMoreBtn.onclick = () =>{
    let boxes = [...document.querySelectorAll('.container .box-container .box')];
    for (var i = currentItem; i < currentItem + 3; i++){
        boxes[i].style.display = 'inline-block';
    }
    currentItem += 3;

    if(currentItem >= boxes.length){
        loadMoreBtn.style.display = 'none';
    }
    }
</script>

<!-- footer animation -->
<script>
    // Get all elements with the 'social-icon' class
    const socialIcons = document.querySelectorAll('.social-icon');

    // Attach hover animation and color change on each social icon
    socialIcons.forEach((icon) => {
        const animation = icon.dataset.animation;
        const originalColor = getComputedStyle(icon).color;

        icon.addEventListener('mouseenter', () => {
            icon.classList.add('animate__animated', animation);
            icon.style.color = '#6CA6CD'; // Replace with your desired hover color
        });

        icon.addEventListener('mouseleave', () => {
            icon.classList.remove('animate__animated', animation);
            icon.style.color = originalColor;
        });
    });
</script>

<!-- Scroll Reveal -->
<script src="https://unpkg.com/scrollreveal"></script>

<!-- Link to JS -->
<script src="{{ asset('/js/main.js') }}"></script>
{{-- <script src="/js/main.js"></script> --}}
</body>
</html>

@endsection
