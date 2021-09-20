@extends('layouts.v_main')
@section('title','Maintenance GPS')

@section('content')
<h4 class="page-title">Maintenance GPS</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
              <button type="button" class="btn btn-primary float-left mr-2 add add-button" id="add">
                <b>Add</b>
                <i class="fas fa-plus ml-2" ></i>
              </button>
              <button class="btn btn-success  mr-2 edit_all"> 
                <i class="fas fa-pen"></i>
              </button>
              <button class="btn btn-danger delete_all">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          <table class="table table-responsive data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th rowspan="2" width="10px">
                  <div class="form-check">
                      <label class="form-check-label">
                          <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                          <span class="form-check-sign"></span>
                      </label>
                  </div>
                </th>
                <th rowspan="2" scope="col" class="action">No.</th>
                <th rowspan="2" scope="col" class="action">Action</th>
                <th rowspan="2" scope="col" class="list">Company</th>
                <th rowspan="2" scope="col" class="list">Vehicle</th>
                <th rowspan="2" scope="col" class="list">Tanggal</th>
                <th rowspan="2" scope="col" class="list">Type GPS</th>
                <th colspan="3" scope="col" class="list">Equipment</th>
                <th rowspan="2" scope="col" class="list">Permasalahan</th>
                <th rowspan="2" scope="col" class="list">Ketersediaan Kendaraan</th>
                <th rowspan="2" scope="col" class="list">Keterangan</th>
                <th rowspan="2" scope="col" class="list">Hasil</th>
                <th rowspan="2" scope="col" class="list">Biaya Transportasi</th>
                <th rowspan="2" scope="col" class="list">Teknisi</th>
                <th rowspan="2" scope="col" class="list">Req By</th>
                <th rowspan="2" scope="col" class="list">Note</th>
              </tr>
              <tr>
                <th scope="col" class="list">GPS</th>
                <th scope="col" class="list">Sensor</th>
                <th scope="col" class="list">GSM</th>
              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function() {

    // read();
    $('#table_id').dataTable( {
        "dom": '<"top"f>rt<"bottom"lp><"clear">'
        });

    });

    // ------ Tampil Data ------
    // function read(){
    //   $.get("{{ url('item_data_company') }}", {}, function(data, status) {
    //     $('#table_id').DataTable().destroy();
    //     $('#table_id').find("#item_data").html(data);
    //     $('#table_id').dataTable( {
    //         "dom": '<"top"f>rt<"bottom"lp><"clear">'
    //         });
    //     $('#table_id').DataTable().draw();
    //   });
    // }

    // ------ Tambah Form Input ------
    $('.add').click(function() {
    $.get("{{ url('add_form_maintenanace_gps') }}", {}, function(data, status) {
        $('#table_id tbody').prepend(data); 
    });
    });


</script>
  @endsection
