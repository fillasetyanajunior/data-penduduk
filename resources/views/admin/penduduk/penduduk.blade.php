@extends('layouts.base',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar-admin :title="$title"></x-slidebar-admin>
    @livewire('penduduk-livewire', ['title' => $title])
    <x-footer></x-footer>
</div>
<div class="modal modal-blur fade" id="PendudukModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-penduduk">
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">NKK</label>
                                    <input type="text" class="form-control @error('nkk') is-invalid @enderror" placeholder="NKK" name="nkk" value="{{old('nkk')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" name="nik" value="{{old('nik')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nama Penduduk</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Penduduk" name="nama" value="{{old('nama')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-control custom-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                        <option value="">-- Pilih --</option>
                                        <option value="1" @if (old('jenis_kelamin') == 1) selected @endif>Laki - Laki</option>
                                        <option value="2" @if (old('jenis_kelamin') == 2) selected @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Agama</label>
                                    <select class="form-control custom-select @error('agama') is-invalid @enderror" name="agama">
                                        <option value="">-- Pilih --</option>
                                        <option value="1" @if (old('agama') == 1) selected @endif>Islam</option>
                                        <option value="2" @if (old('agama') == 2) selected @endif>Kristen</option>
                                        <option value="3" @if (old('agama') == 3) selected @endif>Katolik</option>
                                        <option value="4" @if (old('agama') == 4) selected @endif>Hindu</option>
                                        <option value="5" @if (old('agama') == 5) selected @endif>Budha</option>
                                        <option value="6" @if (old('agama') == 6) selected @endif>Kong Hu Cu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Status Perkawinan</label>
                                    <select class="form-control custom-select @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan">
                                        <option value="">-- Pilih --</option>
                                        <option value="1" @if (old('status_perkawinan') == 1) selected @endif>Belum Kawin</option>
                                        <option value="2" @if (old('status_perkawinan') == 2) selected @endif>Kawin</option>
                                        <option value="3" @if (old('status_perkawinan') == 3) selected @endif>Pernah Nikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat')  is-invalid @enderror" rows="3" name="alamat"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Provinsi</label>
                                    <select class="form-control custom-select @error('provinsi') is-invalid @enderror" name="provinsi">
                                        <option value="">-- Pilih --</option>
                                        @foreach ($province as $showprovince)
                                        <option value="{{$showprovince->id}}" @if (old('provinsi') == $showprovince->id) selected @endif>{{$showprovince->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <select class="form-control custom-select @error('kabupaten') is-invalid @enderror" name="kabupaten">
                                        <option value="">-- Pilih --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <select class="form-control custom-select @error('kecamatan') is-invalid @enderror" name="kecamatan">
                                        <option value="">-- Pilih --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Desa</label>
                                    <select class="form-control custom-select @error('desa') is-invalid @enderror" name="desa">
                                        <option value="">-- Pilih --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Dusun</label>
                                    <input type="text" class="form-control @error('dusun') is-invalid @enderror" placeholder="Dusun" name="dusun" value="{{old('dusun')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">RT</label>
                                    <input type="numeric" class="form-control @error('rt') is-invalid @enderror" placeholder="RT" name="rt" value="{{old('rt')}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">RW</label>
                                    <input type="numeric" class="form-control @error('rw') is-invalid @enderror" placeholder="RW" name="rw" value="{{old('rw')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="Kode Pos" name="kode_pos" value="{{old('kode_pos')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">No. HP</label>
                                    <input type="text" class="form-control @error('no_hp')  is-invalid @enderror" placeholder="No. HP" name="no_hp" value="{{old('no_hp')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Kewarganegaraan</label>
                                    <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" placeholder="Indonesia" name="kewarganegaraan" value="{{old('kewarganegaraan')}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Status Penduduk</label>
                                    <select class="form-control custom-select @error('status_penduduk') is-invalid @enderror" name="status_penduduk">
                                        <option value="">-- Pilih --</option>
                                        <option value="1" @if (old('status_penduduk') == 1) selected @endif>WNI</option>
                                        <option value="2" @if (old('status_penduduk') == 2) selected @endif>WNA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <select class="form-control custom-select @error('pekerjaan') is-invalid @enderror" name="pekerjaan">
                                <option value="">-- Pilih --</option>
                                <option value="1" @if (old('pekerjaan') == 1) selected @endif>BELUM/TIDAK BEKERJA</option>
                                <option value="2" @if (old('pekerjaan') == 2) selected @endif>MENGURUS RUMAH TANGGA</option>
                                <option value="3" @if (old('pekerjaan') == 3) selected @endif>PELAJAR/MAHASISWA</option>
                                <option value="4" @if (old('pekerjaan') == 4) selected @endif>PENSIUNAN</option>
                                <option value="5" @if (old('pekerjaan') == 5) selected @endif>PEGAWAI NEGERI SIPIL</option>
                                <option value="6" @if (old('pekerjaan') == 6) selected @endif>TENTARA NASIONAL INDONESIA</option>
                                <option value="7" @if (old('pekerjaan') == 7) selected @endif>KEPOLISIAN RI</option>
                                <option value="8" @if (old('pekerjaan') == 8) selected @endif>PERDAGANGAN</option>
                                <option value="9" @if (old('pekerjaan') == 9) selected @endif>PETANI/PEKEBUN</option>
                                <option value="10" @if (old('pekerjaan') == 10) selected @endif>PETERNAK</option>
                                <option value="11" @if (old('pekerjaan') == 11) selected @endif>NELAYAN/PERIKANAN</option>
                                <option value="12" @if (old('pekerjaan') == 12) selected @endif>INDUSTRI</option>
                                <option value="13" @if (old('pekerjaan') == 13) selected @endif>KONSTRUKSI</option>
                                <option value="14" @if (old('pekerjaan') == 14) selected @endif>TRANSPORTASI</option>
                                <option value="15" @if (old('pekerjaan') == 15) selected @endif>KARYAWAN SWASTA</option>
                                <option value="16" @if (old('pekerjaan') == 16) selected @endif>KARYAWAN BUMN</option>
                                <option value="17" @if (old('pekerjaan') == 17) selected @endif>KARYAWAN BUMD</option>
                                <option value="18" @if (old('pekerjaan') == 18) selected @endif>KARYAWAN HONORER</option>
                                <option value="19" @if (old('pekerjaan') == 19) selected @endif>BURUH HARIAN LEPAS</option>
                                <option value="20" @if (old('pekerjaan') == 20) selected @endif>BURUH TANI/PERKEBUNAN</option>
                                <option value="21" @if (old('pekerjaan') == 21) selected @endif>BURUH NELAYAN/PERIKANAN</option>
                                <option value="22" @if (old('pekerjaan') == 22) selected @endif>BURUH PETERNAKAN</option>
                                <option value="23" @if (old('pekerjaan') == 23) selected @endif>PEMBANTU RUMAH TANGGA</option>
                                <option value="24" @if (old('pekerjaan') == 24) selected @endif>TUKANG CUKUR</option>
                                <option value="25" @if (old('pekerjaan') == 25) selected @endif>TUKANG LISTRIK</option>
                                <option value="26" @if (old('pekerjaan') == 26) selected @endif>TUKANG BATU</option>
                                <option value="27" @if (old('pekerjaan') == 27) selected @endif>TUKANG KAYU</option>
                                <option value="28" @if (old('pekerjaan') == 28) selected @endif>TUKANG SOL SEPATU</option>
                                <option value="29" @if (old('pekerjaan') == 29) selected @endif>TUKANG LAS/PANDAI BESI</option>
                                <option value="30" @if (old('pekerjaan') == 30) selected @endif>TUKANG JAHIT</option>
                                <option value="31" @if (old('pekerjaan') == 31) selected @endif>TUKANG GIGI</option>
                                <option value="32" @if (old('pekerjaan') == 32) selected @endif>PENATA RIAS</option>
                                <option value="33" @if (old('pekerjaan') == 33) selected @endif>PENATA BUSANA</option>
                                <option value="34" @if (old('pekerjaan') == 34) selected @endif>PENATA RAMBUT</option>
                                <option value="35" @if (old('pekerjaan') == 35) selected @endif>MEKANIK</option>
                                <option value="36" @if (old('pekerjaan') == 36) selected @endif>SENIMAN</option>
                                <option value="37" @if (old('pekerjaan') == 37) selected @endif>TABIB</option>
                                <option value="38" @if (old('pekerjaan') == 38) selected @endif>PARAJI</option>
                                <option value="39" @if (old('pekerjaan') == 39) selected @endif>PERANCANG BUSANA</option>
                                <option value="40" @if (old('pekerjaan') == 41) selected @endif>PENTERJEMAH</option>
                                <option value="41" @if (old('pekerjaan') == 42) selected @endif>IMAM MESJID</option>
                                <option value="42" @if (old('pekerjaan') == 43) selected @endif>PENDETA</option>
                                <option value="43" @if (old('pekerjaan') == 44) selected @endif>PASTOR</option>
                                <option value="44" @if (old('pekerjaan') == 45) selected @endif>WARTAWAN</option>
                                <option value="45" @if (old('pekerjaan') == 46) selected @endif>USTADZ/MUBALIGH</option>
                                <option value="46" @if (old('pekerjaan') == 47) selected @endif>JURU MASAK</option>
                                <option value="47" @if (old('pekerjaan') == 47) selected @endif>PROMOTOR ACARA</option>
                                <option value="48" @if (old('pekerjaan') == 48) selected @endif>ANGGOTA DPR-RI</option>
                                <option value="49" @if (old('pekerjaan') == 49) selected @endif>ANGGOTA DPD</option>
                                <option value="50" @if (old('pekerjaan') == 50) selected @endif>ANGGOTA BPK</option>
                                <option value="51" @if (old('pekerjaan') == 51) selected @endif>PRESIDEN</option>
                                <option value="52" @if (old('pekerjaan') == 52) selected @endif>WAKIL PRESIDEN</option>
                                <option value="53" @if (old('pekerjaan') == 53) selected @endif>ANGGOTA MAHKAMAH KONSTITUSI</option>
                                <option value="54" @if (old('pekerjaan') == 54) selected @endif>ANGGOTA KABINET/KEMENTERIAN</option>
                                <option value="55" @if (old('pekerjaan') == 55) selected @endif>DUTA BESAR</option>
                                <option value="56" @if (old('pekerjaan') == 56) selected @endif>GUBERNUR</option>
                                <option value="57" @if (old('pekerjaan') == 57) selected @endif>WAKIL GUBERNUR</option>
                                <option value="58" @if (old('pekerjaan') == 58) selected @endif>BUPATI</option>
                                <option value="59" @if (old('pekerjaan') == 59) selected @endif>WAKIL BUPATI</option>
                                <option value="60" @if (old('pekerjaan') == 60) selected @endif>WALIKOTA</option>
                                <option value="61" @if (old('pekerjaan') == 61) selected @endif>WAKIL WALIKOTA</option>
                                <option value="62" @if (old('pekerjaan') == 62) selected @endif>ANGGOTA DPRD PROVINSI</option>
                                <option value="63" @if (old('pekerjaan') == 63) selected @endif>ANGGOTA DPRD KABUPATEN/KOTA</option>
                                <option value="64" @if (old('pekerjaan') == 64) selected @endif>DOSEN</option>
                                <option value="65" @if (old('pekerjaan') == 65) selected @endif>GURU</option>
                                <option value="66" @if (old('pekerjaan') == 66) selected @endif>PILOT</option>
                                <option value="67" @if (old('pekerjaan') == 67) selected @endif>PENGACARA</option>
                                <option value="68" @if (old('pekerjaan') == 68) selected @endif>NOTARIS</option>
                                <option value="69" @if (old('pekerjaan') == 69) selected @endif>ARSITEK</option>
                                <option value="70" @if (old('pekerjaan') == 70) selected @endif>AKUNTAN</option>
                                <option value="71" @if (old('pekerjaan') == 71) selected @endif>KONSULTAN</option>
                                <option value="72" @if (old('pekerjaan') == 72) selected @endif>DOKTER</option>
                                <option value="73" @if (old('pekerjaan') == 73) selected @endif>BIDAN</option>
                                <option value="74" @if (old('pekerjaan') == 74) selected @endif>PERAWAT</option></option>
                                <option value="75" @if (old('pekerjaan') == 75) selected @endif>APOTEKER</option>
                                <option value="76" @if (old('pekerjaan') == 76) selected @endif>PSIKIATER/PSIKOLOG</option>
                                <option value="77" @if (old('pekerjaan') == 77) selected @endif>PENYIAR TELEVISI</option>
                                <option value="78" @if (old('pekerjaan') == 78) selected @endif>PENYIAR RADIO</option>
                                <option value="79" @if (old('pekerjaan') == 79) selected @endif>PELAUT</option>
                                <option value="80" @if (old('pekerjaan') == 80) selected @endif>PENELITI</option>
                                <option value="81" @if (old('pekerjaan') == 81) selected @endif>SOPIR</option>
                                <option value="82" @if (old('pekerjaan') == 82) selected @endif>PIALANG</option>
                                <option value="83" @if (old('pekerjaan') == 83) selected @endif>PARANORMAL</option>
                                <option value="84" @if (old('pekerjaan') == 84) selected @endif>PEDAGANG</option>
                                <option value="85" @if (old('pekerjaan') == 85) selected @endif>PERANGKAT DESA</option>
                                <option value="86" @if (old('pekerjaan') == 86) selected @endif>KEPALA DESA</option>
                                <option value="87" @if (old('pekerjaan') == 87) selected @endif>BIARAWATI</option>
                                <option value="88" @if (old('pekerjaan') == 88) selected @endif>WIRASWASTA</option>
                                <option value="89" @if (old('pekerjaan') == 89) selected @endif>LAINNYA</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
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
            $('#addpenduduk').click(function () {
                $('.modal-title').text('Add Penduduk');
                $('.body-penduduk form').attr('action', '{{ route("penduduk.store") }}');
                $('.body-penduduk form').attr('method', 'POST');
                $('.body-penduduk button[type="submit"]').text('Add');

                $('select[name="provinsi"]').trigger('change');

                $('input[name="nkk"]').val("{{old('nkk')}}");
                $('input[name="nik"]').val("{{old('nik')}}");
                $('input[name="nama"]').val("{{old('nama')}}");
                $('input[name="tempat_lahir"]').val("{{old('tempat_lahir')}}");
                $('input[name="tanggal_lahir"]').val("{{old('tanggal_lahir')}}");
                $('select[name="jenis_kelamin"]').val("{{old('jenis_kelamin')}}");
                $('select[name="agama"]').val("{{old('agama')}}");
                $('select[name="status_perkawinan"]').val("{{old('status_perkawinan')}}");
                $('select[name="pekerjaan"]').val("{{old('pekerjaan')}}");
                $('textarea[name="alamat"]').html("{{old('alamat')}}");
                $('select[name="provinsi"]').val("{{old('provinsi')}}");
                $('select[name="kabupaten"]').val("{{old('kabupaten')}}");
                $('select[name="kecamatan"]').val("{{old('kecamatan')}}");
                $('select[name="desa"]').val("{{old('desa')}}");
                $('input[name="dusun"]').val("{{old('dusun')}}");
                $('input[name="rt"]').val("{{old('rt')}}");
                $('input[name="rw"]').val("{{old('rw')}}");
                $('input[name="kode_pos"]').val("{{old('kode_post')}}");
                $('input[name="no_hp"]').val("{{old('no_hp')}}");
                $('input[name="status_pendudukan"]').val("{{old('status_pendudukan')}}");
            });

            $('#editpenduduk*').click(function () {
                var id = $(this).data('id');
                $('.modal-title').text('Edit Penduduk');
                $('.body-penduduk form').attr('action', '/penduduk/update/' + id);
                $('.body-penduduk form').attr('method', 'PUT');
                $('.body-penduduk button[type="submit"]').text('Edit');

                $.ajax({
                    url: '/penduduk/edit/' + id,
                    type: "POST",
                    data:{"_token": "{{ csrf_token() }}"},
                    success: function (hasil) {

                        $.ajax({
                            url: '/get-kabupaten/' + hasil.penduduk.provinsi,
                            type: "POST",
                            data:{"_token": "{{ csrf_token() }}"},
                            success: function (data) {
                                $('select[name="kabupaten"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="kabupaten"]').append('<option value="' + value.id + '">' + value.name +
                                        '</option>');
                                });
                                $('select[name="kabupaten"]').val(hasil.penduduk.kabupaten);
                            }
                        });
                        $.ajax({
                            url: '/get-kecamatan/' + hasil.penduduk.kabupaten,
                            type: "POST",
                            data:{"_token": "{{ csrf_token() }}"},
                            success: function (data) {
                                $('select[name="kecamatan"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="kecamatan"]').append('<option value="' + value.id + '">' + value.name +
                                        '</option>');
                                });
                                $('select[name="kecamatan"]').val(hasil.penduduk.kecamatan);
                            }
                        });
                        $.ajax({
                            url: '/get-desa/' + hasil.penduduk.kecamatan,
                            type: "POST",
                            data:{"_token": "{{ csrf_token() }}"},
                            success: function (data) {
                                $('select[name="desa"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="desa"]').append('<option value="' + value.id + '">' + value.name +
                                        '</option>');
                                });
                                $('select[name="desa"]').val(hasil.penduduk.desa);

                            }
                        });

                        $('input[name="nkk"]').val(hasil.penduduk.nkk);
                        $('input[name="nik"]').val(hasil.penduduk.nik);
                        $('input[name="nama"]').val(hasil.penduduk.nama);
                        $('input[name="tempat_lahir"]').val(hasil.penduduk.tempat_lahir);
                        $('input[name="tanggal_lahir"]').val(hasil.penduduk.tanggal_lahir);
                        $('select[name="jenis_kelamin"]').val(hasil.jenis_kelamin);
                        $('select[name="agama"]').val(hasil.agama);
                        $('select[name="status_perkawinan"]').val(hasil.status_perkawinan);
                        $('select[name="pekerjaan"]').val(hasil.penduduk.pekerjaan);
                        $('textarea[name="alamat"]').html(hasil.penduduk.alamat);
                        $('select[name="provinsi"]').val(hasil.penduduk.provinsi);
                        $('input[name="dusun"]').val(hasil.penduduk.dusun);
                        $('input[name="rt"]').val(hasil.penduduk.rt);
                        $('input[name="rw"]').val(hasil.penduduk.rw);
                        $('input[name="kode_pos"]').val(hasil.penduduk.kode_pos);
                        $('input[name="no_hp"]').val(hasil.penduduk.no_telepon);
                        $('select[name="status_penduduk"]').val(hasil.status_penduduk);
                        $('input[name="kewarganegaraan"]').val(hasil.penduduk.kewarganegaraan);
                    }
                });
            });

            $('select[name="provinsi"]').on('change', function () {
                var provinsiID = $(this).val();
                $.ajax({
                    url: '/get-kabupaten/' + provinsiID,
                    type: "POST",
                    data:{"_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        $('select[name="kabupaten"]').empty();
                        var old_kabupaten = '{{old("kabupaten")}}';
                        $.each(data, function (key, value) {
                            $('select[name="kabupaten"]').append('<option value="' + value.id + '">' + value.name +
                                '</option>');
                            if (old_kabupaten == value.id) {
                                $('select[name="kabupaten"] option').attr('selected', true);
                                $('select[name="kabupaten"]').trigger('change');
                            }
                        });
                    }
                });
            });
            $('select[name="kabupaten"]').on('change', function () {
                var kabupatenID = $(this).val();
                $.ajax({
                    url: '/get-kecamatan/' + kabupatenID,
                    type: "POST",
                    data:{"_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        $('select[name="kecamatan"]').empty();
                        var old_kecamatan = '{{old("kecamatan")}}';
                        $.each(data, function (key, value) {
                            $('select[name="kecamatan"]').append('<option value="' + value.id + '">' + value.name +
                                '</option>');

                            if (old_kecamatan == value.id) {
                                $('select[name="kecamatan"] option').attr('selected', true);
                                $('select[name="kecamatan"]').trigger('change');
                            }
                        });
                    }
                });
            });
            $('select[name="kecamatan"]').on('change', function () {
                var kecamatanID = $(this).val();
                $.ajax({
                    url: '/get-desa/' + kecamatanID,
                    type: "POST",
                    data:{"_token": "{{ csrf_token() }}"},
                    success: function (data) {
                        $('select[name="desa"]').empty();
                        var old_desa = '{{old("desa")}}';
                        $.each(data, function (key, value) {
                            $('select[name="desa"]').append('<option value="' + value.id + '">' + value.name +
                                '</option>');
                            if (old_desa == value.id) {
                                $('select[name="desa"] option').attr('selected', true);
                            }
                        });

                    }
                });
            });
        });
    </script>
@endpush
