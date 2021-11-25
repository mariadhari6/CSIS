@extends('layouts.v_main')
@section('title','Detail Customer')
@section('title-table', 'Detail Customer')

@section('content')

<div class="col-sm-5">
    <div class="input-group mb-3">
        <div class="input-group-prepend" >
        <label class="input-group-text">Company</label>
        </div>
        <select class="form-control selectpicker" id="list-company" data-live-search="true">
            <option style="display: none"></option>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
            @endforeach
        </select>
        <a href="/export_detail_customer" class="btn btn-success  mr-2 export" data-toggle="tooltip" title="Export">
            <i class="fas fa-file-export"></i>
        </a>
    </div>

</div>

{{-- <div class="dropdown mb-3">
    <button class="btn btn-warning btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Company
    </button>
    <a href="/export_detail_customer" class="btn btn-success  mr-2">
                <i class="fas fa-file-export"></i>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="list-company">
        @foreach ($data as $item)
            <a class="dropdown-item" href="#" id="{{ $item->id }}">{{ $item->company_name }}</a>
        @endforeach
    </div>
  </div> --}}

    {{-- <div class="mb-3">
        <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text">Company</div>
        </div>
        <select class="form-control" id="filter-company">
            <option value=""></option>
            @foreach ($data as $item)
            <option value="{{ $item->id }}"> {{ $item->company_name}}</option>
            @endforeach
        </select>
        </div>
    </div> --}}
    <div class="card detail-content">
        <div class="card-body">
            <h5 class="card-title">Pilih Company</h5>
                <p class="card-text" id="ajax-content"></p>
        </div>
    </div>

    {{-- import --}}
{{--
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
              <a  class="btn btn-secondary btn-xs" href="/download_tamplate_detail_Customer" style="color:white">Download Template</a>
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
	</div> --}}

  <script>

    $(document).ready(function() {

        $('#list-company').change(function(){

        var Id = $(this).val();
        $(".card").removeClass('detail-content');
        $("#ajax-content").empty();
        $("#list-company a").removeClass('current');
        $("h5").remove();
        $(this).addClass('current');

        $.ajax({ url:"{{ url('/detail')}}/" + Id, success: function(html)
            {
                $("#ajax-content").empty().append(html);
            }

        });
        return true;
        });


    });

    // $(document).ready(function() {
    //     $.ajaxSetup({
    //         headers: {
    //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //   read()
    // });

    // const excel_file = document.getElementById("excel_file");
    // excel_file.addEventListener("change",(event)=>{
    //     if(
    //         ![
    //             "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    //             "application/vnd.ms-excel",
    //         ].includes(event.target.files[0].type)
    //     ) {
    //         document.getElementById("excel_data").innerHTML =
    //         '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';
    //         excel_file.value = "";
    //         return false;
    //     }
    //     var reader = new FileReader();
    //     reader.readAsArrayBuffer(event.target.files[0]);
    //     reader.onload = function (event) {
    //         var data = new Uint8Array(reader.result);
    //         var work_book = XLSX.read(data,{type: "array"});
    //         var sheet_name = work_book.SheetNames;
    //         var sheet_data = XLSX.utils.sheet_to_json(
    //             work_book.Sheets[sheet_name[0]],
    //             {header: 1}
    //         );
    //                 if (sheet_data.length > 0){
    //                     var table_output = '<table class="table table-bordered" id="importTable">';
    //                     for(var row = 0; row < sheet_data.length; row++) {
    //                         table_output += "<tr>";

    //                         for (var cell = 0; cell < sheet_data[row].length; cell++){
    //                             if (row == 0) {
    //                                 table_output += "<th>" + sheet_data[row][cell] + "</th>";

    //                             } else {
    //                                 table_output += '<td contenteditable id="table-data-' + cell +'" >' + sheet_data[row][cell] + "</td>";
    //                             }
    //                         }
    //                         table_output += "</tr>";
    //                     }
    //                     table_output += "</table>";

    //                     document.getElementById("excel_data").innerHTML = table_output;

    //                     //check duplicate data
    //                      // change PO Date format
    //                      warantyDate = document.querySelectorAll("#table-data-15");
    //                         for (i = 0; i < warantyDate.length; i++) {
    //                             var excelDate = warantyDate[i].innerText;
    //                             var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
    //                             try{
    //                                 var converted_date = date.toISOString().split('T')[0];
    //                             }
    //                             catch(err) {
    //                                 warantyDate[i].style.backgroundColor = "#e8837d";
    //                             }
    //                             warantyDate[i].innerHTML = converted_date;
    //                         }
    //                      }


    //                      tanggalPasang = document.querySelectorAll("#table-data-17");
    //                         for (i = 0; i < tanggalPasang.length; i++) {
    //                             var excelDate = tanggalPasang[i].innerText;
    //                             var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
    //                             try{
    //                                 var converted_date = date.toISOString().split('T')[0];
    //                             }
    //                             catch(err) {
    //                                 tanggalPasang[i].style.backgroundColor = "#e8837d";
    //                             }
    //                             tanggalPasang[i].innerHTML = converted_date;
    //                         }
    //                      }

    //                      tanggalNonAktif = document.querySelectorAll("#table-data-18");
    //                         for (i = 0; i < tanggalNonAktif.length; i++) {
    //                             var excelDate = tanggalNonAktif[i].innerText;
    //                             var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
    //                             try{
    //                                 var converted_date = date.toISOString().split('T')[0];
    //                             }
    //                             catch(err) {
    //                                 tanggalNonAktif[i].style.backgroundColor = "#e8837d";
    //                             }
    //                             tanggalNonAktif[i].innerHTML = converted_date;
    //                         }
    //                      }

    //                       tanggalReaktivasi = document.querySelectorAll("#table-data-19");
    //                         for (i = 0; i < tanggalReaktivasi.length; i++) {
    //                             var excelDate = tanggalReaktivasi[i].innerText;
    //                             var date = new Date(Math.round((excelDate - (25567 + 2)) * 86400 * 1000));
    //                             try{
    //                                 var converted_date = date.toISOString().split('T')[0];
    //                             }
    //                             catch(err) {
    //                                 tanggalReaktivasi[i].style.backgroundColor = "#e8837d";
    //                             }
    //                             tanggalReaktivasi[i].innerHTML = converted_date;
    //                         }
    //                      }
    //         excel_file.value = "";

    //     };
    // });

    //     function save_data() {
    //     var total = 0;
    //     var jsonTable = $('#importTable tbody tr:has(td)').map(function () {
    //         var $td = $('td', this);
    //         total += parseFloat($td.eq(2).text());
    //         return{
    //           company_id    :$td.eq(0).text(),
    //           licence_plate     :$td.eq(1).text(),
    //           vehicle_id       :$td.eq(2).text(),
    //           po_id :$td.eq(3).text(),
    //           harga_layanan:$td.eq(4).text(),
    //           po_date     :$td.eq(5).text(),
    //           status_po        :$td.eq(6).text(),
    //           imei        :$td.eq(7).text(),
    //           gps_id        :$td.eq(8).text(),
    //           type        :$td.eq(9).text(),
    //           gsm_id        :$td.eq(10).text(),
    //           provider        :$td.eq(11).text(),
    //           sensor_all        :$td.eq(12).text(),
    //         //   merk_sensor        :$td.eq(13).text(),
    //           pool_name        :$td.eq(13).text(),
    //           pool_location        :$td.eq(14).text(),
    //           waranty        :$td.eq(15).text(),
    //           status_layanan        :$td.eq(16).text(),
    //           tanggal_pasang        :$td.eq(17).text(),
    //           tanggal_non_aktif        :$td.eq(18).text(),
    //           tanggal_reaktivasi_gps        :$td.eq(19).text(),







    //         }

    //     }).get();
    //   $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
    //     data = {};
    //     data = jsonTable;
    //     //
    //     var thLength = $('#importTable th').length;
    //     var trLength = $("#importTable td").closest("tr").length;
    //     var item = document.querySelectorAll("#table-data-8");
    //     var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
    //     var success;
    //     $.ajax({
    //     type: 'POST',
    //     dataType: 'JSON',
    //     url: "{{ url('/save_import_detailCustomer') }}",
    //     data: {
    //        data   : JSON.stringify(data) ,
    //       _token  : '{!! csrf_token() !!}'
    //     } ,
    //     error: function(er) {
    //       if(er.responseText === 'fail' ){
    //         // alert("save failed");
    //         swal({
    //             type: 'warning',
    //             text: 'data or error ',
    //             showCloseButton: true,
    //             showConfirmButton: false
    //           }).catch(function(timeout) { });
    //       } else {
    //           try {
    //         swal({
    //             type: 'success',
    //             title: 'Data Saved',
    //             showConfirmButton: false,
    //             timer: 1500
    //         }).catch(function(timeout) { });
    //         read();
    //         $('#importData').modal('hide');
    //         } catch (error) {
    //           swal({
    //             type: 'warning',
    //             text: 'Duplicate data or error format',
    //             showCloseButton: true,
    //             showConfirmButton: false
    //           }).catch(function(timeout) { });

    //         }
    //       }
    //       }
    //   });
    // }


    //  // ---- Close Modal -------
    // $('#close-modal').click(function() {
    //     // deleteTemporary();
    //     // read_temporary()
    //     $('#importData').modal('hide');
    // });


  </script>
@endsection


{{-- $("#filter-company").change(function(){
    var value = $(this).val();
    $.ajax({
      url:"{{ url('/filter_company')}}/" + value,
      success: function(data, status){
        $('#table_id').find("#item_data").html(data);
      }

    });
    return true;
  });

  $('#list-company  a').click(function(){

    var Id = $(this).attr('id');

    $("#ajax-content").empty();
    $("#list-company a").removeClass('current');
    $("h5").remove();
    $(this).addClass('current');

    $.ajax({ url:"{{ url('/detail')}}/" + Id, success: function(html)
        {
            $("#ajax-content").empty().append(html);
        }

    });
    return true;
}); --}}
{{--
$('#filter-company').change(function(){

    var Id = $(this).val();

    $("#ajax-content").empty();
    $("#list-company a").removeClass('current');
    $("h5").remove();
    $(this).addClass('current');

    $.ajax({ url:"{{ url('/detail')}}/" + Id, success: function(html)
        {
            $("#ajax-content").empty().append(html);
        }
    });
    return true;
}); --}}
