@foreach ($request_complaint as $request_complaints)
    <tr id="edit-form-{{ $request_complaints->id }}">
        <td id="td-checkbox-{{ $request_complaints->id }}">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input task-select" type="checkbox" id="{{$request_complaints->id}}">
                    <span class="form-check-sign"></span>
                </label>
            </div>
        </td>
        <td id="td-button-{{ $request_complaints->id }}">
            <div id="button-{{ $request_complaints->id }}">
                <i class="fas fa-pen edit" onclick="edit({{ $request_complaints->id }})"></i>
                <i class="fas fa-trash delete" onclick="destroy({{ $request_complaints->id }})"></i>
            </div>
        </td>
        <td id="item-company_id-{{ $request_complaints->id}}">
                {{ $request_complaints->company->company_name }}
        </td>
        <td id="item-internal_eksternal-{{ $request_complaints->id}}">
                {{ $request_complaints->internal_eksternal}}
        </td>
        <td id="item-pic-{{ $request_complaints->id }}">
                {{ $request_complaints->pic->pic_name }}
        </td>
        <td id="item-vehicle-{{ $request_complaints->id }}">
                {{ $request_complaints->vehicle }}
        </td>
        <td id="item-waktu_info-{{ $request_complaints->id }}">
                {{ $request_complaints->waktu_info }}
        </td>
        <td id="item-task-{{ $request_complaints->id}}">
                {{ $request_complaints->task}}
        </td>
        <td id="item-platform-{{ $request_complaints->id}}">
                {{ $request_complaints->platform}}       
        </td>
        <td id="item-detail_task-{{ $request_complaints->id}}">
                {{ $request_complaints->detail_task}}       
        </td>
        <td id="item-divisi-{{ $request_complaints->id}}">
                {{ $request_complaints->divisi}}
        </td>
        <td id="item-waktu_respond-{{ $request_complaints->id}}">
                {{ $request_complaints->waktu_respond}}       
        </td>
        <td id="item-respond-{{ $request_complaints->id}}">
                {{ $request_complaints->respond}}
        </td>
        <td id="item-waktu_kesepakatan-{{ $request_complaints->id}}">
                {{ $request_complaints->waktu_kesepakatan}}
        </td>
        <td id="item-waktu_solve-{{ $request_complaints->id}}">
                {{ $request_complaints->waktu_solve}}
        </td>
        <td id="item-status-{{ $request_complaints->id}}">
                {{ $request_complaints->status}}
        </td>
        <td id="item-status_akhir-{{ $request_complaints->id}}">
                {{ $request_complaints->status_akhir}}
        </td>
        
    </tr>
@endforeach

