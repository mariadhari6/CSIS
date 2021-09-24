<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\DetailCustomer;

use Illuminate\Http\Request;
=======
use App\Models\Company;
use App\Models\DetailCustomer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e

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

    public function add_form()
    {
<<<<<<< HEAD

        return view('customer.detail_customer.add_form');
=======
        $company = Company::orderBy('id', 'DESC')->get();
        return view('customer.detail_customer.add_form', compact('company'));
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
    }

    public function store(Request $request)
    {
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

<<<<<<< HEAD
    public function show($id)
    {
        $details = DetailCustomer::findOrfail($id);
        return view('customer.detail_customer.edit_form', compact('details'));
=======
    public function edit_form($id)
    {
        $company = Company::orderBy('id', 'DESC')->get();
        $details = DetailCustomer::findOrfail($id);
        return view('customer.detail_customer.edit_form', compact('details', 'company'));
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
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

<<<<<<< HEAD
    public function deleteAll(Request $request)
    {
        $ids = $request->input('id');
        $data = DetailCustomer::WhereIn('id', $ids);
        $data->delete();
    }
=======
    // public function deleteAll(Request $request)
    // {
    //     $ids = $request->input('id');
    //     $data = DetailCustomer::WhereIn('id', $ids);
    //     $data->delete();
    // }
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e

    public function selected()
    {
        $details = DetailCustomer::all();
        return view('customer.detail_customer.selected', compact('details'));
    }
<<<<<<< HEAD
}
=======

    public function updateall(Request $request, $id)
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

        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('detail_customers')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(DetailCustomer::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        DetailCustomer::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
>>>>>>> 7f487e11d887604e31cbc913b8ce5c4f7bb1646e
