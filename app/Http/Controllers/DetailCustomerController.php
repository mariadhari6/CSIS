<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DetailCustomer;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DetailCustomerController extends Controller
{
    public function index()
    {
        return view('customer.detail_customer.index');
    }

    public function item_data()
    {
        $details = DetailCustomer::orderBy('id', 'DESC')->get();
        return view('customer.detail_customer.item_data', compact('details'));
    }


    public function add_form(){

        $response = Http::post('https://oslog.id/apiv5/gps/search?apiKey=8725f9e6-7713-4c99-8fd8-20ae0a523709', [
            'start' => '0',
            'lenght'=> '25',
            'name' => 'license_plate',
            'logic_operator' => 'like',
            'value' => '',
            'operator' => 'AND',
            'table_name' => 'm_vehicle',
            'name' => 'company',
            'column_result' => 'name',
            'name' => 'vehicle',
            'column_result' => ['licence_plate','name'],
            'name' => 'vehicle_type',
            'column_result' => 'name',
            'name' => 'pool',
            'column_result' => 'name',
            // 'columns' => 'id',
            // 'ascending' => false
        ]);

        $data = $response->json();
        $items = $data['data'];

        return view('customer.detail_customer.add_form' , compact('items'));
    }

    public function store(Request $request)
    {

        // cek data company
        // jika kosong
        // insert data company
        // jika ada
        // insert table detail customer

            $data = array(
            "company_id"            => $request->CompanyId,
            "licence_plate"         => $request->LicencePlate,
            "vihecle_type"          => $request->VihecleType,
            "po_number"             => $request->PoNumber,
            "po_date"               => $request->PoDate,
            "status_po"             => $request->StatusPo,
            "imei"                  => $request->Imei,
            "merk"                  => $request->Merk,
            "type"                  => $request->Type,
            "GSM"                   => $request->GSM,
            "provider"              => $request->Provider,
            "serial_number_sensor"  => $request->SerialNumberSensor,
            "name_sensor"           => $request->NameSensor,
            "merk_sensor"           => $request->MerkSensor,
            "pool_name"             => $request->PoolName,
            "pool_location"         => $request->PoolLocation,
            "waranty"               => $request->Waranty,
            "status_layanan"        => $request->StatusLayanan,
            "tanggal_pasang"        => $request->TanggalPasang,
            "tanggal_non_aktif"     => $request->TanggalNonAktif
        );
        DetailCustomer::insert($data);
    }

    public function destroy($id)
    {
        $data = DetailCustomer::findOrfail($id);
        $data->delete();
    }

    public function edit_form($id)
    {
        $details = DetailCustomer::findOrfail($id);
        return view('customer.detail_customer.edit_form', compact('details'));
    }

    public function update(Request $request, $id)
    {
        $data = DetailCustomer::findOrfail($id);
        $data->company_id            = $request->CompanyId;
        $data->licence_plate         = $request->LicencePlate;
        $data->vihecle_type          = $request->VihecleType;
        $data->po_number             = $request->PoNumber;
        $data->po_date               = $request->PoDate;
        $data->status_po             = $request->StatusPo;
        $data->imei                  = $request->Imei;
        $data->merk                  = $request->Merk;
        $data->type                  = $request->Type;
        $data->GSM                   = $request->GSM;
        $data->provider              = $request->Provider;
        $data->serial_number_sensor  = $request->SerialNumberSensor;
        $data->name_sensor           = $request->NameSensor;
        $data->merk_sensor           = $request->MerkSensor;
        $data->pool_name             = $request->PoolName;
        $data->pool_location         = $request->PoolLocation;
        $data->waranty               = $request->Waranty;
        $data->status_layanan        = $request->StatusLayanan;
        $data->tanggal_pasang        = $request->TanggalPasang;
        $data->tanggal_non_aktif     = $request->TanggalNonAktif;
        $data->save();
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->input('id');
        $data = DetailCustomer::WhereIn('id', $ids);
        $data->delete();
    }

    public function selected()
    {
        $details = DetailCustomer::all();
        return view('customer.detail_customer.selected', compact('details'));
    }
}
