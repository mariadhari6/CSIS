<?php

namespace App\Http\Controllers;

use App\Models\DetailCustomer;
use App\Models\Gps;
use App\Models\PemasanganMutasiGps;
use App\Models\Pic;
use App\Models\RequestComplaintCustomer;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PemasanganMutasiGpsController extends Controller
{
    public function index()
    {
        // $pemasangan_mutasi_GPS = PemasanganMutasiGps::with('requestComplain')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.index');
    }

    public function item_data()
    {
        // $details = DetailCustomer::orderBy('id', 'DESC')->get();
        // $request_complain = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        // $pic = Pic::orderBy('id', 'DESC')->get();
        // $sensor = Sensor::orderBy('id', 'DESC')->get();
        // $gps = Gps::orderBy('id', 'DESC')->get();

        // $pemasangan_mutasi_GPS = PemasanganMutasiGps::with('requestComplain', 'detailCustomer', 'sensorPemasangan', 'gpsPemasangan')->get();
        // $pemasangan_mutasi_GPS = PemasanganMutasiGps::with('companyRequest');


        $pemasangan_mutasi_GPS = PemasanganMutasiGps::orderBy('id', 'DESC')->get();

        return view('VisitAssignment.PemasanganMutasiGPS.item_data', compact('pemasangan_mutasi_GPS'));
        // dd($pemasangan_mutasi_GPS);
    }

    public function add_form()
    {
        $details = DetailCustomer::orderBy('id', 'DESC')->get();
        $request_complain = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        $pic = Pic::orderBy('id', 'DESC')->get();
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        $gps = Gps::orderBy('id', 'DESC')->get();
        $pemasangan_mutasi_GPS = PemasanganMutasiGps::orderBy('id', 'DESC')->get();
        return view(
            'VisitAssignment.PemasanganMutasiGPS.add_form',
            compact('pemasangan_mutasi_GPS', 'details', 'request_complain', 'pic', 'sensor', 'gps')
        );
    }

    public function store(Request $request)
    {
        $data = array(
            "company_id"            => $request->company_id,
            "tanggal"               => $request->tanggal,
            "kendaraan_awal"        => $request->kendaraan_awal,
            "imei"                  => $request->imei,
            "gsm"                   => $request->gsm,
            "kendaraan_pasang"      => $request->kendaraan_pasang,
            "jenis_pekerjaan"       => $request->jenis_pekerjaan,
            "equipment_terpakai_gps" => $request->equipment_terpakai_gps,
            "equipment_terpakai_sensor" => $request->equipment_terpakai_sensor,
            "teknisi"                => $request->teknisi,
            "uang_transportasi"      => $request->uang_transportasi,
            "type_visit"             => $request->type_visit,
            "note"                   => $request->note,

        );
        PemasanganMutasiGps::insert($data);
    }

    public function destroy($id)
    {
        $data = PemasanganMutasiGps::findOrfail($id);
        $data->delete();
    }

    public function edit_form($id)
    {
        $pemasangan_mutasi_GPS = PemasanganMutasiGps::findOrfail($id);
        $details = DetailCustomer::orderBy('id', 'DESC')->get();
        $request_complain = RequestComplaintCustomer::orderBy('id', 'DESC')->get();
        $pic = Pic::orderBy('id', 'DESC')->get();
        $sensor = Sensor::orderBy('id', 'DESC')->get();
        $gps = Gps::orderBy('id', 'DESC')->get();
        return view('VisitAssignment.PemasanganMutasiGPS.edit_form', compact('pemasangan_mutasi_GPS', 'details', 'request_complain', 'pic', 'sensor', 'gps'));
    }

    public function update(Request $request, $id)
    {
        $data = PemasanganMutasiGps::findOrfail($id);
        $data->company = $request->company;
        $data->tanggal = $request->tanggal;
        $data->kendaraan_awal = $request->kendaraan_awal;
        $data->imei = $request->imei;
        $data->gsm = $request->gsm;
        $data->kendaraan_pasang = $request->kendaraan_pasang;
        $data->jenis_pekerjaan = $request->jenis_pekerjaan;
        $data->equipment_terpakai_gps = $request->equipment_terpakai_gps;
        $data->equipment_terpakai_sensor = $request->equipment_terpakai_sensor;
        $data->teknisi = $request->teknisi;
        $data->uang_transportasi = $request->uang_transportasi;
        $data->type_visit = $request->type_visit;
        $data->note = $request->note;

        $data->save();
    }

    public function selected()
    {
        $pemasangan_mutasi_GPS = PemasanganMutasiGps::all();
        return view('VisitAssignment.PemasanganMutasiGPS.selected')->with([
            'pemasangan_mutasi_GPS' => $pemasangan_mutasi_GPS
        ]);
    }

    public function updateall(Request $request, $id)
    {
        $data = PemasanganMutasiGps::findOrfail($id);
        $data->company = $request->company;
        $data->tanggal = $request->tanggal;
        $data->kendaraan_awal = $request->kendaraan_awal;
        $data->imei = $request->imei;
        $data->gsm = $request->gsm;
        $data->kendaraan_pasang = $request->kendaraan_pasang;
        $data->jenis_pekerjaan = $request->jenis_pekerjaan;
        $data->equipment_terpakai_gps = $request->equipment_terpakai_gps;
        $data->equipment_terpakai_sensor = $request->equipment_terpakai_sensor;
        $data->teknisi = $request->teknisi;
        $data->uang_transportasi = $request->uang_transportasi;
        $data->type_visit = $request->type_visit;
        $data->note = $request->note;

        echo $id;
    }

    public function deleteAll(Request $request)
    {
        if ($request->ajax()) {
            $ids = $request->input('id');
            DB::table('pemasangan_mutasi_gps')->whereIn('id', $ids)->delete();
        }
    }

    public function datatable(Request $request)
    {
        if ($request->ajax()) {

            return DataTables::of(PemasanganMutasiGps::all())->make(true);
        }
    }

    public function updateSelected(Request $request)
    {
        PemasanganMutasiGps::where('item_type_id', '=', 1)
            ->update(['colour' => 'black']);
    }
}
