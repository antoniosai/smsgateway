@extends('student.layout.app')

@section('title')
Dashboard Administrator
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            
            <table class="table table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengumuman</th>
                        <th>Tanggal Dikirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php $no = 1 @endphp
                    @foreach($broadcast as $pengumuman)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $pengumuman->name }}</td>
                        <td>{{ $pengumuman->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="" class="btn btn-xs btn-primary"><i class="fa fa-info"></i>Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
<li>
    <a href="/student/home">Pengumuman Siswa</a>
</li>
@endsection