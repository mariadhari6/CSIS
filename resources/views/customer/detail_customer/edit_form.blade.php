<td></td>
<td></td>
<<<<<<< HEAD


    <td><select class="select CompanyId-{{$details->id}}" id="CompanyId" name="company_id">
        <option  value="{{ $details->company_id}}">{{ $details->company->company_name}}</option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('CompanyId') == $companys->id  ? 'selected':'' }}>
        {{$companys->company_name}}
        </option>

       @endforeach
    </select></i></td>

<td>
    <select class="select LicencePlate-{{$details->id}}" id="LicencePlate">
             <option  value="{{ $details->licence_plate}}">{{ $details->licence_plate }}</option>
            <option value="B-64728-YZ" >B-64728-YZ</option>
            <option value="B-62737-XS">B-62737-XS</option>
            <option value="B-73627-WS">B-73627-WS</option>
    </select>
</td>
<td >
        <select class="select VihecleType-{{$details->id}}" id="VihecleType">
             <option  value="{{ $details->vihecle_type}}">{{ $details->vihecle_type }}</option>
            <option value="Box" >Box</option>
            <option value="WingsBox">WingsBox</option>

        </select>
</td>
<td >
        <select class="select PoNumber-{{$details->id}}" id="PoNumber">
             <option  value="{{ $details->po_number}}">{{ $details->po_number }}</option>
            <option value="001/DPT/VIII/2016" >001/DPT/VIII/2016</option>
            <option value="002/DPT/VIII/2019">002/DPT/VIII/2019</option>

        </select>
</td>
<td><select class="select PoDate-{{$details->id}}" id="PoDate" name="po_date">
        <option  value="{{ $details->po_date}}">{{ $details->company->po_date }}</option>
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('po_date') == $companys->id  ? 'selected':'' }}>
        {{$companys->po_date}}
        </option>
=======
<td>
    <select class="select CompanyId-{{ $details->id }}" id="CompanyId">
        @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ $item->id ==  $details->company_id  ? 'selected':'' }}>{{ $item->company_name }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select LicencePlate-{{ $details->id }}" id="LicencePlate" name="LicencePlate">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->licence_plate  == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select VihecleType-{{ $details->id }}" id="VihecleType" name="VihecleType" disabled>
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->vehicle_id  == $item->id ? 'selected':'' }}>{{ $item->vehicle_id }}</option>
        @endforeach
    </select>

</td>
<td>
    <select class="select PoNumber-{{ $details->id }}" id="PoNumber" name="PoNumber">
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->po_id  == $item->id ? 'selected':'' }}>{{ $item->po_number }}</option>
        @endforeach
    </select>

