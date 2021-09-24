<tr id="add_form">
    <td width="80px"></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>

    <td >
        <select class="select" id="CompanyId">
            <option value="" disabled selected>Company</option>
            <option value='islam'>Islam</option>
            <option value='kristen'>Kristen</option>
            <option value='katholik'>Katholik</option>
            <option value='hindu'>Hindu</option>
            <option value='kristen'>Budha</option>
        </select>
    </td>
    <td >
        <select class="select" id="LicencePlate">
            <option value="" disabled selected>Licence Plate</option>
            <option value='kristen' >Kristen</option>
            <option value='katholik'>Katholik</option>
            <option value='hindu'>Hindu</option>
            <option value='kristen'>Budha</option>
        </select>
    </td>
    <td><div class="input-div" ><input type="text" class="input" id="VihecleType" placeholder="Vihecle Type"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="PoNumber" placeholder="Po Number"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="PoDate" placeholder="Po Date"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="StatusPo" placeholder="Status Po"></div></td>
    <td><select class="select" id="CompanyId" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('CompanyId') == $companys->id  ? 'selected':'' }}>
        {{$companys->company_name}}
        </option>

       @endforeach
    </select></i></td>
    <td >
        <select class="select" id="LicencePlate">
            <option value="" disabled selected>Licence Plate</option>
            <option value="B-64728-YZ" >B-64728-YZ</option>
            <option value="B-62737-XS">B-62737-XS</option>
            <option value="B-73627-WS">B-73627-WS</option>
            {{-- <option value=""></option> --}}
        </select>
    </td>
     <td >
        <select class="select" id="VihecleType">
            <option value="" disabled selected>Vehicle Type</option>
            <option value="Box" >Box</option>
            <option value="WingsBox">WingsBox</option>

        </select>
    </td>

     <td >
        <select class="select" id="PoNumber">
            <option value="" disabled selected>Po Number</option>
            <option value="001/DPT/VIII/2016" >001/DPT/VIII/2016</option>
            <option value="002/DPT/VIII/2019">002/DPT/VIII/2019</option>

        </select>
    </td>
     <td><select class="select" id="PoDate" name="po_date">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company') == $companys->id  ? 'selected':'' }}>
        {{$companys->po_date}}
        </option>

       @endforeach
    </select></i></td>

    <td><select class="select" id="StatusPo" aria-label=".form-select-lg example">
    <option selected>Pilih Status</option>
    <option value="Sewa">Sewa</option>
    <option value="Sewa Beli">Sewa Beli</option>
    <option value="Trial">Trial</option>
    <option value="Beli">Beli</option>
    </select></i></td>
    {{-- <td><div class="input-div"><input type="text" class="input" id="PoDate" placeholder="Po Date"></div></td> --}}
    {{-- <td><div class="input-div"><input type="text" class="input" id="StatusPo" placeholder="Status Po"></div></td> --}}

    <td><div class="input-div"><input type="text" class="input" id="Imei" placeholder="IMEI"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="Merk" placeholder="Merk"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="Type" placeholder="Type"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="GSM" placeholder="GSM"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="Provider" placeholder="Provider"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="SerialNumberSensor" placeholder="Serial Number Sensor"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="NameSensor" placeholder="Name Sensor"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="MerkSensor" placeholder="Merk Sensor"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="PoolName" placeholder="Pool Name"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="PoolLocation" placeholder="Pool Location"></div></td>
    <td><div class="input-div"><input type="date" class="input" id="Waranty" placeholder="Waranty"></div></td>
    <td><div class="input-div"><input type="text" class="input" id="StatusLayanan" placeholder="Status Layanan"></div></td>
    <td><div class="input-div"><input type="date" class="input" id="TanggalPasang" placeholder="Tanggal Pasang"></div></td>
    <td><div class="input-div"><input type="date" class="input" id="TanggalNonAktif" placeholder="TanggalNonAktif"></div></td>

</tr>

</tr>
