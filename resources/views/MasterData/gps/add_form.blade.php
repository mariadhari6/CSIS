<tr id="add_form">
<form>
<td></td>
<td></td>

    <td>
        <select class="select @error('merk') is-invalid @enderror" id="merk" name="merk" required>
            <option selected disabled @if (old('merk')=='' or old('merk')==0) @endif>Merk</option>

            @foreach ($merk as $item)
            <option value="{{ $item->id }}"  {{ old('merk') == $item->id ? 'selected':'' }}>{{ $item->merk}}</option>
            @endforeach
        </select>
        @error('merk')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>

    <td>
        <select class="select @error('type') is-invalid @enderror" id="type" name="type">
            <option selected disabled @if (old('type')=='' or old('type')==0) @endif>Type</option>

            @foreach ($type as $item)
            <option value="{{ $item->id }}" {{ old('type') == $item->id ? 'selected':'' }}>{{ $item->typeGps->type_gps}}</option>
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
        <div class="input-div"><input type="number" class="input @error('imei') is-invalid @enderror" id="imei" name="imei" placeholder="IMEI" value="{{old('imei')}}"></i>
        @error('imei')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>

    <td>
        <div class="input-div"><input type="date" class="input @error('waranty') is-invalid @enderror" id="waranty" placeholder="Waranty" name="waranty" value="{{old('waranty')}}" ></i>
        @error('waranty')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <div class="input-div"><input type="date" class="input @error('po_date') is-invalid @enderror" id="po_date" placeholder="Po Date" name="po_date" value="{{old('po_date')}}"></i>
        @error('po_date')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <select class="select @error('status') is-invalid @enderror" id="status" aria-label=".form-select-lg example" required>
            <option selected disabled>Pilih status</option>
            <option value="Ready">Ready</option>
            <option value="Used">Used</option>
            <option value="Error">Error</option>
        </select></i>
        @error('status')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>
    <td>
        <select class="select" id="status_ownership" aria-label=".form-select-lg example" required>
            <option selected>Pilih Status</option>
            <option value="-">-</option>
            <option value="Sewa">Sewa</option>
            <option value="Sewa Beli">Sewa Beli</option>
            <option value="Trial">Trial</option>
            <option value="Beli">Beli</option>
        </select></i>
        @error('status_ownership')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </td>


    <td>
        <button type="submit" class="fas fa-check add" id="btn-primary-outline" onclick="store()"></button>
        {{-- <i ></i> --}}
        <button type="button" id="btn-primary-outline" class="fas fa-times cancel" onclick="cancel()"></button>
        {{-- <i ></i></td> --}}
    <td>
    </form>

</tr>

