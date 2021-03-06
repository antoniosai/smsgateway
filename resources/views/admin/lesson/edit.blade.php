@extends('admin.layout.app') 

@section('title') Edit Mata Pelajaran {{ $data->name }}@endsection 

@section('content')
<form action="/admin/lesson/update" method="POST">
    <input type="hidden" value="{{ $data->id }}" name="id">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nama Matpel <strong>*)</strong></label>
                <input type="text" class="form-control" name="name" value="{{ $data->name }}" required>
            </div>

            <div class="form-group">
                <label for="teacher_id">Guru <strong>*)</strong></label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    @foreach(App\Teacher::select('name', 'nip', 'id')->get() as $teacher)
                    <option value="{{ $teacher->id }}" @if($data->teacher_id == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        
        <div class="col-md-4">
            <div class="alert alert-warning">
                <ul>
                    <li>
                        Mohon isi data formulir dengan bijak
                    </li>
                    <li>
                        Formulir isian dengan tanda
                        <strong>*)</strong> adalah wajib diisi / tidak boleh dikosongkan
                    </li>
                    <li>
                        Ketika Siswa sudah dibuat, Username & Password defaultnya adalah NIS. (Dapat diganti dikemudian waktu oleh Admin/Siswa)
                    </li>
                </ul>
                
            </div>

            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check"></i> Simpan</button>
            <a href="/admin/student/add" class="btn btn-block btn-danger"><i class="fa fa-return"></i> Reset</a>
            <br>
        </div>
    </div>
</form>
@endsection 

@section('breadcrumbs')
<li>Dashboard</li>
<li>Master Data</li>
<li>Ruang Kelas</li>
<li>
    <a href="/admin/room/add">Tambah</a>
</li>
@endsection