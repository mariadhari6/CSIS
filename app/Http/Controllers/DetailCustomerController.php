<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\MasterPo;
use App\Models\Sensor;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DetailCustomerController extends Controller
{
    public function index()
    {
        $data = Company::orderBy('id', 'DESC')->get();
        return view('customer.detail_customer.list', compact('data'));
    }

    public function item_data($id)
    {
        $company = Company::findOrFail($id);
        $details = DetailCustomer::where('company_id', $company->id)->get();

        return view('customer.detail_customer.item_data', compact('details'));
    }

    public function add_form()
    {
        $company  = Company::orderBy('company_name', 'DESC')->get();
        $imei     = Gps::orderBy('imei', 'DESC')->where('status', 'Ready')->get();
        $gsm      = Gsm::orderBy('gsm_number', 'DESC')->where('status_gsm', 'Ready')->get();
        $sensor   = Sensor::orderBy('sensor_name', 'DESC')->where('status', 'Ready')->get();
        $po       = MasterPo::orderBy('po_number', 'DESC')->get();
        $vehicle  = Vehicle::orderBy('license_plate', 'DESC')->get();
        return view('customer.detail_customer.add_form')->with([
            'company'   => $company,
            'imei'      => $imei,
            'gsm'       => $gsm,
            'sensor'    => $sensor,
            'po'        => $po,
            'vehicle'   => $vehicle
        ]);
    }

    public function store(Request $request)
    {
        $data = array(
            "company_id"            => $request->CompanyId,
            "licence_plate"         => $request->LicencePlate,
            "vehicle_id"            => $request->VihecleType,
            "po_id"                 => $request->PoNumber,
            "harga_layanan"         => $request->HargaLayanan,
            "po_date"               => $request->PoDate,
            "status_po"             => $request->StatusPo,
            "imei"                  => $request->Imei,
            "gps_id"                => $request->Merk,
            "type"                  => $request->Type,
            "gsm_id"                => $request->GSM,
            "provider"              => $request->Provider,
            "serial_number_sensor"  => $request->SerialNumberSensor,
            "sensor_id"             => $request->NameSensor,
            "merk_sensor"           => $request->MerkSensor,
            "pool_name"             => $request->PoolName,
            "pool_location"         => $request->PoolLocation,
            "waranty"               => $request->Waranty,
            "status_layanan"        => $request->StatusLayanan,
            "tanggal_pasang"        => $request->TanggalPasang,
            "tanggal_non_aktif"     => $request->TanggalNonAktif,
            "tgl_reaktivasi_gps"    => $request->TanggalReaktivasi
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
        $details    = DetailCustomer::findOrfail($id);
        $company    = Company::orderBy('company_name', 'DESC')->get();
        $imei       = Gps::orderBy('imei', 'DESC')->where('status', 'Ready')->get();
        $gsm        = Gsm::orderBy('gsm_number', 'DESC')->where('status_gsm', 'Ready')->get();
        $sensor     = Sensor::orderBy('sensor_name', 'DESC')->get();
        $po         = MasterPo::orderBy('po_number', 'DESC')->get();
        $vehicle    = Vehicle::orderBy('license_plate', 'DESC')->get();
        return view('customer.detail_customer.edit_form')->with([
            'details'   => $details,
            'company'   => $company,
            'imei'      => $imei,
            'gsm'       => $gsm,
            'sensor'    => $sensor,
            'po'        => $po,
            'vehicle'   => $vehicle

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = DetailCustomer::findOrfail($id);
        $data->company_id            = $request->CompanyId;
        $data->licence_plate         = $request->LicencePlate;
        $data->vehicle_id            = $request->VihecleType;
        $data->po_id                 = $request->PoNumber;
        $data->harga_layanan         = $request->HargaLayanan;
        $data->po_date               = $request->PoDate;
        $data->status_po             = $request->StatusPo;
        $data->imei                  = $request->Imei;
        $data->gps_id                = $request->Merk;
        $data->type                  = $request->Type;
        $data->gsm_id                = $request->GSM;
        $data->provider              = $request->Provider;
        $data->serial_number_sensor  = $request->SerialNumberSensor;
        $data->sensor_id             = $request->NameSensor;
        $data->merk_sensor           = $request->MerkSensor;
        $data->pool_name             = $request->PoolName;
        $data->pool_location         = $request->PoolLocation;
        $data->waranty               = $request->Waranty;
        $data->status_layanan        = $request->StatusLayanan;
        $data->tanggal_pasang        = $request->TanggalPasang;
        $data->tanggal_non_aktif     = $request->TanggalNonAktif;
        $data->tgl_reaktivasi_gps    = $request->TanggalReaktivasi;
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


    public function Test($id)
    {

        $company = Company::findOrFail($id);
        return view('customer.detail_customer.index')->with('company', $company);
    }

    public function basedCompany($id)
    {

        $data = Vehicle::where('company_id', $id)->get();
        // $po = MasterPo::all()->where('company_id', $id);
        // $key = Vehicle::all()->where('company_id', $id)->mapWithKeys(function ($item, $key) {
        //     return [$item['company_id'] => $item->only(['license_plate'])
        //     ];
        // });

        // $key = Vehicle::all()->where('company_id', $id)->mapToDictionary(function ($item){
        //     return [$item['company_id'] => $item['license_plate']];
        // });
        // $data = $key->all();
        return $data;
    }

    public function basedImei($id)
    {

        $key = Gps::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['merk', 'type'])
            ];
        });
        $data = $key->all();
        return $data;
    }

    public function basedGsm($id)
    {

        $key = Gsm::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['provider'])
            ];
        });
        $data = $key->all();
        return $data;
    }

    public function basedSensor($id)
    {

        $key = Sensor::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['sensor_name', 'merk_sensor'])
            ];
        });
        $data = $key->all();
        return $data;
    }

    public function basedLicense($id)
    {

        $key = Vehicle::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['vehicle_id', 'pool_name', 'pool_location'])
            ];
        });

        // $vehicle = $key->vehicle->name;

        // return json_encode(array('key' => $key , 'vehicle' => $vehicle ));

        $data = $key->all();
        return $data;
    }

    public function basedPO($id)
    {

        $data = MasterPo::where('company_id', $id)->get();
        // $po = MasterPo::all()->where('company_id', $id);
        // $key = Vehicle::all()->where('company_id', $id)->mapWithKeys(function ($item, $key) {
        //     return [$item['company_id'] => $item->only(['license_plate'])
        //     ];
        // });

        // $key = Vehicle::all()->where('company_id', $id)->mapToDictionary(function ($item){
        //     return [$item['company_id'] => $item['license_plate']];
        // });
        // $data = $key->all();
        return $data;
    }

    public function basedPonumber($id)
    {

        $key = MasterPo::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['harga_layanan', 'po_date', 'status_po'])
            ];
        });
        $data = $key->all();
        return $data;
    }
}
