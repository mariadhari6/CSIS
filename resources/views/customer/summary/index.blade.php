@extends('layouts.v_main')
@section('title','Summary')
@section('title-table', 'Summary Customer')
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
    <div class="col-sm-3">
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
      <div class="col-sm-4">
        <div class="card" id="card-table">
          <div class="card-body">
            <table class="table" id="table_id">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Company</th>
                      <th>Total GPS</th>
                      <th>Terminate Layanan</th>
                      <th>Penambahan Layanan</th>
                      <th>Act</th>
                  </tr>
                </thead>
                <tbody id="item_data">
                </tbody>

            </table>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
          <div class="card">
              <div class="card-body" id="data-po">

              </div>
          </div>
      </div>
  </div>



  <script>

    $(document).ready(function() {
      read();

    });

    function read(){
      var Company = $('#company').val();
      var data   = new Date($('#bulan').val());
      var Month  = data.getMonth() + 1 ;
      var Year   = data.getFullYear();

      $.ajax({
        url:"{{ url('/item_summary')}}",
        data:{
          Company : Company,
          Month   : Month,
          Year    : Year
        },
        success: function(data, status){
          $('#table_id').find("#item_data").html(data);
        }
      });

    }


    function filter(){

      var Company = $('#company').val();
      var data   = new Date($('#bulan').val());
      var Month  = data.getMonth() + 1 ;
      var Year   = data.getFullYear();

      $("#item_data").empty();
      $("#data-po").empty();
      $.ajax({
        url:"{{ url('/filter')}}",
        data:{
          Company : Company,
          Month   : Month,
          Year    : Year
        },
        success: function(data){

          $('#table_id').find("#item_data").html(data);
        }

      });
      return true;
    }


    function detail(company,month,year){
      var company = company;
      var month   = month;
      var year    = year;
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
    }
















  </script>

  @endsection


