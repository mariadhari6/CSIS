<div class="row" id="table-sensor">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Sensor Name</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Sensor Name</th>
                    <th scope="col" class="list">Total Sensor Name</th>

                </tr>


                    @foreach ($data_total_name as $item )

                    <tr>
                             <td>
                        {{ $item->sensor_name}}

                            </td>

                         <td>
                            {{$item->jumlah_sensor}}
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
                <h6>Merk Sensor</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                     <th scope="col" class="list">Merk Sensor</th>
                    <th scope="col" class="list">Total Merk Sensor</th>
                </tr>


           @foreach ($data_total_merk as $item )

                    <tr>
                             <td>
                        {{ $item->merk_sensor}}

                            </td>

                         <td>
                            {{$item->jumlah_merk_sensor}}
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
                <h6>Status Sensor</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                     <th scope="col" class="list">Status Sensor</th>
                    <th scope="col" class="list">Total Status Sensor</th>
                </tr>


                    @foreach ($data_total_status as $item )

                    <tr>
                             <td>
                        {{ $item->status}}

                            </td>

                         <td>
                            {{$item->jumlah_status}}
                         </td>



                    </tr>
                     @endforeach


                </table>
            </div>
        </div>
    </div>




</div>
{{-- <h1>hello word</h1> --}}
