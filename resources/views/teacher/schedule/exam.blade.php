@extends('teacher.layout.app')

@section('title')
Jadwal Ujian Kelas {{ Auth::guard('teacher')->user()->room->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">

            {{-- @if($selected_day) --}}
            <table class="table table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Berakhir</th>
                        <th>Pelajaran</th>
                        <th>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1 @endphp

                    @forelse($schedule as $jadwal)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $jadwal->date }}</td>
                        <td>{{ $jadwal->start }}</td>
                        <td>{{ $jadwal->end }}</td>
                        <td>{{ $jadwal->lesson->name }}</td>
                        <td>{{ $jadwal->room->name }}</td>
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
    <a href="/teacher/home">Jadwal Ujian</a>
</li>
@endsection