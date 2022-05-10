<?php

namespace App\Http\Controllers;

use App\Models\DetailPenduduk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        return view('home', compact('title'));
    }
    public function pencarian(Request $request)
    {
        if ($request->nama != null || $request->nik != null) {
            if ($request->nama != null && $request->nik == null) {
                $search = $request->nama;
                $hasil  = DetailPenduduk::where('nama','LIKE','%' .  $search . '%')->get();
            } elseif ($request->nama == null && $request->nik != null) {
                $search = $request->nik;
                $hasil  = DetailPenduduk::where('nik','LIKE','%' . $search . '%')->get();
            } else {
                $searchs    = $request->nama . '/' . $request->nik;
                $search     = explode('/', $searchs);
                $hasil      = DetailPenduduk::where('nik','LIKE','%' . $search[0] . '%')
                                            ->where('nama','LIKE','%' .  $search[1] . '%')
                                            ->get();
            }
        } else {
            $search = '';
            $hasil  = '';
        }
        $title = 'Pencarian';
        return view('pencarian', compact('hasil', 'search', 'title', 'request'));
    }
}
