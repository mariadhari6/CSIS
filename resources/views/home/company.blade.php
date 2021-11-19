<div class="row" id="table-company">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{-- <h6>Jumlah Company Per Seller</h6> --}}
                <table class="table table-hover data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list" style="text-align: left">Seller Name</th>
                    <th scope="col" class="list">Total Company</th>
                    <th scope="col" class="list" style="text-align: left">Company Name</th>



                </tr>


                    @foreach ($company as $companys )

                    <tr>
                    <td style="text-align: left">{{ $companys->seller_id}}</td>
                    <td>@foreach ( $companys->total_company as $jumlah)
                            {{$jumlah->total_company}}
                    @endforeach
                    </td>
                    <td style="text-align: left">@foreach ($companys->company as $company_name)
                        {{$company_name->company_name}} <br>
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
