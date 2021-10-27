<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <select class="select" id="CompanyId" name="CompanyId">
            <option value=""></option>
            @foreach ($company as $item)
                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="LicencePlate" name="LicencePlate">
            <option value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('license_plate') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="VihecleType" name="VihecleType" disabled>
            {{-- <option value="">{{ $vehicle->vehicleType->name }}</option> --}}
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle_id') == $item->id ? 'selected':'' }}>{{ $item->vehicleType->name }}</option>
            @endforeach
        </select>
    <td>
        <select class="select" id="PoNumber" name="PoNumber">
            <option value=""></option>
            @foreach ($po as $item)
                <option value="{{ $item->id }}" {{ old('po_number') == $item->id ? 'selected':'' }}>{{ $item->po_number}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="HargaLayanan" name="HargaLayanan" disabled>
            <option value=""></option>
            @foreach ($po as $item)
                <option value="{{ $item->id }}" {{ old('harga_layanan') == $item->id ? 'selected':'' }}>{{ $item->harga_layanan}}</option>
            @endforeach
        </select>
    </td>
     <td>
        <select class="select" id="PoDate" name="PoDate" disabled>
        <option value=""></option>
        @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ old('po_date') == $item->id ? 'selected':'' }}>{{ $item->po_date}}</option>
        @endforeach
     </select>

    <td>
        <select class="select" id="StatusPo" name="StatusPo" disabled>
            <option value=""></option>
            @foreach ($po as $item)
            <option value="{{ $item->id }}" {{ old('status_po') == $item->id ? 'selected':'' }}>{{ $item->status_po}}</option>
        @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Imei" name="Imei">
            <option value=""></option>
            @foreach ($imei as $item)
                <option value="{{ $item->id }}" {{ old('imei') == $item->id ? 'selected':''}}>{{ $item->imei }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Merk" name="Merk" disabled>
            <option value=""></option>
            @foreach ($imei as $item)
                <option value="{{ $item->id }}" {{ old('merk') == $item->id ? 'selected':''}}>{{ $item->merk }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Type" name="Type" disabled>
            <option value=""></option>
            @foreach ($imei as $item)
                <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':''}}>{{ $item->type }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="GSM" name="GSM">
            <option value=""></option>
            @foreach ($gsm as $item)
                <option value="{{ $item->id }}" {{ old('gsm_id') == $item->id ? 'selected':''}}>{{ $item->gsm_number }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="Provider" name="Provider" disabled>
            <option value=""></option>
                @foreach ($gsm as $item)
                <option value="{{ $item->id }}" {{ old('provider') == $item->id ? 'selected':''}}>{{ $item->provider }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="SerialNumberSensor" name="SerialNumberSensor">
            <option value=""></option>
            @foreach ($sensor as $item)
                <option value="{{ $item->id }}" {{ old('serial_number_sensor') == $item->id ? 'selected':''}}>{{ $item->serial_number }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="NameSensor" name="NameSensor" disabled>
            <option value=""></option>
            @foreach ($sensor as $item)
                <option value="{{ $item->id }}" {{ old('name_sensor') == $item->id ? 'selected':''}}>{{ $item->sensor_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="MerkSensor" name="MerkSensor" disabled>
            <option value=""></option>
            @foreach ($sensor as $item)
                <option value="{{ $item->id }}" {{ old('merk_sensor') == $item->id ? 'selected':''}}>{{ $item->merk_sensor }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="PoolName" name="PoolName" disabled>
            <option value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('pool_name') == $item->id ? 'selected':'' }}>{{ $item->pool_name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <select class="select" id="PoolLocation" name="PoolLocation" disabled>
            <option value=""></option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('pool_location') == $item->id ? 'selected':'' }}>{{ $item->pool_location}}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div"><input type="date" class="input" id="Waranty" placeholder="Waranty"></div></td>
    <td>
        <select class="select" id="StatusLayanan">
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td><div class="input-div"><input type="date" class="input" id="TanggalPasang"></div></td>
    <td><div class="input-div"><input type="date" class="input" id="TanggalNonAktif"></div></td>
    <td><div class="input-div"><input type="date" class="input" id="TanggalReaktivasi"></div></td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

    <script>
        $(document).ready(function() {
           $('select[name="CompanyId"]').on('change', function() {
               var itemID = $(this).val();
               if(itemID) {
                   $.ajax({
                       url: '/based_company/'+ itemID,
                       method: "GET",
                       success:function(data) {
                           $('select[name="LicencePlate').empty();
                           $('select[name="LicencePlate').append('<option value=""> </option>');
                               for(var i = 0 ; i < data.length ; i++) {
                                   $('select[name="LicencePlate').append('<option value="'+ data[i].id + '"> '+ data[i].license_plate +'</option>');
                               }
                       }
                   });
                   $.ajax({
                       url: '/based_po/'+ itemID,
                       method: "GET",
                       success:function(data) {
                           $('select[name="PoNumber').empty();
                           $('select[name="PoNumber').append('<option value=""></option>');
                           console.log(data.length)
                               for(var i = 0 ; i < data.length ; i++) {
                                   $('select[name="PoNumber').append('<option value="'+ data[i].id + '"> '+ data[i].po_number +'</option>');
                               }
                       }
                   });
               }
               else{
                   $('select[name="LicencePlate"]').empty();
                   $('select[name="PoNumber').empty();
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
           $('select[name="SerialNumberSensor"]').on('change', function() {
               var Id = $(this).val();
               if(Id) {
                   $.ajax({
                       url: '/based_sensor/'+ Id,
                       method: "GET",
                       success:function(data) {
                           $('select[name="NameSensor').empty();
                           $('select[name="MerkSensor').empty();
                               $.each(data, function(key, value) {
                                   $('select[name="NameSensor').append('<option value="'+ key +'">'+ value.sensor_name +'</option>');
                                   $('select[name="MerkSensor').append('<option value="'+ key +'">'+ value.merk_sensor +'</option>');
                              });
                       }
                   });
               }else{
                   $('select[name="NameSensor').empty();
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
               }else{
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
               }else{
                       $('select[name="HargaLayanan').empty();
                       $('select[name="PoDate').empty();
                       $('select[name="StatusPo').empty();
               }
           });
       });
   </script>














</tr>
