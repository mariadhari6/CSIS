<div class="row" id="table-sensor">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- <h6>Sensor</h6> --}}
                <table class="table table-responsive data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status Sensor</th>
                    <th scope="col" class="list">Total Sensor</th>
                    <th scope="col" class="list">Sensor Name</th>
                    <th scope="col" class="list">Total Sensor Name</th>

                </tr>


                     @foreach ($sensor as $item )

                    <tr>
                        <td>{{ $item->status}}</td>
                        <td>@foreach ( $item->total_status as $jumlah)
                            {{$jumlah->total_status}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($item->sensor_name as $sensor_name)
                            {{$sensor_name->sensor_name}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($item->total_persensor_name as $total)
                            {{$total->total_persensor_name}} <br>
                            @endforeach
                        </td>







                    </tr>
                     @endforeach

                </table>
            </div>
        </div>
    </div>




</div>
{{-- <h1>hello word</h1> --}}
