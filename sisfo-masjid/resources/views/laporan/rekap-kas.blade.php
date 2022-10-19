<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Kas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<style>
    th, td{
        border: 1px solid black;
        padding: 5px;
    }
</style>

<body>
    <div class="container-fluid">

        <h1 class="text-center">Rekapitulasi Kas Masjid </h1>


        <table class="table table-bordered">
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
   
</body>

</html>