@extends('_layouts.master')

@section('content')
<div class="container-fluid px-4">

    <div class="mt-4 h1"><span>Rekapitulasi Kas Masjid</span> </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Kas</li>
        <li class="breadcrumb-item active">Rekapitulasi</li>
    </ol>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="form-control" value="{{ $tanggal_awal ?? ""  }}" required>
                        </div>
                    </div>
    
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control" value="{{ $tanggal_akhir ?? "" }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    Filter
                </button>
            </form>
        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">

            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Uraian</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rekap as $item)
                    <tr>
                        <td class="align-middle">{{ date('d M Y', strtotime($item->tanggal)) }}</td>
                        <td class="align-middle">{{ $item->uraian }}</td>
                        <td class="align-middle text-end">{{ number_format($item->pemasukan) }}</td>
                        <td class="align-middle text-end">{{ number_format($item->pengeluaran) }}</td>
                        {{-- <td>
                            <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td> --}}
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="2" class="text-end">Total</th>
                        <th class="text-end">{{ number_format($total_pemasukan) }}</th>
                        <th class="text-end">{{ number_format($total_pengeluaran) }}</th>
                    </tr>
                    <tr>
                        <th colspan="3" class="text-end">Saldo Akhir</th>
                        <th class="text-end">{{ number_format($total_pemasukan-$total_pengeluaran) }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection