    <td></td>
    <td></td> 
    <td>
        <div class="input-div"><input type="text" class="input seller_name-{{$seller->id}}" id="seller_name" placeholder="Seller Name" value="{{ $seller->seller_name}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input seller_code-{{$seller->id}}" id="seller_code" placeholder="Seller Code" value="{{ $seller->seller_code}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input no_agreement_letter-{{$seller->id}}" id="no_agreement_letter" placeholder="No Agreement Latter" value="{{ $seller->no_agreement_letter}}"></i></div>
    </td>
    <td>
        <select class="select status-{{$seller->id}}" id="status" aria-label=".form-select-lg example">
            <option selected>{{$seller->status}}</option>
            <option value="Active">Active</option>
            <option value="In Active">In Active</option>
        </select>
    </td>
    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $seller->id}})"></i>
        <i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>


