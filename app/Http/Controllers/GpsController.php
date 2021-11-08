<?php

namespace App\Http\Controllers;

use App\Exports\TemplateGps;
use App\Models\Gps;
use App\Models\MerkGps;
use App\Models\TypeGps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Imports\GpsImport;
use App\Models\Company;
use App\Models\GpsTemp;
use App\Models\GpsTemporary;
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
        $merk = MerkGps::groupBy('merk_gps')
                        ->selectRaw('count(*) as jumlah, merk_gps')
                        ->get();
        // $merk = MerkGps::orderBy('id', 'DESC')->get();
        // $type = TypeGps::orderBy('id', 'DESC')->get();
        return view('MasterData.gps.add_form')->with([
            'gps' => $gps,
            'merk' => $merk,
            // 'type' => $type
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
        $dataRequest = json_decode($request->data);
        $data = [];
        $fail = 0;
        foreach ($dataRequest as $key => $value) {
            $imeiNumber = $value->imei;
            $checkImei = Gps::where('imei', '=', $imeiNumber)->first();
            if ($checkImei === null) {
                $data[$key] = array(
                    'merk'        =>  (string) $value->merk,
                    'type'        =>  (string) $value->type,
                    'imei'        =>  $value->imei,
                    'waranty'     =>  $value->waranty,
                    'po_date'     =>  $value->po_date,
                    'status'           =>  (string) $value->status,
                    'status_ownership' =>  (string) $value->status_ownership,
                );
                // GpsTemporary::insert($data);

                $imeiReq = $data[$key]['imei'];
                $checkImei = GpsTemporary::where('imei', '=', $imeiReq)->first();

                if ($checkImei === null ) {
                    GpsTemporary::insert($data[$key]);
                } else {
                    $fail = 1;
                }
                // echo $data;
            } else {
                $fail = 1;
            }
        }

        if( $fail === 1 ){
            GpsTemporary::truncate();
            return 'fail';
        } else {
            try {
                $gpsTemporary = GpsTemporary::orderBy('id', 'DESC')->get();
                foreach ($gpsTemporary as $key => $value){
                    $data[$key] = array(
                        'merk'        =>  (string) $value->merk,
                        'type'        =>  (string) $value->type,
                        'imei'        =>  $value->imei,
                        'waranty'     =>  $value->waranty,
                        'po_date'     =>  $value->po_date,
                        'status'           =>  (string) $value->status,
                        'status_ownership' =>  (string) $value->status_ownership,
                    );
                    Gps::insert($data[$key]);
                    $dataDelete = GpsTemporary::findOrfail($value->id);
                    $dataDelete->delete();
                }
            } catch (\Throwable $th) {
                return 'fail';
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
            'status_ownership' => $request->status_ownership
        );
        Gps::insert($data);
    }

    public function edit_form($id)
    {
        $merk = MerkGps::groupBy('merk_gps')
            ->selectRaw('count(*) as jumlah, merk_gps')
            ->get();
        // $merk_gps = MerkGps::orderBy('id', 'DESC')->get();
        // $type_gps = TypeGps::orderBy('id', 'DESC')->get();
        $gps = Gps::findOrfail($id);
        return view('MasterData.gps.edit_form')->with([
            'gps' => $gps,
            'merk' => $merk,
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
        $data = Gps::findOrfail($id);
        $data->merk = $request->merk;
        $data->type = $request->type;
        $data->imei = $request->imei;
        $data->waranty = $request->waranty;
        $data->po_date = $request->po_date;
        $data->status = $request->status;
        $data->status_ownership = $request->status_ownership;
        $data->save();
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
