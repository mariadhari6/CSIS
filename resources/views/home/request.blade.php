    <div class="row" id="table-request">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6>Complain </h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($complain as $item )

                    <tr>
                        <td>
                            {{$item->status}}
                         </td>


                        <td>
                            {{$item->jumlah_status_complaint}}
                         </td>


                    </tr>
                     @endforeach




                </table>
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6>Request</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Status</th>
                    <th scope="col" class="list">Total</th>

                </tr>


                    @foreach ($request as $item )

                    <tr>
                        <td>
                            {{$item->status}}
                         </td>


                        <td>
                            {{$item->jumlah_status_request}}
                         </td>


                    </tr>
                     @endforeach




                </table>
            </div>
        </div>
    </div>






</div>
{{-- <h1>hello word</h1> --}}
