@foreach ($data as $item)
<tr>
    
    <td>{{ $item->company }}</td>
    <td>{{ $item->po }}</td>
    <td>{{ $item->jumlah }}</td>
    <td> Rp.57.000 </td>
    <td> Rp. {{number_format( $item->jumlah*57000) }}</td>
    <td>{{ $item->status }}</td>
    <td>{{ $item->merk_gps }}</td>
    <td>{{ $item->type_gps }}</td>
       
</tr>

@endforeach
{{-- <td id="item-CompanyId-{{ $item->harga_layanan}}">
    {{ $item->harga_layanan }}
</td>
<td id="item-Revenue-{{ ->revenue}}">
    {{ $item->revenue }}
</td>
<td id="item-StatusPO-{{ $item->status_po }}">
    {{ $item->status_po }}
</td>
<td id="item-MerkGPSTerpasang-{{ $item->merk_gps_terpasang }}">
    {{ $item->merk_gps_terpasang }}
</td>
<td id="item-TypeGPSTerpasang-{{ $item->type_gps_terpasang }}">
    {{ $item->type_gps_terpasang }}
</td>
<td id="item-JumlahGPS-"{{ $item->jumlah}}>
    {{ $item->jumlah }}
</td> --}}


{{-- <td id="item-CompanyId-{{ $item->company}}">
    {{ $item->company}}
</td>
<td id="item-PoNumber-{{ $item->po}}">
    {{ $item->po}}
</td>
<td id="item-CompanyId-{{ $item->jumlah}}">
    {{ $item->jumlah }}
</td> --}}