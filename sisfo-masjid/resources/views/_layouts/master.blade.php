<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Masjid Nurul Qalbi Tallo</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" style="background-color: #f4f4f4">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-ungu">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">Administrator</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input type="hidden" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> --}}
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-ungu" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="/">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Kas Masjid</div>
                        <a class="nav-link" href="{{ route('kas.pemasukan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                            Pemasukan
                        </a>
                        <a class="nav-link" href="{{ route('kas.pengeluaran') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-upload"></i></div>
                            Pengeluaran
                        </a>
                        <a class="nav-link" href="{{ route('kas.rekap') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>
                            Rekap / Laporan
                        </a>

                        <div class="sb-sidenav-menu-heading">Kas Sosial</div>
                        <a class="nav-link" href="{{ route('sosial.pemasukan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                            Pemasukan
                        </a>
                        <a class="nav-link" href="{{ route('sosial.pengeluaran') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-upload"></i></div>
                            Pengeluaran
                        </a>
                        <a class="nav-link" href="{{ route('sosial.rekap') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>
                            Rekap / Laporan
                        </a>

                        <div class="sb-sidenav-menu-heading">Belum Terverifikasi</div>
                        <a class="nav-link" href="{{ route('kas.pemasukan.sementara') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-download"></i></div>
                            Pemasukan
                            @php
                            $kasPemasukanSementara = App\Models\KasPemasukanSementara::count();
                            if ($kasPemasukanSementara > 0) {
                            echo '<span class="badge ms-2 bg-danger">'.
                                $kasPemasukanSementara .'
                            </span>';
                            }
                            @endphp
                        </a>
                        <a class="nav-link" href="{{ route('kas.pengeluaran.sementara') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-upload"></i></div>
                            Pengeluaran
                            @php
                            $kasPengeluaranSementara = App\Models\KasPengeluaranSementara::count();
                            if ($kasPengeluaranSementara > 0) {
                            echo '<span class="badge ms-2 bg-danger">'.
                                $kasPengeluaranSementara .'
                            </span>';
                            }
                            @endphp
                        </a>

                        <div class="sb-sidenav-menu-heading">Kegiatan</div>
                        <a class="nav-link" href="{{ route('kegiatan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                            Kegiatan
                        </a>


                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SISFO MASJID 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>