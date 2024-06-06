<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePgRequest;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;
use Session;
use App\SLoc;
use App\Store;
use App\Imports\SLocImport;
use App\Exports\SLocExport;
use App\Exports\DataByMonthExport;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Auth;
use ZipArchive;


class SLocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            $data['parse'] = Sloc::where('status_sloc', 'Not Update')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $data['parse'] = Sloc::where('status_sloc', 'Not Update')
                ->where(function ($query) use ($place, $search_places) {
                    foreach ($search_places as $search_place) {
                        $query->orWhere($place, 'like', '%' . $search_place . '%');
                    }
                })
                ->orderBy('id', 'desc')
                ->get();
        }

        $no = 1;

        return view('sloc.index', compact('data', 'no'));
    }

    public function index1()
    {

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
            $data['parse'] = Sloc::where('status_sloc', 'In Progress')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $data['parse'] = Sloc::where('status_sloc', 'In Progress')
                ->where(function ($query) use ($place, $search_places) {
                    foreach ($search_places as $search_place) {
                        $query->orWhere($place, 'like', '%' . $search_place . '%');
                    }
                })
                ->orderBy('id', 'desc')
                ->get();
        }

        $no = 1;

        return view('sloc.index1', compact('data', 'no'));
    }

    public function index2()
    {

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
            $data['parse'] = Sloc::where('status_sloc', 'Done')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $data['parse'] = Sloc::where('status_sloc', 'Done')
                ->where(function ($query) use ($place, $search_places) {
                    foreach ($search_places as $search_place) {
                        $query->orWhere($place, 'like', '%' . $search_place . '%');
                    }
                })
                ->orderBy('id', 'desc')
                ->get();
        }

        $no = 1;

        return view('sloc.index2', compact('data', 'no'));
    }

    public function dashboard(Request $request)
    {

        $sites = Store::select('site', 'site_name')->orderBy('site', 'ASC')->get();

        $slocData2 = SLoc::all();

        $pivotData2 = [];

        foreach ($slocData2 as $data) {
            $bulan = $data->bulan;
            $sloc = $data->sloc;
            $agingSloc = $data->aging_solve;
            $statusSloc = $data->status_sloc;


            if ($statusSloc !== 'In Progress' && $statusSloc !== 'Done') {
                continue;
            }

            if (!isset($pivotData2[$bulan])) {
                $pivotData2[$bulan] = [];
            }

            if (!isset($pivotData2[$bulan][$sloc])) {
                $pivotData2[$bulan][$sloc] = [
                    'total' => 0,
                    'count' => 0,
                ];
            }
            $pivotData2[$bulan][$sloc]['total'] += $agingSloc;
            $pivotData2[$bulan][$sloc]['count']++;
        }

        foreach ($pivotData2 as $bulan => &$slocs) {
            foreach ($slocs as $sloc => &$values) {
                if ($values['count'] > 0) {
                    $values['average'] = $values['total'] / $values['count'];
                } else {
                    $values['average'] = 0;
                }
                unset($values['total'], $values['count']);
            }
        }


        $slocData3 = SLoc::select('sloc', 'penyebab_sloc')
            ->groupBy('sloc', 'penyebab_sloc')
            ->selectRaw('count(*) as count')
            ->get();

        $slocData4 = SLoc::join('stores', 'sloc.site', '=', 'stores.site')
            ->select('stores.bu', 'sloc.sloc', DB::raw('COUNT(*) as count'))
            ->groupBy('stores.bu', 'sloc.sloc')
            ->get();

        $pivotData4 = [];

        foreach ($slocData4 as $data) {
            if (!isset($pivotData4[$data->bu])) {
                $pivotData4[$data->bu] = [
                    '-1000' => 0,
                    '1003' => 0,
                    '1007' => 0,
                    '1009' => 0,
                    '1017' => 0,
                ];
            }
            $pivotData4[$data->bu][$data->sloc] = $data->count;
        }

        $month = $request->month;

        if (!empty($month)) {
            $slocData5 = SLoc::select('bulan', 'site', 'site_name', 'sloc', 'status_sloc')
                ->whereIn('status_sloc', ['Not Update', 'In Progress', 'Done'])
                ->where('bulan', '=', $month)
                ->get();
        } else {
            $slocData5 = SLoc::select('bulan', 'site', 'site_name', 'sloc', 'status_sloc')
                ->whereIn('status_sloc', ['Not Update', 'In Progress', 'Done'])
                ->get();
        }

        $pivotData5 = [];
        foreach ($slocData5 as $row) {
            $status = $row->status_sloc;
            $sloc = $row->sloc;
            $site = $row->site;

            if (!isset($pivotData5[$site])) {
                $pivotData5[$site] = [
                    'Site Name' => $row->site_name,
                    '-1000 Not Update' => 0,
                    '-1000 In Progress' => 0,
                    '-1000 Done' => 0,
                    '1003 Not Update' => 0,
                    '1003 In Progress' => 0,
                    '1003 Done' => 0,
                    '1007 Not Update' => 0,
                    '1007 In Progress' => 0,
                    '1007 Done' => 0,
                    '1009 Not Update' => 0,
                    '1009 In Progress' => 0,
                    '1009 Done' => 0,
                    '1017 Not Update' => 0,
                    '1017 In Progress' => 0,
                    '1017 Done' => 0,
                ];
            }

            // Increment sesuai status dan sloc
            $pivotData5[$site][$sloc . ' ' . $status]++;
        }

        return view('sloc.dashboard', compact('pivotData4', 'slocData3', 'pivotData2', 'pivotData5', 'slocData4', 'sites'));
    }

    public function getSlocTrend(Request $request)
    {
        $site = $request->site;

        if ($site === 'All') {
            $slocs = SLoc::select('bulan', 'sloc')->get();
        } else {
            $slocs = SLoc::select('bulan', 'sloc')->where('site', $site)->get();
        }

        $datas = [];
        foreach ($slocs as $data) {
            if (!isset($datas[$data->bulan])) {
                $datas[$data->bulan] = [
                    '-1000' => 0,
                    '1003' => 0,
                    '1007' => 0,
                    '1009' => 0,
                    '1017' => 0,
                ];
            }
            $datas[$data->bulan][$data->sloc]++;
        }

        $labels = array_keys($datas);
        $datasetKeys = ['-1000', '1003', '1007', '1009', '1017'];
        $datasets = [];

        foreach ($datasetKeys as $key) {
            $data = [];
            foreach ($labels as $label) {
                $data[] = $datas[$label][$key];
            }
            $datasets[$key] = $data;
        }

        return response()->json([
            'labels' => $labels,
            'datasets' => $datasets,
        ]);
    }


    public function import_excel(Request $request)
    {

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('file_sloc', $nama_file);

        Excel::import(new SLocImport, public_path('/file_sloc/' . $nama_file));

        Session::flash('Sukses', 'Data SLoc Berhasil Diimport!');

        return redirect('/sloc');
    }

    public function export_excel()
    {
        return Excel::download(new SLocExport, 'datasloc.xlsx');
    }

    public function exportByMonth(Request $request)
    {
        $request->validate([
            'bulan' => 'required|in:Jan,Feb,Mar,Apr,Mei,Jun,Jul,Ags,Sep,Okt,Nov,Des',
        ]);

        $bulan = $request->input('bulan');

        $filename = 'data_by_' . strtolower($bulan) . '_2024.xlsx';

        return Excel::download(new DataByMonthExport($bulan), $filename);
    }

    public function export_evident()
    {
        $folderPath = public_path('evident');

        if (!is_dir($folderPath)) {
            return response()->json(['message' => 'Folder does not exist'], 404);
        }

        $zipFileName = 'evident_export.zip';

        $zip = new ZipArchive();

        if ($zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($folderPath));
            foreach ($files as $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = 'evident/' . substr($filePath, strlen($folderPath) + 1);
                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();

            return response()->download(public_path($zipFileName))->deleteFileAfterSend();
        } else {
            return response()->json(['message' => 'Gagal Membuat File Zip'], 500);
        }
    }


    public function edit000($id)
    {
        $data = Sloc::find($id);
        return view('sloc.edit000', compact('data'));
    }

    public function edit003($id)
    {
        $data = Sloc::find($id);
        return view('sloc.edit003', compact('data'));
    }

    public function edit007($id)
    {
        $data = Sloc::find($id);
        return view('sloc.edit007', compact('data'));
    }

    public function edit009($id)
    {
        $data = Sloc::find($id);
        return view('sloc.edit009', compact('data'));
    }

    public function edit017($id)
    {
        $data = Sloc::find($id);
        return view('sloc.edit017', compact('data'));
    }

    public function update000(Request $request, $id)
    { {
            $x = SLoc::find($id);
            $array_update = [

                'bulan' => $request->input('bulan'),
                'weekly' => $request->input('weekly'),
                'update_data' => $request->input('update_data'),
                'site' => $request->input('site'),
                'site_name' => $request->input('site_name'),
                'article' => $request->input('article'),
                'article_name' => $request->input('article_name'),
                'sloc' => $request->input('sloc'),
                'qty' => $request->input('qty'),
                'penyebab_sloc' => $request->input('penyebab_sloc'),
                'followup_sloc' => '-',
                'detail_followup' => $request->input('detail_followup'),
                'tp_sloc' => '1900-01-01',
                'pic_tp' => '-',
                'no_dokumen' => '-',
                'qty_solving' => $request->input('qty_solving'),
                'evident' => '-',
                'tgl_solving' => $request->input('tgl_solving'),
                'aging_sloc' => '9999',
                'aging_solve' => $request->input('aging_solve'),
                'status_sloc' => $request->input('status_sloc'),
            ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update003(Request $request, $id)
    { {
            $x = SLoc::find($id);
            $array_update = [

                'bulan' => $request->input('bulan'),
                'weekly' => $request->input('weekly'),
                'update_data' => $request->input('update_data'),
                'site' => $request->input('site'),
                'site_name' => $request->input('site_name'),
                'article' => $request->input('article'),
                'article_name' => $request->input('article_name'),
                'sloc' => $request->input('sloc'),
                'qty' => $request->input('qty'),
                'penyebab_sloc' => $request->input('penyebab_sloc'),
                'followup_sloc' => $request->input('followup_sloc'),
                'detail_followup' => $request->input('detail_followup'),
                'tp_sloc' => '1900-01-01',
                'pic_tp' => '-',
                'no_dokumen' => '-',
                'qty_solving' => $request->input('qty_solving'),
                'evident' => '-',
                'tgl_solving' => $request->input('tgl_solving'),
                'aging_sloc' => '9999',
                'aging_solve' => $request->input('aging_solve'),
                'status_sloc' => $request->input('status_sloc'),
            ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update007(Request $request, $id)
    { {
            $x = SLoc::find($id);
            $array_update = [

                'bulan' => $request->input('bulan'),
                'weekly' => $request->input('weekly'),
                'update_data' => $request->input('update_data'),
                'site' => $request->input('site'),
                'site_name' => $request->input('site_name'),
                'article' => $request->input('article'),
                'article_name' => $request->input('article_name'),
                'sloc' => $request->input('sloc'),
                'qty' => $request->input('qty'),
                'penyebab_sloc' => $request->input('penyebab_sloc'),
                'followup_sloc' => '-',
                'detail_followup' => $request->input('detail_followup'),
                'tp_sloc' => $request->input('tp_sloc'),
                'pic_tp' => $request->input('pic_tp'),
                'no_dokumen' => $request->input('no_dokumen'),
                'qty_solving' => $request->input('qty_solving'),
                'evident' => '-',
                'tgl_solving' => $request->input('tgl_solving'),
                'aging_sloc' =>  $request->input('aging_sloc'),
                'aging_solve' => $request->input('aging_solve'),
                'status_sloc' => $request->input('status_sloc'),
            ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update009(Request $request, $id)
    { {
            $x = SLoc::find($id);
            $array_update = [

                'bulan' => $request->input('bulan'),
                'weekly' => $request->input('weekly'),
                'update_data' => $request->input('update_data'),
                'site' => $request->input('site'),
                'site_name' => $request->input('site_name'),
                'article' => $request->input('article'),
                'article_name' => $request->input('article_name'),
                'sloc' => $request->input('sloc'),
                'qty' => $request->input('qty'),
                'penyebab_sloc' => $request->input('penyebab_sloc'),
                'followup_sloc' => '-',
                'detail_followup' => $request->input('detail_followup'),
                'tp_sloc' => $request->input('tp_sloc'),
                'pic_tp' => $request->input('pic_tp'),
                'no_dokumen' => $request->input('no_dokumen'),
                'qty_solving' => $request->input('qty_solving'),
                'evident' => '-',
                'tgl_solving' => $request->input('tgl_solving'),
                'aging_sloc' =>  $request->input('aging_sloc'),
                'aging_solve' => $request->input('aging_solve'),
                'status_sloc' => $request->input('status_sloc'),
            ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update017(Request $request, $id)
    {
        $this->validate($request, [
            'evident' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        $x = SLoc::find($id);
        $file = $request->file('evident');
        $tujuan_upload = 'evident';
        $namafile = $file->getClientOriginalName();
        $file->move($tujuan_upload, $file->getClientOriginalName());

        $array_update = [
            'bulan' => $request->input('bulan'),
            'weekly' => $request->input('weekly'),
            'update_data' => $request->input('update_data'),
            'site' => $request->input('site'),
            'site_name' => $request->input('site_name'),
            'article' => $request->input('article'),
            'article_name' => $request->input('article_name'),
            'sloc' => $request->input('sloc'),
            'qty' => $request->input('qty'),
            'penyebab_sloc' => $request->input('penyebab_sloc'),
            'followup_sloc' => '-',
            'detail_followup' => $request->input('detail_followup'),
            'tp_sloc' => $request->input('tp_sloc'),
            'pic_tp' => $request->input('pic_tp'),
            'no_dokumen' => $request->input('no_dokumen'),
            'qty_solving' => $request->input('qty_solving'),
            'evident' => $namafile,
            'tgl_solving' => $request->input('tgl_solving'),
            'aging_sloc' => $request->input('aging_sloc'),
            'aging_solve' => $request->input('aging_solve'),
            'status_sloc' => $request->input('status_sloc'),
        ];
        $x->update($array_update);
        return redirect('/sloc')->with('Berhasil Melakukan Update');
    }

    public function views($id)
    {
        $data = SLoc::find($id);
        return view('sloc.views', compact('data'));
    }

    public function views2($id)
    {
        $data = SLoc::find($id);
        return view('sloc.views2', compact('data'));
    }

    public function views3($id)
    {
        $data = SLoc::find($id);
        return view('sloc.views3', compact('data'));
    }

    public function deleteAll()
    {
        DB::table('sloc')->delete();
        return redirect(route('sloc.index'))->with('Berhasil Menghapus Semua Data');
    }

    public function destroy(SLoc  $sloc)
    {
        $sloc->delete();

        return redirect()->route('sloc.index')->withStatus(__('Data Sukses Terhapus.'));
    }
}
