@extends('layouts.v_main')
@section('title','CSIS | Seller')
@section('content')
    <div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="text-right mt-3" id="selected">
            <button type="button" class="btn btn-primary float-left mr-2 add" id="add" >
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" ></i>
                </button>
                <button class="btn btn-success  mr-2 edit_all">
                  <i class="fas fa-pen"></i>
                </button>
                <button class="btn btn-danger  delete_all">
                  <i class="fas fa-trash"></i>
                </button>
            </div>
              <form>

          <table class="table table-responsive data" class="table_id" id="table_id" >
            <thead>
              <tr>

                <th>
                    <div>
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action-no">No.</th>
                <th scope="col" class="list-seller">Seller Name*</th>
                <th scope="col" class="list-seller">Seller Code*</th>
                <th scope="col" class="list-seller">No Agreement Letter*</th>
                <th scope="col" class="list-seller">Status*</th>
                <th scope="col" class="action sticky-col first-col">Action</th>

              </tr>
            </thead>
            <tbody  id="item_data">
            {{-- {{ csrf_field() }} --}}
            </tbody>

          </table>
           </form>

        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      read()
    });

    // Swal.mixin({
    //   toast: true,
    // }).bindClickHandler('data-swal-toast-template')
    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_seller') }}", {}, function(data, status) {
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
        $.get("{{ url('add_form_seller') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {
        var seller_name = $("#seller_name").val();
        var seller_code = $("#seller_code").val();
        var no_agreement_letter = $("#no_agreement_letter").val();
        var status = $("#status").val();

        if(
            seller_name == '' ||
            seller_code == '' ||
            no_agreement_letter == ''
          ) {
          swal({
            type: 'warning',
            text: 'there is data that has not been filled',
            showConfirmButton: false,
            timer: 1500
          }).catch(function(timeout) { });
          $("#required").text("please fill out this field");
        } else {
           $.ajax({
            type: "get",
            url: "{{ url('store_seller') }}",
            data: {
              seller_name: seller_name,
              seller_code: seller_code,
              no_agreement_letter: no_agreement_letter,
              status:status
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
                    url: "{{ url('destroy_seller') }}/" + id,
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
        $("#item-no-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-seller_name-"+id).hide("fast");
        $("#item-seller_code-"+id).hide("fast");
        $("#item-no_agreement_letter-"+id).hide("fast");
        $("#item-status-"+id).hide("fast");
        $.get("{{ url('show_seller') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
            var seller_name = $("#seller_name").val();
            var seller_code = $("#seller_code").val();
            var no_agreement_letter = $("#no_agreement_letter").val();
            var status = $("#status").val();
            var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_seller') }}/"+id,
                data: {
                seller_name: seller_name,
                seller_code: seller_code,
                no_agreement_letter: no_agreement_letter,
                status:status
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
         // Delete All
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
                            url: "{{ url('/selectedDelete_seller') }}",
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
        // Form Edit All
        $('.edit_all').on('click', function(e){
            var allVals = [];
            var _token = $('input[name="_token"]').val();
            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_seller') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-seller_name-"+value).hide("fast");
                    $("#item-seller_code-"+value).hide("fast");
                    $("#item-no_agreement_letter-"+value).hide("fast");
                    $("#item-status-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_seller') }}/" + value, {}, function(data, status) {
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
                    var seller_name = $(".seller_name-"+value).val();
                    var seller_code = $(".seller_code-"+value).val();
                    var no_agreement_letter = $(".no_agreement_letter-"+value).val();
                    var status = $(".status-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_seller') }}/"+value,
                    data: {
                    seller_name: seller_name,
                    seller_code: seller_code,
                    no_agreement_letter: no_agreement_letter,
                    status:status,
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
                    $(".btn-round").hide("fast");
                    $(".btn-round").hide("fast");
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
