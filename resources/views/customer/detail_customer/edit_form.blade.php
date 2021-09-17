<td></td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $details->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>
<td>
    <select class="select CompanyId-{{ $details->id }}" id="CompanyId">
        <option value="{{ $details->company_id }}" class="input CompanyId-{{ $details->id }}">{{ $details->company_id }}</option>
        <option value='Islam'>Islam</option>
        <option value='Kristen'>Kristen</option>
        <option value='Katholik'>Katholik</option>
        <option value='Hindu'>Hindu</option>
        <option value='Budha'>Budha</option>
    </select>
</td>
<td>
    <select class="select LicencePlate-{{ $details->id }}" id="LicencePlate">
        <option  value="{{ $details->licence_plate }}" class="input LicencePlate-{{ $details->id }}">{{ $details->licence_plate }}</option>
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

