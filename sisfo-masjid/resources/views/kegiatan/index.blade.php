@extends('_layouts.master')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

<div class="container-fluid px-4">

    <div class="mt-4 h1">
        <span>Kegiatan</span>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary float-end">
            <i class="fas fa-plus"></i> Tambah
        </a>

    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kegiatan</li>
    </ol>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>#</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kegiatan as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td class="text-center">
                            <form action="" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="kegiatan_id" value="{{ $item->id }}">
                                <button class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
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
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLabel">Tambah Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

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

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endsection