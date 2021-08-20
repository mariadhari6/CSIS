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
                <button type="button" name="add" id="add" class="btn btn-primary btn-round btn-xs"><i class="fas fa-plus"></i> Add</button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Action</th>



              </tr>
            </thead>
            <tbody>
                @foreach ($Username as $usernames)
                <tr>
                    <td>{{ $usernames->FirstName }}</td>
                    <td>{{ $usernames->LastName }}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-xs delete" id="'{{$usernames->id}}'">Delete</button><div id="edit-btn-' {{$usernames->id}} '"><button type="button" name="edit-btn" class="btn btn-warning btn-xs edit" id="'{{$usernames->id}}'">Edit</button></div><div id="btn-save-'{{$usernames->id}}'"></div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{ csrf_field() }}
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      fetch_data();

      $('#table_id').DataTable();


      function fetch_data() {

      $.ajax({
        url: "/livetable/fetch_data",
        dataType: "json",
        success: function(data) {
          var html = '';
          for (var count = 0; count < data.length; count++) {
            html += '<tr>';
            html += '<td><div id="td-FirstName-' + data[count].id + '"></div><div id="value_FirstName-' + data[count].id + '">' + data[count].FirstName + '</div></td>';
            html += '<td><div id="td-LastName-' + data[count].id + '"></div><div id="value_LastName-' + data[count].id + '">' + data[count].LastName + '</div></td>';
            html += '<td><button type="button" class="btn btn-danger btn-xs delete" id="' + data[count].id + '">Delete</button><div id="edit-btn-' + data[count].id + '"><button type="button" name="edit-btn" class="btn btn-warning btn-xs edit" id="' + data[count].id + '">Edit</button></div><div id="btn-save-' + data[count].id + '"></div></td>';

          }
          $('tbody').html(html);
        }
      });
    }


      // Tambah Form Input
      $('#add').click(function() {
        var html = '<tr>';
        html += '<td><button type="button" id="tambah" class="btn btn-success btn-xs tambah">Insert</button></td>';
        html += '<td> <input type="text" class="form-control" id="FirstName" placeholder="FirstName"> </td>';
        html += '<td> <input type="text" class="form-control" id="LastName" placeholder="LastName"> </td>';
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
          $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
        }
      });

      // hapus data
      $(document).on('click', '.delete', function() {
        var id = $(this).attr("id");
        if (confirm("Are you sure you want to delete this records?")) {
          $.ajax({
            url: "{{ route('livetable.delete_data') }}",
            method: "POST",
            data: {
              id: id,
              _token: _token
            },
            success: function(data) {
              $('#message').html(data);
              fetch_data();
            }
          });
        }
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
        document.getElementById('btn-save-'+id).innerHTML = '<button type="button" class="btn btn-primary btn-xs update" id="' + id + '">Save</button>';

        document.getElementById('td-FirstName-' + id).innerHTML = '<input type="text" class="form-control" id="FirstName_val" >';
        document.getElementById('td-LastName-' + id).innerHTML = '<input type="text" class="form-control" id="LastName_val" >';
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
    });





  </script>

   @endsection
