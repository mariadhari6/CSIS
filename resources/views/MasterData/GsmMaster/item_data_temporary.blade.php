@foreach ($GsmMaster as $item)
    <tr>
        <td type="hide" class="temporary-id-{{ $item->id }}" id="{{ $item->id }}" >
            {{ $item->id }}
        </td>
        <td class="temporary-status_gsm-{{ $item->id }}" id="{{ $item->status_gsm }}" >
            {{ $item->status_gsm }}
        </td>
        <td class="temporary-gsm_number-{{ $item->id }}" id="{{ $item->gsm_number }}">
            {{ $item->gsm_number }}
        </td>
        <td class="temporary-company_id-{{ $item->id }}" id="{{ $item->company->id }}">
            {{ $item->company->company_name }}
        </td>
        <td class="temporary-serial_number-{{ $item->id }}" id="{{ $item->serial_number }}">
            {{ $item->serial_number }}
        </td>
        <td class="temporary-icc_id-{{ $item->id }}" id="{{ $item->icc_id }}">
            {{ $item->icc_id }}
        </td>
        <td class="temporary-imsi-{{ $item->id }}" id="{{ $item->imsi }}">
            {{ $item->imsi }}
        </td>
        <td class="temporary-res_id-{{ $item->id }}" id="{{ $item->res_id }}">
            {{ $item->res_id }}
        </td>
        <td class="temporary-request_date-{{ $item->id }}" id="{{ $item->request_date }}">
            {{ $item->request_date }}
        </td>
        <td class="temporary-expired_date-{{ $item->id }}" id="{{ $item->expired_date }}">
            {{ $item->expired_date }}
        </td>
        <td class="temporary-active_date-{{ $item->id }}" id="{{ $item->active_date }}">
            {{ $item->active_date }}
        </td>
        <td class="temporary-terminate_date-{{ $item->id }}" id="{{ $item->terminate_date }}">
            {{ $item->terminate_date }}
        </td>
        <td class="temporary-note-{{ $item->id }}" id="{{ $item->note }}">
            {{ $item->note }}
        </td>
    </tr>
@endforeach
