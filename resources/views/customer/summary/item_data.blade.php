@foreach ($summary as $data)
<tr id="edit-form-{{ $data->id }}">
    <td id="item-CompanyId-{{ $data->company }}">
        {{ $data->company }}
    </td>
    <td id="item-PoNumber-{{ $data->po_number}}">
        {{ $data->po_number}}
    </td>
    <td id="item-JumlahUnit-{{ $data->jumlah_unit_di_po}}">
        {{ $data->jumlah_unit_di_po }}
    </td>
    <td id="item-HargaLayanan-{{ $data->harga_layanan}}">
        {{ $data->harga_layanan}}
    </td>
    <td id="item-Revenue-{{ $data->revenue}}">
        {{ $data->revenue }}
    </td>
    <td id="item-StatusPO-{{ $data->status_po }}">
        {{ $data->status_po }}
    </td>
    <td id="item-MerkGPSTerpasang-{{ $data->merk_gps_terpasang }}">
        {{ $data->merk_gps_terpasang }}
    </td>
    <td id="item-TypeGPSTerpasang-{{ $data->type_gps_terpasang }}">
        {{ $data->type_gps_terpasang }}
    </td>
    <td id="item-JumlahGPS-"{{ $data->jumlah}}>
        {{ $data->jumlah }}
    </td>
</tr>

@endforeach
