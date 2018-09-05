<!-- Sidebar Navigation -->
<ul class="sidebar-nav">
    <li>
        <a href="/teacher/home">
            <i class="gi gi-stopwatch sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Informasi Pribadi</span>
        </a>
    </li>


    <li class="active">
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-database sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Menu Utama</span></a>
        <ul>
            <li>
                <a href="/teacher/schedule/lesson">Jadwal Mengajar</a>
            </li>
            <li>
                <a href="/teacher/schedule/exam">Jadwal Mengawas Ujian</a>
            </li>
        </ul>
    </li>


    <li>
        <a href="/teacher/announcement">
            <i class="fa fa-envelope sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Pengumuman</span>
        </a>
    </li>
    
</ul>
<!-- END Sidebar Navigation -->

<!-- Modal -->
<div id="active_year" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:black">Ganti Tahun Ajaran</h4>
            </div>
            <div class="modal-body">
                <form action="/admin/setting/tahun_ajaran" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="active_year" style="color:black">Tahun Ajaran</label>
                        <select name="active_year" id="active_year" class="form-control">
                            @for($i = 2017; $i <= date('Y'); $i++)
                            @php $next_year = $i + 1; @endphp
                            <option value="{{ $i }}">{{ $i.'/'.$next_year }}</option>
                            @endfor
                        </select>
                        {{-- <input type="text" name="active_year" class="form-control" value="{{ App\Info::first()->active_year }}"> --}}
                    </div>

                    <div class="form-group">
                        <label for="active_semester" style="color:black">Semester</label>
                        <select name="active_semester" id="active_semester" class="form-control">
                            <option value="I">I - Satu</option>
                            <option value="II">II - Dua</option>
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