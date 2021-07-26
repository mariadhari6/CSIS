<div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a href="index.html" class="logo">
                <img src="{{asset('template-admin')}}/assets/img/logo_db.png" width="150px" height="30px" >
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">


                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{asset('template-admin')}}/assets/img/profil3.jpg" alt="user-img" width="36" class="img-circle"><span >Ambar Nur</span></span> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>

                                <div class="user-box">
                                    <div class="u-img"><img src="{{asset('template-admin')}}/assets/img/profil3.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>Ambar Nur Qori</h4>
                                        <p class="text-muted">AmbarNur@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                    </div>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
                                <a class="dropdown-item" href="#"></i> My Balance</a>
                                <a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="{{asset('template-admin')}}/assets/img/profil3.jpg">
                    </div>
                    <div class="info">
                        <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                Ambar Nur Qori
                                <span class="user-level">Customer Service</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                            <ul class="nav">
                                <li>
                                    <a href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#edit">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a href="index.html">
                            <i class="la la-dashboard"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="la la-table"></i>
                                <span class="menu-title">Data Master</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#company">
                                        <span class="menu-title">&ensp; Company</span>
                                    </a>
                                    {{-- <div class="collapse" id="company">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="/"> &ensp; &ensp; &ensp; Data Company</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="/"> &ensp; &ensp; &ensp; Data PIC</a></li>
                                        </ul>
                                    </div> --}}
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="/">&ensp; GPS</a></li>
                                <li class="nav-item"> <a class="nav-link" href="/">&ensp; Sensor</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#GSM">
                                        <span class="menu-title">&ensp;     GSM</span>
                                    </a>
                                    <div class="collapse" id="GSM">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="/"> &ensp; &ensp; &ensp; Data Company</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="/"> &ensp; &ensp; &ensp; Data PIC</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
