<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $data['kegiatan'] = Kegiatan::get();
        return view('kegiatan.index',$data);
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        Kegiatan::create($data);

        return redirect(route('kegiatan'));
    }

    public function delete(Request $request)
    {
        Kegiatan::where('id', $request->kegiatan_id)->delete();
        return back();
    }
}
