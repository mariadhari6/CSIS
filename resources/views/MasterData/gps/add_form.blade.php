<tr id="add_form">


<td></td>
<td></td>

    <td>
        <select class="select" id="merk" name="merk" required>
            <option selected disabled value="">Merk</option>

            @foreach ($merk as $item)
            <option value="{{ $item->id }}"  {{ old('merk') == $item->id ? 'selected':'' }}>{{ $item->merk}}</option>
            @endforeach
        </select>

    </td>

    <td>
        <select class="select @error('type') is-invalid @enderror" id="type" name="type" required>
            <option selected disabled value="" @if (old('type')=='' or old('type')==0) @endif>Type</option>

            @foreach ($type as $item)
            <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':'' }}>{{ $item->type_gps}}</option>
            @endforeach

        </select>
         @error('type')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
     {{-- <td>
        <div class="input-div"><input type="text" class="input" id="merk" placeholder="Merk"></i>
    </td> --}}
    <td>
        <div class="input-div"><input type="number" class="input" id="imei" name="imei" placeholder="IMEI" value="{{old('imei')}}" max="15" min="15" required></i>

    </td>

    <td>
        <div class="input-div"><input type="date" class="input @error('waranty') is-invalid @enderror" id="waranty" placeholder="Waranty" name="waranty" value="{{old('waranty')}}" required></i>
        @error('waranty')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <div class="input-div"><input type="date" class="input @error('po_date') is-invalid @enderror" id="po_date" placeholder="Po Date" name="po_date" value="{{old('po_date')}}" required></i>
        @error('po_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <select class="select @error('status') is-invalid @enderror" id="status" aria-label=".form-select-lg example" required>
            <option selected disabled value="">Pilih status</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
        @error('status')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <select class="select" id="status_ownership" aria-label=".form-select-lg example">
            <option selected disabled value="-">Pilih Status</option>
            {{-- <option value="-">-</option> --}}
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select></i>
        @error('status_ownership')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
  <td class="action sticky-col first-col">
         <button class="unstyled-button" type="submit">
            <i class="fas fa-check add" id="add" onclick="store()"></i>
        </button>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    <td>




</tr>



