@extends('admin.layout.app') 

@section('title') Tambah Guru @endsection 

@section('content')
<form action="/admin/teacher/store" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nama Guru <strong>*)</strong></label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="nis">Nomor Induk Pegawai <strong>*)</strong></label>
                <input type="number" class="form-control" name="nip" required>
            </div>

            <div class="form-group">
                <label for="phone">Telepon Guru <strong>*)</strong></label>
                <input type="text" class="form-control" name="phone" required>
            </div>

            <div class="form-group">
                <label for="phone">Email Guru <strong>*)</strong></label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthplace">Tempat Lahir <strong>*)</strong></label>
                        <input type="text" class="form-control" name="birthplace" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">Tanggal Lahir <strong>*)</strong></label>
                        <input type="date" class="form-control" name="birthdate" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" rows="4" class="form-control">{{ old('address') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender_id">Kelamin <strong>*)</strong></label>
                        <select name="gender_id" class="form-control">
                            <option disabled selected required>-- Pilih Agama --</option>
                            @foreach(App\Gender::select(['id', 'name'])->get() as $gender)
                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion_id">Agama <strong>*)</strong></label>
                        <select name="religion_id" class="form-control">
                            <option disabled selected required>-- Pilih Agama --</option>
                            @foreach(App\Religion::select(['id', 'name'])->get() as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                        Ketika Guru sudah dibuat, Username & Password defaultnya adalah NIS. (Dapat diganti dikemudian waktu oleh Admin/Siswa)
                    </li>
                </ul>
                
            </div>

            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check"></i> Simpan</button>
            <a href="/admin/teacher/add" class="btn btn-block btn-danger"><i class="fa fa-return"></i> Reset</a>
        </div>
    </div>
</form>
@endsection 

@section('breadcrumbs')
<li>Dashboard</li>
<li>Master Data</li>
<li>Guru</li>
<li>
    <a href="/admin/teacher">Tambah</a>
</li>
@endsection