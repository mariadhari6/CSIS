@extends('layouts.v_main')
@section('title',' CSIS | Company ')

@section('content')
<h4 class="page-title">Company</h4>
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
                <th width="10px">
                  <div class="form-check">
                      <label class="form-check-label">
                          <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                          <span class="form-check-sign"></span>
                      </label>
                  </div>
                </th>
                <th scope="col" class="action">No.</th>
                <th scope="col" class="list">Company Name</th>
                <th scope="col" class="list">Seller</th>
                <th scope="col" class="list">Customer Code</th>
                <th scope="col" class="list">No PO</th>
                <th scope="col" class="list">Po Date</th>
                <th scope="col" class="list">No Agreement Letter</th>
                <th scope="col" class="list">Status</th>
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

  <script>
    $(document).ready(function() {

      read();

    });


    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_company') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
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
        $.get("{{ url('add_form_company') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_name = $("#company_name").val();
        var seller_id = $("#seller_id").val();
        var customer_code = $("#customer_code").val();
        var no_po = $("#no_po").val();
        var po_date = $("#po_date").val();
        var no_agreement_letter_id = $("#no_agreement_letter_id").val();
        var status = $("#status").val();

        $.ajax({
            type: "get",
            url: "{{ url('store_company') }}",
            data: {
              company_name: company_name,
              seller_id: seller_id,
              customer_code: customer_code,
              no_po: no_po,
              po_date: po_date,
              no_agreement_letter_id: no_agreement_letter_id,
              status: status

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
                    url: "{{ url('destroy_company') }}/" + id,
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
        $("#td-button-"+id).slideUp("fast");
        $("#item-no-"+value).slideUp("fast");
        $("#item-company_name-"+id).slideUp("fast");
        $("#item-seller_id-"+id).slideUp("fast");
        $("#item-customer_code-"+id).slideUp("fast");
        $("#item-no_po-"+id).slideUp("fast");
        $("#item-po_date-"+id).slideUp("fast");
        $("#item-no_agreement_letter_id-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
        $.get("{{ url('edit_form_company') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company_name = $("#company_name").val();
        var seller_id = $('select[name="seller_id"]').val();
        var customer_code = $("#customer_code").val();
        var no_po = $("#no_po").val();
        var po_date = $("#po_date").val();
        var no_agreement_letter_id = $("#no_agreement_letter_id").val();
        var status = $("#status").val();

        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_company') }}/"+id,
            data: {
              company_name: company_name,
              seller_id: seller_id,
              customer_code: customer_code,
              no_po: no_po,
              po_date: po_date,
              no_agreement_letter_id:no_agreement_letter_id,
              status: status
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


   // checkbox all

  $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

    // delete all
    $('.delete_all').on('click', function(){
      event.preventDefault();
      var allVals = [];
      $(".task-select:checked").each(function() {
          allVals.push($(this).attr("id"));
      });
          if (allVals.length > 0) {
              var _token = $('input[name="_token"]').val();
              // alert(allVals);
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
                      url: "{{ url('/selectedDelete_company') }}",
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

    // form edit all
    $('.edit_all').on('click', function(e){

    var allVals = [];
    var _token = $('input[name="_token"]').val();

    $(".task-select:checked").each(function() {
        allVals.push($(this).attr("id"));
    });
    if (allVals.length > 0){
        $(".edit_all").hide("fast");
        $(".delete_all").hide("fast");
        $.get("{{ url('selected_company') }}", {}, function(data, status) {
            $("#selected").prepend(data)
        });
        $.each(allVals, function(index, value){
            $("#td-checkbox-"+value).hide("fast");
            $("#td-button-"+value).hide("fast");
            $("#item-no-"+value).slideUp("fast");
            $("#item-company_name-"+value).slideUp("fast");
            $("#item-seller_id-"+value).slideUp("fast");
            $("#item-customer_code-"+value).slideUp("fast");
            $("#item-no_po-"+value).slideUp("fast");
            $("#item-po_date-"+value).slideUp("fast");
            $("#item-no_agreement_letter_id-"+value).slideUp("fast");
            $("#item-status-"+value).slideUp("fast");

            $(".add").hide("fast");
            $.get("{{ url('edit_form_company') }}/" + value, {}, function(data, status) {
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
                var company_name = $(".company_name-"+value).val();
                var seller_id = $(".seller_id-"+value).val();
                var customer_code = $(".customer_code-"+value).val();
                var no_po = $(".no_po-"+value).val();
                var po_date = $(".po_date-"+value).val();
                var no_agreement_letter_id = $(".no_agreement_letter_id-"+value).val();
                var status = $(".status-"+value).val();

                $.ajax({
                type: "get",
                url: "{{ url('update_company') }}/"+value,
                data: {
                    company_name: company_name,
                    seller_id: seller_id,
                    customer_code: customer_code,
                    no_po: no_po,
                    po_date: po_date,
                    no_agreement_letter_id:no_agreement_letter_id,
                    status: status
                },
                success: function(data) {
                swal({
                      type: 'success',
                      title: 'The selected data has been updated',
                      showConfirmButton: false,
                      timer: 1500

                  // $(".save").hide();
                  });
                  read();

                  $(".add").show("fast");
                  $(".edit_all").show("fast");
                  $(".delete_all").show("fast");
                  $("#save-selected").hide("fast");
                  $("#cancel-selected").hide("fast");
                }
            });

            });
        });
        }

         //--------Proses Batal--------
        function cancelUpdateSelected(){
            $("#save-selected").hide("fast");
            $("#cancel-selected").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
            read();
        }



  </script>

   @endsection
