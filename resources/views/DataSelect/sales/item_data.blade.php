
@foreach ($sales as $item)
    <tr id="edit-form-{{ $item->id }}">

        <td id="item-name-{{ $item->id}}">
            {{ $item->name }}
        </td>


        <td class="action sticky-col first-col" id="td-button-{{ $item->id }}">
        <div id="button-{{ $item->id }}">
            <i class="fas fa-pen edit" onclick="edit({{ $item->id }})"></i>
            <i class="fas fa-trash delete" onclick="destroy({{ $item->id }})"></i>
        </div>
        </td>
    </tr>
@endforeach

