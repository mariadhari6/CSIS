    <td></td>
    <td></td>

    <td>
        <select class="select company_id-{{$maintenanceGps->id}}"  id="{{$maintenanceGps->id}}" name="company_id">
            <option selected value="{{ $maintenanceGps->company_id}}">
                {{ $maintenanceGps->companyRequest->company_name??''}}
            </option>

            @foreach ($company as $item)
            <option value="{{ $item->id }}">{{ $item->company_name }}</option>
            @endforeach

        </select>
    </td>
    <td>
          <select class="select vehicle-{{$maintenanceGps->id}}" id="vehicle" name="vehicle">
            <option selected value="{{ $maintenanceGps->vehicle }}">
                {{ $maintenanceGps->vehicleRequest->license_plate??'' }}
            </option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input waktu_kesepakatan-{{$maintenanceGps->id}}" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" value="{{ str_replace(" ", "T", $maintenanceGps->waktu_kesepakatan) }}"></i></div>
    </td>
    <td>
        <select class="select type_gps_id-{{$maintenanceGps->id}}" id="type_gps_id" name="type_gps_id-{{$maintenanceGps->id}}" required>
            <option selected value="">
                {{ $maintenanceGps->gpsType->type??'' }}
            </option>

            @foreach ($gps as $item)
            <option value="{{ $item->id }}">
                {{ $item->type }}
            </option>
            @endforeach

        </select>
    </td>
    <td>
        <select class="select equipment_gps_id-{{$maintenanceGps->id}}" id="equipment_gps_id" name="equipment_gps_id-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->equipment_gps_id }}">
                {{ $maintenanceGps->gpsMaintenance->type?? '' }}
            </option>

            @foreach ($gps as $item)
            <option value="{{ $item->id }}">
                {{ $item->type }}
            </option>
            @endforeach

        </select>
    </td>

<td>
    <div class="col m" id="sensor">
        <a><option class="SensorAll-{{$maintenanceGps->id}}" value="{{ $maintenanceGps->equipment_sensor_id }}" id="equipment_sensor_id" data-toggle="modal" data-target="#exampleModal">{{ $maintenanceGps->equipment_sensor_id }}</option></a>
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
                    <button  class="btn btn-primary float-right mb-2 mr-2" onclick="add()" >Add</button>
                    <button  type="button" class="btn btn-danger float-right mb-2 mr-2" id="clear">Clear</button>
                </div>

                <div class="input-group">
                    <span class="input-group-text">Sensor terpilih</span>
                    <textarea class="form-control" aria-label="With textarea" id="SensorTerpilih" disabled>{{$maintenanceGps->equipment_sensor_id}}</textarea>
                </div>
            </div>
          </div>
        </div>
    </div>
</td>
     <td><select class="select equipment_gsm-{{$maintenanceGps->id}}" id="equipment_gsm" name="equipment_gsm">
        <option value="{{$maintenanceGps->equipment_gsm}}"> {{$maintenanceGps->gsm->gsm_number?? ''}} </option>
        @foreach ($gsm_master as $gsm_masters)
        <option value="{{ $gsm_masters->id }}" {{ old('equipment_gsm') == $gsm_masters->id  ? 'selected':'' }}>
        {{$gsm_masters->gsm_number}}
        </option>

       @endforeach
    </select></i></td>
    <td>
        <select class="select task-{{$maintenanceGps->id}}" id="task" name="task-{{$maintenanceGps->id}}">
            <option selected value="{{ $maintenanceGps->task}}">
                {{ $maintenanceGps->taskRequest->task }}
            </option>

            @foreach ($task as $item)
            <option value="{{ $item->id }}">
                {{ $item->task }}
            </option>
            @endforeach

        </select>
    </td>
 <td><select class="select ketersediaan_kendaraan-{{$maintenanceGps->id}}" id="ketersediaan_kendaraan" name="ketersediaan_kendaraan" aria-label=".form-select-lg example">
    <option value=" {{$maintenanceGps->ketersediaan_kendaraan}}"> {{$maintenanceGps->ketersediaan_kendaraan}} </option>
    <option value="Tersedia">Tersedia</option>
    <option value="Tidak tersedia">Tidak tersedia</option>
    </select></i></td>
    <td>
        <div class="input-div"><input type="text" class="input keterangan-{{$maintenanceGps->id}}" id="keterangan" value="{{$maintenanceGps->keterangan}}"></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input hasil-{{$maintenanceGps->id}}" id="hasil" value="" required></i>
        </div>
    </td>
    <td>
        <div class="input-div"><input type="number" class="input biaya_transportasi-{{$maintenanceGps->id}}" id="biaya_transportasi" value="" required></i>
        </div>
    </td>
   <td>
        <select class="select teknisi_maintenance-{{$maintenanceGps->id}}" id="teknisi_maintenance" name="teknisi_maintenance" required>
            <option selected value="">{{$maintenanceGps->teknisiMaintenance->teknisi_name?? ''}}</option>
            @foreach ($teknisi_maintenance as $item)
                <option value="{{ $item->id }}">{{ $item->teknisi_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select req_by-{{$maintenanceGps->id}}" id="req_by" aria-label=".form-select-lg example">
            <option selected value="{{  $maintenanceGps->req_by == 'Customer' ? 'Customer' : 'CS'}}">
                {{  $maintenanceGps->req_by == 'Customer' ? 'Customer' : 'CS'}}
            </option>
            <option value="{{  $maintenanceGps->req_by == 'Customer' ? 'CS' : 'Customer'}}">
                {{  $maintenanceGps->req_by == 'Customer' ? 'CS' : 'Customer'}}
            </option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input note_maintenance-{{$maintenanceGps->id}}" id="note_maintenance" value="{{$maintenanceGps->note_maintenance}}"></i>
        </div>
    </td>
    <td><select class="select status-{{$maintenanceGps->id}}" id="status" name="status" aria-label=".form-select-lg example" required>
    <option value=""> {{$maintenanceGps->status}} </option>
    <option value="Done">Done</option>
    <option value="On Progress">On Progress</option>
    </select></i></td>
   <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $maintenanceGps->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>

    <script>
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
                $('#sensor').append('<option value="'+ sensorterpilih + '" id="equipment_sensor_id"  data-toggle="modal" data-target="#exampleModal" > '+ sensorterpilih +'</option>');
            }
         }

</script>


