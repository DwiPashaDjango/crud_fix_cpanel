<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
use App\Exports\DataExport;
use DB;
use Auth;
use Carbon\Carbon;
use File;
use ZipArchive;
use Yajra\Datatables\Datatables;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['parse'] = Data::orderBy('id', 'desc')->get();
        $no = 1;
        return view('data.index',compact('data','no'));
    }

    public function import_excel(Request $request) // Function import
    {
        // validasi syarat file yang diimport
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file excel
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        // upload ke folder kemans di dalam folder public
        $file->move('file_data',$nama_file);
        // import data
        Excel::import(new DataImport, public_path('/file_data/'.$nama_file));
        // notifikasi dengan session
        Session::flash('Sukses','Data Berhasil Diimport!');
        // kembali ke halaman index data
        return redirect('/data');
    }

     public function export_excel()
    {
        return Excel::download(new DataExport, 'data.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
    public function deleteAll()
    {
        DB::table('data')->delete();
        return redirect(route('data.index'))->with('Berhasil Menghapus Semua Data');
    }
     
}
