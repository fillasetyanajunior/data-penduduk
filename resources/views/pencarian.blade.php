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
                <a href=".">
                    <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Home
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                @if ($hasil != null)
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{route('home.pencarian')}}" method="get">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="form-label">Nama</div>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{$search != '' ? $search[0] : $request->nama != null ? $request->nama : ''}}" autocomplete="off" />
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label">NIK</div>
                                        <input type="text" class="form-control" name="nik"
                                            value="{{$search != '' ? $search[1] : $request->nik != null ? $request->nik : ''}}" autocomplete="off">
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        @if ($hasil != null)
                            @foreach ($hasil as $showhasil)
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="text" class="form-control" value="{{$showhasil->nik}}" disabled readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" value="{{$showhasil->nama}}" disabled readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat/Tanggal Lahir</label>
                                        <input type="text" class="form-control" value="{{$showhasil->tempat_lahir . ', ' . $showhasil->tanggal_lahir}}" disabled readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kecamatan</label>
                                        <input type="text" class="form-control" value="{{App\Models\District::where('id',$showhasil->kecamatan)->first()->name}}" disabled readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Desa</label>
                                        <input type="text" class="form-control" value="{{App\Models\Village::where('id',$showhasil->desa)->first()->name}}" disabled readonly>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @else
                <div class="card">
                    <div class="empty">
                        <div class="empty-img"><img src="{{url('static/illustrations/undraw_quitting_time_dm8t.svg')}}"
                                height="128" alt="">
                        </div>
                        <p class="empty-title">No results found</p>
                        <p class="empty-subtitle text-muted">
                            Try adjusting your search or filter to find what you're looking for.
                        </p>
                        <div class="empty-action">
                            <a href="/" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" /></svg>
                                Search again
                            </a>
                        </div>
                    </div>
                </div>
                @endif

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
