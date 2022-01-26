@extends('layouts.v_main') @section('title','CSIS | Seller')
@section('title-table', 'Seller') @section('master','show')
@section('seller','active') @section('content')

<form onsubmit="return false">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-right" id="selected">
                        <button type="button" class="btn btn-primary float-left mr-2 add" id="add">
                            <b>Add</b>
                            <i class="fas fa-plus ml-2"></i>
                        </button>
                        <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal"
                            data-target="#importData">
                            <b> Import</b>
                            <i class="fas fa-file-excel ml-2"></i>
                        </button>
                        {{-- buat form pencarian --}}
                        <input type="text" placeholder="Search.." id="search_form">
                        <a href="/export_seller" class="btn btn-success mr-2 export" data-toggle="tooltip"
                            title="Export">
                            <i class="fas fa-file-export"></i>
                        </a>
                        <button class="btn btn-success mr-2 edit_all" data-toggle="tooltip" title="Edit Selected">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger delete_all" data-toggle="tooltip" title="Delete Selected">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    <table class="table table-responsive data" class="table_seller" id="table_seller">
                        <thead>
                            <tr>
                                <th>
                                    <div>
                                        <label class="form-check-label">
                                            <input class="
                                                    form-check-input
                                                    select-all-checkbox
                                                " type="checkbox" id="master" />
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </th>
                                <th scope="col" class="action-no">No.</th>
                                <th scope="col" class="list-sellerName">
                                    Seller Name*
                                </th>
                                <th scope="col" class="list-sellerCode">
                                    Seller Code*
                                </th>
                                <th scope="col" class="list-seller">
                                    No Agreement Letter*
                                </th>
                                <th scope="col" class="list-seller">Status*</th>
                                <th scope="col" class="action sticky-col first-col">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody id="item_data">
                            {{-- {{ csrf_field() }}
                            --}}
                        </tbody>
                    </table>
                    <div class="float-left mt-2">
                        <select class="form-control input-fixed" id="page-length">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                    <div class="paginate float-right mt-2">
                        <button class="btn btn-light" id="previous">
                            Previous
                        </button>
                        <button class="btn btn-secondary" id="currentPage"></button>
                        <button class="btn btn-light" id="next">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Import -->
