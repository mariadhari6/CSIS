<div class="row" id="table-gps">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Merk GPS</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Merk GPS</th>
                    <th scope="col" class="list">Total Merk GPS</th>

                </tr>


                    @foreach ($data_total_merk as $item )

                    <tr>
                             <td>
                        {{ $item->merk}}

                            </td>

                         <td>
                            {{$item->jumlah_merk}}
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
                <h6>Type GPS</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                     <th scope="col" class="list">Type GPS</th>
                    <th scope="col" class="list">Total Type GPS</th>
                </tr>


           @foreach ($data_total_type as $item )

                    <tr>
                             <td>
                        {{ $item->type}}

                            </td>

                         <td>
                            {{$item->jumlah_type}}
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
                <h6>Status GPS</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                     <th scope="col" class="list">Status GPS</th>
                    <th scope="col" class="list">Total Status GPS</th>
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
