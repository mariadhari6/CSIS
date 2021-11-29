<div class="row" id="table-gps">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- <h6 style="text-align: center">GPS</h6> --}}
                <table class="table table-responsive data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status GPS</th>
                    <th scope="col" class="list">Total GPS</th>
                    <th scope="col" class="list">Type GPS</th>
                    <th scope="col" class="list">Total Type</th>



                </tr>
                    @foreach ($gps_ready as $gps )
                    <tr>
                        <td>{{ $gps->status ??''}}</td>
                        <td>@foreach ( $gps->total_status as $jumlah)
                            {{$jumlah->total_status??''}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($gps->type as $gps_type)
                            {{$gps_type->type??''}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($gps->total_pertype as $type)
                            {{$type->total_pertype??''}} <br>
                            @endforeach
                        </td>

                    </tr>
                    @endforeach

                    @foreach ($gps_used as $gps )
                    <tr>
                        <td>{{ $gps->status ??''}}</td>
                        <td>@foreach ( $gps->total_status as $jumlah)
                            {{$jumlah->total_status??''}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($gps->type as $gps_type)
                            {{$gps_type->type??''}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($gps->total_pertype as $type)
                            {{$type->total_pertype??''}} <br>
                            @endforeach
                        </td>

                    </tr>
                    @endforeach


                    @foreach ($gps_error as $gps )
                    <tr>
                        <td style="color: red" >{{ $gps->status ??''}}</td>
                        <td style="color: red" >@foreach ( $gps->total_status as $jumlah)
                            {{$jumlah->total_status??''}}
                        @endforeach
                        </td>
                          <td style="color: red" >
                            @foreach ($gps->type as $gps_type)
                            {{$gps_type->type??''}} <br>
                            @endforeach
                        </td>
                        <td style="color: red" >@foreach ($gps->total_pertype as $type)
                            {{$type->total_pertype??''}} <br>
                            @endforeach
                        </td>

                    </tr>
                    @endforeach

                    {{-- <tr>
                        <td>{{ $gps[2]->status??''}}</td>
                        <td>@foreach ( $gps[2]->total_status as $jumlah)
                            {{$jumlah->total_status??''}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($gps[2]->type as $gps_type)
                            {{$gps_type->type??''}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($gps[2]->total_pertype as $type)
                            {{$type->total_pertype??''}} <br>
                            @endforeach
                        </td>

                    </tr>

                    <tr>
                        <td style="color:red">{{ $gps[0]->status??''}}</td>
                        <td style="color:red">@foreach ( $gps[0]->total_status as $jumlah)
                            {{$jumlah->total_status??''}}
                        @endforeach
                        </td>
                          <td style="color:red">
                            @foreach ($gps[0]->type as $gps_type)
                            {{$gps_type->type??''}} <br>
                            @endforeach
                        </td>
                        <td style="color:red;">@foreach ($gps[0]->total_pertype as $type)
                            {{$type->total_pertype??''}} <br>
                            @endforeach
                        </td>

                    </tr> --}}






                </table>
            </div>
        </div>
    </div>





</div>
{{-- <h1>hello word</h1> --}}
