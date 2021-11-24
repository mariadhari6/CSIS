    <div class="row" id="table-visit">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h6 style="float: left">Pemsangan GPS </h6>
                <h6 class="presentase-table" >{{round($presentase_pemasangan,1)}}%</h6>
                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($pemasangan as $item )

                    <tr>
                        @if ($item->status == 'On Progress')
                            <td style="color: red">
                            {{$item->status}}
                            </td>
                        @else
                        <td>
                            {{$item->status}}
                        </td>
                        @endif


                        @if ($item->status == 'On Progress')
                         <td style="color: red">
                            {{$item->jumlah_status_pemasangan}}
                         </td>
                         @else
                        <td>
                            {{$item->jumlah_status_pemasangan}}
                         </td>
                        @endif


                    </tr>
                     @endforeach
                    <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="text-align:center">{{$jumlah_total_pemasangan}}</th>
                    </tr>
                    </tfoot>



                </table>

            </div>
        </div>
    </div>

     <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h6 style="float: left">Mutasi</h6>
                <h6 class="presentase-table" >{{round($presentase_mutasi,1)}}%</h6>
                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($mutasi as $item )

                    <tr>
                        @if ($item->status == 'On Progress')
                            <td style="color: red">
                            {{$item->status}}
                            </td>
                        @else
                        <td>
                            {{$item->status}}
                        </td>
                        @endif


                        @if ($item->status == 'On Progress')
                         <td style="color: red">
                            {{$item->jumlah_status_mutasi}}
                         </td>
                         @else
                        <td>
                            {{$item->jumlah_status_mutasi}}
                         </td>
                        @endif


                    </tr>
                     @endforeach
                     <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="text-align:center">{{$jumlah_total_mutasi}}</th>
                    </tr>
                    </tfoot>




                </table>
            </div>
        </div>
    </div>

     <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h6 style="float: left">Maintenance GPS</h6>
                <h6 class="presentase-table" >{{round($presentase_maintenance_gps,1)}}%</h6>

                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($maintenance_gps as $item )

                    <tr>
                        @if ($item->status == 'On Progress')
                            <td style="color: red">
                            {{$item->status}}
                            </td>
                        @else
                        <td>
                            {{$item->status}}
                        </td>
                        @endif


                        @if ($item->status == 'On Progress')
                         <td style="color: red">
                            {{$item->jumlah_status_maintenance_gps}}
                         </td>
                         @else
                        <td>
                            {{$item->jumlah_status_maintenance_gps}}
                         </td>
                        @endif


                    </tr>
                     @endforeach

                     <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="text-align:center">{{$jumlah_total_maintenance_gps}}</th>
                    </tr>
                    </tfoot>



                </table>
            </div>
        </div>
    </div>


     <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h6 style="float: left">Maintenance Sensor</h6>
                <h6 class="presentase-table" >{{round($presentase_maintenance_sensor,1)}}%</h6>

                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($maintenance_sensor as $item )

                    <tr>
                        @if ($item->status == 'On Progress')
                            <td style="color: red">
                            {{$item->status}}
                            </td>
                        @else
                        <td>
                            {{$item->status}}
                        </td>
                        @endif


                        @if ($item->status == 'On Progress')
                         <td style="color: red">
                            {{$item->jumlah_status_maintenance_sensor}}
                         </td>
                         @else
                        <td>
                            {{$item->jumlah_status_maintenance_sensor}}
                         </td>
                        @endif


                    </tr>
                     @endforeach

                     <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="text-align:center">{{$jumlah_total_maintenance_sensor}}</th>
                    </tr>
                    </tfoot>


                </table>
            </div>
        </div>
    </div>





</div>
{{-- <h1>hello word</h1> --}}
