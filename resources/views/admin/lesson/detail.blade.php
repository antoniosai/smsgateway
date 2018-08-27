@extends('admin.layout.app') 

@section('title') Detail Ruang Kelas {{ $data->name }} @endsection 

@section('content')
<div class="block">
    <!-- Forum Tabs Title -->
    <div class="block-title">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#data_siswa">Data Siswa ({{ $data->student->count() }})</a></li>
            <li class=""><a href="#jadwal">Jadwal</a></li>
        </ul>
    </div>
    <!-- END Forum Tabs -->

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Forum -->
        <div class="tab-pane active" id="data_siswa">
            <table class="table table-condensed table-hover table-striped">
                <thead>
                    <tr style="background-color: #2c3e50; color:white">
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Kelamin</th>
                        <th>Agama</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp
                    @forelse($data->student as $student)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->birthplace . ', ' . $student->birthdate }}</td>
                        <td>{{ $student->gender->name }}</td>
                        <td>{{ $student->religion->name }}</td>
                        <td>
                            <a href="/admin/student/detail/{{ $student->id }}" class="btn btn-xs btn-primary" title="Detail Siswa"><i class="fa fa-eye"></i></a>
                            <a href="/admin/student/edit/{{ $student->id }}" class="btn btn-xs btn-warning" title="Edit Siswa"><i class="fa fa-pencil"></i></a>
                            <a href="/admin/student/delete/{{ $student->id }}" class="btn btn-xs btn-danger" title="Hapus Siswa"><i class="fa fa-trash"></i></a>    
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
        </div>
        <!-- END Forum -->

        <!-- Topics -->
        <div class="tab-pane" id="jadwal">
            <div class="clearfix">
                <div class="pull-right">
                    <form action="/admin/room/jadwal/filter" class="form-inline">
                        <input type="hidden" value="{{ $data->id }}" name="room_id">
                        <div class="form-group">
                            <select name="day_id" id="day_id" class="form-control">
                                @foreach(App\Day::all() as $day)
                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default">Filter</button>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addSchedule" class="btn btn-primary">Tambah Jadwal</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal -->
            <div id="addSchedule" class="modal fade" role="dialog">
                <div class="modal-dialog">
            
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Tambah Jadwal Pelajaran</h4>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/schedule/store" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="room_id" value="{{ $data->id }}">

                                <div class="form-group">
                                    <label for="day_id">Pilih Hari</label>
                                    <select name="day_id" id="day_id" class="form-control">
                                        @foreach(App\Day::all() as $day)
                                        <option value="{{ $day->id }}">{{ $day->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start">Jam Mulai</label>
                                            <input type="time" value="{{ old('start') }}" name="start" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end">Jam Berakhir</label>
                                            <input type="time" value="{{ old('end') }}" name="end" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lesson">Pelajaran</label>
                                    <select name="lesson_id" id="lesson_id" class="form-control">
                                        @foreach(App\Lesson::all() as $lesson)
                                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>

            @if($selected_day)
            <table class="table table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Berakhir</th>
                        <th>Pelajaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp

                    @forelse($schedule as $jadwal)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $jadwal->day->name }}</td>
                        <td>{{ $jadwal->start }}</td>
                        <td>{{ $jadwal->end }}</td>
                        <td>{{ $jadwal->lesson->name }} - {{ $jadwal->lesson->teacher->name }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#edit_schedule-{{ $jadwal->id }}" class="btn btn-xs btn-warning" title="Edit Siswa"><i class="fa fa-pencil"></i></button>
                            <a href="/admin/schedule/delete/{{ $jadwal->id }}" class="btn btn-xs btn-danger" title="Hapus Siswa"><i class="fa fa-trash"></i></a>    
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <center>
                                <h3>Belum ada Pelajaran pada Hari ini</h3>
                            </center>
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
            @else
            <center>
                <h3>Silahkan Pilih Hari Terlebih Dahulu</h3>
            </center>
            @endif
        </div>
        <!-- END Topics -->

        
    </div>
    <!-- END Tab Content -->
</div>

@forelse($schedule as $edit)
<!-- Modal -->
<div id="edit_schedule-{{ $edit->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Jadwal Pelajaran</h4>
            </div>
            <div class="modal-body">
                <form action="/admin/schedule/update" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="schedule_id" value="{{ $edit->id }}">
                    <input type="hidden" name="room_id" value="{{ $data->id }}">

                    <div class="form-group">
                        <label for="day_id">Pilih Hari</label>
                        <select name="day_id" id="day_id" class="form-control">
                            @foreach(App\Day::all() as $day)
                            <option @if($day->id == $edit->day_id) selected @endif value="{{ $day->id }}">{{ $day->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start">Jam Mulai</label>
                                <input type="time" value="{{ $edit->start }}" name="start" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end">Jam Berakhir</label>
                                <input type="time" value="{{ $edit->end }}" name="end" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lesson">Pelajaran</label>
                        <select name="lesson_id" id="lesson_id" class="form-control">
                            @foreach(App\Lesson::all() as $lesson)
                            <option value="{{ $lesson->id }}" @if($lesson->id == $edit->lesson_id) selected @endif>{{ $lesson->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="clearfix">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
</div>
@empty
@endforelse

@endsection 

@section('breadcrumbs')
<li>Dashboard</li>
<li>Master Data</li>
<li>Siswa</li>
<li>
    <a href="/admin/student/edit/{{ $data->id }}">Edit {{ $data->name }}</a>
</li>
@endsection