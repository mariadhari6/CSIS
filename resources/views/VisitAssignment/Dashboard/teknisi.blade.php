<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h6>Tugas Per Teknisi Maintenance</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Technician</th>
                    <th scope="col" class="list">Number Of Task</th>
                </tr>


                    @foreach ($data as $item)
                    <tr>
                    <td>
                        {{ $item->teknisiMaintenance->teknisi_name }}
                    </td>
                    <td>
                        {{ $item->per_teknisi}}
                    </td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
    </div>

         <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                <h6>Tugas Per Teknisi Pemasangan Mutasi GPS</h6>
                <table class="table table-responsive data " class="table_id" id="table_id" >

                <tr>
                    <th scope="col" class="list">Technician</th>
                    <th scope="col" class="list">Number Of Task</th>
                </tr>


                    @foreach ($pemasangan_mutasi_GPS as $item)
                    <tr>
                    <td>
                        {{ $item->teknisiPemasangan->teknisi_name}}
                    </td>
                    <td>
                        {{ $item->per_teknisi}}
                    </td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
         </div>
</div>
{{-- <h1>hello word</h1> --}}
