<div class="row" id="table-company">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6>Jumlah Company Per Seller</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Seller Name</th>
                    <th scope="col" class="list">Total Company</th>

                </tr>


                    @foreach ($data as $companys )

                    <tr>
                             <td>
                        {{ $companys->seller_id}}

                            </td>




                         <td>
                            {{$companys->jumlah_company}}
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
