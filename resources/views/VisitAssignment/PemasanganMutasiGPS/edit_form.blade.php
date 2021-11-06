 <td></td>
 <td></td>

    <td>
        <select class="select company_id-{{$pemasangan_mutasi_GPS->id}}" id="company_id" name="company_id" >

        <option value=" {{$pemasangan_mutasi_GPS->company_id}}"> {{$pemasangan_mutasi_GPS->companyRequest->company_name??''}} </option>
        @foreach ($details as $item)
        <option value="{{ $item->company_id }}" {{ old('company_id') == $item->id  ? 'selected':'' }}>
        {{$item->company->company_name}}
        </option>

       @endforeach
    </select></i>

    <td><select class="select task-{{$pemasangan_mutasi_GPS->id}}" id="task" name="task">
        <option value="{{$pemasangan_mutasi_GPS->task}} "> {{$pemasangan_mutasi_GPS->taskRequest->task}} </option>
        @foreach ($task as $tasks)
        <option value="{{ $tasks->id }}" {{ old('task') == $tasks->id  ? 'selected':'' }}>
            {{$tasks->task}}
        </option>

       @endforeach
    </select></i></td>
    </td>

      <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$pemasangan_mutasi_GPS->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $pemasangan_mutasi_GPS->waktu_kesepakatan) }}"></i></div>
    </td>
    <td>
          <select class="select vehicle-{{$pemasangan_mutasi_GPS->id}}" id="vehicle" name="vehicle">
            <option value="{{$pemasangan_mutasi_GPS->vehicle}}">
                {{ $pemasangan_mutasi_GPS->detailCustomerVehicle->vehicle->license_plate??'' }}
            </option>
            @foreach ($details as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->vehicle->license_plate??''}}</option>

            @endforeach
         </select></i>
    </td>
    <td>
          <select class="select kendaraan_pasang-{{$pemasangan_mutasi_GPS->id}}"  id="kendaraan_pasang" name="kendaraan_pasang">

            {{-- <option value="-">
                {{ $pemasangan_mutasi_GPS->vehicleKendaraanPasang->license_plate ??''}}
            </option> --}}
            <option value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('kendaraan_pasang') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
    </td>


    <td><select class="select imei-{{$pemasangan_mutasi_GPS->id}}" id="imei" name="imei" required>
        <option value="{{$pemasangan_mutasi_GPS->imei}}"> {{$pemasangan_mutasi_GPS->detailCustomerImei->gps->imei?? ''}} </option>
        @foreach ($details as $detail)
        <option value="{{ $detail->id }}" {{ old('imei') == $detail->id  ? 'selected':'' }}>
        {{$detail->gps->imei??''}}
        </option>
       @endforeach
    </select></i></td>

     <td><select class="select gsm_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="gsm_pemasangan" name="gsm_pemasangan" required>
        <option value="{{$pemasangan_mutasi_GPS->gsm_pemasangan}}"> {{$pemasangan_mutasi_GPS->detailCustomerGsm->gsm->gsm_number?? ''}} </option>
        @foreach ($details as $item)
        <option value="{{ $item->id }}" {{ old('gsm_pemasangan') == $item->id  ? 'selected':'' }}>
        {{$item->gsm->gsm_number??''}}
        </option>

       @endforeach
    </select></i></td>
      <td><select class="select equipment_terpakai_gps-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_gps" name="equipment_terpakai_gps">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_gps}}"> {{$pemasangan_mutasi_GPS->detailCustomerGps->gps->type??''}} </option>
        @foreach ($gps as $gpses)
        <option value="{{ $gpses->id }}" {{ old('equipment_terpakai_gps') == $gpses->id  ? 'selected':'' }}>
        {{$gpses->type??''}}
        </option>

       @endforeach
    </select></i></td>
     {{-- <td><select class="select equipment_terpakai_sensor-{{$pemasangan_mutasi_GPS->id}}" id="equipment_terpakai_sensor" name="equipment_terpakai_sensor">
        <option value="{{$pemasangan_mutasi_GPS->equipment_terpakai_sensor}}"> {{$pemasangan_mutasi_GPS->sensor->sensor_name?? ''}} </option>
        @foreach ($sensor as $sensors)
        <option value="{{ $sensors->id }}" {{ old('equipment_terpakai_sensor') == $sensors->id  ? 'selected':'' }}>
        {{$sensors->sensor_name}}
        </option>
       @endforeach
    </select></i></td> --}}
