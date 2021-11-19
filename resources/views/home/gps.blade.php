<div class="row" id="table-gps">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- <h6 style="text-align: center">GPS</h6> --}}
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Status GPS</th>
                    <th scope="col" class="list">Total GPS</th>
                    <th scope="col" class="list">Type GPS</th>
                    <th scope="col" class="list">Total Type</th>



                </tr>


                    @foreach ($gps as $item )

                    <tr>
                        <td>{{ $item->status}}</td>
                        <td>@foreach ( $item->total_status as $jumlah)
                            {{$jumlah->total_status}}
                        @endforeach
                        </td>
                          <td>
                            @foreach ($item->type as $gps_type)
                            {{$gps_type->type}} <br>
                            @endforeach
                        </td>
                        <td>@foreach ($item->total_pertype as $type)
                            {{$type->total_pertype}} <br>
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
