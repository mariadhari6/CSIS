@extends('layouts.v_main')
@section('title','CSIS | Master GSM')
@section('title-table',' Master GSM')


@section('content')
<form onsubmit="return false">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right" id="selected">
                <button type="button" class="btn btn-primary btn-sm float-left mr-2 add add-button">
                  <b>Add</b>
                  <i class="fas fa-plus ml-2" id="add"></i>
                </button>
                <div class="float-left mr-2">
                  <select class="form-control input-fixed" id="filter">
                    <option value="{{ url('item_data_GsmMaster') }}">All</option>
                    <option value="{{ url('item_data_ready_GsmMaster') }}">Ready</option>
                    <option value="{{ url('item_data_active_GsmMaster') }}">Active</option>
                    <option value="{{ url('item_data_terminate_GsmMaster') }}">Terminate</option>
                  </select>
                </div>
                <button type="button" class="btn btn-success float-left mr-2" data-toggle="modal" data-target="#importData" ">
                  <b> Import</b>
                  <i class="fas fa-file-excel ml-2"></i>
                </button>
                {{-- buat form pencarian --}}
                <input type="text" placeholder="Search.." id="search_form">
                <button class="btn btn-success edit_all">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger  delete_all">
                  <i class="fas fa-trash"></i>
                </button>
            </div>
          <table class="mt-2 table table-responsive data" class="table_id" id="table_id">
            <thead>
              <tr>
                <th class="freeze-header">
                    <div>
                        <label class="form-check-label">
                            <input class="form-check-input  select-all-checkbox" type="checkbox" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col" class="action-no">No.</th>
                <th scope="col" class="list">Status GSM*</th>
                <th scope="col" class="list-gsmNumber">GSM Number*</th>
                <th scope="col" class="list-company">Company*</th>
                <th scope="col" class="list">Serial Number*</th>
                <th scope="col" class="list">ICC ID</th>
                <th scope="col" class="list">IMSI</th>
                <th scope="col" class="list">Res ID</th>
                <th scope="col" class="list">Request Date</th>
                <th scope="col" class="list">Expired Date</th>
                <th scope="col" class="list">Active Date</th>
                <th scope="col" class="list">Terminated Date</th>
                <th scope="col" class="list">Note</th>
                <th scope="col" class="list">Provider</th>
                <th scope="col" class="sticky-col first-col">Action</th>
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
              <a  class="btn btn-secondary btn-xs" href="/download_template_gsm" style="color:white">Download Template</a>
              <div class="mt-2 progress">
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

      read()

      // panggil fungsi currentPage
      currentPage()

    });

    // -- Get all data gsm master --
    var gsmNumberGet = {!! json_encode($gsmNumberGet->toArray()) !!};
    var gsmSerialGet = {!! json_encode($gsmSerialGet->toArray()) !!};

     // -- excel export to html tabel --
    const excel_file = document.getElementById("excel_file");
    var allGsmNum = [];
    var allSerNum = [];

    excel_file.addEventListener("change", (event) => {
    
      function progress_bar_process(percentage, timer)
      {
        $('.progress-bar').css('width', percentage + '%');
        if(percentage > 100)
        {
          clearInterval(timer);
          $('#process').css('display', 'none');
          $('.progress-bar').css('width', '0%');

          if (
              ![
                "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                "application/vnd.ms-excel",
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
                      if (cell == 7 || cell == 8 || cell == 9 || cell == 10) {
                        
                        if(sheet_data[row][cell] === undefined) {
                          datas = "";
                        } else {
                          var converted_requestDate = new Date(Math.round((sheet_data[row][cell] - (25567 + 2)) * 86400 * 1000));
                          var datas = converted_requestDate.toISOString().split('T')[0];
                        }

                      } else {
                        var datas = sheet_data[row][cell];
                      }
                      table_output += '<td contenteditable id="table-data-' + cell + '" >' + datas + "</td>";
                    }
                  }

                  table_output += "</tr>";
                }

                table_output += "</table>";

                document.getElementById("excel_data").innerHTML = table_output;

                // check duplicate data
                gsmNumberID = document.querySelectorAll("#table-data-1");
                serialNumberID = document.querySelectorAll("#table-data-3");
                for (indexA = 0; indexA < gsmNumberID.length; indexA++) {
                  var gsmNumberValue = gsmNumberID[indexA].innerText; //0
                  var serialNumberValue = serialNumberID[indexA].innerText;
                  if( gsmNumberGet[gsmNumberGet.findIndex(x => x.gsm_number == gsmNumberValue)] != undefined ){
                      gsmNumberID[indexA].style.backgroundColor = "#e8837d";
                    }
                  if(gsmSerialGet[gsmSerialGet.findIndex(x => x.serial_number == serialNumberValue)] != undefined ){
                      serialNumberID[indexA].style.backgroundColor = "#e8837d";
                  }
                }

              }
              excel_file.value = "";
            };
          
        }
      }

      var percentage = 0;
      var timer = setInterval(function(){
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

    // ------- save data import -----
    function save_data() {
      var total = 0;
      var jsonTable = $('#importTable tbody tr:has(td)').map(function () {
          var $td = $('td', this);
          total += parseFloat($td.eq(2).text());
          return {
              status_gsm    : $td.eq(0).text(),
              gsm_number    : $td.eq(1).text(),
              company_id    : $td.eq(2).text(),
              serial_number : $td.eq(3).text(),
              icc_id        : $td.eq(4).text(),
              imsi          : $td.eq(5).text(),
              res_id        : $td.eq(6).text(),
              request_date  : $td.eq(7).text(),
              expired_date  : $td.eq(8).text(),
              active_date   : $td.eq(9).text(),
              terminate_date: $td.eq(10).text(),
              note          : $td.eq(11).text(),
              provider      : $td.eq(12).text()
          }
      }).get();

      $('#importTable > tfoot > tr > td:nth-child(3)').html(total);
      data = {};
      data = jsonTable;

      // console.log(data[0]['status_gsm'])
      var thLength = $('#importTable th').length;
      var trLength = $("#importTable td").closest("tr").length;
      var item = document.querySelectorAll("#table-data-8");
      var tes = $("#importTable").find("tbody>tr:eq(1)>td:eq(1)").attr("style");
      var success;

      $.ajax({
        type: 'POST',
        dataType: 'JSON', 
        url: "{{ url('save_import_GsmMaster') }}",
        data: {
           data   : JSON.stringify(data) ,
          _token  : '{!! csrf_token() !!}'
        },
        error: function(er) {
          if(er.responseText === 'fail' ){
            // alert("save failed");
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
        read()
        $('#importData').modal('hide');
    });

    // ------- filter change ------
    $("#filter").change(function(){ 
        var value = $(this).val();
        filter(value);
    });

      // membuat variable link untuk digunakan di fitur paginate
      var link = "{{ url('item_data_GsmMaster') }}";

      // ------- filter --------
      function filter(value){
      numberPaginate = 1;
      var value = value;
      currentPage()
      link = value.substr();
      $.get(value, {}, function(data, status) {
          $('#table_id').DataTable().destroy();
          $('#table_id').find("#item_data").html(data);
            $('#table_id').dataTable(  {
              "pageLength": 50,
              "dom": '<"top">rt<"bottom"><"clear">'
            });
          $('#table_id').DataTable().draw();
        });
      }

    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data_GsmMaster') }}", {}, function(data, status) {
        $('#table_id').DataTable().destroy();
        $('#table_id').find("#item_data").html(data);
         $('#table_id').dataTable( {
           // menampilkan 50 data
            "pageLength": 50,
            // kolom sesarch dihilangkan
            "dom": '<"top">rt<"bottom"><"clear">'
            });
        $('#table_id').DataTable().draw();
      });
    }

    // pageLength
    var length = 50;
    $("#page-length").change(function(){ 
        // numberPaginate = 1;
        length = $(this).val();
        numberPaginate = 1;
        lengthData = parseInt(length);
        // alert(lengthData_

        $.ajax({
        type: "get",
        url: `{{ url('item_data_page_length_GsmMaster') }}`,
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
              // "dom": '<lf<t>ip>'
              });
          $('#table_id').DataTable().draw();
          currentPage()
        }
      });
    });

    // ---- reload Table ---
    var lengthData = 50;
    var url =  "{{ url('item_data_GsmMaster') }}";
    function reload() {
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
          $('#table_id').DataTable().destroy();
          $('#table_id').find("#item_data").html(datas);
          $('#table_id').dataTable( {
              "pageLength": 50,
              "dom": '<"top">rt<"bottom"><"clear">'
              // "dom": '<lf<t>ip>'
              });
          $('#table_id').DataTable().draw();
          currentPage()
        }
      });
    }

    // Paginate --------
    let numberPaginate = 1;
    // next paginate
    $( "#next" ).click(function() {
      // console.log(link);
      // var old_no = no;
      // alert(old_no)
      if (no > 50) {
        numberPaginate += 1;
        $.get(`{{ '${link}?page=${numberPaginate}' }}` , {}, function(data, status) {
          // console.log(no)
          if(data != ""){
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
                  // "dom": '<lf<t>ip>'
                  });
              $('#table_id').DataTable().draw();
              currentPage()
              url = `{{ '${link}?page=${numberPaginate}' }}`;
              // alert(url)
            }
          });
          } else {
            // numberPaginate -= 1;
            // alert(numberPaginate);
          }
        });
      }
    });

    // previous paginate
    $( "#previous" ).click(function() {
      // alert(typeof length)
      // alert(no - length -1)
      if (numberPaginate > 1) {
          numberPaginate -= 1;
          $.ajax({
          type: "get",
          url: `{{ '${link}?page=${numberPaginate}' }}`,
          data: {
            no: no - (length*2),
          length: length
          },
          success: function(datas) {
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(datas);
            $('#table_id').dataTable( {
                "pageLength": length,
                "dom": '<"top">rt<"bottom"><"clear">'
                // "dom": '<lf<t>ip>'
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
        // alert($(this).val());
        $.ajax({
          type: "get",
          url: `{{ url('item_data_search_GsmMaster') }}`,
          data: {
            text: $(this).val(),
          },
          success: function(datas) {
            var link = "{{ url('item_data_search_GsmMaster') }}";
            numberPaginate = 1;
            // console.log(datas);
            $('#table_id').DataTable().destroy();
            $('#table_id').find("#item_data").html(datas);
            $('#table_id').dataTable( {
                "pageLength": 50,
                "dom": '<"top">rt<"bottom"><"clear">'
                // "dom": '<lf<t>ip>'
                });
            $('#table_id').DataTable().draw();
            currentPage()
          }
        });
        
      });
    })

    //Paginate Status


    //-----------

    // current Page
    function currentPage(){
      // memasukkan value dari variable numberPaginate ke elemen id currentPage
      $("#currentPage").text(numberPaginate);
    }

     // ------ Tambah Form Input ------
     $('.check').click(function() {
        $.get("{{ url('item_data_temporary_GsmMaster') }}", {}, function(data, status) {
          $('#table_temporary_id').find("#item_data_temporary").html(data);
        });
      });


    // ---- Tombol Cancel -----
    function cancel() {
      reload()
    }

     // ------ Tambah Form Input ------
     $('.add').click(function() {
        $.get("{{ url('add_form_GsmMaster') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });
      
    // ----- Proses Tambah data ------
    function store() {
      var status_gsm = $("#status_gsm").val();
      var gsm_number = $("#gsm_number").val();
      var company_id = $("#company_id").val();
      var serial_number = $("#serial_number").val();
      var icc_id = $("#icc_id").val();
      var imsi = $("#imsi").val();
      var res_id = $("#res_id").val();
      var request_date = $("#request_date").val();
      var expired_date = $("#expired_date").val();
      var active_date = $("#active_date").val();
      var terminate_date = $("#terminate_date").val();
      var note = $("#note").val();
      var provider = $("#provider").val();

      // $.ajax({
      //       type: "get",
      //       url: "{{ url('store_GsmMaster') }}",
      //       data: {
      //         status_gsm: status_gsm,
      //         gsm_number: gsm_number,
      //         company_id: company_id,
      //         serial_number: serial_number,
      //         icc_id: icc_id,
      //         imsi: imsi,
      //         res_id: res_id,
      //         request_date: request_date,
      //         expired_date: expired_date,
      //         active_date: active_date,
      //         terminate_date: terminate_date,
      //         note: note,
      //         provider: provider
      //       },
      //       success: function(data) {
      //       swal({
      //           type: 'success',
      //           title: 'Data Saved',
      //           showConfirmButton: false,
      //           timer: 1500
      //       }).catch(function(timeout) { });
      //         read();
      //         // break;
      //       }
      //   });
      
      $rowCount = $("#table_id tr").length;
      if ($rowCount == 2) {
        // alert('table empty')
      } else {
        $rowResult = $rowCount - 2;
        var allGsmNum = [];
        var allSerNum = [];
        for($i = 1; $i <= $rowResult; $i++)
            { 
              $numArr = $i-1;
              $gsmNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(3)").attr("name");
              $serNum = $("#table_id").find("tbody>tr:eq("+ $i +")>td:eq(5)").attr("name");
              allGsmNum[$numArr] = $gsmNum;
              allSerNum[$numArr] = $serNum;
            }
            // alert(allGsmNum[0]);
        for (let index = 0; index < allGsmNum.length; index++) {
          if( gsm_number == allGsmNum[index] ){
            // alert('already exists');
              swal({
                type: 'warning',
                text: 'GSM Number already exists',
                showConfirmButton: false,
                timer: 1500
              }).catch(function(timeout) { });
              // alert('GSM Number already exists');
              break;
          } else if( serial_number == allSerNum[index]){

              swal({
                  type: 'warning',
                  text: 'Serial Number already exists',
                  showConfirmButton: false,
                  timer: 1500
                }).catch(function(timeout) { });

           
              break;
          } else {
              $success = true;
          }    
        }
      }

      if($success === true) {
        $.ajax({
            type: "get",
            url: "{{ url('store_GsmMaster') }}",
            data: {
              status_gsm: status_gsm,
              gsm_number: gsm_number,
              company_id: company_id,
              serial_number: serial_number,
              icc_id: icc_id,
              imsi: imsi,
              res_id: res_id,
              request_date: request_date,
              expired_date: expired_date,
              active_date: active_date,
              terminate_date: terminate_date,
              note: note,
              provider: provider
            },
            success: function(data) {
            swal({
                type: 'success',
                title: 'Data Saved',
                showConfirmButton: false,
                timer: 1500
            }).catch(function(timeout) { });
              read();
              // break;
            }
        });
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
                    url: "{{ url('destroy_GsmMaster') }}/" + id,
                    data: "id=" + id,
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Deleted',
                            showConfirmButton: false,
                            timer: 1500
                        }).catch(function(timeout) { });
                        // read();
                        reload()
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
        $("#item-status_gsm-"+id).hide("fast");
        $("#item-gsm_number-"+id).hide("fast");
        $("#item-company_id-"+id).hide("fast");
        $("#item-serial_number-"+id).hide("fast");
        $("#item-icc_id-"+id).hide("fast");
        $("#item-imsi-"+id).hide("fast");
        $("#item-res_id-"+id).hide("fast");
        $("#item-request_date-"+id).hide("fast");
        $("#item-expired_date-"+id).hide("fast");
        $("#item-active_date-"+id).hide("fast");
        $("#item-terminate_date-"+id).hide("fast");
        $("#item-note-"+id).hide("fast");
        $("#item-provider-"+id).hide("fast");
        $.get("{{ url('show_GsmMaster') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }
    // ------ Proses Update Data ------
        function update(id) {
          var status_gsm = $("#status_gsm").val();
          var gsm_number = $("#gsm_number").val();
          var company_id = $("#company_id").val();
          var serial_number = $("#serial_number").val();
          var icc_id = $("#icc_id").val();
          var imsi = $("#imsi").val();
          var res_id = $("#res_id").val();
          var request_date = $("#request_date").val();
          var expired_date = $("#expired_date").val();
          var active_date = $("#active_date").val();
          var terminate_date = $("#terminate_date").val();
          var note = $("#note").val();
          var provider = $("#provider").val();
          var id = id;
            $.ajax({
                type: "get",
                url: "{{ url('update_GsmMaster') }}/"+id,
                data: {
                  status_gsm: status_gsm,
                  gsm_number: gsm_number,
                  company_id: company_id,
                  serial_number: serial_number,
                  icc_id: icc_id,
                  imsi: imsi,
                  res_id: res_id,
                  request_date: request_date,
                  expired_date: expired_date,
                  active_date: active_date,
                  terminate_date: terminate_date,
                  note: note,
                  provider: provider
                },
                success: function(data) {
                swal({
                    type: 'success',
                    title: ' Data Updated',
                    showConfirmButton: false,
                    timer: 1500
                }).catch(function(timeout) { });
                // read();
                reload()
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
                            url: "{{ url('/selectedDelete_GsmMaster') }}",
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
                                // read();
                                reload()
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
                $(".edit_all").hide("fast");
                $(".delete_all").hide("fast");
                $.get("{{ url('selected_GsmMaster') }}", {}, function(data, status) {
                    $("#selected").prepend(data)
                });
                $.each(allVals, function(index, value){
                    $("#td-checkbox-"+value).hide("fast");
                    $("#td-button-"+value).hide("fast");
                    $("#item-no-"+value).hide("fast");
                    $("#item-status_gsm-"+value).hide("fast");
                    $("#item-gsm_number-"+value).hide("fast");
                    $("#item-company_id-"+value).hide("fast");
                    $("#item-serial_number-"+value).hide("fast");
                    $("#item-icc_id-"+value).hide("fast");
                    $("#item-imsi-"+value).hide("fast");
                    $("#item-res_id-"+value).hide("fast");
                    $("#item-request_date-"+value).hide("fast");
                    $("#item-expired_date-"+value).hide("fast");
                    $("#item-active_date-"+value).hide("fast");
                    $("#item-terminate_date-"+value).hide("fast");
                    $("#item-note-"+value).hide("fast");
                    $("#item-provider-"+value).hide("fast");
                    $(".add").hide("fast");
                    $.get("{{ url('show_GsmMaster') }}/" + value, {}, function(data, status) {
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
                    var status_gsm = $(".status_gsm-"+value).val();
                    var gsm_number = $(".gsm_number-"+value).val();
                    var company_id = $(".company_id-"+value).val();
                    var serial_number = $(".serial_number-"+value).val();
                    var icc_id = $(".icc_id-"+value).val();
                    var imsi = $(".imsi-"+value).val();
                    var res_id = $(".res_id-"+value).val();
                    var request_date = $(".request_date-"+value).val();
                    var expired_date = $(".expired_date-"+value).val();
                    var active_date = $(".active_date-"+value).val();
                    var terminate_date = $(".terminate_date-"+value).val();
                    var note = $(".note-"+value).val();
                    var provider = $(".provider-"+value).val();
                    $.ajax({
                    type: "get",
                    url: "{{ url('update_GsmMaster') }}/"+value,
                    data: {
                      status_gsm: status_gsm,
                      gsm_number: gsm_number,
                      company_id: company_id,
                      serial_number: serial_number,
                      icc_id: icc_id,
                      imsi: imsi,
                      res_id: res_id,
                      request_date: request_date,
                      expired_date: expired_date,
                      active_date: active_date,
                      terminate_date: terminate_date,
                      note: note,
                      provider: provider
                    },
                    success: function(data) {
                     swal({
                          type: 'success',
                          title: 'The selected data has been updated',
                          showConfirmButton: false,
                          timer: 1500
                      });
                      // read();
                      reload()
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
            cancel();
        }

  </script>
  {{-- <iframe name="dummyframe" id="dummyframe" onload="read_temporary()" style="display: none;"></iframe> --}}

   @endsection

