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
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="/">About</a></li>
                <li><a class="nav-link scrollto" href="/">Kegiatan</a></li>
                <li><a class="nav-link scrollto" href="/">Contact</a></li>
                <li><a class="nav-link" href="{{ route('dashboard') }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main" >

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Kegiatan</a></li>
                <li>Detail Kegiatan</li>
            </ol>
            <h2>Detail Kegiatan</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

           <h2 class="">{{ $kegiatan->judul }}</h2>

           {!! $kegiatan->deskripsi !!}

        </div>
    </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
@endsection