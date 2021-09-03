@extends('layouts.v_main')
@section('title','Tes')

@section('content')
<div align="right">
    <a class="btn btn-secondary  mr-2" href="{{ route('export') }}"><i class="fas fa-file-excel mr-2"></i>Export</a>
</div>
<br>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"> <i class="fas fa-pen"></i></button>
                <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
            </div>

          <table class="table table-hover detailcustomer" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th width="10px">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" width="80px" >Action</th>
                <th scope="col">Company</th>
                <th scope="col">License Plate</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">PO Number</th>
                <th scope="col">PO Date</th>
                <th scope="col">Status PO</th>
                <th scope="col">IMEI</th>
                <th scope="col">Merk</th>
                <th scope="col">Type</th>
                <th scope="col">GSM</th>
                <th scope="col">Provider</th>
                <th scope="col">Serial Number Sensor</th>
                <th scope="col">Sensor Name</th>
                <th scope="col">Merk Sensor</th>
                <th scope="col">Pool Name</th>
                <th scope="col">Pool Location</th>
                <th scope="col">Status Layanan</th>
                <th scope="col">Tanggal Pasang</th>
                <th scope="col">Tanggal Non Active</th>
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
        read();
        // $('#table_id').dataTable();
    });

    function read(){
      $.get("{{ url('item_detail') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
            } );
        $('#table_id').DataTable().draw();
      });
    }

    function cancel() {
      read()
    }


</script>

@endsection
