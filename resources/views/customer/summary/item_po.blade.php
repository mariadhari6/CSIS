@php
     $total = 0 ;
     $rowspan = count($data);
@endphp

<table class="table table-hover"  id="data_detail">
     <thead>
        <tr>
          {{-- <th scope="col">Company</th> --}}
          <th scope="col" width="10px">No Po</th>
          <th scope="col">Jumlah Unit Po</th>
          <th scope="col">Harga Layanan</th>
          <th scope="col" width="100px">Revenue</th>
          <th scope="col">Status PO</th>
          <th scope="col">Jumlah GPS terpasang</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($data as $item)    
          <tr>
               {{-- <td>{{ $item->company->company_name }}</td> --}}
               <td id ="key" >{{ $item->po->po_number }}</td>
               <td>{{ $item->po->jumlah_unit_po }}</td>
               <td>Rp.{{ number_format($item->po->harga_layanan) }}</td>
               <td>Rp.{{ number_format($item->po->harga_layanan * $item->po->jumlah_unit_po) }}</td>
               <td>{{ $item->po->status_po }}</td>       
               <td>{{ $item->jumlah_per_po }}</td>

               @php
                    $total +=  $item->po->harga_layanan * $item->po->jumlah_unit_po;
               @endphp
          </tr> 
          @endforeach         
     </tbody>
     <tfoot>
          <tr>
               <th colspan="3">TOTAL</th>
               <th style="text-align:center">Rp. {{number_format($total) }}</th>
          </tr>
     </tfoot>               
</table>

