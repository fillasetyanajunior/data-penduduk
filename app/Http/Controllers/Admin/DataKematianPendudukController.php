<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKematianPenduduk;
use App\Models\DetailPenduduk;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class DataKematianPendudukController extends AppController
{
    public function index()
    {
        $title      = 'Data Kematian Penduduk';
        return view('admin.kematianpenduduk.kematianpenduduk', compact('title'));
    }
    public function store(Request $request)
    {
        $penduduk       = Penduduk::find($request->id);
        $detailpenduduk = DetailPenduduk::where('nik', $penduduk->nik)->first();

        DataKematianPenduduk::create([
            'nkk'                   => $detailpenduduk->nkk,
            'nik'                   => $detailpenduduk->nik,
            'nama'                  => $detailpenduduk->nama,
            'tempat_lahir'          => $detailpenduduk->tempat_lahir,
            'tanggal_lahir'         => $detailpenduduk->tanggal_lahir,
            'jenis_kelamin'         => $detailpenduduk->jenis_kelamin,
            'agama'                 => $detailpenduduk->agama,
            'status_perkawinan'     => $detailpenduduk->status_perkawinan,
            'pekerjaan'             => $detailpenduduk->pekerjaan,
            'kewarganegaraan'       => $detailpenduduk->kewarganegaraan,
            'alamat'                => $detailpenduduk->alamat,
            'rt'                    => $detailpenduduk->rt,
            'rw'                    => $detailpenduduk->rw,
            'dusun'                 => $detailpenduduk->dusun,
            'desa'                  => $detailpenduduk->desa,
            'kecamatan'             => $detailpenduduk->kecamatan,
            'kabupaten'             => $detailpenduduk->kabupaten,
            'provinsi'              => $detailpenduduk->provinsi,
            'kode_pos'              => $detailpenduduk->kode_pos,
            'no_telepon'            => $detailpenduduk->no_telepon,
            'status_kependudukan'   => $detailpenduduk->status_kependudukan,
        ]);
        $penduduk->delete();
        DetailPenduduk::where('nik', $penduduk->nik)->delete();
        return redirect()->back()->with('message', 'Data Kematian Penduduk Berhasil Ditambahkan');
    }
}
