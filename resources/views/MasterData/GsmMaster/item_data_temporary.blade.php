@foreach ($GsmMaster as $item)
    <tr>
        <td type="hide" class="temporary-id-{{ $item->id }}" id="{{ $item->id }}" >
            {{ $item->id }}
        </td>
        <td contenteditable bgcolor='{{ $item->status_gsm  == "" ? "ff8080" : "" }}' class="temporary-status_gsm-{{ $item->id }}" id="{{ $item->status_gsm }}" >
            {{ $item->status_gsm  == "" ? "column empty or fail format" : $item->status_gsm }}
        </td>
        <td contenteditable bgcolor='{{ $item->gsm_number  == "" ? "ff8080" : "" }}' status_gsm class="temporary-gsm_number-{{ $item->id }}" id="{{ $item->gsm_number }}">
            {{ $item->gsm_number  == "" ? "column empty or fail format" : $item->gsm_number }}
        </td>
        <td contenteditable bgcolor='{{ $item->company_id  == "" ? "ff8080" : "" }}' class="temporary-company_id-{{ $item->id }}" id="{{ $item->company_id == 0 ? 0 : $item->company->id }}">
            {{ $item->company_id == 0 ? 'column empty or fail format' : $item->company->company_name }}
        </td>
        <td contenteditable bgcolor='{{ $item->serial_number  == "" ? "ff8080" : "" }}' class="temporary-serial_number-{{ $item->id }}" id="{{ $item->serial_number }}">
            {{ $item->serial_number  == "" ? "column empty or fail format" : $item->serial_number }}
        </td>
        <td contenteditable bgcolor='{{ $item->icc_id  == "" ? "ff8080" : "" }}' class="temporary-icc_id-{{ $item->id }}" id="{{ $item->icc_id }}">
            {{ $item->icc_id  == "" ? "column empty or fail format" : $item->icc_id }}
        </td>
        <td contenteditable  bgcolor='{{ $item->imsi  == "" ? "ff8080" : "" }}' class="temporary-imsi-{{ $item->id }}" id="{{ $item->imsi }}">
            {{ $item->imsi  == "" ? "column empty or fail format" : $item->imsi }}
        </td>
        <td contenteditable  bgcolor='{{ $item->res_id  == "" ? "ff8080" : "" }}' class="temporary-res_id-{{ $item->id }}" id="{{ $item->res_id }}">
            {{ $item->res_id  == "" ? "column empty or fail format" : $item->res_id }}
        </td>
        <td contenteditable bgcolor='{{ $item->request_date  == "" ? "ff8080" : "" }}' class="temporary-request_date-{{ $item->id }}" id="{{ $item->request_date }}">
            {{ $item->request_date  == "" ? "column empty or fail format" : $item->request_date }}
        </td>
        <td contenteditable bgcolor='{{ $item->expired_date  == "" ? "ff8080" : "" }}' class="temporary-expired_date-{{ $item->id }}" id="{{ $item->expired_date }}">
            {{ $item->expired_date  == "" ? "column empty or fail format" : $item->expired_date }}
        </td>
        <td contenteditable bgcolor='{{ $item->active_date  == "" ? "ff8080" : "" }}' class="temporary-active_date-{{ $item->id }}" id="{{ $item->active_date }}">
            {{ $item->active_date  == "" ? "column empty or fail format" : $item->active_date }}
        </td>
        <td contenteditable bgcolor='{{ $item->terminate_date  == "" ? "ff8080" : "" }}' class="temporary-terminate_date-{{ $item->id }}" id="{{ $item->terminate_date }}">
            {{ $item->terminate_date  == "" ? "column empty or fail format" : $item->terminate_date }}
        </td>
        <td contenteditable bgcolor='{{ $item->note  == "" ? "ff8080" : "" }}' class="temporary-note-{{ $item->id }}" id="{{ $item->note }}">
            {{ $item->note  == "" ? "column empty or fail format" : $item->note }}
        </td>
        <td contenteditable bgcolor='{{ $item->provider  == "" ? "ff8080" : "" }}' class="temporary-provider-{{ $item->id }}" id="{{ $item->provider }}">
            {{ $item->provider  == "" ? "column empty or fail format" : $item->provider }}
        </td>
    </tr>
@endforeach
