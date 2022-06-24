<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaftarPemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoterListManagemenController extends AppController
{
    public function index()
    {
        $title          = 'Daftar Calon';
        $daftarPemilih  = DaftarPemilih::paginate(10);
        return view('admin.voter-list-managemen.voter-list-managemen', compact('title', 'daftarPemilih'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'description'   => 'required',
            'thumnail'      => 'required:image:jpg',
        ]);

        $path = Storage::putFile('calonkandidat',$request->file('thumnail'),time() . rand(0,100) . '.jpg');

        DaftarPemilih::create([
            'nama'          => $request->nama,
            'description'   => $request->description,
            'thumnail'      => $path,
        ]);

        return redirect()->back()->with('success','Tambah Calon Kandidat Berhasil');
    }

    public function edit(DaftarPemilih $daftarPemilih)
    {
        return response()->json($daftarPemilih);
    }

    public function update(Request $request, DaftarPemilih $daftarPemilih)
    {
        if ($request->hasFile('thumnail')) {
            $path = Storage::putFileAs('calonkandidat', $request->file('thumnail'), time() . rand(0, 100) . '.jpg');
        }else {
            $path = $daftarPemilih->thumnail;
        }

        $daftarPemilih->update([
            'nama'          => $request->nama,
            'description'   => $request->description,
            'thumnail'      => $path,
        ]);

        return redirect()->back()->with('success', 'Edit Calon Kandidat Berhasil');
    }
}
