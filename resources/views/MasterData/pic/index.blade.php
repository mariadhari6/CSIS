@extends('layouts.v_main')
@section('title','CSIS | PIC Company')
@section('title-table','PIC Company')
@section('master','show')
@section('pic','active')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="text-right" id="selected">
            <button type="button" class="btn btn-primary float-left mr-2 add add-button">
              <b>Add</b>
              <i class="fas fa-plus ml-2" id="add"></i>
            </button>
            <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal" data-target="#importData">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
            </button>
            <a href="/export_Pic" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
                <i class="fas fa-file-export"></i>
            </a>
            <button class="btn btn-success  mr-2 edit_all" data-toggle="tooltip" title="Edit Selected">
              <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected">
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
                <th scope="col" class="list-company">Company*</th>
                <th scope="col" class="list">PIC Name*</th>
                <th scope="col" class="list">Phone*</th>
                <th scope="col" class="list">Email*</th>
                <th scope="col" class="list-picPosition">Position*</th>
                <th scope="col" class="list">Date of Birth</th>
                <th scope="col" class="action sticky-col first-col">Action</th>

              </tr>
            </thead>
            <tbody  id="item_data">
              {{-- {{ csrf_field() }} --}}
            </tbody>
          </table>
            {{-- <div class="paginate float-right mt-2">
                <button class="btn btn-light" id="previous">
                    Previous
                </button>
                <button class="btn btn-secondary" id="currentPage"></button>
                <button class="btn btn-light" id="next">Next</button>
            </div> --}}
         </form>
        </div>
        </div>
      </div>
    </div>
 <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
		<div class="modal-dialog-full-width modal-dialog" style="width: 1000px; height: 1000px;"" role="document">
			<div class="modal-content-full-width modal-content">
				<div class="modal-header-full-width modal-header bg-primary">
					<h6 class="modal-title">Import data</h6>
					<button type="button" class="close" id="close-modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
          <div class="card">
            <div class="card-header">
              <b>Select Excel File</b>
              <br>
              <input type="file" id="excel_file" />
              <button type="button" class="btn btn-success btn-xs" id="send" onclick="save_data()" >Save</button>
              <a  class="btn btn-secondary btn-xs" href="/download_template_pic" style="color:white">Download Template</a>
              <div percentage class="mt-2 progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="excel_data" ></div>
            </div>
          </div>
        </div>
        <div class="modal-footer-full-width  modal-footer">

        </div>
        </div>
			</div>
		</div>
	</div>
  <script>
    $(document).ready(function() {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      read();
    //   currentPage();
    });

    const excel_file = document.getElementById("excel_file");
    excel_file.addEventListener("change", (event) => {
      function progress_bar_process(percentage, timer) {
        $('.progress-bar').css('width', percentage + '%');
        if (percentage > 100) {
          clearInterval(timer);
          $('#process').css('display', 'none');
          $('.progress-bar').css('width', '0%');

          if (
              ![
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                "application/vnd.ms-excel",
                "application/wps-office.xlsx"
              ].includes(event.target.files[0].type)
            ) {
              document.getElementById("excel_data").innerHTML =
                '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';
              excel_file.value = "";
              return false;
            }

          var reader = new FileReader();
          reader.readAsArrayBuffer(event.target.files[0]);
          reader.onload = function (event) {
            var data = new Uint8Array(reader.result);
            var work_book = XLSX.read(data, { type: "array" });
            var sheet_name = work_book.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(
              work_book.Sheets[sheet_name[0]],
              { header: 1 }
            );
            if (sheet_data.length > 0) {
                var table_output = '<table class="table table-bordered" id="importTable">';
                for (var row = 0; row < sheet_data.length; row++) {
                    table_output += "<tr>";
                    for (var cell = 0; cell < sheet_data[row].length; cell++) {
                      if (row == 0) {
                        table_output += "<th>" + sheet_data[row][cell] + "</th>";
                      } else {
                        table_output += '<td contenteditable id="table-data-' + cell + '" >' + sheet_data[row][cell] + "</td>";
                      }
                    }
                    table_output += "</tr>";
                }
                table_output += "</table>";
                document.getElementById("excel_data").innerHTML = table_output;
            }
              dateOfBirth = document.querySelectorAll("#table-data-5");
              for (i = 0; i < dateOfBirth.length; i++) {
                var excelDate = dateOfBirth[i].innerText;
                var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
                try {
                      var converted_date = date.toISOString().split('T')[0];
                    }
                    catch(err) {
                      // var converted_date = 'wrong date format';
                      dateOfBirth[i].style.backgroundColor = "#e8837d";
                    }
                dateOfBirth[i].innerHTML = converted_date;
              }
            excel_file.value = "";
          };
        }
      }
      var percentage = 0;
      var timer = setInterval(function() {
        percentage = percentage + 20;
        progress_bar_process(percentage, timer);
      }, 1000);
    });

    function progress_bar_process(percentage, timer) {
      $('.progress-bar').css('width', percentage + '%');
      if(percentage > 100) {
        clearInterval(timer);
        $('#process').css('display', 'none');
        $('.progress-bar').css('width', '0%');
        setTimeout(function(){
        swal({
              type: 'success',
              title: 'Data Saved',
              showConfirmButton: false,
              timer: 1500
        }).catch(function(timeout) { });
        read();
        $("#importTable tr").remove();
        $('#importData').modal('hide');
        }, 5000);
      }
    }

    function save_data() {
        var total = 0;
        var jsonTable = $('#importTable tbody tr:has(td)').map(function () {
            var $td = $('td', this);
            total += parseFloat($td.eq(2).text());
            return{
                company_id        : $td.eq(0).text(),
                pic_name          : $td.eq(1).text(),
                phone             : $td.eq(2).text(),
                email             : $td.eq(3).text(),
                position          : $td.eq(4).text(),
                date_of_birth     : $td.eq(5).text(),

            }

        }).get();
      $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
        data = {};
        data = jsonTable;
        //
        var thLength = $('#importTable th').length;
        var trLength = $("#importTable td").closest("tr").length;
        var item = document.querySelectorAll("#table-data-8");
        var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
        var success;
        $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: "{{ url('/save_import_pic') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        } ,
        error: function(er) {
          if(er.responseText === 'fail' ){
            // alert("save failed");
            swal({
                type: 'warning',
                text: 'Duplicate data or error format, Imei must 15 character',
                showCloseButton: true,
                showConfirmButton: false
              }).catch(function(timeout) { });
          } else {
              try {
            swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
            read();
            $('#importData').modal('hide');
            } catch (error) {
              swal({
                type: 'warning',
                text: 'Duplicate data or error format',
               showCloseButton: true,
                showConfirmButton: false
              }).catch(function(timeout) { });
            }
          }
          }
      });
    }


     // ---- Close Modal -------
    $('#close-modal').click(function() {
        // deleteTemporary();
        // read_temporary()
        $('#importData').modal('hide');
    });
    // ------ Tampil Data ------
    function read(){
        enableButton();
      $.get("{{ url('item_data_pic') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
        $('#table_id').dataTable( {
            "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],
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
         disableButton();
        $.get("{{ url('add_form_pic') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var company_id = $("#company_id").val();
        var pic_name = $("#pic_name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var position = $("#position").val();
        var date_of_birth = $("#date_of_birth").val();
        $.ajax({
            type: "get",
            url: "{{ url('store_pic') }}",
            data: {
              company_id: company_id,
              pic_name: pic_name,
              phone: phone,
              email: email,
              position: position,
              date_of_birth:date_of_birth
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
                    url: "{{ url('destroy_pic') }}/" + id,
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
        disableButton();
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#td-checkbox-"+id).hide("fast");

        $("#item-no-"+id).hide("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-pic_name-"+id).slideUp("fast");
        $("#item-phone-"+id).slideUp("fast");
        $("#item-email-"+id).slideUp("fast");
        $("#item-position-"+id).slideUp("fast");
        $("#item-date_of_birth-"+id).slideUp("fast");
        $.get("{{ url('show_pic') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var company_id = $("#company_id").val();
        var pic_name = $("#pic_name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var position = $("#position").val();
        var date_of_birth = $("#date_of_birth").val();
        var id = id;
        // console.log('test');
        $.ajax({
            type: "get",
            url: "{{ url('update_pic') }}/"+id,
            data: {
             company_id: company_id,
              pic_name: pic_name,
              phone: phone,
              email: email,
              position: position,
             date_of_birth:date_of_birth
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
        })
    }

     $('#master').on('click', function(e) {
          if($(this).is(':checked',true)){
              $(".task-select").prop('checked', true);
          } else {
              $(".task-select").prop('checked',false);
          }
    });

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
                            url: "{{ url('/selectedDelete_pic') }}",
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

        // edit form all

        $('.edit_all').on('click', function(e){
            disableButton();
            $('[data-toggle="tooltip"]').tooltip("hide");

            var allVals = [];
            var _token = $('input[name="_token"]').val();

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));
            });
            if (allVals.length > 0){
                // alert(allVals);
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_pic') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-company_id-"+value).slideUp("fast");
                    $("#item-pic_name-"+value).slideUp("fast");
                    $("#item-phone-"+value).slideUp("fast");
                    $("#item-email-"+value).slideUp("fast");
                    $("#item-position-"+value).slideUp("fast");
                    $("#item-date_of_birth-"+value).slideUp("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_pic') }}/" + value, {}, function(data, status) {
                        $("#edit-form-"+value).prepend(data)
                        $("#master").prop('checked', false);

                    });
                });
            }else{
                alert('Select the row you want to edit')
            }
        });

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
                    var company_id = $(".company_id-"+value).val();
                    var pic_name = $(".pic_name-"+value).val();
                    var phone = $(".phone-"+value).val();
                    var email = $(".email-"+value).val();
                    var position = $(".position-"+value).val();
                    var date_of_birth = $(".date_of_birth-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_pic') }}/"+value,
                    data: {
                        company_id: company_id,
                        pic_name: pic_name,
                        phone: phone,
                        email: email,
                        position: position,
                        date_of_birth:date_of_birth
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
                      $(".import").show("fast");
                      $(".export").show("fast");
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
          $(".import").show("fast");
          $(".export").show("fast");
          $(".add").show("fast");
          $(".edit_all").show("fast");
          $(".delete_all").show("fast");
          read();
      }

      function disableButton() {

          $('.add').prop('disabled', true);
          $('.edit_all').prop('disabled', true);
          $('.delete_all').prop('disabled', true);
          $('.export').addClass('disabled');
          $('.edit').addClass('disable');
          $('.delete').addClass('disable');
          $("[data-toggle= modal]").prop('disabled', true);

        }

        function enableButton(){

          $('.add').prop('disabled', false);
          $('.edit_all').prop('disabled', false);
          $('.delete_all').prop('disabled', false);
          $('.edit').removeClass('disable');
          $('.export').removeClass('disabled');
          $('.delete').removeClass('disable');
          $("[data-toggle= modal]").prop('disabled', false);

        }

        // Paginate
        // let numberPaginate = 1;
        // $("#next").click(function() {
        //     numberPaginate += 1;
        //     $.get(`{{ url('item_data_pic?page=${numberPaginate}') }}`, {}, function (data, status) {
        //         if (data != "") {
        //             $.ajax({
        //                 type: "get",
        //                 url: `{{ url('item_data_pic?page=${numberPaginate}') }}`,
        //                 data: {
        //                     no: no,
        //                 },
        //                 success: function(datas) {
        //                     $('#table_id').DataTable().destroy();
        //                     $('#table_id').find("#item_data").html(datas);
        //                     $('#table_id').dataTable( {
        //                         "pageLength": 50,
        //                         "dom": '<"top"f>rt<"bottom"><"clear">'
        //                         });
        //                     $('#table_id').DataTable().draw();
        //                     currentPage();
        //                 }
        //             });
        //         }
        //         else{
        //             numberPaginate -= 1;
        //         }
        //     });
        // });

        // previous paginate
        // $( "#previous" ).click(function() {
        //     if (numberPaginate > 1) {
        //         numberPaginate -= 1;
        //         $.ajax({
        //         type: "get",
        //         url: `{{ url('item_data_pic?page=${numberPaginate}') }}`,
        //         data: {
        //             no: no - 100,
        //         },
        //         success: function(datas) {
        //             $('#table_id').DataTable().destroy();
        //             $('#table_id').find("#item_data").html(datas);
        //             $('#table_id').dataTable( {
        //                 "pageLength": 50,
        //                 "dom": '<"top"f>rt<"bottom"><"clear">'
        //                 });
        //             $('#table_id').DataTable().draw();
        //             currentPage();
        //         }
        //         });
        //     }
        // });

        // current Page
        // function currentPage(){
        //     $("#currentPage").text(numberPaginate);
        // }

  </script>

   @endsection
