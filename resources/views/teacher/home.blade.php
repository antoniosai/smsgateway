@extends('teacher.layout.app')

@section('title')
Informasi Pribadi Siswa
@endsection

@section('content')
@php $data = Auth::guard('teacher')->user() @endphp

<table class="table">

    <tr>
        <td>nip</td>
        <td>:</td>
        <td>{{ $data->nip }}</td>
    </tr>
    <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>{{ $data->name }}</td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>:</td>
        <td>@if($data->room) {{ $data->room->name }} @else Belum memiliki kelaas @endif</td>
    </tr>
    <tr>
        <td>Nomor Telephone</td>
        <td>:</td>
        <td>{{ $data->phone }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ $data->email }}</td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>:</td>
        <td>{{ $data->birthplace }}, {{ $data->birthdate }}</td>
    </tr>
</table>
@endsection

@section('breadcrumbs')
<li>
    <a href="/teacher/home">Informasi Pribadi</a>
</li>
@endsection