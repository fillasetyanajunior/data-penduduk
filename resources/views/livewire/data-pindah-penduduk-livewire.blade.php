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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;?>
                                    @foreach ($pindah as $showpindah)
                                    <tr>
                                        <td><span class="text-muted">{{$i++}}</span></td>
                                        <td>{{$showpindah->nik}}</td>
                                        <td>{{$showpindah->nama}}</td>
                                        <td>{{$showpindah->tempat_lahir . ', ' . date('d-M-Y',strtotime($showpindah->tanggal_lahir))}}
                                        </td>
                                        <td>{{$showpindah->jenis_kelamin}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {{$pindah->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
