<?php $no=1;?>
@foreach ($data as $item)
<tr>
    
    <td>{{ $no++ }}</td>
    <td>{{ $item->company->company_name }}</td>
    <td>{{ $item->jumlah }}</td>
    {{-- <td>{{ $item->tanggal }}</td> --}}
    <td><i class="fas fa-eye" onclick="detail()"></i></td>
</tr>
<script>
    $(document).ready(function(){


    });

    function detail(){
       var i =  "{{ $item->tanggal }}"

       alert(i);

    }




</script>

@endforeach

