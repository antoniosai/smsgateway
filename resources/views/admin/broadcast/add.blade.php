@extends('admin.layout.app') 

@section('title') Buat Broadcast Baru @endsection 

@section('content')
<form action="/admin/broadcast/send_message" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <br/>
            
                <label class="radio-inline"><input type="radio" name="tujuan" checked value="parents">Orang Tua Siswa</label>
                <label class="radio-inline"><input type="radio" name="tujuan" value="teachers">Guru</label>
                <label class="radio-inline"><input type="radio" name="tujuan" value="students">Siswa</label>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="" cols="30" rows="4" class="form-control"></textarea>
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

            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-check"></i> Kirim</button>
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