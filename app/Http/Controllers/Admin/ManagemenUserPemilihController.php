<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagemenUserPemilihController extends AppController
{
    public function index()
    {
        $title  = 'Management User Pemilih';
        $user   = User::orderBy('name')->paginate(20);
        return view('admin.managemenuser.userpemilih',compact('title','user'));
    }

    public function store()
    {
        $penduduk = Penduduk::all();

        foreach ($penduduk as $showpenduduk) {

            $password = Str::random(8);

            User::create([
                'name'              => $showpenduduk->nama,
                'username'          => $showpenduduk->nik,
                'password'          => Hash::make($password),
                'password_nothash'  => $password,
            ]);
        }

        return redirect()->back()->with('seccess','User Pemilih Berhasil Di Buat');
    }
}
