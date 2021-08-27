    <td>
        <i class="fas fa-check add" id="edit" onclick="update({{ $company->id}})"></i><i class="fas fa-times cancel" onclick="cancel()" ></i>
    </td>
    <td>
       <select class="form-control" id="seller_id" name="seller_id">
       @foreach ($seller as $sellers)
          <option value="{{ $sellers->seller_name }}">{{ $sellers->seller_name}}</option>
       @endforeach
    </select></td>

    <td>
        <div class="input-div"><input type="text" class="input" id="company_name" placeholder="Company Name" value="{{ $company->company_name}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="status" placeholder="Status" value="{{ $company->status}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="customer_code" placeholder="Customer Code" value="{{ $company->customer_code}}"></i></div>
    </td>
    <td>
        <div class="input-div"><input type="text" class="input" id="no_po" placeholder="No Po" value="{{ $company->no_po}}"></i></div>
    </td>
     <td>
        <div class="input-div"><input type="text" class="input" id="po_date" placeholder="Po Date" value="{{ $company->po_date}}"></i></div>
    </td>