<td>
    {{-- {{-- <div class="col m" id="sensor"> --}}
    <div class="col m" id="sensor">
    <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#exampleModal" id="modal">
     Sensor   <a><option class="SensorAll-{{$pemasangan_mutasi_GPS->id}}" value="{{ $pemasangan_mutasi_GPS->equipment_terpakai_sensor }}" id="equipment_terpakai_sensor" data-toggle="modal" data-target="#exampleModal">{{ $pemasangan_mutasi_GPS->equipment_terpakai_sensor }}</option></a>


    </button>
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
                    <select class="form-control selectpicker" id="SerialNumberSensor" name="SerialNumberSensor" data-live-search="true">
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
                        <option value="{{ $item->id }}" {{ old('sensor_name') == $item->id ? 'selected':''}}>{{ $item->sensor_name }}</option>
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
                    <a class="btn btn-primary float-right mb-2 mr-2" style="color: white" onclick="add()" >Add</a>
                    <button  type="button" class="btn btn-danger float-right mb-2 mr-2" id="clear">Clear</button>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Sensor terpilih</span>
                    <textarea class="form-control" aria-label="With textarea" id="SensorTerpilih" disabled>{{$pemasangan_mutasi_GPS->equipment_terpakai_sensor}}</textarea>
                </div>
            </div>
          </div>
        </div>
    </div>
</td>





     <td>
        <select class="select teknisi_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="teknisi_pemasangan" name="teknisi_pemasangan" required>
            <option selected value="{{ $pemasangan_mutasi_GPS->teknisi_pemasangan }}">{{$pemasangan_mutasi_GPS->teknisi->teknisi_name?? ''}}</option>
            @foreach ($teknisi as $item)
                <option value="{{ $item->id }}">{{ $item->teknisi_name }}</option>
            @endforeach
        </select>
    </td>

    <td>
        <div class="input-div"><input type="number" class="input uang_transportasi-{{$pemasangan_mutasi_GPS->id}}" id="uang_transportasi" placeholder="Uang Transportasi" value="{{$pemasangan_mutasi_GPS->uang_transportasi}}" required></i></div>
    </td>

    <td><select class="select type_visit-{{$pemasangan_mutasi_GPS->id}}" id="type_visit" name="type_visit" aria-label=".form-select-lg example" required>
    <option value="{{$pemasangan_mutasi_GPS->type_visit}}"> {{$pemasangan_mutasi_GPS->type_visit}} </option>
    <option value="Visit SLA">Visit SLA</option>
    <option value="Visit Berbayar">Visit Berbayar</option>
    </select></i></td>

    <td><textarea class="form-control note_pemasangan-{{$pemasangan_mutasi_GPS->id}}" id="note_pemasangan" name="note_pemasangan" rows="3">{{$pemasangan_mutasi_GPS->note_pemasangan}}</textarea></i></td>

    <td><select class="select status-{{$pemasangan_mutasi_GPS->id}}" id="status" name="status" aria-label=".form-select-lg example" required>
    <option value="{{$pemasangan_mutasi_GPS->status}}"> {{$pemasangan_mutasi_GPS->status}} </option>
    <option value="On Progress">On Progress</option>
    <option value="Done">Done</option>
    </select></i></td>
       <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $pemasangan_mutasi_GPS->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>


<script>

    $('select[name="company_id"]').on('change', function() {
            var itemID = $(this).val();
            // alert(itemID);
            if(itemID) {
                $.ajax({
                    url: '/based_vehicle/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="vehicle').empty();
                        $('select[name="vehicle').append('<option value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="vehicle').append('<option value="'+ data[i].id + '"> '+ data[i].vehicle_id +'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
                 $.ajax({
                    url: '/based_vehicle/'+ itemID,
                    method: "GET",
                    success:function(data) {
                        //alert(data.length);
                        $('select[name="imei').empty();
                        $('select[name="imei').append('<option value=""> </option>');
                            for(var i = 0 ; i < data.length ; i++) {
                                $('select[name="imei').append('<option value="'+ data[i].id + '"> '+ data[i].imei +'</option>');
                                // 16-Nov-2021   alert(data[i].serial_number)
                            }
                    }
                });
            }
            else{
                $('select[name="vehicle"]').empty();
                $('select[name="imei"]').empty();

            }
         });
         $('select[name="imei"]').on('change', function(){
                var Id = $(this).val();
                // alert(Id);
                if(Id) {
                    $.ajax({
                        url: '/based_imei/'+ Id,
                        method: "GET",
                        success:function(data) {
                            $('select[name="gsm_pemasangan').empty();
                            $('select[name="equipment_terpakai_gps').empty();
                            $.each(data, function(key, value) {
                                $('select[name="gsm_pemasangan').append('<option value="'+ key +'">'+ value.gsm_id +'</option>');
                                $('select[name="equipment_terpakai_gps').append('<option value="'+ key +'">'+ value.type +'</option>');
                            });
                        }
                    });
                }
                else{
                    $('select[name="gsm_pemasangan').empty();
                    $('select[name="equipment_terpakai_gps').empty();
                }
            });
       $(document).ready(function() {

            $(function(){
                $('.selectpicker').selectpicker();
            });

            $('select[name="SerialNumberSensor"]').on('change', function(){

                var Id = $(this).val();
                // alert(Id);
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
                }
                else{
                    $('select[name="SensorName').empty();
                    $('select[name="MerkSensor').empty();
                }

            });

            $('#clear').click(function(){

                var sensorterpilih =  document.getElementById("SensorTerpilih").value;
                if (sensorterpilih == ""){
                    alert("No sensor selected")
                }else{
                    $('#SensorTerpilih').empty();
                }
            });

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
            if (sensorterpilih == "") {
                alert("No sensor selected")
            }
            else{
                // $('#modal').empty();
                $('#sensor').empty();
                $('#sensor').append('<option value="'+ sensorterpilih + '" id="equipment_terpakai_sensor"  data-toggle="modal" data-target="#exampleModal" > '+ sensorterpilih +'</option>');
            }
         }
  </script>

