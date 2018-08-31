@extends('student.layout.app')

@section('title')
Informasi Pribadi Siswa
@endsection

@section('content')
@php $data = Auth::guard('student')->user() @endphp
@php $wali = $data->wali @endphp

<table class="table">

    <tr>
        <td>NIS</td>
        <td>:</td>
        <td>{{ $data->nis }}</td>
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

<hr>

<h3>Data Wali</h3>

<table class="table">

    <tr>
        <td>Nama Wali</td>
        <td>:</td>
        <td>{{ $wali->nis }}</td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>:</td>
        <td>{{ $wali->birthplace }}, {{ $wali->birthdate }}</td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $wali->job }}</td>
    </tr>
    <tr>
        <td>Telp</td>
        <td>:</td>
        <td>{{ $wali->phone }}</td>
    </tr>
</table>
{{--  --}}
@endsection

@section('breadcrumbs')
<li>
    <a href="/student/home">Informasi Pribadi</a>
</li>
@endsection