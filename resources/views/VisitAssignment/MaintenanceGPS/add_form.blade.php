<tr id="add_form">
    <td></td>
    <td></td>

    <td>
        <select class="form-control" id="company" name="company">
            @foreach ($requestComplaint as $item)
            <option value="{{ $item->id }}">{{ $item->companyRequest->company_name }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="form-control" id="vehicle" name="vehicle">
            @foreach ($requestComplaint as $item)
                <option value="{{ $item->id }}">{{ $item->vehicle }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="form-control" id="tanggal" name="tanggal">
            @foreach ($requestComplaint as $item)
                <option value="{{ $item->id }}">{{ $item->waktu_kesepakatan }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="form-control" id="type_gps" name="type_gps">
            <option value="">Type Gps</option>
            @foreach ($gps as $item)
                <option value="{{ $item->id }}">{{ $item->type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="equipment_gps" name="equipment_gps">
            <option value="">equipment_gps</option>
            @foreach ($gps as $item)
                <option value="{{ $item->id }}">{{ $item->type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="equipment_sensor" name="equipment_sensor">
            <option value="">equipment_sensor</option>
                @foreach ($sensor as $item)
                <option value="{{ $item->id }}">{{ $item->sensor_name }}</option>
                @endforeach
        </select>
    </td>
    <td>
        <div class="input-div">
            <input type="number" class="input" id="equipment_gsm" placeholder="Qty" required>
        </div>
    </td>
    <td>
        <select class="form-control" id="permasalahan" name="permasalahan">
            <option value="">permasalahan</option>
            @foreach ($requestComplaint as $item)
                <option value="{{ $item->id }}">{{ $item->detail_task }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="form-control" id="ketersediaan_kendaraan" name="ketersediaan_kendaraan">
            <option value="Tidak Tersedia">Tidak Tersedia</option>
            <option value="Tersedia">Tersedia</option>
        </select>
    </td>
    <td>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
    </td>
    <td>
        <textarea class="form-control" id="hasil" name="hasil" rows="3"></textarea>
    </td>
    <td>
        <div class="input-div">
            <input type="number" class="input" id="biaya_transportasi" placeholder="BiayaTransportasi" required>
        </div>
    </td>
    <td>
        <select class="form-control" id="teknisi" name="teknisi">
            @foreach ($pic as $item)
            <option value="{{ $item->id }}">{{ $item->pic_name }}</option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="form-control" id="req_by" name="req_by">
            <option value="Customer">Customer</option>
            <option value="CS">CS</option>
        </select>
    </td>
    <td>
        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        {{-- <button onclick="store()">save</button> --}}
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>


    <script type="text/javascript">
        $(document).ready(function() {
            // depend vehicle
            $('select[name="company"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependentMaintenanceGpsCompany/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="vehicle"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="vehicle"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="vehicle"]').empty();
                }
            });

            // depend tanggal
            $('select[name="company"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependentMaintenanceGpsTanggal/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="tanggal"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="tanggal"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="tanggal"]').empty();
                }
            });

            // depend permasalahan
            $('select[name="company"]').on('change', function() {
                var id = $(this).attr("id");
                var itemID = $(this).val();
                if(itemID) {
                    $.ajax({
                        url: '/dependentMaintenanceGpsPermasalahan/'+itemID,
                        method: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="permasalahan"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="permasalahan"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                        }
                    });
                }else{
                    $('select[name="permasalahan"]').empty();
                }
            });

        });
    </script>

</tr>

