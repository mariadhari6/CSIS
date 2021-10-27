
    <td></td>
    <td></td>
    <td>
        <select class="select merk-{{$gps->id}}" id="merk" name="merk" required>
            <option value="{{$gps->merkGps->id}}">{{$gps->merkGps->merk}}</option>

            @foreach ($merk_gps as $item)
            <option value="{{ $item->id }}" {{ old('merk') == $item->id ? 'selected':'' }}>{{ $item->merk}}</option>
            @endforeach

        </select>
    </td>

    <td>
        <select class="select type-{{$gps->id}}" id="type" name="type" required>
            <option value="{{$gps->typeGps->id}}">{{$gps->typeGps->type}}</option>

            @foreach ($type_gps as $item)
            <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':'' }}>{{ $item->type}}</option>
            @endforeach

        </select>
    </td>
    {{-- <td>
        <div class="input-div"><input type="text" class="input type-{{$gps->id}}" id="type" placeholder="Type" value="{{ $gps->type}}"></i></div>
    </td> --}}
    <td>
        <div class="input-div"><input type="text" class="input imei-{{$gps->id}}" id="imei" placeholder="IMEI" value="{{ $gps->imei}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input waranty-{{$gps->id}}" id="waranty" placeholder="Waranty" value="{{ $gps->waranty}}" required></i></div>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input po_date-{{$gps->id}}" id="po_date" placeholder="Po Date" value="{{ $gps->po_date}}" required></i></div>
    </td>
    <td>
        <select class="select status-{{$gps->id}}" id="status" aria-label=".form-select-lg example" required>
            <option selected>{{$gps->status}}</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
    </td>
    <td>
        <select class="select status_ownership-{{$gps->id}}" id="status_ownership" aria-label=".form-select-lg example">
            <option selected>{{$gps->status_ownership}}</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select></i>
    </td>

    <td class="action sticky-col first-col">
        <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="edit" onclick="update({{ $gps->id}})"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>





