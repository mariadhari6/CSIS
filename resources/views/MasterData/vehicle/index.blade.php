@extends('layouts.v_main')
@section('title','Master Vehicle')
@section('title-table','Master Vehicle')
@section('master','show')
@section('Vehicle','active')

@section('content')
<form onsubmit="return false">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-right" id="selected">
                        <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i
                                class="fas fa-plus ml-2" id="add"></i></button>
                        <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal"
                            data-target="#importData">
                            <b> Import</b>
                            <i class="fas fa-file-excel ml-2"></i>
                        </button>
                        {{-- buat form pencarian --}}
                        <input type="text" placeholder="Search.." id="search_form">
                        <a href="/export_vehicle" class="btn btn-success  mr-2 export" data-toggle="tooltip"
                            title="Export Data">
                            <i class="fas fa-file-export"></i>
                        </a>
                        <button class="btn btn-success  mr-2 edit_all" data-toggle="tooltip" title="Edit Selected"> <i
                                class="fas fa-edit"></i></button>
                        <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected"><i
                                class="fas fa-trash"></i></button>
                    </div>
                    <table class="table table-responsive data" class="table_id" id="table_id">
                        <thead>
                            <tr>
                                <th>
                                    <div>
                                        <label class="form-check-label">
                                            <input class="form-check-input  select-all-checkbox" type="checkbox"
                                                id="master">
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                </th>
                                <th scope="col" class="action">No.</th>
                                <th scope="col" class="list-company">Company Name*</th>
                                <th scope="col" class="list">License Plate*</th>
                                <th scope="col" class="list">Vehicle Type*</th>
                                <th scope="col" class="list">Pool Name*</th>
                                <th scope="col" class="list">Pool Location*</th>
                                <th scope="col" class="list">Status*</th>
                                <th scope="col" class="action sticky-col first-col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="item_data">
                            {{-- {{ csrf_field() }} --}}
                        </tbody>
                    </table>
                    <div class="float-left mt-2">
                        <select class="form-control input-fixed" id="page-length">
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="1000">1000</option>
                            {{-- <option value="all">All</option> --}}
                        </select>
                    </div>
                    {{-- memposisikan page paling kiri --}}
                    <div class="paginate float-right mt-2">
                        {{-- membuat tombol data sebelumnya --}}
                        <button class="btn btn-light" id="previous">Previous</button>
                        {{-- membuat penomoran page --}}
                        <button class="btn btn-secondary" id="currentPage"></button>
                        {{-- membuat tombol data selanjutnya --}}
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
                        <br>
                        <input type="file" id="excel_file" />
                        <button type="button" class="btn btn-success btn-xs" id="send"
                            onclick="save_data()">Save</button>
                        <a class="btn btn-secondary btn-xs" href="/download_template_MasterVehicle"
                            style="color:white">Download Template</a>
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
        currentPage();
    });

    var vehicleLicenseGet = {!! json_encode($vehicleLicenseGet->toArray()) !!};
    const excel_file = document.getElementById("excel_file");
    excel_file.addEventListener("change",(event)=> {
        function progress_bar_process(percentage, timer) {
            $('.progress-bar').css('width', percentage + '%');
            if(percentage > 100) {
                clearInterval(timer);
                $('#process').css('display', 'none');
                $('.progress-bar').css('width', '0%');
                if(
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
                    var work_book = XLSX.read(data,{type: "array"});
                    var sheet_name = work_book.SheetNames;
                    var sheet_data = XLSX.utils.sheet_to_json(
                        work_book.Sheets[sheet_name[0]],
                        {header: 1}
                    );

                    if (sheet_data.length > 0){
                        var table_output = '<table class="table table-bordered" id="importTable">';
                        for(var row = 0; row < sheet_data.length; row++) {
                            table_output += "<tr>";
                            for (var cell = 0; cell < sheet_data[row].length; cell++){
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
                        lisencePlateNumber = document.querySelectorAll("#table-data-1");
                        for(indexA = 0; indexA < lisencePlateNumber.length; indexA++) {
                            var licensePlateValue = lisencePlateNumber[indexA].innerText;
                            if (vehicleLicenseGet[vehicleLicenseGet.findIndex(x => x.license_plate == licensePlateValue )] != undefined) {
                                lisencePlateNumber[indexA].style.backgroundColor = "#e8837d";
                            }
                        }
                        excel_file.value = "";
                    }
                };
            }
        }
        var percentage = 0;
        var timer = setInterval(function(){
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
            return {
                company_id    : $td.eq(0).text(),
                license_plate : $td.eq(1).text(),
                vehicle_id    : $td.eq(2).text(),
                pool_name     : $td.eq(3).text(),
                pool_location : $td.eq(4).text(),
                status        : $td.eq(5).text(),
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
            url: "{{ url('save_import_MasterVehicle') }}",
            data: {
                data   : JSON.stringify(data) ,
                _token  : '{!! csrf_token() !!}'
            } ,
            error: function(er) {
                if(er.responseText === 'fail' ) {
                    swal({
                        type: 'warning',
                        text: 'Duplicate data or error format',
                        showCloseButton: true,
                        showConfirmButton: false
                    }).catch(function(timeout) { });
                }
                else {
                    try {
                        swal({
                            type: 'success',
                            title: 'Data Saved',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                        read();
                        $('#importData').modal('hide');
                    }
                    catch (error) {
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
        $('#importData').modal('hide');
    });

    // ------ Tampil Data ------
    function read() {
        enableButton();
        $.get("{{ url('item_data_vehicle') }}", {}, function(data, status) {
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(data);
            $('#table_id').dataTable( {
                "pageLength": 50,
                "dom": '<"top">rt<"bottom"><"clear">'
                });
            $('#table_id').DataTable().draw();
        });
    }

    // pageLength
    var length = 50;
    $("#page-length").change(function(){
        length = $(this).val();
        numberPaginate = 1;
        lengthData = parseInt(length);
        $.ajax({
            type: "get",
            url: `{{ url('item_data_page_length_Vehicle') }}`,
            data: {
                no: no - no + 1,
                length: length
            },
            success: function(datas) {
                $('#table_id').DataTable().destroy();
                $('#table_id').find("#item_data").html(datas);
                $('#table_id').dataTable( {
                    "pageLength": length,
                    "dom": '<"top">rt<"bottom"><"clear">'
                    });
                $('#table_id').DataTable().draw();
                currentPage()
            }
        });
    });

    // ---- reload Table ---
    var lengthData = 50;
    var url =  "{{ url('item_data_vehicle') }}";
    function reload() {
        enableButton();
        var reload = true;
        $.ajax({
            type: "get",
            url: `{{ '${url}' }}`,
            data: {
                no: no - lengthData,
                reload: reload
            },
            success: function(datas) {
                $('#table_id').DataTable().destroy();
                $('#table_id').find("#item_data").html(datas);
                $('#table_id').dataTable( {
                    "pageLength": 50,
                    "dom": '<"top">rt<"bottom"><"clear">'
                });
                $('#table_id').DataTable().draw();
                currentPage();
            }
        });
    }

    // Paginate --------
    var link = "{{ url('item_data_vehicle') }}";
    let numberPaginate = 1;
    $( "#next" ).click(function() {
        if (no > 50) {
            numberPaginate += 1;
            $.get(`{{ '${link}?page=${numberPaginate}' }}` , {}, function(data, status) {
                if(data != "") {
                    $.ajax({
                        type: "get",
                        url: `{{ '${link}?page=${numberPaginate}' }}`,
                        data: {
                            no: no,
                            length: length
                        },
                        success: function(datas) {
                            $('#table_id').DataTable().destroy();
                            $('#table_id').find("#item_data").html(datas);
                            $('#table_id').dataTable( {
                                "pageLength": length,
                                "dom": '<"top">rt<"bottom"><"clear">'
                                });
                            $('#table_id').DataTable().draw();
                            currentPage();
                            url = `{{ '${link}?page=${numberPaginate}' }}`;
                        }
                    });
                }
                else {
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
                    length: length
                },
                success: function(datas) {
                    $('#table_id').DataTable().destroy();
                    $('#table_id').find("#item_data").html(datas);
                    $('#table_id').dataTable( {
                        "pageLength": length,
                        "dom": '<"top">rt<"bottom"><"clear">'
                    });
                    $('#table_id').DataTable().draw();
                    currentPage()
                    url = `{{ '${link}?page=${numberPaginate}' }}`;
                }
            });
        }
    });

    // Search
    $(document).ready(function() {
        $("#search_form").keyup(function() {
            $.ajax({
                type: "get",
                url: `{{ url('item_data_search_Vehicle') }}`,
                data: {
                    text: $(this).val(),
                },
                success: function(datas) {
                    var link = "{{ url('item_data_search_Vehicle') }}";
                    numberPaginate = 1;
                    $('#table_id').DataTable().destroy();
                    $('#table_id').find("#item_data").html(datas);
                    $('#table_id').dataTable( {
                        "pageLength": 50,
                        "dom": '<"top">rt<"bottom"><"clear">'
                    });
                    $('#table_id').DataTable().draw();
                    currentPage()
                }
            });
        });
    })

    // current Page
    function currentPage(){
        $("#currentPage").text(numberPaginate);
    }

    function cancel() {
      read();
    }

    $('.add').click(function() {
        disableButton();
        $.get("{{ url('add_form_vehicle') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
    });

    function store() {
        $success = false;
        var company_id      = $("#company_id").val();
        var license_plate   = $("#license_plate").val();
        var vehicle_id      = $("#vehicle_id").val();
        var pool_name       = $("#pool_name").val();
        var pool_location   = $("#pool_location").val();
        var status          = $("#status").val();
        $rowCount = $("#table_id tr").length;
        if ($rowCount == 2) {

        }
        else {
            $rowResult = $rowCount - 2;
            var alllicense_plateNum = [];
            for($i = 1; $i <= $rowResult; $i++) {
                $numArr = $i-1;
                $license_plateNum = $("#table_id").find("tbody>tr:eq(1)>td:eq(3)").attr("name");
                alllicense_plateNum[$numArr] = $license_plateNum;
            }
            for (let index = 0; index < alllicense_plateNum.length; index++) {
                if( license_plate == alllicense_plateNum[index] ) {
                    swal({
                        type: 'warning',
                        text: 'license_plate Number already exists',
                        showConfirmButton: false,
                        timer: 1500
                    }).catch(function(timeout) { });
                    break;
                }
                else {
                    $success = true;
                    break;
                }
            }
        }

        if($success === true) {
            $.ajax({
                type: "get",
                url: "{{ url('store_vehicle') }}",
                data: {
                company_id    : company_id,
                license_plate : license_plate,
                vehicle_id    : vehicle_id,
                pool_name     : pool_name,
                pool_location : pool_location,
                status        : status
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
            });
        }
    }

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
                    url: "{{ url('destroy_vehicle') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                        reload();
                    }
                });
              });
            },
            allowOutsideClick: false
      });
    }

    function edit(id) {

        disableButton();
        var id = id;
        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).slideUp("fast");
        $("#item-no-"+id).slideUp("fast");
        $("#item-company_id-"+id).slideUp("fast");
        $("#item-license_plate-"+id).slideUp("fast");
        $("#item-vehicle_id-"+id).slideUp("fast");
        $("#item-pool_name-"+id).slideUp("fast");
        $("#item-pool_location-"+id).slideUp("fast");
        $("#item-status-"+id).slideUp("fast");
        $.get("{{ url('show_vehicle') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    function update(id) {

        var company_id      = $("#company_id").val();
        var license_plate   = $("#license_plate").val();
        var vehicle_id      = $("#vehicle_id").val();
        var pool_name       = $("#pool_name").val();
        var pool_location   = $("#pool_location").val();
        var status          = $("#status").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update_vehicle') }}/"+id,
            data: {
              company_id    :   company_id,
              license_plate :   license_plate,
              vehicle_id    :   vehicle_id,
              pool_name     :   pool_name,
              pool_location :   pool_location,
              status        :   status
            },
            success: function(data) {
              swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                reload();
            }
        });
    }

    $('#master').on('click', function(e) {
        if($(this).is(':checked',true)) {
            $(".task-select").prop('checked', true);
        }
        else {
            $(".task-select").prop('checked',false);
        }
    });

    $('.delete_all').on('click', function() {

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
                        url: "{{ url('/selectedDelete_vehicle') }}",
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
                            reload();
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

    //form edit all
    $('.edit_all').on('click', function(e){
        disableButton();
        $('[data-toggle="tooltip"]').tooltip("hide");
        var allVals = [];
        var _token = $('input[name="_token"]').val();
        $(".task-select:checked").each(function() {
            allVals.push($(this).attr("id"));
        });
        if (allVals.length > 0){

            $(".edit_all").hide("fast");
            $(".delete_all").hide("fast");
            $.get("{{ url('selected_vehicle') }}", {}, function(data, status) {
                $("#selected").prepend(data)
            });
            $.each(allVals, function(index, value){
                $("#td-checkbox-"+value).hide("fast");
                $("#td-button-"+value).hide("fast");
                $("#item-no-"+value).hide("fast");
                $("#item-company_id-"+value).slideUp("fast");
                $("#item-license_plate-"+value).slideUp("fast");
                $("#item-vehicle_id-"+value).slideUp("fast");
                $("#item-pool_name-"+value).slideUp("fast");
                $("#item-pool_location-"+value).slideUp("fast");
                $("#item-status-"+value).slideUp("fast");
                $(".add").hide("fast");
                $.get("{{ url('show_vehicle') }}/" + value, {}, function(data, status) {
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
                var company_id      = $(".company_id-"+value).val();
                var license_plate   = $(".license_plate-"+value).val();
                var vehicle_id      = $(".vehicle_id-"+value).val();
                var pool_name       = $(".pool_name-"+value).val();
                var pool_location   = $(".pool_location-"+value).val();
                var status          = $(".status-"+value).val();
                $.ajax({
                    type: "get",
                    url: "{{ url('update_vehicle') }}/"+value,
                    data: {
                        company_id      : company_id,
                        license_plate   : license_plate,
                        vehicle_id      : vehicle_id,
                        pool_name       : pool_name ,
                        pool_location   : pool_location,
                        status          : status
                    },
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'The selected data has been updated',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        reload();
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

</script>
@endsection
