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
            <tbody>

            </tbody>
          </table>
          {{ csrf_field() }}
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
    reload();

    function reload(){
        fetch_data();
    }

        function fetch_data() {
            $.ajax({
                url: "/livetable/fetch_data",
                dataType: "json",
                success: function(data) {
                var html = '';
                for (var count = 0; count < data.length; count++) {
                    html += '<tr id="tr_'+ data[count].id+' ">';
                    html += '<td><div class="form-check" ><label class="form-check-label"><input class="form-check-input task-select" type="checkbox" id ="' + data[count].id + '"><span class="form-check-sign"></span></label></div></td>';
                    html += '<td><div id="edit-btn-' + data[count].id + '"><i class="fas fa-pen edit" name="edit-btn" id="' + data[count].id + '"></i><i class="fas fa-trash delete" id="' + data[count].id + '"></i></div><div id="btn-save-' + data[count].id + '"></div></td>';
                    html += '<td><div id="td-FirstName-' + data[count].id + '"></div><div id="value_FirstName-' + data[count].id + '">' + data[count].FirstName + '</div></td>';
                    html += '<td><div id="td-LastName-' + data[count].id + '"></div><div id="value_LastName-' + data[count].id + '">' + data[count].LastName + '</div></td>';

                }
                $('tbody').html(html)

                $('#table_id').DataTable();

                }
            });
        }


      // Tambah Form Input
      $('#add').click(function() {
        var html = '<tr>';
        html += '<td><div class="form-check"><label class="form-check-label"><input class="form-check-input task-select" type="checkbox"><span class="form-check-sign"></span></label></div></td>';
        html += '<td><i class="fas fa-check tambah" id="tambah"></i><i class="fas fa-times cancel" "></i></td>';
        html += '<td> <div class="input-div"><input type="text" class="input" id="FirstName" placeholder="First Name"></i></div></td>';
        html += '<td> <div class="input-div"><input type="text" class="input" id="LastName" placeholder="Last Name"></i></td>';
        html += '</tr>';
        $('#table_id tbody').prepend(html);
      });

      var _token = $('input[name="_token"]').val();

      // Tambah Data
      $(document).on('click', '.tambah', function() {
        var FirstName = document.getElementById("FirstName").value;
        var LastName = document.getElementById("LastName").value;
        if (FirstName != '' && LastName != '') {
          $.ajax({
            url: "{{ route('livetable.add_data') }}",
            method: "POST",
            data: {
              FirstName: FirstName,
              LastName: LastName,
              _token: _token
            },
            success: function(data) {
              $('#message').html(data);
              fetch_data();
            }
          });
        } else {
          $('#message').html("<div class='alert alert-danger'>Fields are required</div>");
        }
      });

      // hapus data
      $(document).on('click', '.delete', function(event) {
        event.preventDefault();

        var id = $(this).attr("id");

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
                      url: "{{ route('livetable.delete_data') }}",
                      method: "POST",
                      data: {
                        id: id,
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

      });

        //   $(document).on('click', '.save', function() {
        //     var column_name = $(this).data("save");
        //     var column_value = $(this).text();
        //     var id = $(this).data("id");

        //     // Update data
        //     if (column_value != '') {
        //       $.ajax({
        //         url: "{{ route('livetable.update_data') }}",
        //         method: "POST",
        //         data: {
        //           column_name: column_name,
        //           column_value: column_value,
        //           id: id,
        //           _token: _token
        //         },
        //         success: function(data) {
        //           $('#message').html(data);
        //         }
        //       })
        //     } else {
        //       $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
        //     }
        //   });

      //edit data
      $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");

        $.ajax({
          url: "{{ route('livetable.detail_data') }}",
          method: "POST",
          dataType: "json",
          data: {
            id: id,
            _token: _token
          },
          success: function(data) {
            $("#FirstName_val").val(data.FirstName);
            $("#LastName_val").val(data.LastName);
          }
        });
        button();
        document.getElementById('btn-save-'+id).innerHTML = '<i class="fas fa-check update" id="' + id +'"><i class="fas fa-times ml-2" id="' + id +'">';

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


      });



      //Update
      $(document).on('click', '.update', function() {
        var FirstName = document.getElementById("FirstName_val").value;
        var LastName = document.getElementById("LastName_val").value;
        var id = $(this).attr("id");

        if (FirstName && LastName != '') {
          $.ajax({
            url: "{{ route('livetable.update_data') }}",
            method: "POST",
            data: {
              FirstName: FirstName,
              LastName: LastName,
              id: id,
              _token: _token
            },
            success: function(data) {
              $('#message').html(data);
              fetch_data();
            }
          })
        } else {
          $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
        }
      });

    //   Checkbox all

        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".task-select").prop('checked', true);

         } else {
            $(".task-select").prop('checked',false);
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
