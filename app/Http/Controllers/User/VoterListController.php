<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DaftarPemilih;
use Illuminate\Http\Request;

class VoterListController extends AppController
{
    public function index()
    {
        $title          = 'Daftar Pemilih';
        $daftarpemilih  = DaftarPemilih::all();
        return view('user.votelist', compact('title', 'daftarpemilih'));
    }
}
