<nav class="sidebar-new">
    <div class="logo-sidebar">
        <li class="ml-1">
            <img class="py-0 mr-100" src="{{ asset('images/WHITE_ODM.png') }}" width="50px" height="50px">
            <img class="ml-2 logo-teks" src="{{ asset('images/odm.png') }}" width="180px" height="44px" class="csis" >
        </li>
    </div>
    <ul class="scrollable-menu">
        <li class="nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
            <hr>
                <a class="" data-toggle="collapse" href="#profile" aria-expanded="true">
                    <i class="la la-user fa-2x icon-sidebar"></i>
                    <span>
                        {{Auth::user()->name}}
                        <br>
                        <span><b>Administrator</b></span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="collapse @yield('customer')" id="profile" aria-expanded="true" style="">
                    <ul class="drop">
                        <li class="mt-4 nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
                            <a class="collapse-item @yield('detail_customer')" href="/profile">
                                <span class="nav-list">Edit Profile</span>
                            </a>
                        </li>
                        <li class="mt-4">
                            <a href="/change-password">
                                <span class="nav-list">Edit Password</span>
                            </a>
                        </li>
                        <li class="mt-4">
                             <a href="{{ route('logout_odm') }}">
                                <span class="nav-list">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            <hr>
        </li>
        @role('cs')
        <li class="nav-item {{ request()->is('customer_service') ? ' active' : ''}}">
            <a href="{{url('/customer_service')}}">
                <i class="la la-home fa-2x icon-sidebar"
                {{ request()->is('customer_service')? 'style=color:#5fa2db' : ''}}

<<<<<<< HEAD
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->is('/customer_service') ? ' active' : ''}}">
                <a href="{{url('/customer_service')}}">
                    <i class="fas fa-home"></i>
                    <p>Home</p>

                </a>
            </li>

            <li class="nav-item