</td>
<td>
    <select class="select HargaLayanan-{{ $details->id }}" id="HargaLayanan" name="HargaLayanan" disabled>
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->harga_layanan  == $item->id ? 'selected':'' }}>{{ $item->harga_layanan }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select PoDate-{{ $details->id }}" id="PoDate"  name="PoDate" disabled>
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->po_date  == $item->id ? 'selected':'' }}>{{ $item->po_date }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select StatusPo-{{ $details->id }}" id="StatusPo" name="StatusPo" disabled >
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ $details->status_po  == $item->id ? 'selected':'' }}>{{ $item->status_po }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Imei-{{ $details->id }}" id="Imei" name="Imei">
        @foreach ($imei as $item)
            <option value="{{ $item->id }}" {{ $details->imei == $item->id ? 'selected':''}}>{{ $item->imei }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Merk-{{ $details->id }}" id="Merk" disabled>
        @foreach ($imei as $item)
            <option value="{{ $item->id }}" {{ $details->merk == $item->id ? 'selected':''}}>{{ $item->merk }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Type-{{ $details->id }}" id="Type" disabled name="Type">
        @foreach ($imei as $item)
            <option value="{{ $item->id }}" {{ $details->type == $item->id ? 'selected':''}}>{{ $item->type }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select GSM-{{ $details->id }}" id="GSM" name="GSM">
        @foreach ($gsm as $item)
        <option value="{{ $item->id }}" {{ $details->gsm_number  == $item->id ? 'selected':''}}>{{ $item->gsm_number }}</option>
        @endforeach
    </select>
</td>
<td>
    <select class="select Provider-{{ $details->id }}" id="Provider" name="Provider">
        @foreach ($gsm as $item)
        <option value="{{ $item->id }}" {{ $details->provider  == $item->id ? 'selected':''}}>{{ $item->provider }}</option>
        @endforeach
    </select>
</td>
<td>
    <div class="col m" id="sensor">
        <a><option class="SensorAll-{{$details->id}}" value="{{ $details->sensor_all }}" id="SensorAll" data-toggle="modal" data-target="#exampleModal">{{ $details->sensor_all }}</option></a>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Sensor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="Serial Number">Serial Number</label>
                    </div>
                    <select class="custom-select" id="SerialNumberSensor" name="SerialNumberSensor">
                        @foreach ($sensor as $item)
                            <option value="{{ $item->id }}" {{ old('serial_number') == $item->id ? 'selected':''}}>{{ $item->serial_number }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="Sensor Name">Sensor Name</label>
                    </div>
                    <select class="custom-select" id="SensorName" name="SensorName" disabled>
                        @foreach ($sensor as $item)
                        <option value="{{ $item->sensor_name }}" {{ old('sensor_id') == $item->id ? 'selected':''}}>{{ $item->sensor_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="MerkSensor">Merk Sensor</label>
                    </div>
                    <select class="custom-select" id="MerkSensor" name="MerkSensor" disabled>
                        @foreach ($sensor as $item)
                            <option value="{{ $item->id }}" {{ old('merk_sensor') == $item->id ? 'selected':''}}>{{ $item->merk_sensor }}</option>
                        @endforeach
                    </select>
                </div>
                <div>

                    <button type="button" class="btn btn-success float-right mb-2" data-dismiss="modal" onclick="send()">Send</button>
                    <button  class="btn btn-primary float-right mb-2 mr-2" onclick="add()" >Add</button>
                    <button  type="button" class="btn btn-danger float-right mb-2 mr-2" id="clear">Clear</button>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Sensor terpilih</span>
                    <textarea class="form-control" aria-label="With textarea" id="SensorTerpilih" disabled>{{ $details->sensor_all}}</textarea>
                </div>
            </div>
          </div>
        </div>
    </div>
</td>
<td>
    <select class="select PoolName-{{ $details->id }}" id="PoolName" disabled name="PoolName">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->pool_name  == $item->id ? 'selected':'' }}>{{ $item->pool_name }}</option>
        @endforeach
    </select>
</td>

<td>
    <select class="select PoolLocation-{{ $details->id }}" id="PoolLocation" disabled name="PoolLocation">
        @foreach ($vehicle as $item)
            <option value="{{ $item->id }}" {{ $details->pool_location  == $item->id ? 'selected':'' }}>{{ $item->pool_location }}</option>
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



>>>>>>> 7f4cdae6e5cf51380266d0b1ad6cf4f8384823f7

       @endforeach
</select></i></td>
<td><select class="select StatusPo-{{$details->id}}" id="StatusPo" aria-label=".form-select-lg example">
    <option  value="{{ $details->status_po}}">{{ $details->status_po}}</option>
    <option value="Sewa">Sewa</option>
    <option value="Sewa Beli">Sewa Beli</option>
    <option value="Trial">Trial</option>
    <option value="Beli">Beli</option>
</select></i></td>
    <td><div class="input-div"><input type="text" class="input Imei-{{$details->id}}" id="Imei" placeholder="IMEI" value="{{$details->imei}}"></div></td>
    <td><div class="input-div"><input type="text" class="input Merk-{{$details->id}}" id="Merk" placeholder="Merk" value="{{$details->merk}}"></div></td>
    <td><div class="input-div"><input type="text" class="input Type-{{$details->id}}" id="Type" placeholder="Type" value="{{$details->type}}"></div></td>
    <td><div class="input-div"><input type="text" class="input GSM-{{$details->id}}" id="GSM" placeholder="GSM" value="{{$details->gsm}}"></div></td>
    <td><div class="input-div"><input type="text" class="input Provider-{{$details->id}}" id="Provider" placeholder="Provider" value="{{$details->provider}}"></div></td>
    <td><div class="input-div"><input type="text" class="input SerialNumberSensor-{{$details->id}}" id="SerialNumberSensor" placeholder="Serial Number Sensor" value="{{$details->serial_number_sensor}}"></div></td>
    <td><div class="input-div"><input type="text" class="input NameSensor-{{$details->id}}" id="NameSensor" placeholder="Name Sensor" value="{{$details->name_sensor}}"></div></td>
    <td><div class="input-div"><input type="text" class="input MerkSensor-{{$details->id}}" id="MerkSensor" placeholder="Merk Sensor" value="{{$details->merk_sensor}}"></div></td>
    <td><div class="input-div"><input type="text" class="input PoolName-{{$details->id}}" id="PoolName" placeholder="Pool Name" value="{{$details->pool_name}}"></div></td>
    <td><div class="input-div"><input type="text" class="input Poollocation-{{$details->id}}" id="PoolLocation" placeholder="Pool Location" value="{{$details->pool_location}}"></div></td>
    <td><div class="input-div"><input type="date" class="input Waranty-{{$details->id}}" id="Waranty" placeholder="Waranty" value="{{$details->waranty}}"></div></td>
    <td><div class="input-div"><input type="text" class="input StatusLayanan-{{$details->id}}" id="StatusLayanan" placeholder="Status Layanan" value="{{$details->status_layanan}}"></div></td>
    <td><div class="input-div"><input type="date" class="input TanggalPasang-{{$details->id}}" id="TanggalPasang" placeholder="Tanggal Pasang" value="{{$details->tanggal_pasang}}"></div></td>
    <td><div class="input-div"><input type="date" class="input TanggalNonAktif-{{$details->id}}" id="TanggalNonAktif" placeholder="TanggalNonAktif" value="{{$details->tanggal_non_aktif}}"></div></td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $details->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>
