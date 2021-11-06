<div class="row" id="table-typeGps">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Perbaikan Per Type GPS</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Type GPS</th>
                    <th scope="col" class="list">Maintenance</th>
                </tr>


                    @foreach ($data as $item)
                    <tr>
                    <td>
                        {{ $item->gps->typeGps->type }}
                    </td>
                    <td>
                        {{ $item->type_count}}
                    </td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
</div>
{{-- <h1>hello word</h1> --}}
