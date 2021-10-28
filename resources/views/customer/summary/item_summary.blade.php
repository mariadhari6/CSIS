<?php $no=1;?>
@foreach ($data[$i] as $item)
   <tr id="list">
      <td>{{ $no++ }}</td>
      <td id ="key">{{ $item->company_id }}</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
   </tr>
@endforeach



{{-- <td>{{ $no++ }}</td>  
<td id ="key">{{ $item->company->company_name }}</td>
<td>{{ $item->jumlah }}</td>  
<td>{{ $terminate}}</td>
<td>{{ $penambahan }}</td>
<td><i class="fas fa-eye" id="{{ $item->company->company_name }}" onclick="detail({{ $item->company_id}},{{ $month }},{{ $year }})"></i></td> --}}





