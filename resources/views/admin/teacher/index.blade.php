@extends('admin.layout.app')

@section('title')
Manajemen Data Guru
@endsection

@section('content')
<div class="clearfix">

    <form action="/admin/teacher/filter" method="GET" class="form-inline pull-right">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Nama Guru / NIP">
            
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filter</button>
            <a href="/admin/teacher" class="btn btn-danger"><i class="fa fa-trash"></i> Reset Filter</a>
            <a href="/admin/teacher/add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Guru</a>
        </div>
    </form>
</div>
<br>
<table class="table table-condensed table-hover table-striped">
    <thead>
        <tr style="background-color: #2c3e50; color:white">
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Kelamin</th>
            <th>Agama</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @forelse($data as $teacher)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $teacher->nip }}</td>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->birthplace . ', ' . $teacher->birthdate }}</td>
            <td>{{ $teacher->gender->name }}</td>
            <td>{{ $teacher->religion->name }}</td>
            <td>
                <a href="/admin/teacher/detail/{{ $teacher->id }}" class="btn btn-xs btn-primary" title="Detail Guru"><i class="fa fa-eye"></i></a>
                <a href="/admin/teacher/edit/{{ $teacher->id }}" class="btn btn-xs btn-warning" title="Edit Guru"><i class="fa fa-pencil"></i></a>
                <a href="/admin/teacher/delete/{{ $teacher->id }}" class="btn btn-xs btn-danger" title="Hapus Guru"><i class="fa fa-trash"></i></a>    
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="7">
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
    <a href="/admin/teacher">Guru</a>
</li>
@endsection