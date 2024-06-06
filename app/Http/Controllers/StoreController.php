<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePgRequest;
use Session;
use App\Store;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StoreImport;
use App\Exports\StoreExport;
use DB;
use Auth;
use Carbon\Carbon;
use File;
use ZipArchive;
use Yajra\Datatables\Datatables;

class StoreController extends Controller
{
    
    public function index(){

        $data['parse'] = Store::orderBy('id', 'desc')->get();
        $no = 1;
        return view('stores.index',compact('data','no'));
    }

    public function index0(){

        $place = 'site';
    
        if (Auth::user()->role == 'ICO') {
            $search_places = [
                Auth::user()->site1,
                Auth::user()->site2,
                Auth::user()->site3,
                Auth::user()->site4,
                Auth::user()->site5,
                Auth::user()->site6,
                Auth::user()->site7,
                Auth::user()->site8,
                Auth::user()->site9,
                Auth::user()->site10,
            ];
            $place = 'site';
        } 
        
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'PIC') {
            $data['parse'] = Store::orderBy('id', 'desc')->get();
        } else {
            $data['parse'] = Store::where(function ($query) use ($place, $search_places) {
                foreach ($search_places as $search_place) {
                    $query->orWhere($place, 'like', '%' . $search_place . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->get();
        }
        
        $no = 1;
        
        return view('stores.index0',compact('data','no'));
    }
     
    public function import_excel(Request $request) 
    {
        // validasi syarat file yang diimport
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $file = $request->file('file');
        
        $nama_file = rand().$file->getClientOriginalName();
        
        $file->move('file_store',$nama_file);

        Excel::import(new StoreImport, public_path('/file_store/'.$nama_file));

        Session::flash('Sukses','Data Store Berhasil Diimport!');

        return redirect('/stores');
    }

    public function export_excel()
    {
        return Excel::download(new StoreExport, 'storeinformation.xlsx');
    }
    
    public function create()
    {
        return view('stores.create');
    }   

    public function store(Request $request)
    {
        DB::table('stores')->insert([
            'bu' => strtoupper($request->bu),
            'status' => strtoupper($request->status),
            'bu_legacy' => strtoupper($request->bu_legacy),
            'site' => strtoupper($request->site),
            'site_name' => strtoupper($request->site_name),
            'kota' => strtoupper($request->kota),
            'luas' => $request->luas,
            'opening' => $request->opening,
            'closing' => $request->closing,
            'alamat' => strtoupper($request->alamat),
            'postl' => strtoupper($request->postl),
            'teritorial' => strtoupper($request->teritorial),
            'am' => strtoupper($request->am),
            'sm1' => strtoupper($request->sm1),
            'sm2' => strtoupper($request->sm2),
            'sm3' => strtoupper($request->sm3),
            'dsm1' => strtoupper($request->dsm1),
            'dsm2' => strtoupper($request->dsm2),
            'dsm3' => strtoupper($request->dsm3),
            'dsm4' => strtoupper($request->dsm4),
            'dsm5' => strtoupper($request->dsm5),
            'dsm6' => strtoupper($request->dsm6),
            'dsm7' => strtoupper($request->dsm7),
            'dsm8' => strtoupper($request->dsm8),
            'ico1' => strtoupper($request->ico1),
            'ico2' => strtoupper($request->ico2),
            'ico3' => strtoupper($request->ico3),
            'ico4' => strtoupper($request->ico4),
            'email_sm' => strtoupper($request->email_sm),
            'email_ico' => strtoupper($request->email_ico),
            'avayacs' => strtoupper($request->avayacs),
            'avayabo' => strtoupper($request->avayabo),
            'update_data' => $request->update_data,
        ]);

        return redirect('/stores')->with('Berhasil Menambah Data Store');
    }

    // public function show(Listkbm $listkbm)
    // {
    //     //
    // }

    // public function edit ($id)
    // {
    //     $data   = Listkbm::find($id);
    //     return view('listkbm.edit',compact('data'));
    // }

    //  public function update (Request $request, $id){
    //     $x = Listkbm::find($id);
    //     $array_update = [
    //                  'serialnumber'         => $request->input('serialnumber'),
    //                 'namaproduk'         => $request->input('namaproduk'),
    //                 'area'         => $request->input('area'),
    //                 'regional'         => $request->input('regional'),
    //                 'nomorpo'         => $request->input('nomorpo'),
    //                 'company'         => $request->input('company'),
    //                 'jeniskbm'         => $request->input('jeniskbm'),
    //                 'kir'         => $request->input('kir'),
    //                 'pajak'         => $request->input('pajak'),
    //                 'kontrak'         => $request->input('kontrak'),
                   
    //     ];                
    //     $x->update($array_update);
        
    //     return redirect(route('listkbm.index'))->with('Berhasil Meng-Update Data');
    // }

    public function deleteAll(){
        DB::table('stores')->delete();
        return redirect(route('stores.index'))->with('Berhasil Menghapus Semua Data');
    }
    
    // public function destroy(Listkbm  $listkbm)
    // {
    //     $listkbm->delete();

    //     return redirect()->route('listkbm.index')->withStatus(__('Data Sukses Terhapus.'));
    // }

    // public function get_service_serial_kbm(Request $req)
    // {
    //     // print($req->serialnumber);die;
    //     $mySerialNumber = $req->serialnumber;
    //     $data = Service::where('serialnumber', '=', $mySerialNumber)->get();
    //     return $data;
    // }
}
