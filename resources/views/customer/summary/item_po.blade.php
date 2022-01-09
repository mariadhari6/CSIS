@php
$total = 0 ;
$rowspan = count($data);
@endphp
<div class="table-scroll">
    <table class="table table-hover" id="data_detail">
        <thead>
            <tr>
                <th scope="col" width="50px">No Po</th>
                <th scope="col" width="50px">Jumlah Unit Po</th>
                <th scope="col" width="80px">Jumlah GPS terpasang</th>
                <th scope="col" width="50px">Harga Layanan</th>
                <th scope="col" width="100px">Revenue</th>
                <th scope="col" width="50px">Status PO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td id="key">{{ $item->po->po_number }}</td>
                <td>{{ $item->po->jumlah_unit_po }}</td>
                <td>{{ $item->jumlah_per_po }}</td>
                <td>Rp.{{ number_format($item->po->harga_layanan) }}</td>
                <td>Rp.{{ number_format($item->po->harga_layanan * $item->jumlah_per_po ) }}</td>
                <td>{{ $item->po->status_po }}</td>

                @php
                $total += $item->po->harga_layanan * $item->jumlah_per_po;
                @endphp
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">TOTAL</th>
                <th style="text-align:center">Rp. {{number_format($total) }}</th>
            </tr>
        </tfoot>
    </table>
</div>
