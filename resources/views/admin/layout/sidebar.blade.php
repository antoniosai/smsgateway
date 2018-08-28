<!-- Sidebar Navigation -->
<ul class="sidebar-nav">
    <li>
        <a href="/admin/home">
            <i class="gi gi-stopwatch sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Dashboard</span>
        </a>
    </li>

    <li>
        <a data-toggle="modal" data-target="#active_year">
            <i class="fa fa-calendar sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Tahun Ajaran</span>
        </a>
    </li>
    

    <li class="active">
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-database sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data Master</span></a>
        <ul>
            <li>
                <a href="/admin/student">Siswa</a>
            </li>
            <li>
                <a href="/admin/teacher">Guru</a>
            </li>
            <li>
                <a href="/admin/room">Ruang Kelas</a>
            </li>
            <li>
                <a href="/admin/lesson">Mata Pelajaran</a>
            </li>
        </ul>
    </li>


    <li>
        <a href="/admin/broadcast">
            <i class="fa fa-envelope sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Broadcast SMS</span>
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
                        <input type="text" name="active_year" class="form-control" value="{{ App\Info::first()->active_year }}">
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