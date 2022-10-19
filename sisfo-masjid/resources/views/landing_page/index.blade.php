@extends('_layouts.landing_page')

@section('content')

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{ route('landing-page') }}">Nurul Qalbi Tallo</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#kegiatan">Kegiatan</a></li>
                <li><a class="nav-link scrollto" href="#donasi">Donasi</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                <li><a class="nav-link" href="{{ route('dashboard') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

@include('_layouts.hero_landing_page')

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div
                    class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                    <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
                </div>

                <div
                    class="col-xl-5 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                    <h3>Masjid Nurul Qalbi Tallo</h3>
                    <p>Esse voluptas cumque vel exercitationem. Reiciendis est hic accusamus. Non ipsam et sed
                        minima temporibus laudantium. Soluta voluptate sed facere corporis dolores excepturi. Libero
                        laboriosam sint et id nulla tenetur. Suscipit aut voluptate.</p>

                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">Informasi Keuangan</a></h4>
                        <p class="description"> Berikut disampaikan Biaya tetap ( minimum fixed cost)
                            per bulan mulai 01 Agustus 2020 - 28 Februari 2022 dengan asusmi 5 kali jumatan
                        </p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-file-bar-graph"></i></div>
                        <h4 class="title"><a href="{{ url('laporan-keuangan') }}">Laporan Keuangan Kas Masjid</a></h4>
                        <p class="description mb-0">Silahkan klik untuk melihat laporan keuangan dana kas Masjid</p>
                        <p class="description fw-bold">Saldo Kas Masjid : Rp.{{ $saldo_kas_masjid }}</p>
                    </div>

                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-file-earmark-bar-graph"></i></div>
                        <h4 class="title"><a href="{{ url('laporan-keuangan-kas') }}">Laporan Keuangan Kas Sosial</a>
                        </h4>
                        <p class="description mb-0">Silahkan klik untuk melihat laporan keuangan dana kas sosial Masjid</p>
                        <p class="description fw-bold">Saldo Kas Masjid : Rp.{{ $saldo_kas_sosial }}</p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    
     <!-- ======= Services Section ======= -->
       <section id="kegiatan" class="services">
        <div class="container-fluid">

            <div class="section-title">
                <h2>Kegiatan</h2>
                {{-- <h3>Check our <span>Kegiatan</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                    atque vitae autem.</p> --}}
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        @foreach ($kegiatan as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->judul }}</h5>
                                    <p class="card-text">{!! Str::limit($item->deskripsi, 100) !!}</p>
                                    <a href="{{ route('landing-page-detail',$item->id) }}"
                                        class="card-link">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->

    
     <!-- ======= Donasi Section ======= -->
     <section id="donasi" class="contact section-bg">
        <div class="container-fluid">
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-15 mt-3">
                    <div class="row">

                       <div class="col-lg-12 info"> 
                       <div class="section-title">
                        <h2>Donasi</h2>
                        <h3>Mari Berdonasi</h3>
                        <p>Form ini dapat di isi setelah melakukan pembayaran </p>
                        <br> </br>
                        <div class="row">
                                    <div class="col-md-10 text-start" >

                                    <h4>Tahapan Pengisian Form Donasi</h4>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item">Lakukan pembayaran terlebih dahulu</li>
                                        <li class="list-group-item">Isi form donasi dengan menyertakan bukti pembayaran</li>
                                        <li class="list-group-item">Sebelum menyimpan pastikan Form yang di isi sudah benar</li>
                                      </ol>
                        <div class="row">
                                      <h4 class="mt-5" style="text-align:center">Pembayaran Bisa Melalui Rekening Mesjid</h4>
                                      <img src="{{asset('img/logobri.jpg')}}" class="img-responsive" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom: auto;width:25%;" alt="Tri"> 
                                      <h6 style="text-align:center">No.Rekening</h6>
                                      <h4 style="text-align:center">123354854558948</h4>
                                      <h6 style="text-align:center" class="text-success">Atas Nama Rosniaty</h6>

                                <br>  </br>
                                <div class="col-md-10" style="margin-left: auto;margin-right: auto; margin-top: auto;margin-bottom">
                                    <h4>Donasi</h4>
                                    <form action="{{ route('kas.pemasukan.sementara') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Tujuan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tujuan" value="masjid" id="kas_masjid" checked>
                                                <label class="form-check-label" for="kas_masjid">
                                                    Kas Masjid
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tujuan" value="sosial" id="kas_sosial">
                                                <label class="form-check-label" for="kas_sosial">
                                                    Kas Sosial
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Donatur"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Uraian</label>
                                            <input type="text" name="uraian" class="form-control" placeholder="Uraian"
                                                autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control" placeholder="10000" autocomplete="off"
                                                required>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="">Tanggal Pengiriman</label>
                                            <input type="date" name="tanggal" class="form-control"
                                                placeholder="Uraian Pemasukan" required>
                                        </div> --}}
                                        <input type="hidden" name="tanggal" value="{{ date(" Y-m-d") }}">
                                        <div class="mb-3">
                                            <label for="">Bukti Pembayaran</label>
                                            <input type="file" name="bukti_bayar" class="form-control"
                                                accept="image/jpg" />
                                            <div class="form-text text-danger">Bukti Pembayaran Hanya .jpg</div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"> Simpan</button>
                                    </form>
                                    <br>  </br>
                                    
                                    
                                </div>
                                </div> 

                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->
    
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg pb-1">
        <div class="container-fluid">

            <div class="section-title">
                <h2>Contact</h2>
                <h3>Get In Touch With <span>Us</span></h3>
                <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                    atque vitae autem.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="row justify-content-center">

                                <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                    <i class="bx bx-map"></i>
                                    <h4>Address</h4>
                                    <p>A108 Adam Street,<br>New York, NY 535022</p>
                                </div>
                                <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                    <i class="bx bx-phone"></i>
                                    <h4>Call Us</h4>
                                    <p>+1 5589 55488 55<br>+1 5589 22548 64</p>
                                </div>
                                <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                    <i class="bx bx-envelope"></i>
                                    <h4>Email Us</h4>
                                    <p>contact@example.com<br>info@example.com</p>
                                </div>
                                <div class="col-md-6 info d-flex flex-column align-items-stretch">
                                    <i class="bx bx-time-five"></i>
                                    <h4>Working Hours</h4>
                                    <p>Mon - Fri: 9AM to 5PM<br>Sunday: 9AM to 1PM</p>
                                </div>

                            </div>

                        </div>

                    </div>


                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->
@endsection