
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
