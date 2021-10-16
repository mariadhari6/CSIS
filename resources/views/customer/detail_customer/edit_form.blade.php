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
        <option value="{{ $details->status_layanan }}" class="input StatusLayanan-{{ $details->id }}">{{ $details->status_layanan }}</option>
        <option value="Active">Active</option>
        <option value="In Active">In Active</option>
    </select>
</td>
<td><div class="input-div"><input type="date" class="input TanggalPasang-{{ $details->id }}" id="TanggalPasang" value="{{ $details->tanggal_pasang }}"></div></td>
<td><div class="input-div"><input type="date" class="input TanggalNonAktif-{{ $details->id }}" id="TanggalNonAktif" value="{{ $details->tanggal_non_aktif }}"></div></td>
<td><div class="input-div"><input type="date" class="input TanggalReaktivasi-{{ $details->id }}" id="TanggalReaktivasi" value="{{ $details->tgl_reaktivasi_gps}}"></div></td>
<td>
    <i class="fas fa-check add" id="edit" onclick="update({{ $details->id}})"></i><i class="fas fa-times cancel" onclick="cancel()"></i>
</td>
