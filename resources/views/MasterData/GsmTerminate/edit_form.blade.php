    <td></td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $GsmTerminate->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
<<<<<<< HEAD
        <div class="input-div"><input type="date" class="input request_date-{{$GsmTerminate->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmTerminate->request_date}}">
        </div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input terminate_date-{{$GsmTerminate->id}}" id="terminate_date" placeholder="Active Date" value="{{ $GsmTerminate->terminate_date}}">
        </div>
    </td>
    <td>
        <select class="form-control gsm_active_id-{{$GsmTerminate->id}}" id="{{$GsmTerminate->id}}" name="gsm_active_id">
            <option value="{{ $GsmTerminate->gsmActive->gsmPreActive->id }}">
                {{ $GsmTerminate->gsmActive->gsmPreActive->gsm_number}}
            </option>
            @foreach ($GsmActive as $item)
            <option value="{{ $item->gsmPreActive->id }}"}>
                {{$item->gsmPreActive->gsm_number}}
=======
        <div class="input-div"><input type="date" class="input request_date-{{$GsmTerminate->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmTerminate->request_date}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input active_date-{{$GsmTerminate->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmTerminate->active_date}}"></i></div>
    </td>
    <td>
        <select class="form-control gsm_active_id-{{$GsmTerminate->id}}" id="{{$GsmTerminate->id}}" name="gsm_active_id">
            <option value=""></option>
            @foreach ($GsmActive as $GsmActives)
            <option value="{{ $GsmActives->id }}" {{ old('gsm_active_id') == $GsmActives->id  ? 'selected':'' }}>
                {{$GsmActives->gsmPreActive->gsm_number}}
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
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


<<<<<<< HEAD
    <td>
        <select class="form-control status_active-{{$GsmTerminate->id}}" id="status_active" aria-label=".form-select-lg example">
        <option selected>{{$GsmTerminate->status_active}}</option>
        <option value="Sukses">Sukses</option>
        <option value="Tidak Sukses">Tidak Sukses</option>
        </select></i>
    </td>
    <td>
        <select class="form-control company_id-{{$GsmTerminate->id}}" id="company_id" name="company_id-{{$GsmTerminate->id}}">
            <option value="{{ $GsmTerminate->company->id}}">
                {{ $GsmTerminate->gsmActive->company->company_name}}
            </option>
        </select></i>
    </td>
    <td>
        <textarea class="form-control note-{{$GsmTerminate->id}}" id="note" name="note" rows="3">{{$GsmTerminate->note}}</textarea></i>
    </td>


=======
   <td><select class="form-select status_active-{{$GsmTerminate->id}}" id="status_active" aria-label=".form-select-lg example">
    <option selected>{{$GsmTerminate->status_active}}</option>
    <option value="Sukses">Sukses</option>
    <option value="Tidak Sukses">Tidak Sukses</option>
    </select></i></td>
      <td><select class="form-control company_id-{{$GsmTerminate->id}}" id="company_id" name="company_id-{{$GsmTerminate->id}}">

       @foreach ($GsmActive as $GsmActives)

        <option value="{{ $GsmActives->id }}" {{ old('company_id') == $GsmActives->id  ? 'selected':'' }}>
        {{$GsmActives->company->company_name}}
       </option>
       @endforeach
    </select></i></td>
      <td><textarea class="form-control note-{{$GsmTerminate->id}}" id="note" name="note" rows="3">{{$GsmTerminate->note}}</textarea></i></td>
>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
<script type="text/javascript">
   $(document).ready(function() {
       $('select[name="gsm_active_id"]').on('change', function() {
           var id = $(this).attr("id");
           var stateID = $(this).val();
           if(stateID) {
               $.ajax({
                   url: '/dependent_terminate/'+stateID,
                   type: "GET",
                   dataType: "json",
                   success:function(data) {
                       $('select[name="company_id-'+id+'"]').empty();
                       $.each(data, function(key, value) {
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                           //------///
                         var compID = value;
                           $.ajax({
                              url: '/show_company/'+compID,
                              type: "GET",
                              dataType: "json",
                              success:function(data) {
                                 $('select[name="company_id-'+id+'"]').empty();
                                 $.each(data, function(key, value) {
<<<<<<< HEAD
                                       //------///
=======

                                       //------///




>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                                       //---///
                                 $('select[name="company_id-'+id+'"]').append('<option value="'+ key +'">'+ value +'</option>');
                                 });
                              }
                           });
<<<<<<< HEAD
=======


>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
                           //---///
                       });
                   }
               });
           }else{
               $('select[name="company_id-'+id+'"]').empty();
           }
       });
   });
</script>
<<<<<<< HEAD
=======

>>>>>>> 16a71c4f897e3f5521f93dffe30c0dfcfddb2131