=======
                ></i>
                <span class="nav-text">Home</span>
            </a>
        </li>
        <li class="nav-item
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
            {{ request()->is('seller') ? ' active' : ''}}
            {{ request()->is('Company') ? ' active' : ''}}
            {{ request()->is('pic') ? ' active' : ''}}
            {{ request()->is('gps') ? ' active' : ''}}
            {{ request()->is('sensor') ? ' active' : ''}}
            {{ request()->is('master_po') ? ' active' : ''}}
            {{ request()->is('Vehicle') ? ' active' : ''}}
            {{ request()->is('GsmMaster') ? ' active' : ''}}
            {{ request()->is('Active') ? ' active' : ''}}
            {{ request()->is('Terminate') ? ' active' : ''}}
            ">
            <a class="" data-toggle="collapse" href="#masterData" aria-expanded="true">
                <i class="la la-table fa-2x icon-sidebar"
                {{ request()->is('seller')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Company')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('pic')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('gps')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('sensor')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('master_po')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Vehicle')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('GsmMaster')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Active')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('GsmTerminate')? 'style=color:#5fa2db' : ''}}



                ></i>
                <span class="nav-text">Master Data</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="masterData" aria-expanded="true">
                <ul class="drop ">
                    <li class="mt-4 nav-item {{ request()->is('seller') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/seller')}}">
                            <span class="nav-list mt-2">Master Seller</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('Company') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/Company') }}">
                            <span class="nav-list">Master Company</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('pic') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/pic') }}">
                            <span class="nav-list">Master PIC</span></span>
                        </a>
                    </li>

                    <li class="mt-4 nav-item {{ request()->is('gps') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/gps')}}">
                            <span class="nav-list">Master GPS</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('sensor') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/sensor')}}">
                            <span class="nav-list">Master Sensor</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('master_po') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/master_po')}}">
                            <span class="nav-list">Master Purchase Order (PO)</span>
                        </a>
                    </li>
                     <li  class="mt-4 nav-item {{ request()->is('Vehicle') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/Vehicle')}}">
                            <span class="nav-list"> Master Vehicle</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item">
                        <a class ="" data-toggle="collapse" href="#gsm" aria-expanded="true">
                            <span >Master GSM</span>
                            <span class="caret"></span>
                        </a>

                        <div class="collapse" id="gsm" aria-expanded="true" style="">
                            <ul class="nav">

                                <li class="mt-4 nav-item {{ request()->is('GsmMaster') ? ' active' : ''}}">
                                    <a class="collapse-item @yield('GsmMaster')" href="{{url('/GsmMaster')}}">
                                        <span class="nav-list">Master GSM</span>
                                    </a>
                                </li>
                                <li class="mt-2 nav-item {{ request()->is('Active') ? ' active' : ''}}">
                                    <a class="collapse-item @yield('Active')" href="{{url('/GsmActive') }}">
                                        <span class="nav-list">Master Active</span>
                                    </a>
                                </li>
                                <li class="mt-2 nav-item {{ request()->is('GsmTerminate') ? ' active' : ''}}">
                                    <a class="collapse-item @yield('Terminate')" href="{{url('/GsmTerminate') }}">
                                        <span class="nav-list">Master Terminate</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

        </li>
        <li class="nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
            <a class="" data-toggle="collapse" href="#customer" aria-expanded="true">
                <i class="la la-users fa-2x icon-sidebar"

                {{ request()->is('detail_customer')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('summary')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('dashboard_customer')? 'style=color:#5fa2db' : ''}}
                >

                </i>
                <span  class="nav-text">Data Customer</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="customer" aria-expanded="true" style="">
                <ul class="drop">
                    <li class="mt-4 nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/detail_customer')}}">
                            <span class="nav-list">Detail Customer</span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="{{ route('summary')}}">
                            <span class="nav-list">Summary</span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="{{ route('dashboard_customer')}}">
                            <span class="nav-list">Dashboard Customer</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('RequestComplain') ? ' active' : ''}}"">
            <a class="" data-toggle="collapse" href="#request&complain" aria-expanded="true">
                <i class="la la-comments-o fa-2x icon-sidebar"
                {{ request()->is('RequestComplain')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Dashboard_RequestComplain')? 'style=color:#5fa2db' : ''}}
                ></i>
                <span  class="nav-text">Request & Complain</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="request&complain" aria-expanded="true" style="">
                <ul class="drop">
                    <li class="mt-4 nav-item {{ request()->is('RequestComplain') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/RequestComplain')}}">
                            <span class="nav-list">Data Request Complain</span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="/Dashboard_RequestComplain">
                            <span class="nav-list">Dashboard </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item
                {{ request()->is('MaintenanceGps') ? ' active' : ''}}
                {{ request()->is('PemasanganMutasi') ? ' active' : ''}}
                {{ request()->is('dashboard_visit_assignment') ? ' active' : ''}}
            ">
            <a class="" data-toggle="collapse" href="#visit" aria-expanded="true">
                <i class="la la-cogs fa-2x icon-sidebar"
                {{ request()->is('PemasanganMutasi')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('MaintenanceGps')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Dashboard_Visit_Assignment')? 'style=color:#5fa2db' : ''}}


                ></i>
                <span  class="nav-text">Visit Assignment</span>
                <span class="caret"></span>
            </a>
                <div class="collapse in" id="visit" aria-expanded="true" style="">
                    <ul class="drop">
                        <li class="mt-4 nav-item {{ request()->is('PemasanganMutasi') ? ' active' : ''}}">
                            <a class="collapse-item @yield('PemasanganMutasi')" href="{{url('/PemasanganMutasi')}}">
                                <span class="nav-list">Pemasangan dan Mutasi GPS</span>
                            </a>
                        </li>
                        <li class="mt-4 nav-item {{ request()->is('MaintenanceGps') ? ' active' : ''}}">
                            <a class="collapse-item @yield('MaintenanceGps')" href="/MaintenanceGps">
                                <span class="nav-list">Maintenance GPS </span>
                            </a>
                        </li>
                        <li class="mt-4 nav-item {{ request()->is('Dashboard_Visit_Assignment') ? ' active' : ''}}">
                            <a class="collapse-item @yield('Dashboard_Visit_Assignment')" href="{{url('/Dashboard_Visit_Assignment')}}">
                                <span class="nav-list">Dashboard</span>
                            </a>
<<<<<<< HEAD

                            <div class="collapse @yield('gsm')" id="gsm" aria-expanded="true" style="">
                                <ul class="nav">

                                    <li class="nav-item {{ request()->is('GsmMaster') ? ' active' : ''}}">
                                        <a class="collapse-item @yield('GsmMaster')" href="{{url('/GsmMaster')}}">
                                            <span class="link-collapse">Master Gsm</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->is('Active') ? ' active' : ''}}">
                                        <a class="collapse-item @yield('Active')" href="{{url('/GsmActive') }}">
                                            <span class="link-collapse">Master Active</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ request()->is('GsmTerminate') ? ' active' : ''}}">
                                        <a class="collapse-item @yield('Terminate')" href="{{url('/GsmTerminate') }}">
                                            <span class="link-collapse">Master Terminated</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item
                {{ request()->is('detail_customer') ? ' active' : ''}}
                ">
                    <a class="" data-toggle="collapse" href="#customer" aria-expanded="true">
                        <i class="fas fa-user-friends"></i>
                        <p>Data Customer</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @yield('customer')" id="customer" aria-expanded="true" style="">
                        <ul class="nav">
                            <li class="nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
                                <a class="collapse-item @yield('detail_customer')" href="{{url('/detail_customer')}}">
                                    <span class="link-collapse">Detail Customer</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('summary')}}">
                                    <span class="link-collapse">Summary</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard_customer')}}">
                                    <span class="link-collapse">Dashboard Customer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
            </li>
