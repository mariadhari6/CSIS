<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('images/admin.png') }}">
            </div>
            <div class="info">
                <a class="">
                    <span>
                        {{Auth::user()->name}}
                        <span class="user-level">Customer Service</span>
                    </span>
                </a>

            </div>
        </div>
        <ul class="nav">

            <li class="nav-item active">
            <li class="nav-item {{ request()->is('customer_service') ? ' active' : ''}}">

                <a href="{{url('/customer_service')}}">
                    <i class="fas fa-home"></i>
                    <p>Home</p>

                </a>
            </li>

            <li class="nav-item">

            <li class="nav-item
                {{ request()->is('seller') ? ' active' : ''}}
                {{ request()->is('Company') ? ' active' : ''}}
                {{ request()->is('pic') ? ' active' : ''}}
                {{ request()->is('gps') ? ' active' : ''}}
                {{ request()->is('sensor') ? ' active' : ''}}
                {{ request()->is('GsmPreActive') ? ' active' : ''}}
                {{ request()->is('GsmActive') ? ' active' : ''}}
                {{ request()->is('GsmTerminate') ? ' active' : ''}}
            ">
                <a class="" data-toggle="collapse" href="#masterData" aria-expanded="true">
                    <i class="fas fa-table"></i>
                    <p>Master Data</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse in" id="masterData" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="{{url('/seller')}}">
                                <span class="link-collapse">Seller</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/Company') }}">
                                <span class="link-collapse">Company</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/pic') }}">
                                <span class="link-collapse">PIC</span></span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/gps')}}">
                                <span class="link-collapse">GPS</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/sensor')}}">
                                <span class="link-collapse">Sensor</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('master_po') ? ' active' : ''}}">
                            <a class="collapse-item @yield('master_po')" href="{{url('/master_po')}}">
                                <span class="link-collapse">Master Po</span>
                            </a>
                        </li>
                         <li>
                            <a href="{{url('/Vehicle')}}">
                                <span class="link-collapse"> Master Vehicle</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class ="" data-toggle="collapse" href="#gsm" aria-expanded="true">
                                <span class="link-collapse">GSM</span>
                                <span class="caret"></span>
                            </a>

                            <div class="collapse in" id="gsm" aria-expanded="true" style="">
                                <ul class="nav">
                                    <li>
                                        <a href="{{url('/GsmPreActive')}}">
                                            <span class="link-collapse">Pre Active</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/GsmActive') }}">
                                            <span class="link-collapse">Active</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/GsmTerminate') }}">
                                            <span class="link-collapse">Terminated</span>
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
                    <p>Customer</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse in" id="customer" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="{{url('/detail_customer') }}">
                                <span class="link-collapse">Detail Customer</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Summary</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Dashboard Customer</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="" data-toggle="collapse" href="#request&complain" aria-expanded="true">
                    <i class="fas fa-comments"></i>
                    <p>Request & Complain</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse in" id="request&complain" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="{{url('/RequestComplain')}}">
                                <span class="link-collapse">Data Request Complain</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item
                {{ request()->is('MaintenanceGps') ? ' active' : ''}}
                {{ request()->is('PemasanganMutasi') ? ' active' : ''}}
            ">
                <a class="" data-toggle="collapse" href="#visit" aria-expanded="true">
                    <i class="fas fa-user-cog"></i>
                    <p>Visit Assignment</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse in" id="visit" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="/PemasanganMutasi">
                                <span class="link-collapse">Pemasangan dan Mutasi GPS</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                            <a href="/MaintenanceGps">
                                <span class="link-collapse">Maintenance GPS </span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                            <a href="{{url('/Dashboard_Visit_Assignment')}}">
                                <span class="link-collapse">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">

                <a href="{{ url('/livetable') }}">Example Crud</a>
            </li>


        </ul>
    </div>
</div>
