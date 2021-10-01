<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h6>Cost Per Company</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Per Company</th>
                    <th scope="col" class="list">Vehicle</th>
                    <th scope="col" class="list">Times</th>
                    <th scope="col" class="list">Cost</th>
                </tr>


                    @foreach ($data as $item)
                    <tr>
                    <td>
                        {{ $item->requestComplain->companyRequest->company_name}}

                    </td>
                    <td>
                        {{ $item->vehicle}}
                    </td>
                    <td>
                        {{ $item->time}}
                    </td>
                    <td>
                        {{ $item->cost}}
                    </td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
</div>
{{-- <h1>hello word</h1> --}}
