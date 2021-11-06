<?php

namespace App\Http\Controllers;

use App\Exports\TemplateGsm;
use App\Imports\GsmMasterImport;
use App\Models\Company;
use App\Models\Gsm;
use App\Models\GsmTemporary;
use App\Models\RequestComplaint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class GsmMasterController extends Controller
{
    public function index()
    {
        return view('MasterData.GsmMaster.index');
    }

    public function add_form()
    {
        $company = Company::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.add_form')->with([
            'company' => $company
        ]);
    }

    public function item_data()
    {
        $GsmMaster = Gsm::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_temporary()
    {
        $GsmMaster = GsmTemporary::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.item_data_temporary')->with([
            'GsmMaster' => $GsmMaster
        ]);
        // echo $GsmMaster;
    }

    public function item_data_ready()
    {
        $GsmMaster = Gsm::where('status_gsm', 'Ready')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_active()
    {
        $GsmMaster = Gsm::where('status_gsm', 'Active')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function item_data_terminate()
    {
        $GsmMaster = Gsm::where('status_gsm', 'Terminate')->get();
        return view('MasterData.GsmMaster.item_data')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function save_import(Request $request)
    {
        $dataRequest = json_decode($request->data);
        $data = [];
        $fail = 0;
        foreach ($dataRequest as $key => $value) {
            $gsmNumber = $value->gsm_number;
            $serialNumber = $value->serial_number;
            $checkGsm = Gsm::where('gsm_number', '=', $gsmNumber)->first();
            $checkSerial = Gsm::where('serial_number', '=', $serialNumber)->first();
            if ($checkGsm === null && $checkSerial === null ) {
                $data[$key] = array(
                    'status_gsm'        =>  $value->status_gsm,
                    'gsm_number'        =>  $value->gsm_number,
                    'company_id'        =>  Company::where('company_name', $value->company_id)->firstOrFail()->id,
                    'serial_number'     =>  $value->serial_number,
                    'icc_id'            =>  $value->icc_id,
                    'imsi'              =>  $value->imsi,
                    'res_id'            =>  $value->res_id,
                    'request_date'      =>  $value->request_date,
                    'expired_date'      =>  $value->expired_date,
                    'active_date'       =>  $value->active_date,
                    'terminate_date'    =>  $value->terminate_date,
                    'note'              =>  $value->note,
                    'provider'          =>  $value->provider
                );

                $gsmNumberReq = $data[$key]['gsm_number'];
                $serialNumberReq = $data[$key]['serial_number'];
                $checkGsm2 = GsmTemporary::where('gsm_number', '=', $gsmNumberReq)->first();
                $checkSerial2 = GsmTemporary::where('serial_number', '=', $serialNumberReq)->first();

                if ($checkGsm2 === null && $checkSerial2 === null) {
                    GsmTemporary::insert($data[$key]);
                } else {
                    $fail = 1;
                }

            } else {
                $fail = 1;
            }
        }
        if( $fail === 1 ){
            GsmTemporary::truncate();
            return 'fail';
        } else {
            try {
                $gsmTemporary = GsmTemporary::orderBy('id', 'DESC')->get();
                foreach ($gsmTemporary as $key => $value){
                    $data[$key] = array(
                        'status_gsm'        =>  $value->status_gsm,
                        'gsm_number'        =>  $value->gsm_number,
                        'company_id'        =>  $value->company_id,
                        'serial_number'     =>  $value->serial_number,
                        'icc_id'            =>  $value->icc_id,
                        'imsi'              =>  $value->imsi,
                        'res_id'            =>  $value->res_id,
                        'request_date'      =>  $value->request_date,
                        'expired_date'      =>  $value->expired_date,
                        'active_date'       =>  $value->active_date,
                        'terminate_date'    =>  $value->terminate_date,
                        'note'              =>  $value->note,
                        'provider'          =>  $value->provider
                    );
                    Gsm::insert($data[$key]);
                    $dataDelete = GsmTemporary::findOrfail($value->id);
                    $dataDelete->delete();
                }
            } catch (\Throwable $th) {
                return 'fail';
            }
        }
    }

    public function store(Request $request)
    {
        $data = array(
            'status_gsm'        =>  $request->status_gsm,
            'gsm_number'        =>  $request->gsm_number,
            'company_id'        =>  $request->company_id,
            'serial_number'     =>  $request->serial_number,
            'icc_id'            =>  $request->icc_id,
            'imsi'              =>  $request->imsi,
            'res_id'            =>  $request->res_id,
            'request_date'      =>  $request->request_date,
            'active_date'       =>  $request->active_date,
            'expired_date'      =>  $request->expired_date,
            'terminate_date'    =>  $request->terminate_date,
            'note'              =>  $request->note,
            'provider'          =>  $request->provider
        );
        Gsm::insert($data);
    }

    public function edit_form($id)
    {

        $GsmMaster = Gsm::findOrfail($id);
        $company = Company::orderBy('id', 'DESC')->get();
        return view('MasterData.GsmMaster.edit_form')->with([
            'GsmMaster' => $GsmMaster,
            'company' => $company

        ]);
    }

    public function deleteTemporary()
    {
        GsmTemporary::truncate();
    }

    public function destroy($id)
    {
        $data = Gsm::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $data = Gsm::findOrfail($id);
        $data->status_gsm = $request->status_gsm;
        $data->gsm_number = $request->gsm_number;
        $data->company_id = $request->company_id;
        $data->serial_number = $request->serial_number;
        $data->icc_id = $request->icc_id;
        $data->imsi = $request->imsi;
        $data->res_id = $request->res_id;
        $data->request_date = $request->request_date;
        $data->expired_date = $request->expired_date;
        $data->active_date = $request->active_date;
        $data->terminate_date = $request->terminate_date;
        $data->note = $request->note;
        $data->provider = $request->provider;
        $data->save();
    }

    public function selected()
    {
        $GsmMaster = Gsm::all();
        return view('MasterData.GsmMaster.selected')->with([
            'GsmMaster' => $GsmMaster
        ]);
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gsm')->whereIn('id', $ids)->delete();
        }
    }

    public function export()
    {
        return Excel::download(new TemplateGsm, 'template-gsm.xlsx');
    }

    public function try()
    {
        $gsmTemporary = GsmTemporary::orderBy('id', 'DESC')->get();
        foreach ($gsmTemporary as $key => $value){
            $data[$key] = array(
                'status_gsm'        =>  $value->status_gsm,
                'gsm_number'        =>  $value->gsm_number,
                'company_id'        =>  $value->company_id,
                'serial_number'     =>  $value->serial_number,
                'icc_id'            =>  $value->icc_id,
                'imsi'              =>  $value->imsi,
                'res_id'            =>  $value->res_id,
                'request_date'      =>  $value->request_date,
                'expired_date'      =>  $value->expired_date,
                'active_date'       =>  $value->active_date,
                'terminate_date'    =>  $value->terminate_date,
                'note'              =>  $value->note,
                'provider'          =>  $value->provider
            );
            Gsm::insert($data[$key]);
            $dataDelete = GsmTemporary::findOrfail($value->id);
            $dataDelete->delete();
        }
        
        return $data;
        // return 'a';
        // $jml =  Company::all('company_name')->count();
        // $input = Company::where('company_name', 'Adib')->firstOrFail()->id;
        // for ($i= 0; $i <= $jml-1; $i++) { 
        //     if( $input == Company::all('company_name')[$i]['company_name']){
        //         $input = Company::all('id')[$i]['id'];
        //         break;
        //     } else {
        //         $input = 0;
        //     }
        // }

        // return $input;

        // $GsmMaster = Gsm::all('gsm_number');
        // $jml =  Gsm::all('gsm_number')->count();
        // $input= 12232;
        // for ($i= 0; $i <= $jml-1; $i++) { 
        //    if( $input == Gsm::all('gsm_number')[$i]->gsm_number){
        //         $count_vehicle = "data same";
        //         break;
        //    } else {
        //        $b = "Save succes";
        //    }
        // }
        
        // return $b . ' | ';

        //chart
        // $request_complain = RequestComplaint::orderBy('id', 'DESC')->get();

        // $company = [];
        // $vehicle = [];
        // $count_vehicle = array();
        
        // foreach ($request_complain as $item) {
        //     $company['company'][] = $item->company->company_name;
        //     $vehicle['vehicle'][] = $item->vehicle;
        // }

        // $count_data_vehicle = array_count_values($vehicle['vehicle']);

        // for ($i=0; $i <= count($vehicle['vehicle']) - 1 ; $i++) { 
        //     $count_vehicle[$i] = $count_data_vehicle[$vehicle['vehicle'][$i]];
        // }

        // $company['chart_company'] = json_encode($company);
        // $vehicle['chart_vehicle'] = json_encode($count_vehicle);
        // return $$vehicle['chart_vehicle'][0];
        
    }

}
