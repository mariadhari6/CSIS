@extends('layouts.v_main')
@section('title','Detail Customer')
@section('title-table', 'Detail Customer')

@section('content')

<div class="col-sm-5">
    <div class="input-group mb-3">
        <div class="input-group-prepend" >
        <label class="input-group-text">Company</label>
        </div>
        <select class="form-control selectpicker" id="list-company" data-live-search="true">
            <option style="display: none"></option>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
            @endforeach
        </select>
        <a href="/export_detail_customer" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
            <i class="fas fa-file-export"></i>
        </a>
    </div>

</div>
    <div class="card detail-content">
        <div class="card-body">
            <h5 class="card-title">Pilih Company</h5>
                <p class="card-text" id="ajax-content"></p>
        </div>
    </div>

   
  <script>

    $(document).ready(function() {

        $('#list-company').change(function(){

        var Id = $(this).val();
        $(".card").removeClass('detail-content');
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


