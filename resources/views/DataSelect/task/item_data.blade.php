
@foreach ($task as $item)
    <tr id="edit-form-{{ $item->id }}">

        <td id="item-task-{{ $item->id}}">
            {{ $item->task }}
        </td>
        <td id="item-jenis-{{ $item->id }}">
            {{ $item->jenis }}
        </td>

        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
        <div id="button-{{ $item->id }}">
            <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
            <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
        </div>
        </td>
    </tr>
@endforeach