<div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog" style="width: 1000px; height: 1000px;"" role=" document">
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
                        <br />
                        <input type="file" id="excel_file" />
                        <button type="button" class="btn btn-success btn-xs" id="send" onclick="save_data()">
                            Save
                        </button>
                        <a class="btn btn-secondary btn-xs" href="/download_template_seller"
                            style="color: white">Download Template</a>
                        <div class="mt-2 progress">
                            <div class="
                        progress-bar progress-bar-striped
                        active
                    " role="progressbar" aria-valuemin="0" aria-valuemax="100" style=""></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="excel_data"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer-full-width modal-footer"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            header:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        read();
        currentPage();
    });

    var sellerCodeGet     = {!! json_encode($sellerCodeGet->toArray()) !!};
    var no_aggrementGet   = {!! json_encode($no_aggrementGet->toArray()) !!};

    // -- excel import to html table --
    const excel_file = document.getElementById("excel_file");
    excel_file.addEventListener("change",(event)=> {
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
          reader.onload = function () {
            var data = new Uint8Array(reader.result);
            var work_boox = XLSX.read(data,{type: "array"});
            var sheet_name = work_boox.SheetNames;
            var sheet_data = XLSX.utils.sheet_to_json(
                work_boox.Sheets[sheet_name[0]],
                {header: 1}
            );
            if (sheet_data.length > 0){
                var table_output = '<table class="table table-bordered" id="importTable">';
                for(var row = 0; row < sheet_data.length; row++) {
                  table_output += "<tr>";
                  for (var cell = 0; cell < sheet_data[row].length; cell++) {
                      if (row == 0) {
                          table_output += "<th>" + sheet_data[row][cell] + "</th>";
                      }
                      else {
                        table_output += '<td contenteditable id="table-data-' + cell +'" >' + sheet_data[row][cell] + "</td>";
                      }
                  }
                  table_output += "</tr>";
                }
                table_output += "</table>";
                document.getElementById("excel_data").innerHTML = table_output;
                // check duplicate seller code
                sellerCodeID = document.querySelectorAll("#table-data-1");
                noAgrementLetterID = document.querySelectorAll("#table-data-2");
                for (indexA = 0; indexA < sellerCodeID.length; indexA++) {
                  var sellerCodeNumberValue = sellerCodeID[indexA].innerText;
                  var noAgreementLetterNumberValue = noAgrementLetterID[indexA].innerText;
                  if ( sellerCodeGet[sellerCodeGet.findIndex(x => x.seller_code == sellerCodeNumberValue )] != undefined) {
                    sellerCodeID[indexA].style.backgroundColor = "#e8837d";
                  }
                  if ( no_aggrementGet[no_aggrementGet.findIndex(x => x.no_agreement_letter == noAgreementLetterNumberValue )] != undefined ) {
                    noAgrementLetterID[indexA].style.backgroundColor = "#e8837d";
                  }
                }
                excel_file.value = "";
            };
          };
        }
      }
      var percentage = 0;
      var timer = setInterval(function() {
        percentage = percentage + 20;
        progress_bar_process(percentage, timer);
      }, 1000);
    });

    function progress_bar_process(percentage, timer)
    {
      $('.progress-bar').css('width', percentage + '%');
      if(percentage > 100)
      {
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

    // save data import
    function save_data() {
        var total = 0;
        var jsonTable = $('#importTable tbody tr:has(td)').map(function (){
            var $td = $('td', this);
            total += parseFloat($td.eq(2).text());
            return {
                seller_name         : $td.eq(0).text(),
                seller_code         : $td.eq(1).text(),
                no_agreement_letter : $td.eq(2).text(),
                status              : $td.eq(3).text()
            }
        }).get();

        $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
        data = {};
        data = jsonTable;

        var thLength = $('#importTable th').length;
        var trLength = $("#importTable td").closest("tr").length;
        var item = document.querySelectorAll("#table-data-8");
        var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
        var success;
        $.ajax({
            type: 'POST',
        dataType: 'JSON',
        url: "{{ url('save_import_seller') }}",
        data: {
            data   : JSON.stringify(data) ,
            _token  : '{!! csrf_token() !!}'
        } ,
        error: function(er){
            if(er.responseText === 'fail'){
                swal({
                type: 'warning',
                text: 'Duplicate data or error format',
                showCloseButton: true,
                showConfirmButton: false
                }).catch(function(timeout) { });

            } else {
                try {
                    var percentage = 0;
                    var timer = setInterval(function(){
                    percentage = percentage + 20;
                    progress_bar_process(percentage, timer);
                    }, 1000);
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
      $.get("{{ url('item_data_seller') }}", {}, function(data, status) {
        $('#table_seller').DataTable().destroy();
        $('#table_seller').find("#item_data").html(data);
        $('#table_seller').dataTable( {
            "pageLength": 50,
            "dom": '<"top">rt<"bottom"><"clear">'
        });
        $('#table_seller').DataTable().draw();
      });
    }

    var length = 50;
    $("#page-length").change(function(){
        // numberPaginate = 1;
        length = $(this).val();
        numberPaginate = 1;
        lengthData = parseInt(length);
        // alert(lengthData_

        $.ajax({
        type: "get",
        url: `{{ url('item_data_page_length_Seller') }}`,
        data: {
          no: no - no + 1,
          length: length
        },
        success: function(datas) {
          $('#table_seller').DataTable().destroy();
          $('#table_seller').find("#item_data").html(datas);
          $('#table_seller').dataTable( {
              "pageLength": length,
              "dom": '<"top">rt<"bottom"><"clear">'
              // "dom": '<lf<t>ip>'
              });
          $('#table_seller').DataTable().draw();
          currentPage()
        }
      });
    });

    // ---- reload Table ---
    var lengthData = 50;
    var url =  "{{ url('item_data_seller') }}";
    function reload() {
        enableButton();
    // alert(link)
    var reload = true;
      $.ajax({
        type: "get",
        url: `{{ '${url}' }}`,
        data: {
          no: no - lengthData,
          reload: reload
        },
        success: function(datas) {
          $('#table_seller').DataTable().destroy();
          $('#table_seller').find("#item_data").html(datas);
          $('#table_seller').dataTable( {
              "pageLength": 50,
              "dom": '<"top">rt<"bottom"><"clear">'
            });
          $('#table_seller').DataTable().draw();
          currentPage()
        }
      });
    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
         disableButton();
        $.get("{{ url('add_form_seller') }}", {}, function(data, status) {
          $('#table_seller tbody').prepend(data);
        });
      });
    // ----- Proses Tambah data ------
    function store() {

        var seller_name = $("#seller_name").val();
        var seller_code = $("#seller_code").val();
        var no_agreement_letter = $("#no_agreement_letter").val();
        var status = $("#status").val();

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
        disableButton();
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
                    $(".add").hide();
                    $(".cancel").hide();
                    $(".import").hide();
                    $(".export").hide();

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
        $(".add").show("fast");
        $(".edit_all").show("fast");
        $(".delete_all").show("fast");
        $(".import").show("fast");
        $(".export").show("fast");
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

    // membuat variable link untuk digunakan di fitur paginate
    var link = "{{ url('item_data_seller') }}";
    let numberPaginate = 1;
    $("#next").click(function() {
        if (no > 50 ) {
            numberPaginate += 1;
            $.get(`{{ '${link}?page=${numberPaginate}' }}`, {}, function (data, status) {
                if (data != "") {
                    $.ajax({
                        type: "get",
                        url: `{{ '${link}?page=${numberPaginate}' }}`,
                        data: {
                            no: no,
                            length: length
                        },
                        success: function(datas) {
                            $('#table_seller').DataTable().destroy();
                            $('#table_seller').find("#item_data").html(datas);
                            $('#table_seller').dataTable( {
                                "pageLength": 50,
                                "dom": '<"top">rt<"bottom"><"clear">'
                                });
                            $('#table_seller').DataTable().draw();
                            currentPage()
                            url = `{{ '${link}?page=${numberPaginate}' }}`;
                        }
                    });
                }
                else{
                    // numberPaginate -= 1;
                }
            });
        }
    });

    // previous paginate
    $( "#previous" ).click(function() {
        if (numberPaginate > 1) {
            numberPaginate -= 1;
            $.ajax({
            type: "get",
            url: `{{ '${link}?page=${numberPaginate}' }}`,
            data: {
                no: no - no + 1,
                length : length
            },
            success: function(datas) {
                $('#table_seller').DataTable().destroy();
                $('#table_seller').find("#item_data").html(datas);
                $('#table_seller').dataTable( {
                    "pageLength": 50,
                    "dom": '<"top">rt<"bottom"><"clear">'
                    });
                $('#table_seller').DataTable().draw();
                currentPage();
                url = `{{ '${link}?page=${numberPaginate}' }}`;
            }
            });
        }
    });

    // current Page
    function currentPage(){
        $("#currentPage").text(numberPaginate);
    }

    // Search
    $(document).ready(function() {
        $("#search_form").keyup(function() {
            // alert($(this).val());
            $.ajax({
                type: "get",
                url: `{{ url('item_data_search_Seller') }}`,
                data: {
                    text: $(this).val(),
                },
                success: function(datas) {
                    var link = "{{ url('item_data_search_Seller') }}";
                    numberPaginate = 1;
                    // console.log(datas);
                    $('#table_seller').DataTable().destroy();
                    $('#table_seller').find("#item_data").html(datas);
                    $('#table_seller').dataTable( {
                        "pageLength": 50,
                        "dom": '<"top">rt<"bottom"><"clear">'
                        // "dom": '<lf<t>ip>'
                        });
                    $('#table_seller').DataTable().draw();
                    currentPage()
                }
            });
        });
    })

</script>
@endsection
