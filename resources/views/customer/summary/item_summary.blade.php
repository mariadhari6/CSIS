<?php $no=1;?>
@foreach ($data as $item)
   <tr id="list">
      <td>{{ $no++ }}</td>  
      <td id ="key">{{ $item->company->company_name }}</td>
      <td>{{ $item->total_gps }}</td>  
      <td></td>
      <td>{{ $item->penambahan_layanan}}</td>
      <td><i class="fas fa-eye" id="{{ $item->company->company_name }}" onclick="detail({{ $item->company_id}},{{ $month }},{{ $year }})"></i></td>
   </tr>
@endforeach





