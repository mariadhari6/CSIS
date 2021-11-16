<div class="row" id="table-gsm">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6>Gsm Percompany</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Company Name</th>
                    <th scope="col" class="list">Total GSM</th>

                </tr>


                    @foreach ($data as $item )

                    <tr>
                        @if ($item->company_id == null)
                            <td>
                                -
                            </td>
                        @else
                             <td>
                        {{ $item->company->company_name??''}}

                            </td>
                        @endif
                         <td>
                            {{$item->jumlah_gsm}}
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
                <h6>Status GSM</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                     <th scope="col" class="list">Status GSM</th>
                    <th scope="col" class="list">Total Status GSM</th>
                </tr>


                    @foreach ($status as $item )

                    <tr>
                             <td>
                        {{ $item->status_gsm}}

                            </td>

                         <td>
                            {{$item->jumlah_status_gsm}}
                         </td>



                    </tr>
                     @endforeach


                </table>
            </div>
        </div>
    </div>




</div>
{{-- <h1>hello word</h1> --}}
