<tr id="add_form">

    <td></td>
    <td></td>

    <td>
        <select class="select" id="company_id" name="company_id" required>
            <option selected disabled>Company</option>

       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>

       @endforeach
    </select></i>
    </td>
    <td>
        <select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example" required>
            <option selected disabled>Internal/External</option>
            <option value="Internal Request">Internal Request</option>
            <option value="Internal Complain">Internal Complain</option>
            <option value="Eksternal Request">Eksternal Request</option>
            <option value="Eksternal Complain">Eksternal Complain</option>
        </select></i>
    </td>
      <td>
          <select class="select" id="pic_id" name="pic_id" required>
            <option selected disabled>PIC</option>
            @foreach ($pic as $pics)
                <option value="{{ $pics->id }}" {{ old('pic') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>

            @endforeach
         </select></i>
      </td>

      <td>
          <select class="select" id="vehicle" name="vehicle">
            <option selected disabled value="">Vehicle</option>
            @foreach ($vehicle as $item)
                <option value="{{ $item->id }}" {{ old('vehicle') == $item->id ? 'selected':'' }}>{{ $item->license_plate }}</option>

            @endforeach
         </select></i>
      </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="Waktu Info" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="Waktu Respond" required></i></div>
    </td>

    <td>
        <select class="select" id="task" name="task" required>
       @foreach ($task_request as $item)
        <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->task }}</option>

       @endforeach
    </select></i>
    </td>

      <td>
        <select class="select" id="platform" id="platform" aria-label=".form-select-lg example" required>
            <option selected disabled>Platform</option>
            <option value="WA">WA</option>
            <option value="SMS">SMS</option>
            <option value="E-mail">E-mail</option>
            <option value="Telepon">Telepon</option>
        </select></i>
    </td>


    <td>
        <textarea class="form-control" id="detail_task" name="detail_task" required ></textarea></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="divisi" placeholder="Divisi" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="respond" placeholder="Respond" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="waktu_kesepakatan" required ></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="waktu Solve" required ></i></div>
    </td>
    <td>
        <select class="select"  id="status" aria-label=".form-select-lg example" required>
            <option disabled value="On Progress">Status</option>
            <option value="On Progress">On Progress</option>
            <option value="Done">Done</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="status akhir" ></i></div>
    </td>
    <td class="action sticky-col first-col">
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

</tr>

