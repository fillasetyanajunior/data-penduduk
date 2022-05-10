<?php

namespace App\Http\Controllers\Admin;

use App\Models\DetailPenduduk;
use App\Models\Penduduk;
use App\Models\Province;
use Illuminate\Http\Request;

class PendudukController extends AppController
{
    public function index()
    {
        $title      = 'Data Penduduk';
        $province   = Province::all();
        return view('admin.penduduk.penduduk', compact('title', 'province'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nkk'                   => 'required|numeric|min:16|max:16',
            'nik'                   => 'required|numeric|unique:penduduks|min:16|max:16',
            'nama'                  => 'required',
            'tempat_lahir'          => 'required',
            'tanggal_lahir'         => 'required',
            'jenis_kelamin'         => 'required',
            'agama'                 => 'required',
            'status_perkawinan'     => 'required',
            'pekerjaan'             => 'required',
            'kewarganegaraan'       => 'required',
            'alamat'                => 'required',
            'rt'                    => 'required|numeric',
            'rw'                    => 'required|numeric',
            'dusun'                 => 'required',
            'desa'                  => 'required',
            'kecamatan'             => 'required',
            'kabupaten'             => 'required',
            'provinsi'              => 'required',
            'kode_pos'              => 'required',
            'no_hp'                 => 'required',
            'status_penduduk'       => 'required',
        ]);

        Penduduk::create([
            'nik'   => $request->nik,
            'nama'  => $request->nama,
        ]);

        if ($request->jenis_kelamin == 1) {
            $jenis_kelamin = 'Laki-Laki';
        } else {
            $jenis_kelamin = 'Perempuan';
        }

        if ($request->agama == 1) {
            $agama = 'Islam';
        } elseif ($request->agama == 2) {
            $agama = 'Kristen';
        } elseif ($request->agama == 3) {
            $agama = 'Katolik';
        } elseif ($request->agama == 4) {
            $agama = 'Hindu';
        } elseif ($request->agama == 5) {
            $agama = 'Budha';
        } else {
            $agama = 'Kong Hu Cu';
        }

        if ($request->status_perkawinan == 1) {
            $status_perkawinan = 'Belum Kawin';
        } elseif ($request->status_perkawinan == 2) {
            $status_perkawinan = 'Kawin';
        } else {
            $status_perkawinan = 'Pernah Nikah';
        }

        if ($request->status_penduduk == 1) {
            $status_penduduk = 'WNI';
        } else {
            $status_penduduk = 'WNA';
        }

        DetailPenduduk::create([
            'nkk'                   => $request->nkk,
            'nik'                   => $request->nik,
            'nama'                  => $request->nama,
            'tempat_lahir'          => $request->tempat_lahir,
            'tanggal_lahir'         => $request->tanggal_lahir,
            'jenis_kelamin'         => $jenis_kelamin,
            'agama'                 => $agama,
            'status_perkawinan'     => $status_perkawinan,
            'pekerjaan'             => $request->pekerjaan,
            'kewarganegaraan'       => $request->kewarganegaraan,
            'alamat'                => $request->alamat,
            'rt'                    => $request->rt,
            'rw'                    => $request->rw,
            'dusun'                 => $request->dusun,
            'desa'                  => $request->desa,
            'kecamatan'             => $request->kecamatan,
            'kabupaten'             => $request->kabupaten,
            'provinsi'              => $request->provinsi,
            'kode_pos'              => $request->kode_pos,
            'no_telepon'            => $request->no_hp,
            'status_kependudukan'   => $status_penduduk,
        ]);

        return redirect()->route('penduduk')->with('success', 'Data Penduduk Berhasil Ditambahkan');
    }
    public function edit(Penduduk $penduduk)
    {
        $detailpenduduk = DetailPenduduk::where('nik', $penduduk->nik)->first();

        if ($detailpenduduk->jenis_kelamin == 'Laki-Laki') {
            $jenis_kelamin = 1;
        } else {
            $jenis_kelamin = 2;
        }

        if ($detailpenduduk->agama == 'Islam') {
            $agama = 1;
        } elseif ($detailpenduduk->agama == 'Kristen') {
            $agama = 2;
        } elseif ($detailpenduduk->agama == 'Katolik') {
            $agama = 3;
        } elseif ($detailpenduduk->agama == 'Hindu') {
            $agama = 4;
        } elseif ($detailpenduduk->agama == 'Budha') {
            $agama = 5;
        } else {
            $agama = 6;
        }

        if ($detailpenduduk->status_perkawinan == 'Belum Kawin') {
            $status_perkawinan = 1;
        } elseif ($detailpenduduk->status_perkawinan == 'Kawin') {
            $status_perkawinan = 2;
        } else {
            $status_perkawinan = 3;
        }

        if ($detailpenduduk->status_kependuduk == 'WNI') {
            $status_penduduk = 1;
        } else {
            $status_penduduk = 2;
        }

        return response()->json([
            'penduduk'          => $detailpenduduk,
            'jenis_kelamin'     => $jenis_kelamin,
            'agama'             => $agama,
            'status_perkawinan' => $status_perkawinan,
            'status_penduduk'   => $status_penduduk,
        ]);
    }
    public function update(Request $request, Penduduk $penduduk)
    {
        $penduduk->update([
            'nik'   => $request->nik,
            'nama'  => $request->nama,
        ]);

        if ($request->jenis_kelamin == 1) {
            $jenis_kelamin = 'Laki-Laki';
        } else {
            $jenis_kelamin = 'Perempuan';
        }

        if ($request->agama == 1) {
            $agama = 'Islam';
        } elseif ($request->agama == 2) {
            $agama = 'Kristen';
        } elseif ($request->agama == 3) {
            $agama = 'Katolik';
        } elseif ($request->agama == 4) {
            $agama = 'Hindu';
        } elseif ($request->agama == 5) {
            $agama = 'Budha';
        } else {
            $agama = 'Kong Hu Cu';
        }

        if ($request->status_perkawinan == 1) {
            $status_perkawinan = 'Belum Kawin';
        } elseif ($request->status_perkawinan == 2) {
            $status_perkawinan = 'Kawin';
        } else {
            $status_perkawinan = 'Pernah Nikah';
        }

        if ($request->status_penduduk == 1) {
            $status_penduduk = 'WNI';
        } else {
            $status_penduduk = 'WNA';
        }

        DetailPenduduk::where('nik', $penduduk->nik)
                    ->update([
                        'nkk'                   => $request->nkk,
                        'nik'                   => $request->nik,
                        'nama'                  => $request->nama,
                        'tempat_lahir'          => $request->tempat_lahir,
                        'tanggal_lahir'         => $request->tanggal_lahir,
                        'jenis_kelamin'         => $jenis_kelamin,
                        'agama'                 => $agama,
                        'status_perkawinan'     => $status_perkawinan,
                        'pekerjaan'             => $request->pekerjaan,
                        'kewarganegaraan'       => $request->kewarganegaraan,
                        'alamat'                => $request->alamat,
                        'rt'                    => $request->rt,
                        'rw'                    => $request->rw,
                        'dusun'                 => $request->dusun,
                        'desa'                  => $request->desa,
                        'kecamatan'             => $request->kecamatan,
                        'kabupaten'             => $request->kabupaten,
                        'provinsi'              => $request->provinsi,
                        'kode_pos'              => $request->kode_pos,
                        'no_telepon'            => $request->no_hp,
                        'status_kependudukan'   => $status_penduduk,
                    ]);

        return redirect()->route('penduduk')->with('success', 'Data Penduduk Berhasil Diubah');
    }
}
