<div class="row" id="table-detail">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6>Detail Per Company</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Company</th>
                    <th scope="col" class="list">Pemasangan</th>
                    <th scope="col" class="list">Maintenance GPS</th>
                    <th scope="col" class="list">Maintenance Sensor</th>
                    <th scope="col" class="list">Mutasi Pemasangan GPS</th>
                    <th scope="col" class="list">Pelepasan</th>
                </tr>


                    @foreach ($data as $item)
                    <tr>
                    <td>
                        {{ $item->requestComplain->companyRequest->company_name}}

                    </td>
                    <td>
                        {{ $item->jenis_pekerjaan}}
                    </td>
                    <td>
                        {{ $item->task}}
                    </td>
                    <td>
                        {{-- {{ $item->cost}} --}}
                    </td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
</div>
{{-- <h1>hello word</h1> --}}
