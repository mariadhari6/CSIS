@extends('layouts.v_main')
@section('title','Summary')
@section('content')
<?php $no=1;?>

  <div class="row">
    <div class="col-sm-2">
        <div class="input-group mb-2 mr-sm-2">
          <div class="input-group-prepend">
            <div class="input-group-text">Company</div>
          </div>
          <select class="form-control" id="company">
              <option value=""></option>
            @foreach ($company as $item)
              <option value="{{ $item->id }}"> {{ $item->company_name}}</option>
            @endforeach
          </select>
        </div>
    </div>
    <div class="col-sm-2">
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Month</div>
        </div>
        <input type="month" class="form-control" id="bulan">
      </div>
    </div>    
    <button class="btn btn-primary mb-2" onclick="filter()">Filter</button>
  </div>

  <div class="row">
      <div class="col-sm-2">
        <table class="table" id="table_id">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Company</th>
                  <th>Qty</th>
                  <th>Act</th>
              </tr>
            </thead>
            <tbody id="item_data">

            </tbody>
        </table>
      </div>
      <div class="col-sm-10">
          <div class="card">
              <div class="card-body">
                <table class="table table-sm ">
                    <thead>
                      <tr>
                        <th scope="col">Company</th>
                        <th scope="col">No Po</th>
                        <th scope="col">Jumlah Unit</th>
                        <th scope="col">HargaLayanan</th>
                        <th scope="col">Revenue</th>
                        <th scope="col">Status PO</th>
                        <th scope="col">M.GPS Terpasang</th>
                        <th scope="col">T.GPS Terpasang</th>
                        <th scope="col">Jumlah GPS</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>



  <script>

    $(document).ready(function() {

    });

    function filter(){

      var Company = $('#company').val();
      var data   = new Date($('#bulan').val());
      var Month  = data.getMonth() + 1 ;
      var Year   = data.getFullYear();

  
      
      $("#item_data").empty();
      $.ajax({ 
        url:"{{ url('/filter')}}",
        data:{
          Company : Company,
          Month   : Month,
          Year    : Year
        }, 
        success: function(html)
        {
          $("#item_data").empty().append(html);
        }
            
      });
      return true;
    }

  </script>
  
  
  @endsection
