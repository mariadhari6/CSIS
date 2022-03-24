
<div class="text-right mt-3" id="selected">
    <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2"
            id="add"></i></button>
    <div class="float-left mr-2">
        <select class="form-control input-fixed" id="filter">
            <option value="{{ url('item_data_all_status') }}">All Status Layanan</option>
            <option value="{{ url('item_data_active') }}">Active</option>
            <option value="{{ url('item_data_inactive') }}">In Active</option>
        </select>
    </div>
    <button type="button" class="btn btn-success float-left mr-2 import" data-toggle="modal" data-target="#importData">
        <b> Import</b>
        <i class="fas fa-file-excel ml-2"></i>
    </button>
    <a href="/export_detail_cust_company/{{ $company->id }}" class="btn btn-success  mr-2 export" data-toggle="tooltip"
        title="Export">
        <i class="fas fa-file-export"></i>
    </a>
    <button class="btn btn-success  mr-2 edit_all" data-toggle="tooltip" title="Edit Selected">
        <i class="fas fa-edit"></i>
    </button>
    <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected"><i
            class="fas fa-trash"></i></button>
</div>

<table class="table table-responsive" id="table_detail_customer">
    <thead>
        <tr>
            <th>
                <label class="form-check-label">
                    <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                    <span class="form-check-sign"></span>
                </label>
            </th>
            <th scope="col">No</th>
            <th style="min-width: 300px;">Company</th>
            <th style="min-width: 130px;">License Plate</th>
            <th style="min-width: 100px;">Vehicle Type</th>
            <th style="min-width: 250px;">PO Number</th>
            <th style="min-width: 130px;">Harga Layanan</th>
            <th style="min-width: 110px;">PO Date</th>
            <th style="min-width: 80px;">Status PO</th>
            <th style="min-width: 160px;">IMEI</th>
            <th style="min-width: 100px;">Merk</th>
            <th style="min-width: 160px;">Type</th>
            <th style="min-width: 160px;">GSM</th>
            <th style="min-width: 100px;">Provider</th>
            <th style="min-width: 50px;">Sensor</th>
            <th style="min-width: 150px;">Pool Name</th>
            <th style="min-width: 160px;">Pool Location</th>
            <th style="min-width: 100px;">Waranty </th>
            <th style="min-width: 80px;">Status Layanan</th>
            <th style="min-width: 100px;">Tanggal Pasang*</th>
            <th style="min-width: 100px;">Tanggal Non Active*</th>
            <th style="min-width: 100px;">Tanggal Reaktivasi GPS*</th>
            <th scope="col" class="action sticky-col first-col">Action</th>
        </tr>
    </thead>
    <tbody id="item_data">
    </tbody>
