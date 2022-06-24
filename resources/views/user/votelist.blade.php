@extends('layouts.base',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="/">
                    <img src="{{url('dist/img/pendudukdesa.png')}}" width="110" height="32" alt="Tabler"
                        class="navbar-brand-image">
                </a>
            </h1>
        </div>
    </header>
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Daftar Pemilih
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="get">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Kepala Desa dan Wakil Kepala Desa</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row g-2">
                                        @foreach ($daftarpemilih as $showdaftarpemilih)
                                        <div class="col-6 col-sm-4">
                                            <label class="form-imagecheck mb-2">
                                                <input name="vote" type="radio" value="{{$showdaftarpemilih->id}}"
                                                    class="form-imagecheck-input" />
                                                <span class="form-imagecheck-figure">
                                                    <img src="{{Storage::url($showdaftarpemilih->thumnail)}}"
                                                        class="form-imagecheck-image">
                                                </span>
                                            </label>
                                            <h3>{{$showdaftarpemilih->nama}}</h3>
                                            <hr>
                                            <h3>Visi Misi</h3>
                                            <p>{!!nl2br(str_replace("{}", " \n", $showdaftarpemilih->description))!!}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright &copy; 2022.
                            All rights reserved.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
