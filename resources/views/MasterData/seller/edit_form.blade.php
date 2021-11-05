<<<<<<< HEAD
    <td></td>
    <td></td> 
    <td>
        <div class="input-div"><input type="text" class="input seller_name-{{$seller->id}}" id="seller_name" placeholder="Seller Name" value="{{ $seller->seller_name}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input seller_code-{{$seller->id}}" id="seller_code" placeholder="Seller Code" value="{{ $seller->seller_code}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input no_agreement_letter-{{$seller->id}}" id="no_agreement_letter" placeholder="No Agreement Latter" value="{{ $seller->no_agreement_letter}}" required></i></div>
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

=======



<td></td>
<td></td>
<td>
    <div class="input-div">
        <input type="text" class="input seller_name-{{$seller->id}}" id="seller_name" placeholder="Seller Name" value="{{ $seller->seller_name}}">
    </div>
</td>
<td>
    <div class="input-div">
        <input type="text" class="input seller_code-{{$seller->id}}" id="seller_code" placeholder="Seller Code" value="{{ $seller->seller_code}}">
    </div>
</td>
<td>
    <div class="input-div">
        <input type="text" class="input no_agreement_letter-{{$seller->id}}" id="no_agreement_letter" placeholder="No Agreement Latter" value="{{ $seller->no_agreement_letter}}">
    </div>
</td>
<td>
    <select class="select status-{{$seller->id}}" id="status" aria-label=".form-select-lg example">
        <option selected value="{{  $seller->status == 'Active' ? 'Active' : 'In Active'}}">
            {{  $seller->status == 'Active' ? 'Active' : 'In Active'}}
        </option>
        <option value="{{  $seller->status == 'Active' ? 'In Active' : 'Active'}}">
            {{  $seller->status == 'Active' ? 'In Active' : 'Active'}}
        </option>
    </select>
</td>
<td  class="action sticky-col first-col">
    <button class="unstyled-button" type="submit">
    <i class="fas fa-check add" id="edit" onclick="update({{ $seller->id}})"></i>
    </button>
    <i class="fas fa-times cancel" onclick="cancel()" ></i>
</td>
>>>>>>> 931300e66e6b242e64c71277293e48dba27a7aeb

