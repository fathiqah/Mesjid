@extends('_layouts.master')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

<div class="container-fluid px-4">
    <div class="mt-4 h1">
        <span>Tambah Kegiatan</span>

    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Kegiatan</li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" placeholder="Judul" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="editor" cols="30" rows="10"></textarea>
        </div>
        <div class="text-end">
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
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