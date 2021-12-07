    <div class="row" id="table-request">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 style="float: left">Complain </h6>
                <h6 class="presentase-table" >{{round($presentase_complain,1)}}%</h6>
                 @foreach ($complain as $item )
                @endforeach
                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($complain as $item )

                    <tr>
                        @if($item->status=="On Progress")
                        <td style="color: red">
                            {{$item->status}}
                         </td>


                        <td style="color: red">
                            {{$item->jumlah_status_complaint}}
                         </td>
                         @else
                         <td>
                            {{$item->status}}
                         </td>

                        <td>
                            {{$item->jumlah_status_complaint}}
                         </td>
                         @endif


                    </tr>
                     @endforeach


                <tfoot>
                    <tr>
                        <th>TOTAL</th>
                        <th style="text-align:center">{{$jumlah_total_complain}}</th>
                    </tr>
                </tfoot>

                </table>


            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6 style="float: left">Request</h6>
                <h6 class="presentase-table" >{{round($presentase_request,1)}}%</h6>
                <table class="table table-hover data " class="table_home" id="table_home" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($request as $item )

                    <tr>
                        @if($item->status=="On Progress")
                        <td style="color: red">
                            {{$item->status}}
                         </td>


                        <td style="color: red">
                            {{$item->jumlah_status_request}}
                         </td>
                         @else
                         <td>
                            {{$item->status}}
                         </td>


                        <td>
                            {{$item->jumlah_status_request}}
                         </td>
                         @endif





                    </tr>
                     @endforeach
                     <tfoot>
                        <tr>
                            <th>TOTAL</th>
                            <th style="text-align:center">{{$jumlah_total_request}}</th>
                        </tr>
                    </tfoot>





                </table>
            </div>
        </div>
    </div>






</div>
{{-- <h1>hello word</h1> --}}
