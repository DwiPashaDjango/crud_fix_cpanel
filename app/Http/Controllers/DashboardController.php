<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SLoc;


class DashboardController extends Controller
{
    public function index()
    {
        // Replace this with your actual data retrieval logic
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];
        return view('dashboard.index', compact('data'));
    }

    
    public function index0(Request $request)
    {
        $data['data'] = Room::groupBy('regional')->selectRaw('regional, sum(luas) as luas, sum(baserent) as baserent, sum(servicecharge) as servicecharge, sum(totalbr) as totalbr, sum(totalsc) as totalsc')->get();

        $data['data_asset'] = Asset::groupBy('regional')->selectRaw("regional, SUM( IF ( kondisi = 'BAIK', 1, 0 ) ) AS kondisi_baik, SUM( IF ( kondisi = 'RUSAK', 1, 0 ) ) AS kondisi_rusak")->get();

        $data['regional'] = Room::groupBy('regional')->select('regional')->get();
        $data['tahun'] = Room::groupBy('tahun')->select('tahun')->get();

        $data['nama_asset'] = Asset::groupBy('namaasset')->select('namaasset')->get();
        $data['tahun_asset'] = Asset::groupBy('tahun')->select('tahun')->get();

        $data['filter_by'] = '';
        $data['selected'] = '';
        return view('dashboard.index0', compact('data'));
    }

    public function index_by($filter_by=null, $selected=null)
    {
        if($filter_by=='regional' && $selected){
            $my_selected =  str_replace("-", " ", $selected);
            $data['data'] = Room::groupBy('area')->where('regional','=', $my_selected)->selectRaw('area, sum(luas) as luas, sum(baserent) as baserent, sum(servicecharge) as servicecharge, sum(totalbr) as totalbr, sum(totalsc) as totalsc')->get();
            $data['data_asset'] = Asset::groupBy('regional')->selectRaw("regional, SUM( IF ( kondisi = 'BAIK', 1, 0 ) ) AS kondisi_baik, SUM( IF ( kondisi = 'RUSAK', 1, 0 ) ) AS kondisi_rusak")->get();
        }elseif($filter_by=='tahun' && $selected){
            $data['data'] = Room::groupBy('regional')->where('tahun','=', $selected)->selectRaw('regional, sum(luas) as luas, sum(baserent) as baserent, sum(servicecharge) as servicecharge, sum(totalbr) as totalbr, sum(totalsc) as totalsc')->get();
            $data['data_asset'] = Asset::groupBy('regional')->selectRaw("regional, SUM( IF ( kondisi = 'BAIK', 1, 0 ) ) AS kondisi_baik, SUM( IF ( kondisi = 'RUSAK', 1, 0 ) ) AS kondisi_rusak")->get();
        }elseif ($filter_by=='nama_asset' && $selected) {
            $data['data'] = Room::groupBy('regional')->selectRaw('regional, sum(luas) as luas, sum(baserent) as baserent, sum(servicecharge) as servicecharge, sum(totalbr) as totalbr, sum(totalsc) as totalsc')->get();
            $my_selected =  str_replace("-", " ", $selected);
            $data['data_asset'] = Asset::groupBy('regional')->where('namaasset','=', $my_selected)->selectRaw("regional, SUM( IF ( kondisi = 'BAIK', 1, 0 ) ) AS kondisi_baik, SUM( IF ( kondisi = 'RUSAK', 1, 0 ) ) AS kondisi_rusak")->get();
        }elseif ($filter_by=='tahun_asset' && $selected) {
            $data['data'] = Room::groupBy('regional')->selectRaw('regional, sum(luas) as luas, sum(baserent) as baserent, sum(servicecharge) as servicecharge, sum(totalbr) as totalbr, sum(totalsc) as totalsc')->get();
            $data['data_asset'] = Asset::groupBy('regional')->where('tahun','=', $selected)->selectRaw("regional, SUM( IF ( kondisi = 'BAIK', 1, 0 ) ) AS kondisi_baik, SUM( IF ( kondisi = 'RUSAK', 1, 0 ) ) AS kondisi_rusak")->get();
        }

        $data['filter_by'] = $filter_by;
        $data['selected'] = $selected;
        $data['regional'] = Room::groupBy('regional')->select('regional')->get();
        $data['tahun'] = Room::groupBy('tahun')->select('tahun')->get();
        $data['nama_asset'] = Asset::groupBy('namaasset')->select('namaasset')->get();
        $data['tahun_asset'] = Asset::groupBy('tahun')->select('tahun')->get();

        return view('dashboard.index0', compact('data'));
    }
}