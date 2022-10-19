@extends('_layouts.master')

@section('content')
<div class="container-fluid px-4">

    <div class="mt-4 h1"><span>Pemasukan Kas Belum Terverifikasi</span> <button data-bs-toggle="modal"
            data-bs-target="#tambah" type="button" class="btn btn-primary float-end"><i class="fas fa-plus"></i>
            Tambah</button></div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Kas</li>
        <li class="breadcrumb-item active">Pemasukan</li>
    </ol>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Bukti Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pemasukan as $item)
                    <tr>
                        <td class="align-middle">{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                        <td class="align-middle">{{ $item->uraian }}</td>
                        <td class="align-middle">{{ number_format($item->jumlah) }}</td>
                        <td class="align-middle">{{ $item->status }}</td>
                        <td class="align-middle">
                            @if (isset($item->bukti_bayar))
                            <a href="{{ asset("img/$item->bukti_bayar" ) }}">Lihat Bukti Transfer</a>
                            @else
                            Tidak ada bukti transfer
                                
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('kas.pemasukan.sementara.aksi') }}" method="post">
                                @csrf
                                <input type="hidden" name="tanggal" value="{{ $item->tanggal }}">
                                <input type="hidden" name="uraian" value="{{ $item->uraian }}">
                                <input type="hidden" name="jumlah" value="{{ $item->jumlah }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="tujuan" value="{{ $item->tujuan }}">
                                <input type="hidden" name="bukti_bayar" value="{{ $item->bukti_bayar }}">

                                @if (auth()->user()->roles == 'bendahara')
                                <button class="btn btn-success" type="submit" value="terima" name="status"><i
                                    class="fas fa-check"></i></button>
                               @endif
                              
                                <button class="btn btn-danger" type="submit" value="tolak" name="status"><i
                                        class="fas fa-times"></i></button>
                                {{-- <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Pemasukan Kas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                        <label for="">Uraian</label>
                        <input type="text" name="uraian" class="form-control" placeholder="Uraian Pemasukan"
                            autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Jumlah Pemasukan</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="10000" autocomplete="off"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Pemasukan</label>
                        <input type="date" name="tanggal" class="form-control" placeholder="Uraian Pemasukan" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Bukti Pembayaran</label>
                        <input type="file" name="bukti_bayar" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection