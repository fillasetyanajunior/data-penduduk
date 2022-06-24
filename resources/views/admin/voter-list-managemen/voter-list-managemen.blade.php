@extends('layouts.base',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar-admin :title="$title"></x-slidebar-admin>
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
                                data-bs-target="#DaftarPemilihModal" id="addcalonkandidat">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" /></svg>
                                Add Calon Kandidat
                            </a>
                            <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#DaftarPemilihModal" id="addcalonkandidat"
                                aria-label="Add Calon Kandidat">
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
                <div class="row row-cards">
                    @foreach ($daftarPemilih as $showdaftarPemilih)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body p-4 text-center">
                                <span class="avatar avatar-xl mb-3 avatar-rounded"
                                    style="background-image: url({{Storage::url($showdaftarPemilih->thumnail)}})"></span>
                                <h3 class="m-0 mb-1">{{$showdaftarPemilih->nama}}</h3>
                                <div class="mt-3">
                                    <span class="badge bg-purple-lt">Votes : </span>
                                    <span class="badge bg-green-lt">{{$showdaftarPemilih->votes}}</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="#" id="editcalonkandidat" data-id="{{$showdaftarPemilih->id}}" data-bs-target="#DaftarPemilihModal" data-bs-toggle="modal" class="card-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <polyline points="3 7 12 13 21 7" /></svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$daftarPemilih->links()}}
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="DaftarPemilihModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-daftarpemilih">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Calon</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Calon">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Visi Misi <span class="form-label-description">0</span></label>
                            <textarea class="form-control" name="description" rows="6"
                                placeholder="Description.."></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">Foto Calon</div>
                            <input type="file" class="form-control" name="thumnail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Create new report
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addcalonkandidat').click(function () {
            $('.modal-title').text('Tambah Calon Kandidat');
            $('.body-daftarpemilih form').attr('action', '')
            $('.body-daftarpemilih form').attr('method', 'post')
            $('.body-daftarpemilih button[type="submit"]').text('Add')

            $('input[name="nama"]').val('');
            $('input[name="thumnail"]').val('');
            $('textarea').val('');
        });

        $('#editcalonkandidat*').click(function () {
            var id = $(this).data('id');
            $('.modal-title').text('Edit Calon Kandidat');
            $('.body-daftarpemilih form').attr('action', '{{route("voterlist.managemen.update",":id")}}'
                .replace(':id', id))
            $('.body-daftarpemilih form').attr('method', 'post')
            $('.body-daftarpemilih button[type="submit"]').text('Edit')

            $.ajax({
                type: 'POST',
                url: '{{route("voterlist.managemen.edit",":id")}}'.replace(':id', id),
                data: {
                    '_token': '{{csrf_token()}}'
                },
                success: function (hasil) {
                    $('input[name="nama"]').val(hasil.nama);
                    $('textarea').val(hasil.description);
                }
            })
        });
    });

</script>
@endpush
