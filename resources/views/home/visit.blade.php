    <div class="row" id="table-request">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Pemsangan GPS </h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

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



                        <td>
                            {{$item->jumlah_status_pemasangan}}
                         </td>


                    </tr>
                     @endforeach




                </table>
            </div>
        </div>
    </div>

     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Mutasi</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

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

                        <td>
                            {{$item->jumlah_status_mutasi}}
                         </td>


                    </tr>
                     @endforeach




                </table>
            </div>
        </div>
    </div>

     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Maintenance GPS</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

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


                        <td>
                            {{$item->jumlah_status_maintenance_gps}}
                         </td>


                    </tr>
                     @endforeach




                </table>
            </div>
        </div>
    </div>


     <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Maintenance Sensor</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

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

                        <td>
                            {{$item->jumlah_status_maintenance_sensor}}
                         </td>


                    </tr>
                     @endforeach




                </table>
            </div>
        </div>
    </div>





</div>
{{-- <h1>hello word</h1> --}}
