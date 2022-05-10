<div class="page-wrapper">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        {{$title}}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#PendudukModal" id="addpenduduk">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Penduduk
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#PendudukModal" id="addpenduduk" aria-label="Add Penduduk">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="ms-auto text-muted">
                                    Search:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm" wire:model="search"
                                            aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>NIK</th>
                                        <th>Nama Penduduk</th>
                                        <th>Tempat & Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach ($penduduk as $showpenduduk)
                                    @php
                                    $penduduks =
                                    App\Models\DetailPenduduk::where('nik',$showpenduduk->nik)->first();
                                    @endphp
                                    <tr>
                                        <td><span class="text-muted">{{$i++}}</span></td>
                                        <td>{{$penduduks->nik}}</td>
                                        <td>{{$penduduks->nama}}</td>
                                        <td>{{$penduduks->tempat_lahir . ', ' . date('d-M-Y',strtotime($penduduks->tanggal_lahir))}}
                                        </td>
                                        <td>{{$penduduks->jenis_kelamin}}</td>
                                        <td class="text-end">
                                            <button type="button" class="btn btn-warning btn-sm" id="editpenduduk"
                                                data-id="{{$showpenduduk->id}}" data-bs-target="#PendudukModal"
                                                data-bs-toggle="modal">Edit</button>
                                            <form action="{{route('kematianpenduduk.store')}}" method="post"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$showpenduduk->id}}">
                                                <button type="submit" class="btn btn-primary btn-sm">Meninggal</button>
                                            </form>
                                            <form action="{{route('pindahpenduduk.store')}}" method="post"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$showpenduduk->id}}">
                                                <button type="submit" class="btn btn-azure btn-sm">Pindah</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{$penduduk->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
