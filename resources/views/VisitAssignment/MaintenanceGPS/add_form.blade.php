<tr id="add_form">
    <td></td>
    <td></td>
    <td>
        <i class="fas fa-check add" id="add" onclick="store()"></i>
        <i class="fas fa-times cancel" onclick="cancel()"></i>
    </td>
    <td> 
        <select class="form-control" id="seller_id" name="seller_id">
            <option value="">Pilih Company</option>

            {{-- @foreach ($requestComplaint as $item)
            <option value="{{ $item->company }}">{{ $item->companyRequest->id }}</option>
            @endforeach --}}

        </select>
    </td>
    <td>
        <div class="input-div"><input type="date" class="input" id="tanggal" placeholder="tanggal" required>
    </td>
    <td>
        <select class="form-control" id="type_gps" name="type_gps">
            <option value="">Type Gps</option>
            <option></option>
        </select>
    </td>
    <td>
        <select class="form-control" id="equipment_gps" name="equipment_gps">
            <option value="">equipment_gps</option>
            <option></option>
        </select>
    </td>
    <td>
        <select class="form-control" id="equipment_sensor" name="equipment_sensor">
            <option value="">equipment_sensor</option>
            <option></option>
        </select>
    </td>
    <td> 
        <div class="input-div">
            <input type="number" class="input" id="equipment_gsm" placeholder="Qty" required>
        </div>
    </td>
    <td>
        <select class="form-control" id="permasalahan" name="permasalahan">
            <option value="">permasalahan</option>
            <option></option>
        </select>
    </td>
    <td>
        <select class="form-control" id="ketersediaan_kendaraan" name="ketersediaan_kendaraan">
            <option value="Tidak Tersedia">Tidak Tersedia</option>
            <option value="Tersedia">Tersedia</option>
        </select>
    </td>
    <td>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
    </td>
    <td>
        <textarea class="form-control" id="hasil" name="hasil" rows="3"></textarea>
    </td>
    <td> 
        <div class="input-div">
            <input type="number" class="input" id="biaya_transportasi" placeholder="BiayaTransportasi" required>
        </div>
    </td>
    <td>
        <select class="form-control" id="teknisi" name="teknisi">
            <option value="">teknisi</option>
            <option></option>
        </select>
    </td>
    <td>
        <select class="form-control" id="req_by" name="req_by">
            <option value="Customer">Customer</option>
            <option value="req_by">req_by</option>
        </select>
    </td>
    <td>
        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
    </td>
    

{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="seller_id"]').on('change', function() {
            var itemID = $(this).val();
            if(itemID) {
                $.ajax({
                    url: '/dependent_company/'+itemID,
                    method: "GET",
                    dataType: "json",
                    success:function(data) {

                        $('select[name="no_agreement_letter_id').empty();
                            $.each(data, function(key, value) {
                                $('select[name="no_agreement_letter_id').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                    }
                });
            }else{
                $('select[name="no_agreement_letter_id"]').empty();
            }
        });
    });
</script>    --}}

</tr>

