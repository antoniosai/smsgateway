<header class="navbar navbar-default">
    <!-- Left Header Navigation -->
    <!-- Search Form -->
    <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
        <div class="form-group">
            <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
        </div>
    </form>
    <!-- END Search Form -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/assets/img/placeholders/avatars/admin.png" alt="avatar">
                <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header text-center">Account</li>
                <li>
                    <a href="/teacher/profile">
                        <i class="fa fa-user fa-fw pull-right"></i>
                        Profile
                    </a>
                    <a href="{{ url('/teacher/logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Logout">
                        
                        Logout
                    </a>
                </li>
                
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>