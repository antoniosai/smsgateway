@extends('admin.layout.app') 

@section('title') Tambah Siswa @endsection 

@section('content')
<form action="/admin/student/store" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nama Siswa <strong>*)</strong></label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="nis">Nomor Induk Siswa <strong>*)</strong></label>
                <input type="number" class="form-control" name="nis" required>
            </div>

            <div class="form-group">
                <label for="phone">Telepon Siswa <strong>*)</strong></label>
                <input type="text" class="form-control" name="phone" required>
            </div>

            <div class="form-group">
                <label for="phone">Email Siswa <strong>*)</strong></label>
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
            <div class="form-group">
                <label for="room_id">Kelas <strong>*)</strong></label>
                <select name="room_id" class="form-control">
                    <option disabled selected required>-- Pilih Kelas --</option>
                    @foreach(App\Room::select(['id', 'name'])->get() as $room)
                    <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="parent_name">Nama Wali</label>
                <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name') }}">
            </div>

            <div class="form-group">
                <label for="parent_job">Telephone Wali</label>
                <input type="text" name="parent_phone" class="form-control" value="{{ old('parent_phone') }}">
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="parent_name">Tempat Lahir Wali</label>
                        <input type="text" name="parent_birthplace" class="form-control" value="{{ old('parent_birthplace') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="parent_name">Tanggal Lahir Wali</label>
                        <input type="date" name="parent_birthdate" class="form-control" value="{{ old('parent_birthdate') }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="parent_job">Pekerjaan Wali</label>
                <input type="text" name="parent_job" class="form-control" value="{{ old('parent_job') }}">
            </div>
            

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
        </div>
    </div>
</form>
@endsection 

@section('breadcrumbs')
<li>Dashboard</li>
<li>Master Data</li>
<li>Siswa</li>
<li>
    <a href="/admin/student">Tambah</a>
</li>
@endsection