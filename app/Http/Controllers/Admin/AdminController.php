<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class AdminController extends AppController
{
    public function index()
    {
        $title = "Admin Page";
        $penduduk = Penduduk::orderBy('created_at', 'asc')->get();
        return view('admin.dashboard', compact('title', 'penduduk'));
    }
}
