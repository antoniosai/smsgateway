@extends('admin.layout.app')

@section('title')
Broadcasting SMS
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="clearfix">
            <div class="pull-right">
                <a href="/admin/room/add" class="btn btn-success"><i class="fa fa-plus"></i> Buat Broadcast Baru</a>
            </div>
        </div>
        <hr>
        
    </div>
</div>
<br>


<div class="row searchable-container">

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