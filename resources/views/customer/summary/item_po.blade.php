@foreach ($data as $item)    
<tr>
     <td>{{ $item->company->company_name }}</td>
     <td>{{ $item->po->po_number }}</td>
     <td>{{ $item->jumlah }}</td>
     <td>{{ $item->po->harga_layanan }}</td>
     <td>{{ $item->po->harga_layanan* $item->jumlah }}</td>
     <td>{{ $item->po->status_po }}</td> --}}
     <td>SUM({{ $item->po->harga_layanan* $item->jumlah }})</td>
</tr>
@endforeach