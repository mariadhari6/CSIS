<div class="row" id="table-vehicle">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6>Vehicle Percompany</h6>
                <table class="table table-responsive data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Company Name</th>
                    <th scope="col" class="list">Total Vehicle</th>
                    <th scope="col" class="list">Vehicle Type</th>
                    <th scope="col" class="list">Jumlah Unit Per Vehicle Type</th>



                </tr>


                    @foreach ($vehicle as $item )

                    <tr>
                        <td>{{ $item->company->company_name}}</td>
                        <td>@foreach ( $item->total_vehicletype as $jumlah)
                            {{$jumlah->total_vehicletype}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($item->vehicle_type as $vehicle_name)
                             {{ $vehicle_name['vehicle_name'] }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($item->vehicle_type as $vehicle_total)
                            {{ $vehicle_total['vehicle_total'] }}<br>
                            @endforeach
                        </td>
                        {{-- @foreach ($item->vehicle as $vehicle_total)
                            {{ $vehicle_total['vehicle_total'] }}<br>
                        @endforeach --}}

                    </tr>
                     @endforeach


                </table>
            </div>
        </div>
    </div>







</div>
{{-- <h1>hello word</h1> --}}
