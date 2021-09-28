<tr>
    <td width="80px"></td>
    <td><i class="fas fa-check add" id="add" onclick="store()"></i><i class="fas fa-times cancel" onclick="cancel()"></i></td>
    <td >
        <select class="select" id="CompanyId">
            <option value="" disabled selected>Company</option>
            @foreach ($summary as $item )
                <option value='{{ $item->company->company_name}}'> {{ $item->company->company_name}}</option>
            @endforeach
        </select>
    </td>
    <td><div class="input-div" ><input type="text" class="input" id="PoNumber" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="JumlahUnit" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="HargaLayanan" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="Revenue" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="StatusPo" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="MerkGPSTerpasang" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="TypeGPSTerpasang" placeholder=""></div></td>
    <td><div class="input-div" ><input type="text" class="input" id="Jumlah" placeholder=""></div></td>
</tr>
