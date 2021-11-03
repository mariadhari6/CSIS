@extends('layouts.v_main')
@section('title','Detail Customer')
@section('title-table', 'Detail Customer')

@section('content')

<div class="dropdown mb-3">
    <button class="btn btn-warning btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Company
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="list-company">
        @foreach ($data as $item)
            <a class="dropdown-item" href="#" id="{{ $item->id }}">{{ $item->company_name }}</a>
        @endforeach
    </div>
  </div>

    {{-- <div class="mb-3">
        <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Company</div>
        </div>
        <select class="form-control" id="filter-company">
            <option value=""></option>
            @foreach ($data as $item)
            <option value="{{ $item->id }}"> {{ $item->company_name}}</option>
            @endforeach
        </select>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pilih Company</h5>
                <p class="card-text" id="ajax-content"></p>
        </div>
    </div>

  <script>

    $(document).ready(function() {

        $('#list-company  a').click(function(){

        var Id = $(this).attr('id');

        $("#ajax-content").empty();
        $("#list-company a").removeClass('current');
        $("h5").remove();
        $(this).addClass('current');

        $.ajax({ url:"{{ url('/detail')}}/" + Id, success: function(html)
            {
                $("#ajax-content").empty().append(html);
            }

        });
        return true;
        });


    });
  </script>
@endsection

{{-- $("#filter-company").change(function(){
    var value = $(this).val();
    $.ajax({
      url:"{{ url('/filter_company')}}/" + value,
      success: function(data, status){
        $('#table_id').find("#item_data").html(data);
      }

    });
    return true;
  });

  $('#list-company  a').click(function(){

    var Id = $(this).attr('id');

    $("#ajax-content").empty();
    $("#list-company a").removeClass('current');
    $("h5").remove();
    $(this).addClass('current');

    $.ajax({ url:"{{ url('/detail')}}/" + Id, success: function(html)
        {
            $("#ajax-content").empty().append(html);
        }

    });
    return true;
}); --}}
{{--
$('#filter-company').change(function(){

    var Id = $(this).val();

    $("#ajax-content").empty();
    $("#list-company a").removeClass('current');
    $("h5").remove();
    $(this).addClass('current');

    $.ajax({ url:"{{ url('/detail')}}/" + Id, success: function(html)
        {
            $("#ajax-content").empty().append(html);
        }
    });
    return true;
}); --}}
