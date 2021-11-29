<?php $no=1;?>
@foreach ($data_finish as $item)
   <tr id="list-{{ $item->company_id }}">
<<<<<<< HEAD
      <td>{{ $no++ }}</td>  
      <td id ="key">{{ $item->company->company_name }}</td>
      <td>{{ $item->total_gps}}</td>
      <td>{{ $item->terminate }}</td> 
=======
      <td>{{ $no++ }}</td>
      <td id ="key">{{ $item->company->company_name }}</td>
      <td>{{ $item->total_gps}}</td>
      <td>{{ $item->terminate }}</td>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
      <td>{{ $item->penambahan}}</td>
      <td><i class="fas fa-eye" id="{{ $item->company->company_name }}" onclick="detail({{ $item->company_id}},{{ $month }},{{ $year }})"></i></td>
   </tr>   
@endforeach