</table>

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
                        <a class="btn btn-secondary btn-xs" href="/download_template_detailcustomer"
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
    });


    $('#close-modal').click(function() {
        $('#importData').modal('hide');
    });

    var licenseArray  = {!! json_encode($licenseArray) !!};
    var poArray       = {!! json_encode($poArray) !!};
    var imeiArray     = {!! json_encode($imeiArray) !!};
    var gsmArray      = {!! json_encode($gsmArray) !!};
    var sensorArray   = {!! json_encode($sensorArray) !!};
    // console.log(sensorArray);
    var companyName  = {!! json_encode($companyName) !!};

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
                        company_name        = document.querySelectorAll("#table-data-0");
                        license_plate       = document.querySelectorAll("#table-data-1");
                        po_number           = document.querySelectorAll("#table-data-2");
                        imei                = document.querySelectorAll("#table-data-3");
                        gsm_number          = document.querySelectorAll("#table-data-4");
                        sensor              = document.querySelectorAll("#table-data-5");
                        waranty             = document.querySelectorAll("#table-data-6");
                        tanggal_pasang      = document.querySelectorAll("#table-data-8");
                        tanggal_non_aktif   = document.querySelectorAll("#table-data-9");
                        tanggal_reaktifasi  = document.querySelectorAll("#table-data-10");

                        for (indexA = 0; indexA < license_plate.length; indexA++) {
                            var companyValue        = company_name[indexA].innerText;
                            var licenseValue        = license_plate[indexA].innerText;
                            var poValue             = po_number[indexA].innerText;
                            var imeiValue           = imei[indexA].innerText;
                            var gsmValue            = gsm_number[indexA].innerText;
                            var sensorValue         = sensor[indexA].innerText;
                            var explode             = sensorValue.split(',');
                            // console.log(explode);

                            if ( companyName[companyName.findIndex(x => x.company_name == companyValue )] != undefined) {

                                if ( licenseArray[licenseArray.findIndex(x => x.license_plate == licenseValue )] != undefined) {
                                    license_plate[indexA].style.backgroundColor = "#e8837d";
                                }
                                if ( poArray[poArray.findIndex(x => x.po_number == poValue )] != undefined ) {
                                    po_number[indexA].style.backgroundColor = "#e8837d";
                                }

                                if ( imeiArray[imeiArray.findIndex(x => x.imei == imeiValue )] != undefined ) {
                                    imei[indexA].style.backgroundColor = "#e8837d";
                                }

                                if ( gsmArray[gsmArray.findIndex(x => x.gsm_number == gsmValue )] != undefined ) {
                                    gsm_number[indexA].style.backgroundColor = "#e8837d";
                                }

                                for (i = 0; i <  explode.length; i++) {
                                    if ( sensorArray[sensorArray.findIndex(x => x.serial_number == explode[i] )]) {
                                        sensor[indexA].style.backgroundColor = "#e8837d";
                                    }
                                }

                                for (i = 0; i < waranty.length; i++) {
                                    var excelDate = waranty[i].innerText;
                                    if (excelDate == "-") {
                                        waranty[i].style.backgroundColor = "#fffff";

                                    }
                                    else{
                                        var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
                                        try{
                                            var converted_date = date.toISOString().split('T')[0];
                                        }
                                        catch(err) {
                                            waranty[i].style.backgroundColor = "#e8837d";
                                        }
                                        waranty[i].innerHTML = converted_date;
                                    }
                                }

                                for (i = 0; i < tanggal_pasang.length; i++) {
                                    var excelDate = tanggal_pasang[i].innerText;
                                    if (excelDate == "-") {
                                        tanggal_pasang[i].style.backgroundColor = "#fffff";

                                    }
                                    else{
                                        var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
                                        try{
                                            var converted_date = date.toISOString().split('T')[0];
                                        }
                                        catch(err) {
                                            tanggal_pasang[i].style.backgroundColor = "#e8837d";
                                        }
                                        tanggal_pasang[i].innerHTML = converted_date;
                                    }
                                }

                                for (i = 0; i < tanggal_non_aktif.length; i++) {
                                    var excelDate = tanggal_non_aktif[i].innerText;
                                    if (excelDate == "-") {
                                        tanggal_non_aktif[i].style.backgroundColor = "#fffff";
                                    }
                                    else{
                                        var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
                                        try{
                                            var converted_date = date.toISOString().split('T')[0];
                                        }
                                        catch(err) {
                                            tanggal_non_aktif[i].style.backgroundColor = "#e8837d";
                                        }
                                        tanggal_non_aktif[i].innerHTML = converted_date;
                                    }
                                }

                                for (i = 0; i < tanggal_reaktifasi.length; i++) {
                                    var excelDate = tanggal_reaktifasi[i].innerText;
                                    if (excelDate == "-") {
                                        tanggal_reaktifasi[i].style.backgroundColor = "#fffff";
                                    }
                                    else{
                                        var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
                                        try{
                                            var converted_date = date.toISOString().split('T')[0];
                                        }
                                        catch(err) {
                                            tanggal_reaktifasi[i].style.backgroundColor = "#e8837d";
                                        }
                                        tanggal_reaktifasi[i].innerHTML = converted_date;
                                    }
                                }

                                excel_file.value = "";
                            }
                            else{
                                swal({
                                    type: 'warning',
                                    text: 'data error',
                                    showCloseButton: true,
                                    showConfirmButton: false
                                }).catch(function(timeout) { });
                            }
                        }
                    };
                }

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
              title: 'Data import Saved',
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
                company_id          : $td.eq(0).text(),
                license_plate       : $td.eq(1).text(),
                po_id               : $td.eq(2).text(),
                imei                : $td.eq(3).text(),
                gsm_id              : $td.eq(4).text(),
                sensor_all          : $td.eq(5).text(),
                waranty             : $td.eq(6).text(),
                status_id           : $td.eq(7).text(),
                tanggal_pasang      : $td.eq(8).text(),
                tanggal_non_aktif   : $td.eq(9).text(),
                tgl_reaktivasi_gps  : $td.eq(10).text(),
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
        method: 'POST',
        dataType: 'JSON',
        url: "{{ url('save_import_detailcustomer') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        },
        error: function(er) {
          if(er.responseText === 'fail' ){
                swal({
                    type: 'warning',
                    text: 'Duplicate data or error format',
                    showCloseButton: true,
                    showConfirmButton: false
                }).catch(function(timeout) { });
                return false;
          }
          else {
                var percentage = 0;
                var timer = setInterval(function(){
                    percentage = percentage + 20;
                    progress_bar_process(percentage, timer);
                },1000);
            }
        }
    });
    }



    function read() {
        enableButton();

        var id = {{ $company->id }};
        $.get("{{ url('item_detail') }}/" + id , {}, function(data, status) {
            $('#table_detail_customer').DataTable().destroy();
            $('#table_detail_customer').find("#item_data").html(data);
            $('#table_detail_customer').dataTable({
                "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],
                "dom": '<"top"f>rt<"bottom"lp><"clear">'
            });
            $('#table_detail_customer').DataTable().draw();
        });
    }

    function cancel(){
      read();
    }

    $('.add').click(function() {
         disableButton();
        var id = {{ $company->id }};
        $.get("{{ url('add_form_detail') }}/" + id , {}, function(data, status) {
          $('#table_detail_customer tbody').prepend(data);
        });
    });

    $("#TanggalPasang").on({"click": function() {
        $("#TanggalPasang[data-toggle='popover']").popover('hide');
        }
    });

    function store() {
        var CompanyId           = $("#CompanyId").val();
        var LicencePlate        = $("#LicencePlate").val();
        var VihecleType         = $("#VihecleType").val();
        var PoNumber            = $("#PoNumber").val();
        var HargaLayanan        = $("#HargaLayanan").val();
        var PoDate              = $("#PoDate").val();
        var StatusPo            = $("#StatusPo").val();
        var Imei                = $("#Imei").val();
        var Merk                = $("#Merk").val();
        var Type                = $("#Type").val();
        var GSM                 = $("#GSM").val();
        var Provider            = $("#Provider").val();
        var SensorAll           = $("#SensorAll").val();
        var PoolName            = $("#PoolName").val();
        var PoolLocation        = $("#PoolLocation").val();
        var Waranty             = $("#Waranty").val();
        var StatusLayanan       = $("#StatusLayanan").val();
        var TanggalPasang       = $("#TanggalPasang").val();
        var TanggalNonAktif     = $("#TanggalNonAktif").val();
        var TanggalReaktivasi   = $("#TanggalReaktivasi").val();

        if (TanggalPasang == "") {
            $("#TanggalPasang[data-toggle='popover']").popover('show');
            return false;
        }
        else{
            $("#TanggalPasang[data-toggle='popover']").popover('hide');
        }

        $.ajax({
            type: "get",
            url: "{{ url('store_detail')}}",
            data: {
                CompanyId           : CompanyId,
                LicencePlate        : LicencePlate,
                VihecleType         : VihecleType,
                PoNumber            : PoNumber,
                HargaLayanan        : HargaLayanan,
                PoDate              : PoDate,
                StatusPo            : StatusPo,
                Imei                : Imei,
                Merk                : Merk,
                Type                : Type,
                GSM                 : GSM,
                Provider            : Provider,
                SensorAll           : SensorAll,
                PoolName            : PoolName,
                PoolLocation        : PoolLocation,
                Waranty             : Waranty,
                StatusLayanan       : StatusLayanan,
                TanggalPasang       : TanggalPasang,
                TanggalNonAktif     : TanggalNonAktif,
                TanggalReaktivasi   : TanggalReaktivasi
            },
            success: function(data){
                swal({
                    type: 'success',
                    title: 'Data Saved',
                    showConfirmButton: false,
                    timer: 2000
                }).catch(function(timeout){ })
                    read();
            }
        });
    }



    function destroy(id){

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
                        url: "{{ url('destroy_detail') }}/" + id,
                        data: "id=" + id,
                        success: function(data) {
                            swal({
                                type: 'success',
                                title: 'Data Deleted',
                                showConfirmButton: false,
                                timer: 1500
                            }).catch(function(timeout) { })
                            read();
                        }
                    });
                    });
                },
                allowOutsideClick: false
            });
    }

    function edit(id){
        disableButton();
        var id = id;
        var company = {{ $company->id }}

        $("#td-checkbox-"+id).hide("fast");
        $("#td-button-"+id).hide("fast");
        $("#item-no-"+id).hide("fast");
        $("#item-CompanyId-"+id).hide("fast");
        $("#item-LicencePlate-"+id).hide("fast");
        $("#item-VihecleType-"+id).hide("fast");
        $("#item-PoNumber-"+id).hide("fast");
        $("#item-HargaLayanan-"+id).hide("fast");
        $("#item-PoDate-"+id).hide("fast");
        $("#item-StatusPo-"+id).hide("fast");
        $("#item-Imei-"+id).hide("fast");
        $("#item-Merk-"+id).hide("fast");
        $("#item-Type-"+id).hide("fast");
        $("#item-GSM-"+id).hide("fast");
        $("#item-Provider-"+id).hide("fast");
        $("#item-SensorAll-"+id).hide("fast");
        $("#item-PoolName-"+id).hide("fast");
        $("#item-PoolLocation-"+id).hide("fast");
        $("#item-Waranty-"+id).hide("fast");
        $("#item-StatusLayanan-"+id).hide("fast");
        $("#item-TanggalPasang-"+id).hide("fast");
        $("#item-TanggalNonAktif-"+id).hide("fast");
        $("#item-TanggalReaktivasi-"+id).hide("fast");

        $.ajax({
            url:"{{ url('/show_detail')}}/" + id,
            data:{
            company : company,
            },
            success: function(data, status){
                $("#edit-form-"+id).prepend(data)
            }
        });
        return true;
    }

    function update(id){

        var id = id;
        var CompanyId           = $("#CompanyId").val();
        var LicencePlate        = $("#LicencePlate").val();
        var VihecleType         = $("#VihecleType").val();
        var PoNumber            = $("#PoNumber").val();
        var HargaLayanan        = $("#HargaLayanan").val();
        var PoDate              = $("#PoDate").val();
        var StatusPo            = $("#StatusPo").val();
        var Imei                = $("#Imei").val();
        var Merk                = $("#Merk").val();
        var Type                = $("#Type").val();
        var GSM                 = $("#GSM").val();
        var Provider            = $("#Provider").val();
        var SensorAll           = $("#SensorAll").val();
        var PoolName            = $("#PoolName").val();
        var PoolLocation        = $("#PoolLocation").val();
        var Waranty             = $("#Waranty").val();
        var StatusLayanan       = $("#StatusLayanan").val();
        var TanggalPasang       = $("#TanggalPasang").val();
        var TanggalNonAktif     = $("#TanggalNonAktif").val();
        var TanggalReaktivasi   = $("#TanggalReaktivasi").val();

        if (StatusLayanan == "2") {
            if (TanggalNonAktif == "") {
                $("#TanggalNonAktif[data-toggle='popover']").popover('show');
                return false ;
            }
            else{
                $("#TanggalNonAktif[data-toggle='popover']").popover('hide');
            }
        }else if(StatusLayanan == "1"){
            if(TanggalNonAktif != ""){
                if (TanggalReaktivasi == "") {
                    $("#TanggalReaktivasi[data-toggle='popover']").popover('show');
                    return false;
                }
                else{
                    $("#TanggalReaktivasi[data-toggle='popover']").popover('hide');
                }
            }
        }

        $.ajax({

            type: "get",
            url: "{{ url('update_detail') }}/"+id,
            data: {
            CompanyId           : CompanyId,
            LicencePlate        : LicencePlate,
            VihecleType         : VihecleType,
            PoNumber            : PoNumber,
            HargaLayanan        : HargaLayanan,
            PoDate              : PoDate,
            StatusPo            : StatusPo,
            Imei                : Imei,
            Merk                : Merk,
            Type                : Type,
            GSM                 : GSM,
            Provider            : Provider,
            SensorAll           : SensorAll,
            PoolName            : PoolName,
            PoolLocation        : PoolLocation,
            Waranty             : Waranty,
            StatusLayanan       : StatusLayanan,
            TanggalPasang       : TanggalPasang,
            TanggalNonAktif     : TanggalNonAktif,
            TanggalReaktivasi   : TanggalReaktivasi
            },
            success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { })
                    read();
            }

        });
    }

    $('#master').on('click', function(e) {

        if ($(this).is(':checked',true) ) {
            $(".task-select").prop('checked', true)
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
                            url: "{{ url('selectedDelete_detail') }}",
                            method: "GET",
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
                                }).catch(function(timeout) { })
                                    $("#master").prop('checked', false);
                                read();
                            }
                        });
                    });
                },
                allowOutsideClick: false
            });
        }
        else{
            alert('Select the row you want to delete')
        }
    });


    $('.edit_all').on('click', function(e){
        disableButton();
        $('[data-toggle="tooltip"]').tooltip("hide");
        var company = {{ $company->id }}

        var allVals = [];
        var _token = $('input[name="_token"]').val();

        $(".task-select:checked").each(function() {
            allVals.push($(this).attr("id"));
        });

        if (allVals.length > 0) {

            $(".edit_all").hide("fast");
            $(".delete_all").hide("fast");
            $.get("{{ url('selected_detail') }}", {}, function(data, status) {
                $("#selected").prepend(data)

            });

            $.each(allVals, function(index, value) {

                $("#td-checkbox-"+value).hide("fast");
                $("#td-button-"+value).hide("fast");
                $("#item-no-"+value).hide("fast");
                $("#item-CompanyId-"+value).hide("fast");
                $("#item-LicencePlate-"+value).hide("fast");
                $("#item-VihecleType-"+value).hide("fast");
                $("#item-PoNumber-"+value).hide("fast");
                $("#item-HargaLayanan-"+value).hide("fast");
                $("#item-PoDate-"+value).hide("fast");
                $("#item-StatusPo-"+value).hide("fast");
                $("#item-Imei-"+value).hide("fast");
                $("#item-Merk-"+value).hide("fast");
                $("#item-Type-"+value).hide("fast");
                $("#item-GSM-"+value).hide("fast");
                $("#item-Provider-"+value).hide("fast");
                $("#item-SensorAll-"+value).hide("fast");
                $("#item-PoolName-"+value).hide("fast");
                $("#item-PoolLocation-"+value).hide("fast");
                $("#item-Waranty-"+value).hide("fast");
                $("#item-StatusLayanan-"+value).hide("fast");
                $("#item-TanggalPasang-"+value).hide("fast");
                $("#item-TanggalNonAktif-"+value).hide("fast");
                $(".add").hide("fast");
                $.ajax({
                    url:"{{ url('/show_detail')}}/" + value,
                    data:{
                    company : company,
                    },
                    success: function(data, status){
                        $("#edit-form-"+value).prepend(data)
                         $(".add").hide();
                        $(".cancel").hide();
                        $(".export").hide();
                    }
                });
            });
        }
        else{
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
                    var CompanyId           = $(".CompanyId-"+ value).val();
                    var LicencePlate        = $(".LicencePlate-"+ value).val();
                    var VihecleType         = $(".VihecleType-"+ value).val();
                    var PoNumber            = $(".PoNumber-"+ value).val();
                    var HargaLayanan        = $(".HargaLayanan-"+ value).val();
                    var PoDate              = $(".PoDate-"+ value).val();
                    var StatusPo            = $(".StatusPo-"+ value).val();
                    var Imei                = $(".Imei-"+ value).val();
                    var Merk                = $(".Merk-"+ value).val();
                    var Type                = $(".Type-"+ value).val();
                    var GSM                 = $(".GSM-"+ value).val();
                    var Provider            = $(".Provider-"+ value).val();
                    var SensorAll           = $(".SensorAll-"+ value).val();
                    var PoolName            = $(".PoolName-"+ value).val();
                    var PoolLocation        = $(".PoolLocation-"+ value).val();
                    var Waranty             = $(".Waranty-"+ value).val();
                    var StatusLayanan       = $(".StatusLayanan-"+ value).val();
                    var TanggalPasang       = $(".TanggalPasang-"+ value).val();
                    var TanggalNonAktif     = $(".TanggalNonAktif-"+ value).val();
                    var TanggalReaktivasi   = $(".TanggalReaktivitas-"+ value).val();
                    $.ajax({
                        type: "get",
                        url: "{{ url('update_detail') }}/"+value,
                        data: {
                            CompanyId           : CompanyId,
                            LicencePlate        : LicencePlate,
                            VihecleType         : VihecleType,
                            PoNumber            : PoNumber,
                            HargaLayanan        : HargaLayanan,
                            PoDate              : PoDate,
                            StatusPo            : StatusPo,
                            Imei                : Imei,
                            Merk                : Merk,
                            Type                : Type,
                            GSM                 : GSM,
                            Provider            : Provider,
                            SensorAll           : SensorAll,
                            PoolName            : PoolName,
                            PoolLocation        : PoolLocation,
                            Waranty             : Waranty,
                            StatusLayanan       : StatusLayanan,
                            TanggalPasang       : TanggalPasang,
                            TanggalNonAktif     : TanggalNonAktif,
                            TanggalReaktivasi   : TanggalReaktivasi
                        },
                        success: function(data) {
                            swal({
                                type: 'success',
                                title: 'The selected data has been updated',
                                showConfirmButton: false,
                                timer: 1500
                            }).catch(function(timeout) {});
                            $(".add").show("fast");
                            $(".edit_all").show("fast");
                            $(".delete_all").show("fast");
                            $(".export").show("fast");
                            $(".btn-round").hide("fast");
                            $(".btn-round").hide("fast");
                            read();
                        }
                    });
                });
            });
    }

     function cancelUpdateSelected(){
            $("#save-selected").hide("fast");
            $("#cancel-selected").hide("fast");
            $(".add").show("fast");
            $(".edit_all").show("fast");
            $(".delete_all").show("fast");
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


    $("#filter").change(function(){
            var id = {{ $company->id }};
            var value = $(this).val();
            var url  = value+"/"+id
            // alert(value+"/"+id);
            filter(url)

    });

    function filter(url){
      var url = url;
      $.get(url, {}, function(data, status) {
        $('#table_detail_customer').DataTable().destroy();
            $('#table_detail_customer').find("#item_data").html(data);
            $('#table_detail_customer').dataTable({
                "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],
                "dom": '<"top"f>rt<"bottom"lp><"clear">'
            });
            $('#table_detail_customer').DataTable().draw();
        });
    }

</script>

