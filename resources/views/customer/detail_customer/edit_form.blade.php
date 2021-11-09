<td></td>
<td></td>
<td>
    <select class="select CompanyId-{{ $details->id }}" id="CompanyId">
        @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select LicencePlate-{{ $details->id }}" id="LicencePlate">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select VihecleType-{{ $details->id }}" id="VihecleType">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->vehicle_id }}</option>
        @endforeach
    </select>

</td>
<td>
    <select class="select PoNumber-{{ $details->id }}" id="PoNumber">
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->po_number }}</option>
        @endforeach
    </select>

</td>
<td><div class="input-div"><input type="date" class="input Waranty-{{ $details->id }}" id="Waranty" value="{{ $details->waranty }}"></div></td>
<td>
    <select class="select HargaLayanan-{{ $details->id }}" id="HargaLayanan">
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->harga_layanan }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select PoDate-{{ $details->id }}" id="PoDate">
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->po_date }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select StatusPo-{{ $details->id }}" id="StatusPo">
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->status_po }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Imei-{{ $details->id }}" id="Imei">
        @foreach ($imei as $item)
            <option value="{{ $item->id }}" {{ $details->id == $item->id ? 'selected':''}}>{{ $item->imei }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Merk-{{ $details->id }}" id="Merk">
        @foreach ($imei as $item)
            <option value="{{ $item->id }}" {{ $details->id == $item->id ? 'selected':''}}>{{ $item->merk }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Type-{{ $details->id }}" id="Type">
        @foreach ($imei as $item)
            <option value="{{ $item->id }}" {{ $details->id == $item->id ? 'selected':''}}>{{ $item->type }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select GSM-{{ $details->id }}" id="GSM">
        @foreach ($gsm as $item)
        <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':''}}>{{ $item->gsm_number }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Provider-{{ $details->id }}" id="Provider">
        @foreach ($gsm as $item)
        <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':''}}>{{ $item->provider }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select SerialNumberSensor-{{ $details->id }}" id="SerialNumberSensor">
        @foreach ($sensor as $item)
            <option value="{{ $item->id }}" {{ $details->id == $item->id ? 'selected':''}}>{{ $item->serial_number }}</option>
        @endforeach
    </select>
</td>
<td>
     <select class="select NameSensor-{{ $details->id }}" id="NameSensor">
        @foreach ($sensor as $item)
            <option value="{{ $item->id }}" {{ $details->id == $item->id ? 'selected':''}}>{{ $item->sensor_name }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select MerkSensor-{{ $details->id }}" id="MerkSensor">
        @foreach ($sensor as $item)
            <option value="{{ $item->id }}" {{ $details->id == $item->id ? 'selected':''}}>{{ $item->merk_sensor }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select PoolName-{{ $details->id }}" id="PoolName">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->pool_name }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select PoolLocation-{{ $details->id }}" id="PoolLocation">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->id  == $item->id ? 'selected':'' }}>{{ $item->pool_location }}</option>
        @endforeach
    </select>
</td>
<td><div class="input-div"><input type="date" class="input Waranty-{{ $details->id }}" id="Waranty" value="{{ $details->waranty }}"></div></td>
<td>
    <select class="select StatusLayanan-{{ $details->id }}" id="StatusLayanan">
        @foreach ($status_layanan as $item)
            <option value="{{ $item->id }}" {{ $details->status_id == $item->id ? 'selected':'' }}>{{ $item->service_status_name }}</option>
        @endforeach
    </select>
</td>
<td><div class="input-div"><input type="date" class="input TanggalPasang-{{ $details->id }}" id="TanggalPasang" value="{{ $details->tanggal_pasang }}"></div></td>
<td>
    <div class="input-div"><input type="date" class="input TanggalNonAktif-{{ $details->id }}" id="TanggalNonAktif" value="{{ $details->tanggal_non_aktif }}" data-toggle="popover" data-placement="bottom" data-content="Please fill out the field"></div>
</td>
<td><div class="input-div"><input type="date" class="input TanggalReaktivasi-{{ $details->id }}" id="TanggalReaktivasi" value="{{ $details->tgl_reaktivasi_gps}}" data-toggle="popover" data-placement="bottom" data-content="Please fill out the field" ></div></td>
<td class="action sticky-col first-col">
    <i class="fas fa-check add" id="edit" onclick="update({{ $details->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>

<script>

    $(document).ready(function() {

        $('select[name="SerialNumberSensor"]').on('change', function() {

                var Id = $(this).val();
                if(Id) {
                    $.ajax({
                        url: '/based_sensor/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="SensorName').empty();
                            $('select[name="MerkSensor').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="SensorName').append('<option value="'+ key +'">'+ value.sensor_name +'</option>');
                                    $('select[name="MerkSensor').append('<option value="'+ key +'">'+ value.merk_sensor +'</option>');
                               });
                        }
                    });
                }else{
                    $('select[name="SensorName').empty();
                    $('select[name="MerkSensor').empty();
                }

        });

        $('select[name="LicencePlate"]').on('change', function() {

                var Id = $(this).val();
                if(Id) {
                    $.ajax({
                        url: '/based_license/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="VihecleType').empty();
                            $('select[name="PoolName').empty();
                            $('select[name="PoolLocation').empty();
                            $.each(data, function(key, value) {
                                $('select[name="VihecleType').append('<option value="'+ key +'">'+ value.vehicle_id +'</option>');
                                $('select[name="PoolName').append('<option value="'+ key +'">'+ value.pool_name +'</option>');
                                $('select[name="PoolLocation').append('<option value="'+ key +'">'+ value.pool_location +'</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="VihecleType').empty();
                    $('select[name="PoolName').empty();
                    $('select[name="PoolLocation').empty();
                }
        });

            $('select[name="PoNumber"]').on('change', function() {
                var Id = $(this).val();

                if(Id) {
                    $.ajax({
                        url: '/based_ponumber/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="HargaLayanan').empty();
                            $('select[name="PoDate').empty();
                            $('select[name="StatusPo').empty();

                                $.each(data, function(key, value) {
                                    $('select[name="HargaLayanan').append('<option value="'+ key +'">'+ value.harga_layanan +'</option>');
                                    $('select[name="PoDate').append('<option value="'+ key +'">'+ value.po_date +'</option>');
                                    $('select[name="StatusPo').append('<option value="'+ key +'">'+ value.status_po +'</option>');


                               });
                        }
                    });
                }
                else{
                    $('select[name="HargaLayanan').empty();
                    $('select[name="PoDate').empty();
                    $('select[name="StatusPo').empty();

                }
            });

            $('select[name="Imei"]').on('change', function() {
                var Id = $(this).val();
                if(Id) {
                    $.ajax({
                        url: '/based_imei/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="Merk').empty();
                            $('select[name="Type').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="Merk').append('<option value="'+ key +'">'+ value.merk +'</option>');
                                    $('select[name="Type').append('<option value="'+ key +'">'+ value.type +'</option>');
                               });
                        }
                    });
                }else{
                    $('select[name="Merk').empty();
                    $('select[name="Type').empty();
                }

            });


            $('select[name="GSM"]').on('change', function() {
                var Id = $(this).val();
                if(Id) {
                    $.ajax({
                        url: '/based_gsm/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="Provider').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="Provider').append('<option value="'+ key +'">'+ value.provider +'</option>');
                               });
                        }
                    });
                }else{
                    $('select[name="Provider').empty();
                }

            });

            $('#clear').click(function(){
                var sensorterpilih =  document.getElementById("SensorTerpilih").value;
                if (sensorterpilih == ""){
                    alert("No sensor selected")
                }else{
                    $('#SensorTerpilih').empty();
                }
            })

    });


    function add(){
        // var sensor = document.getElementById("SensorName").value;
        var serialnumber = document.getElementById("SerialNumberSensor").value;
        // var merksensor = document.getElementById("MerkSensor").value;
        // var data = sensor + "(" +" "+ serialnumber +","+ merksensor +")" +" "+" "
        var data = serialnumber +" "
        var hasil = document.getElementById("SensorTerpilih").value;
        if (data == hasil) {
                alert("ada data yang sama");
        }else{
            $("#SensorTerpilih").prepend(data);
        }
    }

    function send(){

        var sensorterpilih = document.getElementById("SensorTerpilih").value;
        $('#sensor').empty();
        $('#sensor').append(
            '<option value="'+ sensorterpilih + '" id="SensorAll" data-toggle="modal" data-target="#exampleModal"> '+ sensorterpilih +'</option>'
        );
    }

</script>




