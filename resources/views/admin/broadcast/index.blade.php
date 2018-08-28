@extends('admin.layout.app')

@section('title')
Broadcasting SMS
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="clearfix">
            <div class="pull-right">
                <a href="/admin/broadcast/add" class="btn btn-success"><i class="fa fa-plus"></i> Buat Broadcast Baru</a>
            </div>
        </div>
        <hr>
        <table class="table table-hover table-striped table-condensed">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tujuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $broadcast)
                <tr>
                    <td>{{ $broadcast->name }}</td>
                    <td>{{ $broadcast->destination }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>  

        <div class="clearfix">
            <div class="pull-right">
                    {{ $data->links() }}
            </div>
        </div>
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