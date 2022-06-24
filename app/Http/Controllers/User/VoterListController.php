<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DaftarPemilih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoterListController extends AppController
{
    public function index()
    {
        $title          = 'Daftar Pemilih';
        $daftarpemilih  = DaftarPemilih::all();
        return view('user.votelist', compact('title', 'daftarpemilih'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vote' => 'required',
        ]);

        $votes = DaftarPemilih::where('id', $request->vote)->first();

        if ($votes->votes == 0) {
            $vote = 1;
        }else {
            $vote = $votes->votes + 1;
        }

        DaftarPemilih::where('id',$request->vote)
                    ->update([
                        'votes' => $vote,
                    ]);


        $iduser = Auth::user()->username;
        ///Logout
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //Delete User
        User::where('username',$iduser)->delete();
    }
}
