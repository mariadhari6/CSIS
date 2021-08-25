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
                <button type="button" name="add" id="add" class="btn btn-primary btn-round btn-xs   "><i class="fas fa-plus"></i> Add</button>
            </div>
            <br>

          <table class="table table-hover data" class="table_id" id="table_id" >
            <thead>
              <tr>
                <th scope="col">Action</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
              </tr>
            </thead>
            <tbody  id="data">
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
      $.get("{{ url('data') }}", {}, function(data, status) {
        $("#data").html(data);
      });
    }
    

     // ------ Tambah Form Input ------
     $('#add').click(function() {
        $.get("{{ url('form') }}", {}, function(data, status) {
          $('#table_id tbody').prepend(data);
        });
      });

      // ----- Tambah data ------
    function store() {
        var FirstName = $("#FirstName").val();
        $.ajax({
            type: "get",
            url: "{{ url('store') }}",
            data: "FirstName=" + FirstName,
            success: function(data) {
              read()
            }
        })
    }

    

    
      

   





  </script>

   @endsection
