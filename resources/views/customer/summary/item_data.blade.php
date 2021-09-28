@foreach ($company as $data)
<tr id="edit-form-{{ $data->id }}">
    <td id="item-CompanyId-{{ $data->company}}"{{ old('company_id') == $data->id ? 'selected':'' }}>
        {{ $data->company_name }}
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
