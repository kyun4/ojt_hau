
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #710e1d !important">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{asset('img/logo.png')}}" width="50px" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">OJT PORTAL</div>    
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/partners/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Company Info
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/profile" >
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Job Management
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/job/new" >
                    <i class="fas fa-fw fa-list"></i>
                    <span>New</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/job/list" >
                    <i class="fas fa-fw fa-list"></i>
                    <span>List</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/job/list/archive/" >
                    <i class="fas fa-fw fa-list"></i>
                    <span>Archived</span>
                </a>
            </li>

           
            <div class="sidebar-heading">
                Trainee
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/trainee/students/" >
                    <i class="fas fa-fw fa-list"></i>
                    <span>Students</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          

        </ul>
        <!-- End of Sidebar -->