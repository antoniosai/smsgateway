@extends('admin.layout.app')

@section('title')
Manajemen Data Siswa
@endsection

@section('content')
<div class="clearfix">

    <form action="/admin/student/filter" method="GET" class="form-inline pull-right">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Nama Siswa / NIS">
            
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
            <a href="/admin/student" class="btn btn-danger"><i class="fa fa-trash"></i> Reset Filter</a>
            <a href="/admin/student/add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Siswa</a>
        </div>
    </form>
</div>
<br>
<table class="table table-condensed table-hover table-striped">
    <thead>
        <tr style="background-color: #2c3e50; color:white">
            <th>No</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Kelamin</th>
            <th>Agama</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @forelse($data as $student)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $student->nis }}</td>
            <td>
                @if($student->room)
                    {{ $student->room->name }}
                @else
                    Belum punya kelas
                @endif
            </td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->birthplace . ', ' . $student->birthdate }}</td>
            <td>{{ $student->gender->name }}</td>
            <td>{{ $student->religion->name }}</td>
            <td>
                <a href="/admin/student/detail/{{ $student->id }}" class="btn btn-xs btn-primary" title="Detail Siswa"><i class="fa fa-eye"></i></a>
                <a href="/admin/student/edit/{{ $student->id }}" class="btn btn-xs btn-warning" title="Edit Siswa"><i class="fa fa-pencil"></i></a>
                <a href="/admin/student/delete/{{ $student->id }}" class="btn btn-xs btn-danger" title="Hapus Siswa"><i class="fa fa-trash"></i></a>    
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="8">
                    <center>
                        <h3>Tidak Ada Data</h3>
                    </center>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<center>
    {{ $data->links() }}
</center>
@endsection

@section('breadcrumbs')
<li>Dashboard</li>
<li>Master Data</li>
<li>
    <a href="/admin/student">Siswa</a>
</li>
@endsection