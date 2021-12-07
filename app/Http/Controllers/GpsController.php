<?php

namespace App\Http\Controllers;

use App\Exports\GpsExport;
use App\Exports\TemplateGps;
use App\Models\Gps;
use App\Models\MerkGps;
use App\Models\TypeGps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Imports\GpsImport;
use App\Models\Company;
use App\Models\DetailCustomer;
use App\Models\GpsTemporary;
use App\Models\Vehicle;
use Maatwebsite\Excel\Facades\Excel;

class GpsController extends Controller
{
    public function index()
    {
        return view('MasterData.gps.index');
    }
    public function add_form()
    {
        $gps = Gps::orderBy('id', 'DESC')->get();
        $company = Company::orderBy('id', 'ASC')->get();

        $merk = MerkGps::groupBy('merk_gps')
            ->selectRaw('count(*) as jumlah, merk_gps')
            ->get();
        // $merk = MerkGps::orderBy('id', 'DESC')->get();

        // $type = TypeGps::orderBy('id', 'DESC')->get();
        return view('MasterData.gps.add_form')->with([

            'gps' => $gps,
            'merk' => $merk,
            'company' => $company,


        ]);
    }

    public function item_data()
    {
        $gps = Gps::orderBy('id', 'DESC')->get();
        return view('MasterData.gps.item_data')->with([
            'gps' => $gps,

        ]);
    }
    public function item_data_temporary()
    {
        $gps = GpsTemporary::orderBy('id', 'ASC')->get();
        return view('MasterData.gps.item_data_temporary')->with([
            'gps' => $gps
        ]);
        // dd($gps);
    }
    public function deleteTemporary()
    {
        GpsTemporary::truncate();
    }

    public function save_import(Request $request)
    {
        // $dataRequest = json_decode($request->data);
        // $data = [];
        // $fail = 0;
        // foreach ($dataRequest as $key => $value) {
        //     $imeiNumber = $value->imei;
        //     $checkImei = Gps::where('imei', '=', $imeiNumber)->first();
        //     if ($checkImei === null) {
        //         $data[$key] = array(
        //             'merk'        =>  (string) $value->merk,
        //             'type'        =>  (string) $value->type,
        //             'imei'        =>  $value->imei,
        //             'waranty'     =>  $value->waranty,
        //             'po_date'     =>  $value->po_date,
        //             'status'           =>  (string) $value->status,
        //             'status_ownership' =>  (string) $value->status_ownership,
        //         );
        //         // GpsTemporary::insert($data);

        //         $imeiReq = $data[$key]['imei'];
        //         $checkImei = GpsTemporary::where('imei', '=', $imeiReq)->first();

        //         if ($checkImei === null) {
        //             GpsTemporary::insert($data[$key]);
        //         } else {
        //             $fail = 1;
        //         }
        //         // echo $data;
        //     } else {
        //         $fail = 1;
        //     }
        // }
        // GpsTemporary::truncate();
        // if ($fail === true) {
        //     return 'fail';
        // } else {
        //     for ($i = 0; $i < count($data); $i++) {
        //         try {
        //             Gps::insert($data[$i]);
        //         } catch (\Throwable $th) {
        //             $fail = true;
        //         }
        //     }
        // }

        $dataRequest = json_decode($request->data);
        $data = [];
        $fail = 0;
        $success = 0;
        foreach ($dataRequest as $key => $value) {
            $imeiNumber = $value->imei;
            $checkImei = Gps::where('imei', '=', $imeiNumber)->first();
            if ($checkImei === null) {

                $success = 1;
                $fail = 0;
            } else {
                $fail = 1;
                $success = 1;
            }
        }
        if ($fail == 1 && $success == 1) {
            return 'fail';
        } else if ($fail == 0 && $success == 1) {
            foreach ($dataRequest as $key => $value) {

                $data[$key] = array(
                    'merk'        =>  (string) $value->merk,
                    'type'        =>  (string) $value->type,
                    'imei'        =>  $value->imei,
                    'waranty'     =>  $value->waranty,
                    'po_date'     =>  $value->po_date,
                    'status'           =>  (string) $value->status,
                    'status_ownership' =>  (string) $value->status_ownership,
                    // 'company_id'     =>  $value->company_id == '' ? null :  $value->company_id,


                );
                Gps::insert($data[$key]);
            }
        }
    }

