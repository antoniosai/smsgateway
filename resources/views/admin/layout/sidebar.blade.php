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
        <a href="/admin/home">
            <i class="fa fa-users sidebar-nav-icon"></i>
            <span class="sidebar-nav-mini-hide">Rombongan Belajar</span>
        </a>
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
                        <select name="active_year" id="active_year" class="form-control">
                            @for($i = 2017; $i <= date('Y'); $i ++)
                            <option value="{{ $i.'/'.$i++ }}">{{ $i.'/'.$i++ }}</option>
                            @endfor
                        </select>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>