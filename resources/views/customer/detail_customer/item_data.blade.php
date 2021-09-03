   @foreach ($details as $detail )
    <tr id="edit-form-{{ $detail->id }}">
        <td id="td-checkbox-{{ $detail->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$detail->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $detail->id }}">
            <div id="button-{{ $detail->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $detail->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $detail->id }})"></i>
            </div>
        </td>

        <td id="item-CompanyId-{{ $detail->id }}">
            {{ $detail->company_id}}
        </td>
        <td id="item-LicencePlate-{{ $detail->id }}">
            {{ $detail->licence_plate }}
        </td>
        <td id="item-VihecleType-{{ $detail->id }}">
            {{ $detail->vihecle_type }}
        </td>
        <td id="item-PoNumber-{{ $detail->id }}">
            {{ $detail->po_number }}
        </td>
        <td id="item-PoDate-{{ $detail->id }}">
            {{ $detail-> po_date }}
        </td>
        <td id="item-StatusPo-{{ $detail->id }}">
            {{ $detail-> status_po }}
        </td>
        <td id="item-Imei-{{ $detail->id }}">
            {{ $detail-> imei }}
        </td>
        <td id="item-Merk-{{ $detail->id }}">
            {{ $detail-> merk }}
        </td>
        <td id="item-Type-{{ $detail->id }}">
            {{ $detail-> type }}
        </td>
        <td id="item-GSM-{{ $detail->id }}">
            {{ $detail-> gsm }}
        </td>
        <td id="item-Provider-{{ $detail->id }}">
            {{ $detail-> provider }}
        </td>
        <td id="item-SerialNumberSensor-{{ $detail->id }}">
            {{ $detail-> serial_number_sensor }}
        </td>
        <td id="item-NameSensor-{{ $detail->id }}">
            {{ $detail-> name_sensor }}
        </td>
        <td id="item-MerkSensor-{{ $detail->id }}">
            {{ $detail-> merk_sensor }}
        </td>
        <td id="item-PoolName-{{ $detail->id }}">
            {{ $detail-> pool_name }}
        </td>
        <td id="item-PollLocation-{{ $detail->id }}">
            {{ $detail-> pool_location }}
        </td>
        <td id="item-Waranty-{{ $detail->id }}">
            {{ $detail-> waranty }}
        </td>
        <td id="item-StatusLayanan-{{ $detail->id }}">
            {{ $detail-> status_layanan }}
        </td>
        <td id="item-TanggaPasang-{{ $detail->id }}">
            {{ $detail-> tanggal_pasang }}
        </td>
        <td id="item-TanggalNonAktif-{{ $detail->id }}">
            {{ $detail-> tanggal_non_aktif }}
        </td>
    </tr>

   @endforeach
