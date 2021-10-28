<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\Gsm;
use App\Models\Sensor;
use App\Models\MasterPo;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DetailCustomerController extends Controller
{
    public function index()
    {
        $data = Company::orderBy('id', 'DESC')->get();
        return view('customer.detail_customer.list',compact('data'));
    }

    public function item_data($id)
    {        
        $company = Company::findOrFail($id);
        $details = DetailCustomer::orderBy('id', 'DESC')->where('company_id', $company->id )
        ->get();

        return view('customer.detail_customer.item_data', compact('details'));
    }

    public function add_form($id)
    {

        $company    = Company::orderBy('company_name', 'DESC')->where('id', $id)->get();
        $imei       = Gps::orderBy('imei', 'DESC')->where('status', 'Ready')->get();
        $gsm        = Gsm::orderBy('gsm_number', 'DESC' )->where('status_gsm', 'Ready')->get();
        $sensor     = Sensor::orderBy('serial_number', 'DESC')->where('status', 'Ready')->get();
        $vehicle    = Vehicle::orderBy('license_plate', 'DESC')->where('company_id', $id)->where('status', 'Ready')->get();
        $po         = MasterPo::orderBy('po_number', 'DESC')->where('company_id', $id)->get();

        // $cekdataada = DetailCustomer::groupBy('po_id')
        //             ->selectRaw('count(*) as jumlah , po_id')
        //             ->get();
       
        // $i = DB::table('master_pos')->groupBy('id')
        //     ->select('id', DB::raw('jumlah_unit_po as jumlah'),)
        //     ->get();
        
        return view('customer.detail_customer.add_form')->with([
            'company'   => $company ,
            'imei'      => $imei,
            'gsm'       => $gsm,  
            'sensor'    => $sensor,
            'po'        => $po,
            'vehicle'   => $vehicle,
            
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
            "sensor_all"            => $request->SensorAll,
            "pool_name"             => $request->PoolName,
            "pool_location"         => $request->PoolLocation,
            "waranty"               => $request->Waranty,
            "status_layanan"        => $request->StatusLayanan,
            "tanggal_pasang"        => $request->TanggalPasang,
            "tanggal_non_aktif"     => $request->TanggalNonAktif,
            "tgl_reaktivasi_gps"    => $request->TanggalReaktivasi
        );
     
        $license_id     = $request->LicencePlate;
        $gsm_id         = $request->GSM;
        $gps_id         = $request->Imei;
        $sensor_all     = $request->SensorAll;
       

        $i      = $request->PoNumber;
        $batas  = MasterPo::where('id', $i)->pluck('jumlah_unit_po');
        $cek    = DetailCustomer::where('po_id', $i)->count();
        $a      = $batas[0] - 1;
        $x      = "not";
        if ($cek <= $a) {

            if ($sensor_all != ""){

                $arr            = explode(" ",$sensor_all);
                $lengthArr      = count($arr)-1;
                for ($i=0; $i <= $lengthArr; $i++) { 
                    Sensor::where('id', $arr[$i])->update(array('status' => 'Used'));
                }  
            } 
             
            Vehicle::where('id', $license_id)->update(array('status' => 'Used'));
            Gsm::where('id', $gsm_id)->update(array('status_gsm' => 'Used'));
            Gps::where('id', $gps_id)->update(array('status' => 'Used'));
            DetailCustomer::insert($data);
        }
        else{
            return $x;
        }
   
    }

    public function destroy($id){

        $data = DetailCustomer::findOrfail($id);
        $data->delete();
    }

    public function edit_form(Request $request, $id){

        $data = $request->company;
        $details    = DetailCustomer::findOrfail($id);
        $company    = Company::where('id', $data)->get();
        $imei       = Gps::orderBy('imei', 'DESC')->get();
        $gsm        = Gsm::orderBy('gsm_number', 'DESC' )->get();
        // $sensor = Sensor::groupBy('sensor_name')
        // ->selectRaw('count(*) as jumlah, sensor_name')
        // ->get();   
        $sensor     = Sensor::orderBy('serial_number', 'DESC')->get();
        $po         = MasterPo::where('company_id', $data)->get();
        $vehicle    = Vehicle::where('company_id', $data)->get();
        return view('customer.detail_customer.edit_form')->with([
            'details'   => $details,
            'company'   => $company ,
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
        $data->sensor_all            = $request->SensorAll;
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
        return view('customer.detail_customer.index')->with('company',$company);
    }


    public function basedImei($id)
    {    
        $key = Gps::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item->only(['merk', 'type'])
            ];
        });
        $data = $key->all();
        return $data;
    }

    public function basedGsm($id)
    {    
        $key = Gsm::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item->only(['provider'])
            ];
        });
        $data = $key->all();
        return $data;
    }

    public function basedSensor($id)
    {
        $key = Sensor::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
            return [$item['id'] => $item->only(['sensor_name', 'merk_sensor'])
            ];
        });
        $data = $key->all();
        return $data;
    }

    public function basedLicense($id)
    {    
        $key = Vehicle::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
                return [$item['id'] => $item->only(['vehicle_id', 'pool_name', 'pool_location'])
                ];
            });

        $data = $key->all();
        return $data;
    }

    public function basedPonumber($id){
        
        $key = MasterPo::all()->where('id', $id)->mapWithKeys(function ($item, $key) {
                return [$item['id'] => $item->only(['harga_layanan','po_date','status_po'])
                ];
            });
        $data = $key->all();
        return $data;
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


}

