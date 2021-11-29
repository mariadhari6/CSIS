<<<<<<< HEAD
<td></td>
<td></td>
<td>
    <select class="select status_gsm-{{$GsmMaster->id}}" id="status_gsm" name="status_gsm">
        <option value="Ready" {{ $GsmMaster->status_gsm == 'Ready' ? 'selected' : ''  }}>Ready</option>
        <option value="Active" {{ $GsmMaster->status_gsm == 'Active' ? 'selected' : ''  }}>Active</option>
        <option value="Terminate" {{ $GsmMaster->status_gsm == 'Terminate' ? 'selected' : ''  }}>Terminate</option>
    </select>
</td>
<td>
    <div class="input-div"><input type="text" class="input gsm_number-{{$GsmMaster->id}}" id="gsm_number" placeholder="Gsm Number" value="{{ $GsmMaster->gsm_number}}"></div>
</td>
<td>
    <select class="select company_id-{{$GsmMaster->id}}" id="company_id" name="company_id">
        @foreach ($company as $item)
        <option value="{{ $item->id }}" {{ $item->id == $GsmMaster->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
        @endforeach
    </select></i>
</td>
<td>
    <div class="input-div"><input type="text" class="input serial_number-{{$GsmMaster->id}}" id="serial_number" placeholder="Serial Number" value="{{ $GsmMaster->serial_number}}"></div>
</td>
<td>
    <div class="input-div"><input type="text" class="input icc_id-{{$GsmMaster->id}}" id="icc_id" placeholder="ICC_ID" value="{{ $GsmMaster->icc_id}}"></div>
</td>
<td>
    <div class="input-div"><input type="text" class="input imsi-{{$GsmMaster->id}}" id="imsi" placeholder="IMSI" value="{{ $GsmMaster->imsi}}"></div>
</td>
<td>
    <div class="input-div"><input type="text" class="input res_id-{{$GsmMaster->id}}" id="res_id" placeholder="Res ID" value="{{ $GsmMaster->res_id}}"></div>
</td>
<td>
    <div class="input-div"><input type="date" class="input request_date-{{$GsmMaster->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmMaster->expired_date}}"></div>
</td>
<td>
    <div class="input-div"><input type="date" class="input expired_date-{{$GsmMaster->id}}" id="expired_date" placeholder="Expired Date" value="{{ $GsmMaster->expired_date}}"></div>
</td>
<td>
    <div class="input-div"><input type="date" class="input active_date-{{$GsmMaster->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmMaster->active_date}}"></div>
</td>
<td>
    <div class="input-div"><input type="date" class="input terminate_date-{{$GsmMaster->id}}" id="terminate_date" placeholder="Terminate Date" value="{{ $GsmMaster->terminate_date}}"></div>
</td>
<td>
    <textarea class="select note-{{$GsmMaster->id}}" id="note" name="note" >{{$GsmMaster->note}}</textarea>
</td>
<td>
    <select class="select provider-{{$GsmMaster->id}}" id="provider" name="provider">
        <option value="{{ $GsmMaster->provider }}" class="input provider-{{ $GsmMaster->id }}">{{ $GsmMaster->provider }}</option>
            <option value="Telkomsel">Telkomsel</option>
            <option value="XL Axiata">XL Axiata</option>
            <option value="Tri">Tri</option>
            <option value="Indosat">Indosat</option>
            <option value="Smartfren">SmartFrend</option>
    </select>
</td>
<td class="sticky-col first-col">
    <i class="fas fa-check add" id="edit" onclick="update({{ $GsmMaster->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
</td>
=======

    <td></td>
    <td></td>
    <td>
        <select class="select status_gsm-{{$GsmMaster->id}}" id="status_gsm" name="status_gsm" required>
            <option value="Ready" {{ $GsmMaster->status_gsm == 'Ready' ? 'selected' : ''  }}>Ready</option>
            <option value="Active" {{ $GsmMaster->status_gsm == 'Active' ? 'selected' : ''  }}>Active</option>
            <option value="Terminate" {{ $GsmMaster->status_gsm == 'Terminate' ? 'selected' : ''  }}>Terminate</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input gsm_number-{{$GsmMaster->id}}" id="gsm_number" placeholder="Gsm Number" value="{{ $GsmMaster->gsm_number}}" required></div>
    </td>
    <td>
        <select class="select company_id-{{$GsmMaster->id}}" id="company_id" name="company_id" required>
            @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ $item->id == $GsmMaster->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
            @endforeach
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input serial_number-{{$GsmMaster->id}}" id="serial_number" placeholder="Serial Number" value="{{ $GsmMaster->serial_number}}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input icc_id-{{$GsmMaster->id}}" id="icc_id" placeholder="ICC_ID" value="{{ $GsmMaster->icc_id}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input imsi-{{$GsmMaster->id}}" id="imsi" placeholder="IMSI" value="{{ $GsmMaster->imsi}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input res_id-{{$GsmMaster->id}}" id="res_id" placeholder="Res ID" value="{{ $GsmMaster->res_id}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmMaster->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmMaster->expired_date}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input expired_date-{{$GsmMaster->id}}" id="expired_date" placeholder="Expired Date" value="{{ $GsmMaster->expired_date}}"></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input active_date-{{$GsmMaster->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmMaster->active_date}}" ></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input terminate_date-{{$GsmMaster->id}}" id="terminate_date" placeholder="Terminate Date" value="{{ $GsmMaster->terminate_date}}" ></div>
    </td>
    <td>
        <textarea class="form-control note-{{$GsmMaster->id}}" id="note" name="note" >{{$GsmMaster->note}}</textarea>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input provider-{{$GsmMaster->id}}" id="provider" placeholder="Provider" value="{{ $GsmMaster->provider}}" ></div>
    </td>
        <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $GsmMaster->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
>>>>>>> 0293daf947a64c7bb2c3c3f1585c4b26e5483f54


<script>
     // Status ready tidak bisa pilih company
         $('select[name="status"]').on('change', function() {
            var itemID = $(this).val();
           if(itemID == "Ready"){
               $('#td-company').empty();
               $('#td-company').append(
                 `<select class="select" id="" disable>
                     <option value="">-</option>
                </select>`
               );
               document.getElementById("terminate_date").disabled = true;
               document.getElementById("active_date").disabled = true;
           }else if(itemID == "Active" || "Terminate"){
                $('#td-company').empty();
                $('#td-company').append(
                `<select class="select" id="company_id" disable>
                <option value="" class="hidden">--Pilih Company--</option>
                        @foreach ($company as $item)
                        <option value="{{ $item->id }}" {{ old('company_id') == $item->id ? 'selected':'' }}>{{ $item->company_name }}</option>
                        @endforeach
                </select>`
                );
                if(itemID == "Active"){
                    document.getElementById("terminate_date").disabled = true;
                    document.getElementById("active_date").disabled = false;
                }else if(itemID == "Terminate"){
                    document.getElementById("terminate_date").disabled = false;
                    document.getElementById("active_date").disabled = true;
                }
           }
        });
</script>
