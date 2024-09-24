
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
                <a class="nav-link" href="/student/profile">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profiles</span></a>
            </li>
            @if (Auth::user()->student->ojt != '')
                <li class="nav-item active">
                    <a class="nav-link" href="/student/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Utilities Collapse Menu -->
            @if (Auth::user()->student->ojt != '')
                <!-- Heading -->
                @if (Auth::user()->student->ojt->status=='COMPLETED')
                    <div class="sidebar-heading">
                        Completion
                    </div>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/student/completion" >
                                <i class="fas fa-fw fa-list"></i>
                                <span>Requirements</span>
                            </a>
                        </li>
                @else
                    <div class="sidebar-heading">
                        Attendace
                    </div>

                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/student/monitoring" >
                                <i class="fas fa-fw fa-list"></i>
                                <span>Monitoring</span>
                            </a>
                        </li>

            <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        Reportings
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="/student/accomplishments" >
                            <i class="fas fa-fw fa-list"></i>
                            <span>Accomplishments</span>
                        </a>
                    </li>
                @endif
            @endif
            @if (Auth::user()->student->ojt == '')
                <div class="sidebar-heading">
                    Job Management
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/student/job/list" >
                        <i class="fas fa-fw fa-list"></i>
                        <span>Find Jobs</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/student/applications" >
                        <i class="fas fa-fw fa-list"></i>
                        <span>Applications</span>
                    </a>
                </li>
            @endif

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/job/list" >
                    <i class="fas fa-fw fa-list"></i>
                    <span>Posted Jobs</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="/partners/job/new" >
                    <i class="fas fa-fw fa-list"></i>
                    <span>New</span>
                </a>
            </li>

            --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->
