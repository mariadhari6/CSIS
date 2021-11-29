<<<<<<< HEAD
<div class="title">
    <strong> {{ $company->company_name }}</strong>  
</div>
    <div class="text-right mt-3" id="selected">
        <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
        <button class="btn btn-success  mr-2 edit_all">
            <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-danger  delete_all"><i class="fas fa-trash"></i></button>
    </div>

    <table class="table table-responsive" id="table_id">
=======

    <div class="text-right mt-3" id="selected">
        <button type="button" class="btn btn-primary float-left mr-2 add add-button"><b>Add</b><i class="fas fa-plus ml-2" id="add"></i></button>
        <div class="float-left mr-2">
            <select class="form-control input-fixed" id="filter">
                <option value="{{ url('item_data_all_status') }}">All Status Layanan</option>
                <option value="{{ url('item_data_active') }}">Active</option>
                <option value="{{ url('item_data_inactive') }}">In Active</option>
            </select>
        </div>
        <a href="/export_detail_cust_company/{{ $company->id }}" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
            <i class="fas fa-file-export"></i>
        </a>
        <button class="btn btn-success  mr-2 edit_all" data-toggle="tooltip" title="Edit Selected">
            <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-danger  delete_all" data-toggle="tooltip" title="Delete Selected"><i class="fas fa-trash"></i></button>
    </div>

    <table class="table table-responsive" id="table_detail_customer">
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
        <tbody  id="item_data">      
        </tbody>
    </table>


<script>

    $(document).ready(function() {
        read();
    });

    function read() {
<<<<<<< HEAD
        var id = {{ $company->id }}; 
        $.get("{{ url('item_detail') }}/" + id , {}, function(data, status) {
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(data);
            $('#table_id').dataTable({
                "lengthMenu": [[50, 100, 1000, -1], [50, 100, 1000, "All"]],
                "dom": '<"top"f>rt<"bottom"lp><"clear">'
            });
            $('#table_id').DataTable().draw();
        }); 
=======
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
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
    }

    function cancel(){
      read();
    }

    $('.add').click(function() {
<<<<<<< HEAD

        var id = {{ $company->id }}; 
=======
         disableButton();
        var id = {{ $company->id }};
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
        $.get("{{ url('add_form_detail') }}/" + id , {}, function(data, status) {
          $('#table_detail_customer tbody').prepend(data);
        });
    });

    $("#TanggalPasang").on({"click": function() {
<<<<<<< HEAD
        $("#TanggalPasang[data-toggle='popover']").popover('hide');  
=======
        $("#TanggalPasang[data-toggle='popover']").popover('hide');
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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

<<<<<<< HEAD
        if (TanggalPasang == "") {   
            $("#TanggalPasang[data-toggle='popover']").popover('show');
            return false; 
=======
        if (TanggalPasang == "") {
            $("#TanggalPasang[data-toggle='popover']").popover('show');
            return false;
        }
        else{
            $("#TanggalPasang[data-toggle='popover']").popover('hide');
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD
            }                
=======
            }
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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

<<<<<<< HEAD
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

=======
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

>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD


    $('.edit_all').on('click', function(e){

=======


    $('.edit_all').on('click', function(e){
        disableButton();
        $('[data-toggle="tooltip"]').tooltip("hide");
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD
                $.ajax({ 
                    url:"{{ url('/show_detail')}}/" + value,
                    data:{
                    company : company,
                    }, 
                    success: function(data, status){
                        $("#edit-form-"+value).prepend(data)
                    }                
=======
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
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD
                            }).catch(function(timeout) {});    
                            $(".save").hide("fast");
                            $(".cancel").hide("fast");
=======
                            }).catch(function(timeout) {});
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54
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
<<<<<<< HEAD
=======

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
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54

    function batal() {
        $(".save").hide("fast");
        $(".cancel").hide("fast");
        $(".add").show("fast");
        $(".edit_all").show("fast");
        $(".delete_all").show("fast");
        read();
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

