@extends('student.layout.app')

@section('title')
Jadwal Pelajaran Kelas {{ Auth::guard('student')->user()->room->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="clearfix">
                <div class="pull-right">
                    <form action="/student/schedule/lesson/filter" class="form-inline">
                        <div class="form-group">
                            <select name="day_id" id="day_id" class="form-control">
                                @foreach(App\Day::all() as $day)
                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default">Filter</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- @if($selected_day) --}}
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

        </div>
    </div>
</div>
@endsection

@section('breadcrumbs')
<li>
    <a href="/student/home">Jadwal Pelajaran</a>
</li>
@endsection