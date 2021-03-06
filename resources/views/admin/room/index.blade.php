@extends('admin.layout.app')

@section('title')
Manajemen Data Ruang Kelas
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <input type="search" class="form-control" id="input-search" placeholder="Pencarian Cepat">
    </div>
    <div class="col-md-2">
            <a href="/admin/room/add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Rombel</a>
    </div>
</div>
<br>


<div class="row searchable-container">

    @foreach($data as $kelas)
    <div class="col-md-4 items">
        <!-- Advanced Specific Theme Color Widget -->
        <div class="widget">
            <div class="widget-advanced">
                <!-- Widget Header -->
                <div class="widget-header text-center themed-background-dark-flatie" style="height: 210px">
                    <h3 class="widget-content-light">
                        <a href="javascript:void(0)" class="themed-color-flatie">Kelas {{ $kelas->name }}</a><br>
                        <small>Wali Kelas : <strong>{{ $kelas->teacher->name }}</strong></small>
                        <br>
                        <small>Ketua Murid : @if($kelas->leader)<strong>{{ $kelas->leader->name }}</strong> @else Belum ada Ketua Murid @endif</small>
                        <br>
                        <small>Jumlah Murid : <strong>{{ $kelas->student->count() }}</strong> siswa</small>
                    </h3>
                    <div class="text-center">
                        <a href="/admin/room/detail/{{ $kelas->id }}" class="btn btn-success">Detail</a>
                        <a href="/admin/room/edit/{{ $kelas->id }}" class="btn btn-warning">Edit</a>
                        <a href="/admin/room/delete/{{ $kelas->id }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
                <!-- END Widget Header -->
            </div>
        </div>
        <!-- END Advanced Specific Theme Color Widget -->
    </div>
    @endforeach
</div>
@endsection

@section('breadcrumbs')
<li>Dashboard</li>
<li>Master Data</li>
<li>
    <a href="/admin/room">Ruang Kelas</a>
</li>
@endsection

@push('scripts')
<script>
    $(function() {    
        $('#input-search').on('keyup', function() {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return rex.test($(this).text());
            }).show();
        });
    });
</script>
@endpush