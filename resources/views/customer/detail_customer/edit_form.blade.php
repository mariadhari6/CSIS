<td></td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $details->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>
<<<<<<< HEAD
<td>
    <select class="select" id="CompanyId" class="input CompanyId-{{ $details->id }}">
        <option  value="{{ $details->company_id }}">{{ $details->company_id }}</option>
        <option value='Islam'>Islam</option>
        <option value='Kristen'>Kristen</option>
        <option value='Katholik'>Katholik</option>
        <option value='Hindu'>Hindu</option>
        <option value='Budha'>Budha</option>
    </select>
</td>
<td>
    <select class="select" id="LicencePlate" class="input LicencePlate-{{ $details->id }}">
        <option  value="{{ $details->licence_plate }}">{{ $details->licence_plate }}</option>
        <option value='Kristen' >Kristen</option>
        <option value='katholik'>Katholik</option>
        <option value='Hindu'>Hindu</option>
        <option value='Budha'>Budha</option>
    </select>
</td>
<td><div class="input-div" ><input type="text" class="input VehicleType-{{ $details->id }}" id="VihecleType" placeholder="Vihecle Type" value="{{ $details->vihecle_type }}"></div></td>
<td><div class="input-div"><input type="text" class="input PoNumber-{{ $details->id }}" id="PoNumber" placeholder="Po Number" value="{{ $details->po_number }}"></div></td>
<td><div class="input-div"><input type="text" class="input PoDate-{{ $details->id }}" id="PoDate" placeholder="Po Date"value="{{ $details->po_date }}"></div></td>
<td><div class="input-div"><input type="text" class="input StatusPo-{{ $details->id }}" id="StatusPo" placeholder="Status Po" value="{{ $details->status_po }}"></div></td>
<td><div class="input-div"><input type="text" class="input Imei-{{ $details->id }}" id="Imei" placeholder="IMEI" value="{{ $details->imei }}" ></div></td>
<td><div class="input-div"><input type="text" class="input Merk-{{ $details->id }}" id="Merk" placeholder="Merk" value="{{ $details->merk }}"></div></td>
<td><div class="input-div"><input type="text" class="input Type-{{ $details->id }}" id="Type" placeholder="Type" value="{{ $details->type }}"></div></td>
<td><div class="input-div"><input type="text" class="input GSM-{{ $details->id }}" id="GSM" placeholder="GSM" value="{{ $details->gsm }}"></div></td>
<td><div class="input-div"><input type="text" class="input Provider-{{ $details->id }}" id="Provider" placeholder="Provider" value="{{ $details->provider }}"></div></td>
<td><div class="input-div"><input type="text" class="input SerialNumberSensor-{{ $details->id }}" id="SerialNumberSensor" placeholder="Serial Number Sensor"  value="{{ $details->serial_number_sensor }}"></div></td>
<td><div class="input-div"><input type="text" class="input NameSensor-{{ $details->id }}" id="NameSensor" placeholder="Name Sensor"  value="{{ $details->name_sensor }}"></div></td>
<td><div class="input-div"><input type="text" class="input MerkSensor-{{ $details->id }}" id="MerkSensor" placeholder="Merk Sensor"  value="{{ $details->merk_sensor }}"></div></td>
<td><div class="input-div"><input type="text" class="input PoolName-{{ $details->id }}" id="PoolName" placeholder="Pool Name"  value="{{ $details->pool_name }}"></div></td>
<td><div class="input-div"><input type="text" class="input PoolLocation-{{ $details->id }}" id="PoolLocation" placeholder="Pool Location"  value="{{ $details->pool_location }}"></div></td>
<td><div class="input-div"><input type="date" class="input Waranty-{{ $details->id }}" id="Waranty" placeholder="Waranty"  value="{{ $details->waranty }}"></div></td>
<td><div class="input-div"><input type="text" class="input StatusLayanan-{{ $details->id }}" id="StatusLayanan" placeholder="Status Layanan"  value="{{ $details->status_layanan }}"></div></td>
<td><div class="input-div"><input type="date" class="input TanggalPasang-{{ $details->id }}" id="TanggalPasang" placeholder="Tanggal Pasang" value="{{ $details->tanggal_pasang }}"></div></td>
<td><div class="input-div"><input type="date" class="input TanggalNonAktif-{{ $details->id }}" id="TanggalNonAktif" placeholder="TanggalNonAktif"  value="{{ $details->tanggal_non_aktif }}"></div></td>
=======

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

>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
