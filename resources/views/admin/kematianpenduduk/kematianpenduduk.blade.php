@extends('layouts.base',['layout' => 'dashboard'])
@section('title',$title)
@section('content')
<div class="page">
    <x-slidebar-admin :title="$title"></x-slidebar-admin>
    @livewire('data-kematian-penduduk-livewire', ['title' => $title])
    <x-footer></x-footer>
</div>
@endsection
