<?php $no=1;?>

@foreach ($data as $item)
<tr id="list">    
    <td>{{ $no++ }}</td>
    <td>{{ $item->company->company_name }}</td>
    <td>{{ $item->jumlah }}</td>
    <td>{{ $terminate}}</td>
    <td>{{ $item->jumlah }}</td>
    {{-- <td><i class="fas fa-eye" id="{{ $item->company->company_name }}"></i></td> --}}
</tr>

<script>

    $(document).ready(function(){

        $('#list i').click(function(){

            var company = $(this).attr('id');
            var month = {{$month}} ;
            var year  = {{ $year }} ;
            alert(month);
            $("#data-po").empty();
            $.ajax({ 
                url:"{{ url('/data-po')}}",
                data:{
                company : company,
                month   : month,
                year    : year
                }, 
                success: function(html){
                    $("#data-po").empty().append(html);
                }
            });
            return true;
        });
    });

</script>

@endforeach

  



