<?php

namespace App\Http\Controllers;

use App\Exports\DetailCustCompany;
use App\Exports\DetailCustomerExport;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\Sensor;
use App\Models\MasterPo;
use App\Models\ServiceStatus;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DetailCustomerController extends Controller
{

    public function index()
    {

        $data = Company::orderBy('company_name', 'ASC')->get();
        return view('customer.detail_customer.list', compact('data'));
    }

    public function item_data($id)
    {

        $company = Company::findOrFail($id);
        $details = DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company->id)->get();

        for ($i = 0; $i <= count($details) - 1; $i++) {

            $loop_row   = $details[$i]->sensor_all;
            if ($loop_row != "") {

                $data_sensor_all = explode(" ", $loop_row);

                $temp_sensor = "";
                foreach ($data_sensor_all as $item) {
                    $cari_sensor = Sensor::where('id', $item)->get();

                    if ($temp_sensor == "") {
                        $temp_sensor = $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    } else {
                        $temp_sensor .= "; " . $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    }
                }

                $details[$i]["sensor_all_name"] = $temp_sensor;
            } else {
                $empty = "";
                $details[$i]["sensor_all_name"] = $empty;
            }
        }

        return view('customer.detail_customer.item_data', compact('details'));
    }


    public function add_form($id)
    {

        $company        = Company::orderBy('company_name', 'DESC')->where('id', $id)->get();
        $imei           = Gps::orderBy('imei', 'DESC')->where('status', 'Ready')->get();
        $gsm            = Gsm::orderBy('gsm_number', 'DESC')->where('status_gsm', 'Ready')->get();
        $sensor         = Sensor::orderBy('serial_number', 'DESC')->where('status', 'Ready')->get();
        $vehicle        = Vehicle::orderBy('license_plate', 'DESC')->where('company_id', $id)->where('status', 'Ready')->get();
        $po             = MasterPo::orderBy('po_number', 'DESC')->where('company_id', $id)->where('count', '!=', 0)->get();
        $status_layanan = ServiceStatus::orderBy('service_status_name', 'ASC')->get();
        return view('customer.detail_customer.add_form')->with([
            'company'           => $company,
            'imei'              => $imei,
            'gsm'               => $gsm,
            'sensor'            => $sensor,
            'po'                => $po,
            'vehicle'           => $vehicle,
            'status_layanan'    => $status_layanan
        ]);
    }

    public function save_import(Request $request)
    {
        $dataRequest = json_decode($request->data);
        $data = [];
        $fail = 0;
        $success = 0;
        foreach ($dataRequest as $key => $value) {
            try {
                $company = Company::where('company_name', $value->company_id)->firstOrFail()->id;
                $licence_plate = Vehicle::where('license_plate', $value->license_plate)->firstOrFail()->id;
                $vehicle_id = Vehicle::where('vehicle_id', $value->vehicle_id)->firstOrFail()->id;
                $po_id = MasterPo::where('po_number', $value->po_id)->firstOrFail()->id;
                $harga_layanan = MasterPo::where('harga_layanan', $value->harga_layanan)->firstOrFail()->id;
                $po_date = MasterPo::where('po_date', $value->po_date)->firstOrFail()->id;
                $status_po = MasterPo::where('status_po', $value->status_po)->firstOrFail()->id;
                $imei = Gps::where('imei', $value->imei)->firstOrFail()->id;
                $gps_id = Gps::where('merk', $value->gps_id)->firstOrFail()->id;
                $type = Gps::where('type', $value->gps_id)->firstOrFail()->id;
                $gsm_id = Gsm::where('gsm_number', $value->gsm_id)->firstOrFail()->id;
                $provider = Gsm::where('provider', $value->provider)->firstOrFail()->id;
                $sensor_all = Sensor::where('sensor_name', $value->sensor_all)->firstOrFail()->id;
                $pool_name = Vehicle::where('pool_name', $value->pool_name)->firstOrFail()->id;
                $pool_location = Vehicle::where('pool_location', $value->pool_location)->firstOrFail()->id;
                $status_id = ServiceStatus::where('service_status_name', $value->status_id)->firstOrFail()->id;
            } catch (\Throwable $th) {
                $company = null;
                $licence_plate  = null;
                $vehicle_id  = null;
                $po_id  = null;
                $harga_layanan  = null;
                $po_date  = null;
                $status_po  = null;
                $imei  = null;
                $gps_id  = null;
                $type  = null;
                $gsm_id  = null;
                $provider  = null;
                $sensor_all  = null;
                $pool_name  = null;
                $pool_location  = null;
                $status_id  = null;
            }
            // try {
            $data = array(
                'company_id'        => $company,

                'count'             => $value->jumlah_unit_po,
                'licence_plate'     => $licence_plate,
                'vehicle_id'        => $vehicle_id,
                'po_id'             => $po_id,
                'harga_layanan'     => $harga_layanan,
                'po_date'           => $po_date,
                'status_po'         => $status_po,
                'imei'              => $imei,
                'gps_id'            => $gps_id,
                'type'              => $type,
                'gsm_id'            => $gsm_id,
                'provider'          => $provider,
                'sensor_all'        => $sensor_all,
                'serial_number_sensor' => $value->serial_number_sensor,
                'sensor_id'            => $value->sensor_id,
                'merk_sensor' => $value->merk_sensor,
                'pool_name' => $pool_name,
                'pool_location' => $pool_location,
                'waranty' => $value->waranty,
                'status_id' => $status_id,
                'tanggal_pasang' => $value->tanggal_pasang,
                'tanggal_non_aktif' => $value->tanggal_non_aktif,
                'tgl_reaktivasi_gps' => $value->tgl_reaktivasi_gps,
                'jumlah_sensor' => $value->jumlah_sensor

            );
            DetailCustomer::insert($data);
            // return 'success';
            // } catch (\Throwable $th) {
            //     return 'fail';
            // }
        }
    }

    public function store(Request $request)
    {
        $sensor_all     = $request->SensorAll;
        if ($sensor_all != "") {
            $arr            = explode(" ", $sensor_all);
            $jumlah_sensor  = count($arr);
        } else {
            $jumlah_sensor = 0;
        }
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
            "sensor_all"            => $request->SensorAll,
            "pool_name"             => $request->PoolName,
            "pool_location"         => $request->PoolLocation,
            "waranty"               => $request->Waranty,
            "status_id"             => $request->StatusLayanan,
            "tanggal_pasang"        => $request->TanggalPasang,
            "tanggal_non_aktif"     => $request->TanggalNonAktif,
            "tgl_reaktivasi_gps"    => $request->TanggalReaktivasi,
            'jumlah_sensor'         => $jumlah_sensor
        );

        $license_id     = $request->LicencePlate;
        $gsm_id         = $request->GSM;
        $gps_id         = $request->Imei;
        $sensor_all     = $request->SensorAll;
        $i              = $request->PoNumber;
        $company        = $request->CompanyId;

        $jumlah_unit_per_po      = MasterPo::where('id', $i)->pluck('jumlah_unit_po');
        $jumlah_po_di_detail     = DetailCustomer::where('po_id', $i)->count();
        $tersedia                = $jumlah_unit_per_po[0] - ($jumlah_po_di_detail + 1);
        MasterPo::where('id', $i)->update(array('count' => $tersedia));
        if ($sensor_all != "") {
            $arr            = explode(" ", $sensor_all);
            $lengthArr      = count($arr) - 1;
            for ($i = 0; $i <= $lengthArr; $i++) {
                Sensor::where('id', $arr[$i])->update(array('status' => 'Used'));
            }
        }
        Vehicle::where('id', $license_id)->update(array('status' => 'Used'));
        Gsm::where('id', $gsm_id)->update(array('status_gsm' => 'Active', 'company_id' => $company));
        Gps::where('id', $gps_id)->update(array('status' => 'Used', 'company_id' => $company));
        DetailCustomer::insert($data);
    }

    public function destroy($id)
    {

        $data = DetailCustomer::findOrfail($id);

        $license    = $data->licence_plate;
        $imei       = $data->imei;
        $gsm        = $data->gsm_id;
        $sensor     = $data->sensor_all;
        Vehicle::where('id', $license)->update(array('status' => 'Ready'));
        $po = MasterPo::where('id', $data->po_id)->pluck('count');
        MasterPo::where('id', $data->po_id)->update(array('count' => $po[0] + 1));
        Gsm::where('id', $gsm)->update(array('status_gsm' => 'Ready', 'company_id' => ""));
        Gps::where('id', $imei)->update(array('status' => 'Ready', 'company_id' => ""));
        if ($sensor != "") {
            $arr            = explode(" ", $sensor);
            $lengthArr      = count($arr) - 1;
            for ($i = 0; $i <= $lengthArr; $i++) {
                Sensor::where('id', $arr[$i])->update(array('status' => 'Ready'));
            }
        }

        $data->delete();
    }

    public function edit_form(Request $request, $id)
    {

        $data = $request->company;
        $details        = DetailCustomer::findOrfail($id);
        $company        = Company::where('id', $data)->get();
        $imei           = Gps::where('status', 'Ready')->get();
        $gsm            = Gsm::where('status_gsm', 'Ready')->get();
        $sensor         = Sensor::where('status', 'Ready')->get();
        $vehicle        = Vehicle::where('company_id', $details->company_id)->where('status', 'Ready')->get();
        $po             = MasterPo::orderBy('po_number', 'DESC')->where('company_id', $details->company_id)->get();
        $status_layanan = ServiceStatus::orderBy('service_status_name', 'ASC')->get();


        return view('customer.detail_customer.edit_form')->with([
            'details'           => $details,
            'company'           => $company,
            'imei'              => $imei,
            'gsm'               => $gsm,
            'sensor'            => $sensor,
            'po'                => $po,
            'vehicle'           => $vehicle,
            'status_layanan'    => $status_layanan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $sensor_all     = $request->SensorAll;
        if ($sensor_all != "") {
            $arr            = explode(" ", $sensor_all);
            $jumlah_sensor  = count($arr);
        } else {
            $jumlah_sensor = 0;
        }

        $data = DetailCustomer::findOrfail($id);

        $detail_license     = DetailCustomer::where('id', $id)->pluck('licence_plate');
        $detail_po          = DetailCustomer::where('id', $id)->pluck('po_id');
        $detail_imei        = DetailCustomer::where('id', $id)->pluck('imei');
        $detail_gsm         = DetailCustomer::where('id', $id)->pluck('gsm_id');
        $detail_sensor      = DetailCustomer::where('id', $id)->pluck('sensor_all');


        $request_company    = $request->CompanyId;
        $request_license    = $request->LicencePlate;
        $request_po         = $request->PoNumber;
        $request_imei       = $request->Imei;
        $request_GSM        = $request->GSM;
        $request_sensor     = $request->SensorAll;


        if ($request_license != $detail_license[0]) {
            Vehicle::where('id', $detail_license[0])->update(array('status' => 'Ready'));
            Vehicle::where('id', $request_license)->update(array('status' => 'Used'));
        }

        if ($request_po != $detail_po[0]) {
            $po_lama = MasterPo::where('id', $detail_po[0])->pluck('count');
            MasterPo::where('id', $detail_po[0])->update(array('count' => $po_lama[0] + 1));

            $po_baru = MasterPo::where('id', $request_po)->pluck('count');
            MasterPo::where('id', $request_po)->update(array('count' => $po_baru[0] - 1));
        }

        if ($request_imei != $detail_imei[0]) {
            Gps::where('id', $detail_imei[0])->update(array('status' => 'Ready', 'company_id' => ""));
            Gps::where('id', $request_imei)->update(array('status' => 'Used', 'company_id' => $request_company));
        }

        if ($request_GSM != $detail_gsm[0]) {
            Gsm::where('id', $detail_gsm[0])->update(array('status_gsm' => 'Ready', 'company_id' => ""));
            Gsm::where('id', $request_GSM)->update(array('status_gsm' => 'Used', 'company_id' => $request_company));
        }

        if ($detail_sensor[0] != "") {
            $explode_sensor = explode(' ', $detail_sensor[0]);
        }

        if ($request_sensor != "") {
            $explode_request = explode(' ', $request_sensor);
        }

        $result = array_diff($explode_sensor, $explode_request);

        if ($result != null) {
            for ($i = 0; $i < count($result); $i++) {
                Sensor::where('id', $result[$i])->update(array('status' => 'Ready'));
            }

            for ($i = 0; $i < count($explode_request); $i++) {
                Sensor::where('id', $explode_request[$i])->update(array('status' => 'Used'));
            }
        }

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
        $data->sensor_all            = $request->SensorAll;
        $data->pool_name             = $request->PoolName;
        $data->pool_location         = $request->PoolLocation;
        $data->waranty               = $request->Waranty;
        $data->status_id             = $request->StatusLayanan;
        $data->tanggal_pasang        = $request->TanggalPasang;
        $data->tanggal_non_aktif     = $request->TanggalNonAktif;
        $data->tgl_reaktivasi_gps    = $request->TanggalReaktivasi;
        $data->jumlah_sensor         = $jumlah_sensor;
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

        $vehicle = Vehicle::with('vehicle')->where('id', $id)->get();
        $key = $vehicle->mapWithKeys(function ($item, $key) {
            return [
                $item['id'] => $item->only(['vehicle_id', 'pool_name', 'pool_location'])
            ];
        });

        $data = $key->all();

        $complete = array();

        foreach ($data as $a) {

            $i = $a['vehicle_id'];
            $cari_vehicleType = VehicleType::where('id', $i)->get();
            $a['vehicle_name'] = $cari_vehicleType[0]->name;
            $a['id'] = $id;

            array_push($complete, $a);
        }

        return $complete;
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
    public function export_detail()
    {
        return Excel::download(new DetailCustomerExport, 'DetailCustomer.xlsx');
    }
    public function export(Request $request)
    {
        return Excel::download(new DetailCustCompany($request->id), 'Detail_Customer_Company.xlsx');
    }

    public function Active($id)
    {
        $company = Company::findOrFail($id);
        $details = DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company->id)->where('status_id', '1')->get();

        for ($i = 0; $i <= count($details) - 1; $i++) {

            $loop_row   = $details[$i]->sensor_all;
            if ($loop_row != "") {

                $data_sensor_all = explode(" ", $loop_row);

                $temp_sensor = "";
                foreach ($data_sensor_all as $item) {
                    $cari_sensor = Sensor::where('id', $item)->get();

                    if ($temp_sensor == "") {
                        $temp_sensor = $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    } else {
                        $temp_sensor .= "; " . $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    }
                }

                $details[$i]["sensor_all_name"] = $temp_sensor;
            } else {
                $empty = "";
                $details[$i]["sensor_all_name"] = $empty;
            }
        }

        return view('customer.detail_customer.item_data', compact('details'));
    }

    public function InActive($id)
    {

        $company = Company::findOrFail($id);
        $details = DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company->id)->where('status_id', '2')->get();

        for ($i = 0; $i <= count($details) - 1; $i++) {

            $loop_row   = $details[$i]->sensor_all;
            if ($loop_row != "") {

                $data_sensor_all = explode(" ", $loop_row);

                $temp_sensor = "";
                foreach ($data_sensor_all as $item) {
                    $cari_sensor = Sensor::where('id', $item)->get();

                    if ($temp_sensor == "") {
                        $temp_sensor = $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    } else {
                        $temp_sensor .= "; " . $cari_sensor[0]->sensor_name . "(" . $cari_sensor[0]->serial_number . "," . $cari_sensor[0]->merk_sensor . ")";
                    }
                }

                $details[$i]["sensor_all_name"] = $temp_sensor;
            } else {
                $empty = "";
                $details[$i]["sensor_all_name"] = $empty;
            }
        }

        return view('customer.detail_customer.item_data', compact('details'));
    }
}
