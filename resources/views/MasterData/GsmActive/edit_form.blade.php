
    <td></td>
    <td></td>
    <td>
        <select class="select status_gsm-{{$GsmActive->id}}" id="status_gsm" name="status_gsm" required>
            <option value="Ready" {{ $GsmActive->status_gsm == 'Ready' ? 'selected' : ''  }}>Ready</option>
            <option value="Active" {{ $GsmActive->status_gsm == 'Active' ? 'selected' : ''  }}>Active</option>
            <option value="Terminate" {{ $GsmActive->status_gsm == 'Terminate' ? 'selected' : ''  }}>Terminate</option>
        </select>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input gsm_number-{{$GsmActive->id}}" id="gsm_number" placeholder="Gsm Number" value="{{ $GsmActive->gsm_number}}" required></div>
    </td>
    <td>
        <select class="select company_id-{{$GsmActive->id}}" id="company_id" name="company_id" required>
            @foreach ($company as $item)
            <option value="{{ $item->id }}" {{ $item->id == $GsmActive->company_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
            @endforeach
        </select></i>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input request_date-{{$GsmActive->id}}" id="request_date" placeholder="Request Date" value="{{ $GsmActive->expired_date}}" required></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input active_date-{{$GsmActive->id}}" id="active_date" placeholder="Active Date" value="{{ $GsmActive->active_date}}" required></div>
    </td>
    <td>
        <textarea class="form-control note-{{$GsmActive->id}}" id="note" name="note" rows="3" required>{{$GsmActive->note}}</textarea>
    </td>
      <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $GsmActive->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>



