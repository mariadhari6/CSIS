@extends('layouts.v_main')
@section('title','Tes')

@section('content')

<div align="right">
  </div>
  <br>
  <div id="message"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="text-right">
                <div class="">
                    <button type="button" name="add" id="add" class="btn btn-primary btn-round mr-3"><i class="fas fa-plus"></i> Add</button>
                </div>
                <div class="mt-3">
                    <button  type="button" class="btn btn-success btn-round mr-2 edit_all"> Edit Selected</button>
                    <button  type="button" class="btn btn-danger btn-round mr-2 delete_all"> Delete Selected</button>
                </div>
            </div>
            <br>
            <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input select-all-checkbox" type="checkbox" data-select="checkbox" data-target=".task-select" id="master">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </th>
                <th scope="col">Action</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
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

      read()

    });


    // ------ Tampil Data ------
    function read(){
      $.get("{{ url('item_data') }}", {}, function(data, status) {
        $("#item_data").html(data);
        $('#table_id').DataTable();

      });

    }

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }
>>>>>>> 73108bd448551d3e5e69a37932fb8a0bb841c11c

    // ---- Tombol Cancel -----
    function cancel() {
      read()
    }


     // ------ Tambah Form Input ------
     $('#add').click(function() {
        $.get("{{ url('add_form') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

    // ----- Proses Tambah data ------
    function store() {
        var FirstName = $("#FirstName").val();
        var LastName = $("#LastName").val();
        $.ajax({
            type: "get",
            url: "{{ url('store') }}",
            data: {
              FirstName: FirstName,
              LastName: LastName
            },
            success: function(data) {
              read()
            }
        })
    }



    // -----Proses Delete Data ------
    function destroy(id) {
        var id = id;
        confirm("Delete ?");
        $.ajax({
            type: "get",
            url: "{{ url('destroy') }}/" + id,
            data: "id=" + id,
            success: function(data) {
              read()
            }
        })
    }

    // ------ Edit Form Data ------
    function edit(id){
        var id = id;
        $("#td-button-"+id).slideUp("fast");
        $("#item-FirstName-"+id).slideUp("fast");
        $("#item-LastName-"+id).slideUp("fast");
        $.get("{{ url('show') }}/" + id, {}, function(data, status) {
            $("#edit-form-"+id).prepend(data)
        });
    }

    // ------ Proses Update Data ------
    function update(id) {
        var FirstName = $("#FirstName").val();
        var LastName = $("#LastName").val();
        var id = id;
        $.ajax({
            type: "get",
            url: "{{ url('update') }}/"+id,
            data: {
              FirstName: FirstName,
              LastName: LastName
            },
            success: function(data) {
              read()
            }


        });


    // Delete All

        $('.delete_all').on('click', function(event){
          event.preventDefault();

            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));

            });

                if (allVals.length > 0) {

                    alert(allVals);
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
                            url: "{{ route('livetable.delete_all') }}",
                            method: "GET",
                            data: {
                                id: allVals,
                                _token: _token
                            },
                            success: function(data) {
                                swal("Done!","It was succesfully deleted!","success");
                                fetch_data();
                            }
                            });
                    });
                    },
                    allowOutsideClick: false
                });

            }else{
                alert('Pilih Row yang ingin dihapus')
            }

        });



        $('.edit_all').on('click', function(event){
          event.preventDefault();

            var allVals = [];

            $(".task-select:checked").each(function() {
                allVals.push($(this).attr("id"));

            });

                if (allVals.length > 0) {

                    alert(allVals);

                    $.ajax({
                        url: "{{ route('livetable.detail_data') }}",
                        method: "POST",
                        dataType: "json",
                        data: {
                            id: allVals,
                            _token: _token
                        },
                        success: function(data) {
                            $("#FirstName_val").val(data.FirstName);
                            $("#LastName_val").val(data.LastName);
                        }
                        });
                        button();

                        document.getElementById('td-FirstName-' + id).innerHTML = '<div class="input-div"><input type="text" class="input" id="FirstName_val"></i></div>';
                        document.getElementById('td-LastName-' + id).innerHTML = '<div class="input-div"><input type="text" class="input" id="LastName_val"></i></div>';
                        document.getElementById('value_FirstName-' + id).style.display = 'none';
                        document.getElementById('value_LastName-' + id).style.display = 'none';
                        document.getElementsByName('edit-btn').style.display = 'none';

                        function button() {
                        $.ajax({
                            url: "/livetable/fetch_data",
                            dataType: "json",
                            success: function(data) {
                            for (var count = 0; count < data.length; count++) {
                                document.getElementById('edit-btn-' + data[count].id).style.display = 'none';
                                document.getElementById(data[count].id).style.display = 'none';
                            }
                            }
                        });
                        }

            }else{
                alert('Pilih Row yang ingin diedit')
            }

        });



    });

  </script>

   @endsection
