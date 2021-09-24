<<<<<<< HEAD
<td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $GsmTerminate->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
     
    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmTerminate->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmTerminate->request_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input active_date-{{$GsmTerminate->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmTerminate->active_date}}"></i></div>
    </td>
    <td><select class="form-control gsm_active_id-{{$GsmTerminate->id}}" id="gsm_active_id" name="gsm_active_id">
       @foreach ($GsmActive as $GsmActives)
        <option value="{{ $GsmActives->id }}" {{ old('gsm_active_id') == $GsmActives->id  ? 'selected':'' }}>
        {{$GsmActives->gsmPreActive->gsm_number}}

            {{-- @foreach ($GsmTerminate as $GsmTerminates)
                {{ $GsmTerminates->gsmActive->gsm_pre_active_id}}
        @endforeach --}}
        </option>

       @endforeach
    </select></i></td>


   <td><select class="form-select status_active-{{$GsmTerminate->id}}" id="status_active" aria-label=".form-select-lg example">
    <option selected>{{$GsmTerminate->status_active}}</option>
    <option value="Sukses">Sukses</option>
    <option value="Tidak Sukses">Tidak Sukses</option>
    </select></i></td>

    <td><select class="form-control company_id-{{$GsmTerminate->id}}" id="company_id" name="company_id">

@foreach ($GsmActive as $GsmActives)

<option value="{{ $GsmActives->id }}" {{ old('company_id') == $GsmActives->id  ? 'selected':'' }}>
        {{$GsmActives->company->company_name}}
       </option>
        @endforeach
    </select></i></td>
      <td><textarea class="form-control note-{{$GsmTerminate->id}}" id="note" name="note" rows="3">{{$GsmTerminate->note}}</textarea></i></td>
      <script type="text/javascript">
   $(document).ready(function() {
       $('select[name="gsm_active_id"]').on('change', function() {
=======
    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $GsmTerminate->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmTerminate->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmTerminate->request_date}}">
        </div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input terminate_date-{{$GsmTerminate->id}}" id="terminate_date" placeholder="Active Date" value="{{ $GsmTerminate->terminate_date}}">
        </div>
    </td>
    <td>
        <select class="select gsm_active_id-{{$GsmTerminate->id}}" id="{{$GsmTerminate->id}}" name="gsm_active_id">
            <option value="{{ $GsmTerminate->gsmActive->gsmPreActive->id }}">
                {{ $GsmTerminate->gsmActive->gsmPreActive->gsm_number}}
            </option>
            @foreach ($GsmActive as $item)
            <option value="{{ $item->gsmPreActive->id }}"}>
                {{$item->gsmPreActive->gsm_number}}
            </option>
            @endforeach
        </select></i>
    </td>

    {{-- <td>
        <select class="form-control gsm_pre_active_id-{{$GsmActive->id}}" id="{{$GsmTerminate->id}}" name="gsm_pre_active_id">
        <option value="">{{ $GsmActive->gsmPreActive->gsm_number}}</option>
        @foreach ($GsmPreActive as $GsmPreActives)
        <option value="{{ $GsmPreActives->id }}" {{ old('gsm_pre_active_id') == $GsmPreActives->id ? 'selected':'' }}>
            {{ $GsmPreActives->gsm_number }}</option>
         @endforeach
        </select></i>
    </td> --}}


    <td>
        <select class="select status_active-{{$GsmTerminate->id}}" id="status_active" aria-label=".form-select-lg example">
        <option selected>{{$GsmTerminate->status_active}}</option>
        <option value="Sukses">Sukses</option>
        <option value="Tidak Sukses">Tidak Sukses</option>
        </select></i>
    </td>
    <td>
        <select class="select company_id-{{$GsmTerminate->id}}" id="company_id" name="company_id-{{$GsmTerminate->id}}">
            <option value="{{ $GsmTerminate->company->id}}">
                {{ $GsmTerminate->gsmActive->company->company_name}}
            </option>
        </select></i>
    </td>
    <td>
        <textarea class="form-control note-{{$GsmTerminate->id}}" id="note" name="note" rows="3">{{$GsmTerminate->note}}</textarea></i>
    </td>


<script type="text/javascript">
   $(document).ready(function() {
       $('select[name="gsm_active_id"]').on('change', function() {
           var id = $(this).attr("id");
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
           var stateID = $(this).val();
           if(stateID) {
               $.ajax({
                   url: '/dependent_terminate/'+stateID,
                   type: "GET",
                   dataType: "json",
                   success:function(data) {
<<<<<<< HEAD
                       $('select[name="company_id"]').empty();
=======
                       $('select[name="company_id-'+id+'"]').empty();
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                       $.each(data, function(key, value) {
                           //------///
                         var compID = value;
                           $.ajax({
                              url: '/show_company/'+compID,
                              type: "GET",
                              dataType: "json",
                              success:function(data) {
<<<<<<< HEAD
                                 $('select[name="company_id"]').empty();
                                 $.each(data, function(key, value) {
                                       //------///
                                       //---///
                                 $('select[name="company_id"]').append('<option value="'+ key +'">'+ value +'</option>');
=======
                                 $('select[name="company_id-'+id+'"]').empty();
                                 $.each(data, function(key, value) {
                                       //------///
                                       //---///
                                 $('select[name="company_id-'+id+'"]').append('<option value="'+ key +'">'+ value +'</option>');
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
                                 });
                              }
                           });
                           //---///
                       });
                   }
               });
           }else{
<<<<<<< HEAD
               $('select[name="company_id"]').empty();
           }
       });
   });
   </script>
=======
               $('select[name="company_id-'+id+'"]').empty();
           }
       });
   });
</script>
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
