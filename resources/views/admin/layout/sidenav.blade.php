<aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" " target="_blank">
                <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href=" {{ route('admin.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-dashboard"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file"></i>
                        </div>
                        <span class="nav-link-text ms-1"> Records</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('admin.nurses')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        
                        <i class="fas fa-user-md"></i>
                        </div>
                        <span class="nav-link-text ms-1">Nurse's</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('admin.hcaworkers')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-nurse"></i>
                        </div>
                        <span class="nav-link-text ms-1">Healt Care Assistant</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('admin.residents')}}" >
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users"></i>
                        </div>
                        <span class="nav-link-text ms-1">Residents</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('admin.shifts')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <span class="nav-link-text ms-1">Shifts</span>
                    </a>
                </li>
                

                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-bell"></i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-cog"></i>
                        </div>
                        <span class="nav-link-text ms-1">Settings</span> 
                    </a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link text-white " href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

    </aside>