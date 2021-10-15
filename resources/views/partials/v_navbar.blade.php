<div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a class="logo">
                <img src="{{ asset('images/logo_db.png') }}" width="150px" height="30px" >
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">

                <button class="mt-1 btn btn-light btn-sm" >@yield('title-table')</button>

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{ asset('images/admin.png') }}" alt="user-img" width="36" class="img-circle"><span id="user">{{Auth::user()->name}}</span></span> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="u-img"><img src="{{ asset('images/admin.png') }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{Auth::user()->name}}</h4>
                                        <p class="text-muted">{{Auth::user()->email}}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                    </div>
                                </li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>{{ __('Logout') }}</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    <i class="fa fa-power-off"></i>
                                    <button type="submit"> log out</button>
                                </form>

                            </ul>
                            <!-- /.dropdown-user -->

                         </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
