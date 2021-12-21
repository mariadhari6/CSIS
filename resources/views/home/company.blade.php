<div class="row" id="table-company" class="table_company">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- <h6>Jumlah Company Per Seller</h6> --}}
                <table class="table table-hover data " class="table_company" id="table_company" >

                <tr>
                    <th scope="col" class="list" style="text-align: left">Company Name</th>
                    <th scope="col" class="list" style="text-align: left">Seller Name</th>
                    <th scope="col" class="list" style="text-align: center">Total GPS</th>
                    <th scope="col" class="list">Type GPS</th>
                    <th scope="col" class="list" style="text-align: center" >Total Type GPS</th>





                </tr>


                    @foreach ($company as $companys )

                    <tr>
                    <td style="text-align: left">{{ $companys->company->company_name??''}}</td>

                    <td style="text-align: left">
                        @foreach ($companys->seller as $seller)
                        {{$seller->seller_id}} <br>
                        @endforeach
                    </td>
                    <td style="text-align: center">@foreach ( $companys->total_company as $jumlah)
                            {{$jumlah->total_company}}
                    @endforeach
                    </td>
                    <td>
                        @foreach ($companys->gps as $gps_types)
                        {{$gps_types['type_gps']}} <br>
                        @endforeach
                    </td>
                    <td style="text-align: center">
                        @foreach ($companys->gps as $gps_types)
                        {{$gps_types['type_total']}} <br>
                        @endforeach
                    </td>

                    {{-- <td>
                        {{ $item->time}}
                    </td>
                    <td>
                        {{ $item->cost}}
                    </td> --}}
                    </tr>
                     @endforeach



                </table>
            </div>
        </div>
    </div>



</div>
{{-- <h1>hello word</h1> --}}