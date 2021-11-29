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
    // public function save_import(Request $request)
    // {
    //     $dataRequest = json_decode($request->data);
    //     foreach ($dataRequest as $key => $value) {

    //         // try {
    //         $data = array(
    //             'company_id'        => Company::where('company_name', $value->company_id)->firstOrFail()->id,
    //             'licence_plate'     => Vehicle::where('license_plate', $value->licence_plate)->firstOrFail()->id,
    //             'vehicle_id'        => VehicleType::where('name', $value->vehicle_id)->firstOrFail()->id,
    //             'po_id'             => MasterPo::where('po_number', $value->po_id)->firstOrFail()->id,
    //             'harga_layanan'     => MasterPo::where('harga_layanan', $value->harga_layanan)->firstOrFail()->id,
    //             'status_po'         => MasterPo::where('status_po', $value->status_po)->firstOrFail()->id,
    //             'imei'              => Gps::where('imei', $value->imei)->firstOrFail()->id,
    //             'gps_id'            => Gps::where('merk', $value->gps_id)->firstOrFail()->id,
    //             'type'            => Gps::where('type', $value->type)->firstOrFail()->id,
    //             'gsm_id'            => Gsm::where('gsm_number', $value->gsm_id)->firstOrFail()->id,
    //             'provider'            => Gsm::where('provider', $value->provider)->firstOrFail()->id,
    //             'sensor_all'           => $value->sensor_all,
    //             'pool_name'     => Vehicle::where('pool_name', $value->pool_name)->firstOrFail()->id,
    //             'pool_location'     => Vehicle::where('pool_location', $value->pool_location)->firstOrFail()->id,
    //             'waranty'           => $value->waranty,
    //             'tanggal_pasang'           => $value->tanggal_pasang,
    //             'tanggal_non_aktif'           => $value->tanggal_non_acktif,











    //         );
    //         MasterPo::insert($data);
    //         // return 'success';
    //         // } catch (\Throwable $th) {
    //         //     return 'fail';
    //         // }
    //     }
    // }

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

    public function destroy($id) {

        $data = DetailCustomer::findOrfail($id);
        $data->delete();
    }

    public function edit_form(Request $request, $id) {

        $data = $request->company;
        $details        = DetailCustomer::findOrfail($id);
        $company        = Company::where('id', $data)->get();
        $imei           = Gps::orderBy('imei', 'DESC')->get();

        $gsm            = Gsm::orderBy('gsm_number', 'DESC')->get();
        $sensor         = Sensor::orderBy('serial_number', 'DESC')->get();
        $vehicle        = Vehicle::orderBy('license_plate', 'DESC')->get();
        $po             = MasterPo::orderBy('po_number', 'DESC')->get();
        $status_layanan = ServiceStatus::orderBy('service_status_name', 'ASC')->get();


        return view('customer.detail_customer.edit_form')->with([
            'details'           => $details,
            'company'           => $company,
            'imei'              => $imei,
            'gsm'               => $gsm,
            'sensor'            => $sensor,
            'po'                => $po,
            'vehicle'           => $vehicle,
            'status_layanan'    => $status_layanan
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
        $data->jumlah_sensor          = $jumlah_sensor;
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

    public function basedPonumber($id) {

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

    // public function basedPO($id){
    //     $data = MasterPo::where('company_id', $id)->get();
    //     return $data;
    // }

    // public function basedCompany($id)
    // {
    //     $data = Vehicle::where('company_id', $id)->get();
    //     return $data;
    // }


    // public function basedSensorName($id)
    // {



    //     $data = Sensor::where('sensor_name', $id )->get();

    //     return $data;


    // }
    // public function basedSerialNumber($id)
    // {



    //     $data = Sensor::where('serial_number', $id )->get();

    //     return $data;


    // }

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
