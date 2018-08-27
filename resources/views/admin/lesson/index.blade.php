@extends('admin.layout.app')

@section('title')
Manajemen Data Mata Pelajaran
@endsection

@section('content')
<div class="row">
    <div class="col-md-10">
        <input type="search" class="form-control" id="input-search" placeholder="Pencarian Cepat">
    </div>
    <div class="col-md-2">
        <a href="/admin/lesson/add" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Matpel</a>
    </div>
</div>
<br>


<div class="row searchable-container">

    @foreach($data as $matpel)
    <div class="col-md-4 items">
        <!-- Advanced Specific Theme Color Widget -->
        <div class="widget">
            <div class="widget-advanced">
                <!-- Widget Header -->
                <div class="widget-header text-center themed-background-dark-flatie" style="height: 180px">
                    <h3 class="widget-content-light">
                        <a href="javascript:void(0)" class="themed-color-flatie">{{ $matpel->name }}</a><br>
                        <small>Guru : <strong>{{ $matpel->teacher->name }}</strong></small>
                        <br>
                    </h3>
                    <div class="text-center">
                        <a href="/admin/lesson/edit/{{ $matpel->id }}" class="btn btn-warning">Edit</a>
                        <a href="/admin/lesson/delete/{{ $matpel->id }}" class="btn btn-danger">Hapus</a>
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
    <a href="/admin/lesson">Mata Pelajaran</a>
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