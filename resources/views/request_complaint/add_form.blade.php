<tr id="add_form">
    <td></td>
    <td></td>

    <td>
        <select class="select" id="company_id" name="company_id">
       @foreach ($company as $companys)
        <option value="{{ $companys->id }}" {{ old('company_id') == $companys->id ? 'selected':'' }}>{{ $companys->company_name }}</option>
       @endforeach
    </select></i>
    </td>
    <td>
        <select class="select" id="internal_eksternal" name="internal_eksternal" aria-label=".form-select-lg example">
            <option selected>Pilih status</option>
            <option value="Request Internal">Request Internal </option>
            <option value="Complain Internal ">Complain Internal </option>
            <option value="Request Eksternal ">Request Eksternal </option>
            <option value="Complain Eksternal ">Complain Eksternal</option>
        </select></i>
    </td>
      <td>
          <select class="select" id="pic" name="pic">
            @foreach ($pic as $pics)
                <option value="{{ $pics->id }}" {{ old('pic') == $pics->id ? 'selected':'' }}>{{ $pics->pic_name }}</option>
            @endforeach
         </select></i>
      </td>
    <td>
        <select class="select" id="vehicle" id="vehicle" aria-label=".form-select-lg example">
            <option selected>Vehicle</option>
            <option value="B-94828-YTS">B-94828-YTS</option>
            <option value="B-76267-TWS">B-76267-TWS</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_info" placeholder="Waktu Info"></i></div>
    </td>
    <td>
        <textarea class="form-control" id="task" name="task" ></textarea></i>
    </td>
    <td>
        <select class="select" id="platform" id="platform" aria-label=".form-select-lg example">
            <option selected>Platform</option>
            <option value="WA">WA</option>
            <option value="SMS">SMS</option>
            <option value="E-mail">E-mail</option>
            <option value="Telepon">Telepon</option>
        </select></i>
    </td>
    <td>
        <textarea class="form-control" id="detail_task" name="detail_task" ></textarea></i>
    </td>
    <td>
        <select class="select" id="divisi" id="divisi" aria-label=".form-select-lg example">
        <option selected>Divisi</option>
            <option value="Operasional (CS)">Operasional (CS)</option>
            <option value="Lintas Divisi">Lintas Divisi</option>
            <option value="Operasional (Implementor)">Operasional (Implementor)</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_respond" placeholder="Waktu Respond"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="respond" placeholder="Respond" ></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_kesepakatan" placeholder="Waktu Kesepakatan" ></i></div>
    </td>
    <td>
        <div class="input-div"><input type="datetime-local" class="input" id="waktu_solve" placeholder="Waktu Solve" ></i></div>
    </td>
    <td>
        <select class="select"  id="status" aria-label=".form-select-lg example">
            <option selected>Platform</option>
            <option value="On Progress">On Progress</option>
            <option value="Done">Done</option>
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="status_akhir" placeholder="Status Akhir" ></i></div>
    </td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>

</tr>
