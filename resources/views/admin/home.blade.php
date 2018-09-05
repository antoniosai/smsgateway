@extends('admin.layout.app')

@section('title')
Dashboard Administrator
@endsection

@section('content')


<div class="row">
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="student" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                    <i class="fa fa-users"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    {{ App\Student::count() }} <strong>Siswa</strong><br>
                    <small>Terdaftar</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="teacher" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                    <i class="fa fa-user"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    {{ App\Teacher::count() }} <strong>Guru</strong><br>
                    <small>Terdaftar</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="lesson" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                    <i class="fa fa-file-o"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    {{ App\Lesson::count() }} <strong>Mata Pelajaran</strong>
                    <small>Terdaftar</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="room" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                    <i class="gi gi-picture"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    {{ App\Room::count() }} <strong>Ruang Kelas</strong>
                    <small>Terdaftar</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
</div>


<table class="table table-striped">
    <tr>
        <td>Nama Sekolah</td>
        <td>:</td>
        <td>{{ $info->name }}</td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $info->address }}</td>
    </tr>

    <tr>
        <td>Telephone</td>
        <td>:</td>
        <td>{{ $info->phone }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ $info->email }}</td>
    </tr>
</table><!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Edit Identitas Sekolah</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Identitas Sekolah</h4>
            </div>
            <div class="modal-body">
                <form action="/admin/school/save" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Nama Sekolah</label>
                        <input type="text" class="form-control" name="name" value="{{ $info->name }}">
                    </div>

                    <div class="form-group">
                        <label for="logo">Lambang Sekolah</label>
                        <input type="file" class="form-control" name="file">
                    </div>

                    <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $info->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $info->email }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea name="address" id="address" cols="30" rows="4" class="form-control">{{ $info->address }}</textarea>
                    </div>

                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('breadcrumbs')
<li>
    <a href="/admin/home">Dashboard</a>
</li>
@endsection