    public function store(Request $request)
    {


        // $this->validate($request, [
        //     'imei.*' => 'required|min:15',
        // ]);
        $data = array(
            'merk'    =>  $request->merk,
            'type'   =>  $request->type,
            'imei'     =>  $request->imei,
            'waranty'     =>  $request->waranty,
            'po_date'     =>  $request->po_date,
            'status'     =>  $request->status,
            'status_ownership' => $request->status_ownership,
            'company_id' => $request->company_id

        );
        Gps::insert($data);
    }

    public function edit_form($id)
    {
        $merk = MerkGps::groupBy('merk_gps')
            ->selectRaw('count(*) as jumlah, merk_gps')
            ->get();
        $company = Company::orderBy('id', 'ASC')->get();

        // $merk_gps = MerkGps::orderBy('id', 'DESC')->get();
        // $type_gps = TypeGps::orderBy('id', 'DESC')->get();
        $gps = Gps::findOrfail($id);
        return view('MasterData.gps.edit_form')->with([
            'gps' => $gps,
            'merk' => $merk,
            'company' => $company,

            // 'type_gps' => $type_gps

        ]);
    }

    public function destroy($id)
    {
        $data = Gps::findOrfail($id);
        $data->delete();
    }

    public function update(Request $request, $id)
    {
        $status = $request->status;
        $cek_status = DetailCustomer::where('imei', $id)->where('status_id', 1)->get();
        $cek_detail = DetailCustomer::where('imei', $id)->first();
        if ($cek_detail == null) {
            $data           = Gps::findOrfail($id);
            $data->merk     = $request->merk;
            $data->type     = $request->type;
            $data->imei     = $request->imei;
            $data->waranty  = $request->waranty;
            $data->po_date  = $request->po_date;
            $data->status   = $request->status;
            $data->status_ownership = $request->status_ownership;
            $data->company_id = $request->company_id;

            $data->save();
        } else {

            if ($cek_status && $status != "Used") {
                foreach ($cek_status as $item) {
                    $company_id = $item->company_id;
                    $licence_id = $item->licence_plate;
                    $cari_company = Company::where('id', $company_id)->get();
                    $cari_license = Vehicle::where('id', $licence_id)->get();
                    $item['company_name']   = $cari_company[0]->company_name;
                    $item['nomor_license']  = $cari_license[0]->license_plate;
                    $item['terpasang'] = "terpasang";
                    return $item;
                }
            } else {
                $data           = Gps::findOrfail($id);
                $data->merk     = $request->merk;
                $data->type     = $request->type;
                $data->imei     = $request->imei;
                $data->waranty  = $request->waranty;
                $data->po_date  = $request->po_date;
                $data->status   = $request->status;
                $data->status_ownership = $request->status_ownership;
                $data->company_id = $request->company_id;

                $data->save();
            }
        }
    }

    public function selected()
    {
        $gps = Gps::all();
        $merk_gps = MerkGps::all();
        // $type_gps = TypeGps::all();

        return view('MasterData.gps.selected')->with([
            'gps' => $gps,
            'merk_gps' => $merk_gps,
            // 'type_gps' => $type_gps
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = Gps::findOrfail($id);
        $data->merk = $request->merk;
        $data->type = $request->type;
        $data->imei = $request->imei;
        $data->waranty = $request->waranty;
        $data->po_date = $request->po_date;
        $data->status = $request->status;
        $data->status_ownership = $request->status_ownership;
        $data->company_id = $request->company_id;

        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('gps')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(Gps::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        Gps::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('MasterGps', $nameFile);

        Excel::import(new GpsImport, public_path('/MasterGps/' . $nameFile));
        // return redirect('/GsmMaster');
    }
    public function export()
    {
        return Excel::download(new TemplateGps, 'template-gps.xlsx');
    }

    public function export_gps()
    {
        return Excel::download(new GpsExport, 'Gps.xlsx');
    }

    public function try()
    {

        $input = MerkGps::where('merk', 'Ruptela')->firstOrFail()->id;
        // $input = TypeGps::where('type_gps', 'FM Pro 4')->firstOrFail()->id;
        return $input;
    }
    public function basedType($id)
    {



        $data = MerkGps::where('merk_gps', $id)->get();

        return $data;
    }
}
