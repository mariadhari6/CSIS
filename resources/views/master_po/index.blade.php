@extends('layouts.v_main')
@section('title','CSIS | Master Po')
@section('content')

<div class="title">
    <strong>Master Po</strong>
</div>
<br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
                <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
                <button class="btn btn-success  mr-2 edit_all"><i class="fas fa-pen"></i></button>
                <button class="btn btn-danger delete_all"><i class="fas fa-trash"></i></button>  
            </div>
            <table class="table table-responsive data" class="table_id" id="table_id" >
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
                <th scope="col" class="action">No.</th>
                <th scope="col" class="list">Company</th>
                <th scope="col" class="list">Po Number</th>
                <th scope="col" class="list">Po Date</th>
                <th scope="col" class="list">Harga Layanan</th>
                <th scope="col" class="list">Jumlah Unit Po</th>
                <th scope="col" class="list">Status Po</th>
                <th scope="col" class="list">Sales</th>
                <th scope="col" class="action">Action</th>
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
  </div>
  <script>

    $(document).ready(function() {
      read()
    });

    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_master_po') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable({
            "dom": '<"top"f>rt<"bottom"lp><"clear">'
        });
        $('#table_id').DataTable().draw();
      });
    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_master_po') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_id      = $("#company_id").val();
        var po_number       = $("#po_number").val();
        var po_date         = $("#po_date").val();
        var harga_layanan   = $("#harga_layanan").val();
        var jumlah_unit_po  = $("#jumlah_unit_po").val();
        var status_po       = $("#status_po").val();
        var sales_id        = $("#sales_id").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_master_po') }}",
            data: {
              company_id      : company_id,
              po_number       : po_number,
              po_date         : po_date,
              harga_layanan   : harga_layanan,
              jumlah_unit_po  : jumlah_unit_po,
              status_po       : status_po,
              sales_id        : sales_id
            },
            success: function(data) {
              swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
              read();
            }
        })
    }
    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;
        swal({
            title: 'Are you sure?',
            text: "You want delete to this data!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes Delete',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                $.ajax({
                    type: "get",
                    url: "{{ url('destroy_master_po') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                      swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { }); 
                        read();
                    }
                });
              });
            },
            allowOutsideClick: false
      });
    }
    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-po_number-"+id).hide("fast");
        $("#item-po_date-"+id).hide("fast");
        $("#item-harga_layanan-"+id).hide("fast");
        $("#item-jumlah_unit_po-"+id).hide("fast");
        $("#item-status_po-"+id).hide("fast");
        $("#item-sales_id-"+id).hide("fast");

        $.get("{{ url('show_master_po') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {

            var id = id;
            var company_id      = $("#company_id").val();
            var po_number       = $("#po_number").val();
            var po_date         = $("#po_date").val();
            var harga_layanan   = $("#harga_layanan").val();
            var jumlah_unit_po  = $("#jumlah_unit_po").val();
            var status_po       = $("#status_po").val();
            var sales_id        = $("#sales_id").val();
            $.ajax({
                type: "get",
                url: "{{ url('update_master_po') }}/"+id,
                data: {
                company_id      : company_id,
                po_number       : po_number,
                po_date         : po_date,
                harga_layanan   : harga_layanan,
                jumlah_unit_po  : jumlah_unit_po,
                status_po       : status_po,
                sales_id        : sales_id
                },
                success: function(data) {
                  swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                read();
                }
            });
        }

       
        $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
        });


        $('.delete_all').on('click', function(){

            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
                if (allVals.length > 0) {

                    var _token = $('input[name="_token"]').val();
                    
                    swal({
                    title: 'Are you sure?',
                    text: "You want delete Selected data !",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes Delete',
                    showLoaderOnConfirm: true,
                    preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                            url: "{{ url('/selectedDelete_master_po') }}",
                            method: "get",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                              swal({
                                    type: 'success',
                                    title: 'The selected data has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).catch(function(timeout) { });
                                $("#master").prop('checked', false);
                                read();
                                }
                            });
                    });
                    },
                    allowOutsideClick: false
                });
            }else{
                alert('Select the row you want to delete')
            }
        });

   
        $('.edit_all').on('click', function(e){
            var allVals = [];
            var _token = $('input[name="_token"]').val();

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_master_po') }}", {}, function(data, status) {
                    $("#selected").prepend(data)

                });
                $.each(allVals, function(index, value){

                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-po_number-"+value).hide("fast");
                    $("#item-po_date-"+value).hide("fast");
                    $("#item-harga_layanan-"+value).hide("fast");
                    $("#item-jumlah_unit_po-"+value).hide("fast");
                    $("#item-status_po-"+value).hide("fast");
                    $("#item-sales_id-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_master_po') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);
                        
                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });
        // ------ Proses Update Data ------
        function updateSelected() {

            var allVals = [];
            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });

            swal({
                title: "Are you sure?",
                text: "Do you want to do an update?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: '#00FF00',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes Update',
                showLoaderOnConfirm: true,
            }).then((willDelete) => {
                $.each(allVals, function(index, value){
                    var company_id      = $(".company_id-"+value).val();
                    var po_number       = $(".po_number-"+value).val();
                    var po_date         = $(".po_date-"+value).val();
                    var harga_layanan   = $(".harga_layanan-"+value).val();
                    var jumlah_unit_po  = $(".jumlah_unit_po-"+value).val();
                    var status_po       = $(".status_po-"+value).val();
                    var sales_id        = $(".sales_id-"+value).val();
                    
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_master_po') }}/"+value,
                    data: {
                      company_id: company_id,
                      po_number: po_number,
                      po_date:po_date,
                      harga_layanan: harga_layanan,
                      jumlah_unit_po: jumlah_unit_po,
                      status_po: status_po,
                      sales_id: sales_id                    
                    },
                    success: function(data) {
                      swal({
                            type: 'success',
                            title: 'The selected data has been updated',
                            showConfirmButton: false,
                            timer: 1500
                          }).catch(function(timeout) { })
                            $(".add").show("fast");
                            $(".edit_all").show("fast");
                            $(".delete_all").show("fast");
                            $(".save").hide("fast");
                            $(".cancel").hide("fast");
                            read();
                    }
                });
            });
        });

        }

        //--------Proses Batal--------
        function batal(){
            $(".save").hide("fast");
            $(".cancel").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
        }
  </script>
   @endsection