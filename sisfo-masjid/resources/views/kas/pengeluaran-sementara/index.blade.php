@extends('_layouts.master')

@section('content')
<div class="container-fluid px-4">

    <div class="mt-4 h1"><span>Pengeluaran Kas Belum Terverifikasi</span> <button data-bs-toggle="modal" data-bs-target="#tambah"
            type="button" class="btn btn-primary float-end"><i class="fas fa-plus"></i> Tambah</button></div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Kas</li>
        <li class="breadcrumb-item active">Pengeluaran</li>
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
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengeluaran as $item)
                    <tr>
                        <td class="align-middle">{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                        <td class="align-middle">{{ $item->uraian }}</td>
                        <td class="align-middle">{{ number_format($item->jumlah) }}</td>
                        <td class="align-middle">{{ $item->status }}</td>
                        <td>
                            <form action="{{ route('kas.pengeluaran.sementara.aksi') }}" method="post">
                                @csrf
                                <input type="hidden" name="tanggal" value="{{ $item->tanggal }}">
                                <input type="hidden" name="uraian" value="{{ $item->uraian }}">
                                <input type="hidden" name="jumlah" value="{{ $item->jumlah }}">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="sumber" value="{{ $item->sumber }}">
                                @if (auth()->user()->roles == 'bendahara')
                                <button class="btn btn-success" type="submit" value="terima" name="status"><i class="fas fa-check"></i></button>
                               @endif
                            
                                <button class="btn btn-danger" type="submit" value="tolak" name="status"><i class="fas fa-times"></i></button>
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
                    <h5 class="modal-title" id="tambahLabel">Tambah Pengeluaran Kas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Sumber</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber" value="masjid" id="kas_masjid" checked>
                            <label class="form-check-label" for="kas_masjid">
                                Kas Masjid
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sumber" value="sosial" id="kas_sosial">
                            <label class="form-check-label" for="kas_sosial">
                                Kas Sosial
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Uraian</label>
                        <input type="text" name="uraian" class="form-control" placeholder="Uraian Pengeluaran" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Jumlah Pengeluaran</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="10000" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Tanggal Pengeluaran</label>
                        <input type="date" name="tanggal" class="form-control" placeholder="Uraian Pengeluaran" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Bukti Pengeluaran</label>
                        <input type="file" name="bukti" class="form-control">
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