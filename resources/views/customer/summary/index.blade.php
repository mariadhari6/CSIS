@extends('layouts.v_main')
@section('title','Summary')

@section('content')

<div class="title">
    <strong>Summary Customer</strong>
</div>
<br>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="form-group row">
                        <label for="company" class="col-sm-1 col-form-label">Input Company</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="company">
                                <option value="" disabled selected>Pilih Company</option>
                                @foreach ($company as $item)
                                <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
                               @endforeach
                            </select>
                        </div>
                        <label for="Bulan" class="col-sm-1 col-form-label">Input Bulan</label>
                        <label class="col-form-label">:</label>
                        <div class="col-sm-3">
                            <input type="smonth" class="form-control" placeholder="Bulan">
                        </div>
                    </div>
                </div>
                <table class="table table-responsive" class="table_id" id="table_id">
                  <thead>
                    <tr>
                      <th scope="col" class="list">Company</th>
                      <th scope="col" class="list">Po Number</th>
                      <th scope="col" class="list">Jumlah unit PO</th>
                      <th scope="col" class="list">Harga Layanan</th>
                      <th scope="col" class="list">Revenue</th>
                      <th scope="col" class="list">Status PO</th>
                      <th scope="col" class="list">Merk GPS Terpasang</th>
                      <th scope="col" class="list">Type GPS Terpasang</th>
                      <th scope="col" class="list">Jumlah GPS</th>
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

    });


    function read(){

        $.get("{{ route('item_summary')}}", {}, function(data, status) {
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(data);
            $('#table_id').dataTable( {
                "searching": false
                } );
            $('#table_id').DataTable().draw();
        });

    }
</script>

@endsection