=======
                        </li>
                    </ul>
                </div>
        </li>
        @endrole

        @role('superAdmin')
            <li class="nav-item {{ request()->is('/super_admin') ? ' active' : ''}}">
            <a href="{{url('/user')}}">
                <i class="fas fa-users fa-2x icon-sidebar"
                {{ request()->is('user')? 'style=color:#5fa2db' : ''}}
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54

                ></i>
                {{-- <i class="la la-home fa-2x icon-sidebar"></i> --}}
                <span class="nav-text">Manage User Access</span>
            </a>
        </li>
        <li class="nav-item
                {{ request()->is('teknisi_data')? 'active' : ''}}
                {{ request()->is('merk_gps')? 'active' : ''}}
                {{ request()->is('task')? 'active' : ''}}
                {{ request()->is('status_layanan')? 'active' : ''}}
                {{ request()->is('sales')? 'active' : ''}}
                {{ request()->is('sensor_name')? 'active' : ''}}
                {{ request()->is('vehicle_type')? 'active' : ''}}
            ">
            <a class="" data-toggle="collapse" href="#masterSelect" aria-expanded="true">
                <i class="fa fa-list-alt fa-2x icon-sidebar"
                {{ request()->is('teknisi_data')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('merk_gps')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('task')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('status_layanan')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('sales')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('sensor_name')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('vehicle_type')? 'style=color:#5fa2db' : ''}}
                ></i>
                <span class="nav-text">Data Select</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="masterSelect" aria-expanded="true">
                <ul class="drop ">
                    <li class="mt-4 nav-item {{ request()->is('teknisi_data') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/teknisi_data')}}">
                            <span class="nav-list mt-2">Teknisi</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('merk_gps') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/merk_gps') }}">
                            <span class="nav-list">Merk GPS</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('task') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/task') }}">
                            <span class="nav-list">Task</span></span>
                        </a>
                    </li>

                    <li class="mt-4 nav-item {{ request()->is('status_layanan') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/status_layanan')}}">
                            <span class="nav-list">Status Layanan</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('sales') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/sales')}}">
                            <span class="nav-list">Sales</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('sensor_name') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/sensor_name')}}">
                            <span class="nav-list">Sensor Name</span>
                        </a>
                    </li>
                     <li  class="mt-4 nav-item {{ request()->is('vehicle_type') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/vehicle_type')}}">
                            <span class="nav-list">Vehicle Type</span>
                        </a>
                    </li>

                </ul>
            </div>

        </li>
        <li class="nav-item
            {{ request()->is('seller') ? ' active' : ''}}
            {{ request()->is('Company') ? ' active' : ''}}
            {{ request()->is('pic') ? ' active' : ''}}
            {{ request()->is('gps') ? ' active' : ''}}
            {{ request()->is('sensor') ? ' active' : ''}}
            {{ request()->is('master_po') ? ' active' : ''}}
            {{ request()->is('Vehicle') ? ' active' : ''}}
            {{ request()->is('GsmMaster') ? ' active' : ''}}
            {{ request()->is('Active') ? ' active' : ''}}
            {{ request()->is('Terminate') ? ' active' : ''}}
            ">
            <a class="" data-toggle="collapse" href="#masterData" aria-expanded="true">
                <i class="la la-table fa-2x icon-sidebar"

                {{ request()->is('seller')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Company')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('pic')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('gps')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('sensor')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('master_po')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Vehicle')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('GsmMaster')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Active')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('GsmTerminate')? 'style=color:#5fa2db' : ''}}

                ></i>
                <span class="nav-text">Master Data</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="masterData" aria-expanded="true">
                <ul class="drop ">
                    <li class="mt-4 nav-item {{ request()->is('seller') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/seller')}}">
                            <span class="nav-list mt-2">Master Seller</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('Company') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/Company') }}">
                            <span class="nav-list">Master Company</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('pic') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/pic') }}">
                            <span class="nav-list">Master PIC</span></span>
                        </a>
                    </li>

                    <li class="mt-4 nav-item {{ request()->is('gps') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/gps')}}">
                            <span class="nav-list">Master GPS</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('sensor') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/sensor')}}">
                            <span class="nav-list">Master Sensor</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item {{ request()->is('master_po') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/master_po')}}">
                            <span class="nav-list">Master Purchase Order (PO)</span>
                        </a>
                    </li>
                     <li  class="mt-4 nav-item {{ request()->is('Vehicle') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/Vehicle')}}">
                            <span class="nav-list"> Master Vehicle</span>
                        </a>
                    </li>
                    <li class="mt-4 nav-item">
                        <a class ="" data-toggle="collapse" href="#gsm" aria-expanded="true">
                            <span >Master GSM</span>
                            <span class="caret"></span>
                        </a>

                        <div class="collapse" id="gsm" aria-expanded="true" style="">
                            <ul class="nav ">

                                <li class="mt-4 nav-item {{ request()->is('GsmMaster') ? ' active' : ''}}">
                                    <a class="collapse-item @yield('GsmMaster')" href="{{url('/GsmMaster')}}">
                                        <span class="nav-list">Master Gsm</span>
                                    </a>
                                </li>
                                <li class="mt-2 nav-item {{ request()->is('Active') ? ' active' : ''}}">
                                    <a class="collapse-item @yield('Active')" href="{{url('/GsmActive') }}">
                                        <span class="nav-list">Master Active</span>
                                    </a>
                                </li>
                                <li class="mt-2 nav-item {{ request()->is('GsmTerminate') ? ' active' : ''}}">
                                    <a class="collapse-item @yield('Terminate')" href="{{url('/GsmTerminate') }}">
                                        <span class="nav-list">Master Terminate</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

        </li>
        <li class="nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
            <a class="" data-toggle="collapse" href="#customer" aria-expanded="true">
                <i class="la la-users fa-2x icon-sidebar"
                {{ request()->is('detail_customer')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('summary')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('dashboard_customer')? 'style=color:#5fa2db' : ''}}

                ></i>
                <span  class="nav-text">Data Customer</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="customer" aria-expanded="true" style="">
                <ul class="drop">
                    <li class="mt-4 nav-item {{ request()->is('detail_customer') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/detail_customer')}}">
                            <span class="nav-list">Detail Customer</span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="{{ route('summary')}}">
                            <span class="nav-list">Summary</span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="{{ route('dashboard_customer')}}">
                            <span class="nav-list">Dashboard Customer</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ request()->is('RequestComplain') ? ' active' : ''}}"">
            <a class="" data-toggle="collapse" href="#request&complain" aria-expanded="true">
                <i class="la la-comments-o fa-2x icon-sidebar"

                {{ request()->is('RequestComplain')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Dashboard_RequestComplain')? 'style=color:#5fa2db' : ''}}
                ></i>
                <span  class="nav-text">Request & Complain</span>
                <span class="caret"></span>
            </a>
            <div class="collapse" id="request&complain" aria-expanded="true" style="">
                <ul class="drop">
                    <li class="mt-4 nav-item {{ request()->is('RequestComplain') ? ' active' : ''}}">
                        <a class="collapse-item" href="{{url('/RequestComplain')}}">
                            <span class="nav-list">Data Request Complain</span>
                        </a>
                    </li>
                    <li class="mt-4">
                        <a href="/Dashboard_RequestComplain">
                            <span class="nav-list">Dashboard </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item
                {{ request()->is('MaintenanceGps') ? ' active' : ''}}
                {{ request()->is('PemasanganMutasi') ? ' active' : ''}}
                {{ request()->is('dashboard_visit_assignment') ? ' active' : ''}}
            ">
            <a class="" data-toggle="collapse" href="#visit" aria-expanded="true">
                <i class="la la-cogs fa-2x icon-sidebar"

                {{ request()->is('PemasanganMutasi')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('MaintenanceGps')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Dashboard_Visit_Assignment')? 'style=color:#5fa2db' : ''}}

                ></i>
                <span  class="nav-text">Visit Assignment</span>
                <span class="caret"></span>
            </a>
                <div class="collapse in" id="visit" aria-expanded="true" style="">
                    <ul class="drop">
                        <li class="mt-4 nav-item {{ request()->is('PemasanganMutasi') ? ' active' : ''}}">
                            <a class="collapse-item @yield('PemasanganMutasi')" href="{{url('/PemasanganMutasi')}}">
                                <span class="nav-list">Pemasangan dan Mutasi GPS</span>
                            </a>
                        </li>
                        <li class="mt-4 nav-item {{ request()->is('MaintenanceGps') ? ' active' : ''}}">
                            <a class="collapse-item @yield('MaintenanceGps')" href="/MaintenanceGps">
                                <span class="nav-list">Maintenance GPS </span>
                            </a>
                        </li>
                        <li class="mt-4 nav-item {{ request()->is('Dashboard_Visit_Assignment') ? ' active' : ''}}">
                            <a class="collapse-item @yield('Dashboard_Visit_Assignment')" href="{{url('/Dashboard_Visit_Assignment')}}">
                                <span class="nav-list">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
<<<<<<< HEAD
            </li>
            
{{--
            <li class="nav-item">
                <a href="{{ url('/livetable') }}">Example Crud</a>
            </li> --}}
        </ul>
    </div>
</div>
=======
        </li>
        @endrole

        @role('teknisi')

        <li class="nav-item
                {{ request()->is('MaintenanceGps') ? ' active' : ''}}
                {{ request()->is('PemasanganMutasi') ? ' active' : ''}}
                {{ request()->is('dashboard_visit_assignment') ? ' active' : ''}}
            ">
            <a class="" data-toggle="collapse" href="#visit" aria-expanded="true">
                <i class="la la-cogs fa-2x icon-sidebar"
                {{ request()->is('PemasanganMutasi')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('MaintenanceGps')? 'style=color:#5fa2db' : ''}}
                {{ request()->is('Dashboard_Visit_Assignment')? 'style=color:#5fa2db' : ''}}
                ></i>
                <span  class="nav-text">Visit Assignment</span>
                <span class="caret"></span>
            </a>
                <div class="collapse in" id="visit" aria-expanded="true" style="">
                    <ul class="drop">
                        <li class="mt-4 nav-item {{ request()->is('PemasanganMutasi') ? ' active' : ''}}">
                            <a class="collapse-item @yield('PemasanganMutasi')" href="{{url('/PemasanganMutasi')}}">
                                <span class="nav-list">Pemasangan dan Mutasi GPS</span>
                            </a>
                        </li>
                        <li class="mt-4 nav-item {{ request()->is('MaintenanceGps') ? ' active' : ''}}">
                            <a class="collapse-item @yield('MaintenanceGps')" href="/MaintenanceGps">
                                <span class="nav-list">Maintenance GPS </span>
                            </a>
                        </li>
                        <li class="mt-4 nav-item {{ request()->is('Dashboard_Visit_Assignment') ? ' active' : ''}}">
                            <a class="collapse-item @yield('Dashboard_Visit_Assignment')" href="{{url('/Dashboard_Visit_Assignment')}}">
                                <span class="nav-list">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
        </li>
        @endrole
    </ul>
</nav>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
