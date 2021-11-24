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




                    <tr>
                        <td>{{ $sensor[1]->status}}</td>
                        <td>@foreach ( $sensor[1]->total_status as $jumlah)
                            {{$jumlah->total_status}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($sensor[1]->sensor_name as $sensor_name)
                            {{$sensor_name->sensor_name}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($sensor[1]->total_persensor_name as $total)
                            {{$total->total_persensor_name}} <br>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td>{{ $sensor[2]->status}}</td>
                        <td>@foreach ( $sensor[2]->total_status as $jumlah)
                            {{$jumlah->total_status}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($sensor[2]->sensor_name as $sensor_name)
                            {{$sensor_name->sensor_name}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($sensor[2]->total_persensor_name as $total)
                            {{$total->total_persensor_name}} <br>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td style="color: red">{{ $sensor[0]->status}}</td>
                        <td style="color: red">@foreach ( $sensor[0]->total_status as $jumlah)
                            {{$jumlah->total_status}}
                        @endforeach
                        </td>
                          <td style="color: red">
                            @foreach ($sensor[0]->sensor_name as $sensor_name)
                            {{$sensor_name->sensor_name}} <br>
                            @endforeach
                        </td>
                        <td style="color: red">@foreach ($sensor[0]->total_persensor_name as $total)
                            {{$total->total_persensor_name}} <br>
                            @endforeach
                        </td>
                    </tr>



                </table>
            </div>
        </div>
    </div>




</div>
{{-- <h1>hello word</h1> --}}
