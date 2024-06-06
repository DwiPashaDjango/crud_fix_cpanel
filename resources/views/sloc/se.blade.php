@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
              <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                          
                  
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                 
      
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                  

                </div>
              </div>
            </div>
             <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <div class="card-body">
                  
                
                </div>
              </div>
            </div>
          </div>
       
    <!-- Card stats -->
    <div class="row">
    <div class="col-xl-6">
    <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <center><h3 class="mb-0"><font color="#212529">Sloc Trend</font></h3></center>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <canvas id="slocLineChart1"></canvas>
                </div>
            </div>
    </div>
    <div class="col-xl-6">
    <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <center><h3 class="mb-0"><font color="#212529">Aging Solve Trend</font></h3></center>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <canvas id="slocLineChart2"></canvas>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-xl-6">
    <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <center><h3 class="mb-0"><font color="#212529">Penyebab - Sloc</font></h3></center>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <canvas id="verticalBarChart"></canvas>
                </div>
            </div>
    </div>
    <div class="col-xl-6">
    <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <center><h3 class="mb-0"><font color="#212529">Business Unit - Sloc</font></h3></center>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <canvas id="verticalBarChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<div class="row">
<div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <center><h3 class="mb-0"><font color="#212529">Site - SLoc Status</font></h3><br></center>
                    </div>
                    <div>
                    <a href="sloc.export_excel" class="btn btn-sm btn-primary">Download</a>
                    </div>
                    <!-- <div class="col1">
                        <select id="bulanFilter" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <option value="Jan">Januari</option>
                            <option value="Feb">Februari</option>
                        </select>
                    </div> -->
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table align-items-center table-flush", border=1>
                <thead>
                    <tr>
                        <th>Site</th>
                        <th>Site Name</th>
                        @foreach([1000, 1003, 1007, 1009, 1017] as $sloc)
                        <th colspan="3">{{ $sloc }}</th>
                        @endforeach
                        <th>Percentage</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        @for ($i = 0; $i < 5; $i++)
                        <th>Not Update</th>
                        <th>In Progress</th>
                        <th>Done</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                @foreach ($pivotData5 as $site => $data)
                    <tr>
                        <td>{{ $site }}</td>
                        <td>{{ isset($data['Site Name']) ? $data['Site Name'] : 'N/A' }}</td>
                        <td>{{ $data['-1000 Not Update'] }}</td>
                        <td>{{ $data['-1000 In Progress'] }}</td>
                        <td>{{ $data['-1000 Done'] }}</td>
                        <td>{{ $data['1003 Not Update'] }}</td>
                        <td>{{ $data['1003 In Progress'] }}</td>
                        <td>{{ $data['1003 Done'] }}</td>
                        <td>{{ $data['1007 Not Update'] }}</td>
                        <td>{{ $data['1007 In Progress'] }}</td>
                        <td>{{ $data['1007 Done'] }}</td>
                        <td>{{ $data['1009 Not Update'] }}</td>
                        <td>{{ $data['1009 In Progress'] }}</td>
                        <td>{{ $data['1009 Done'] }}</td>
                        <td>{{ $data['1017 Not Update'] }}</td>
                        <td>{{ $data['1017 In Progress'] }}</td>
                        <td>{{ $data['1017 Done'] }}</td>
                        <td><center>
                                @php
                                    $totalSloc = $data['-1000 Not Update'] + $data['-1000 In Progress'] + $data['-1000 Done']
                                    + $data['1003 Not Update'] + $data['1003 In Progress'] + $data['1003 Done']
                                    + $data['1007 Not Update'] + $data['1007 In Progress'] + $data['1007 Done']
                                    + $data['1009 Not Update'] + $data['1009 In Progress'] + $data['1009 Done']
                                    + $data['1017 Not Update'] + $data['1017 In Progress'] + $data['1017 Done'];

                                    $percentage = $totalSloc != 0 ? (($data['-1000 Done'] + $data['1003 Done'] + $data['1007 Done'] + $data['1009 Done'] + $data['1017 Done']) / $totalSloc) * 100 : 0;
                                @endphp
                                {{ number_format($percentage, 2) }}%
                            </center></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var slocData1 = {!! json_encode($pivotData1) !!};

    var ctx2 = document.getElementById('slocLineChart1').getContext('2d');
    var myLineChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($pivotData1)) !!},
            datasets: [
                {
                    label: '-1000',
                    data: {!! json_encode(array_column($pivotData1, '-1000')) !!},
                    borderColor: 'rgb(255, 0, 0)',
                    backgroundColor: 'rgba(255, 0, 0)',
                },
                {
                    label: '1003',
                    data: {!! json_encode(array_column($pivotData1, '1003')) !!},
                    borderColor: 'rgb(0, 0, 255)',
                    backgroundColor: 'rgba(0, 0, 255)',
                },
                {
                    label: '1007',
                    data: {!! json_encode(array_column($pivotData1, '1007')) !!},
                    borderColor: 'rgb(34, 221, 34)',
                    backgroundColor: 'rgba(34, 221, 34)',
                },
                {
                    label: '1009',
                    data: {!! json_encode(array_column($pivotData1, '1009')) !!},
                    borderColor: 'rgb(255, 165, 0)',
                    backgroundColor: 'rgba(255, 165, 0)',
                },
                {
                    label: '1017',
                    data: {!! json_encode(array_column($pivotData1, '1017')) !!},
                    borderColor: 'rgb(0, 0, 0)',
                    backgroundColor: 'rgba(0, 0, 0)',
                },
            ],
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: 1, 
                        max: 10, 
                        stepSize: 1,
                        callback: function(value, index, values) {
                            return value; 
                        }
                    }
                }],
                xAxes: [{
                    
                }]
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var pivotData2 = {!! json_encode($pivotData2) !!};
    var labels = Object.keys(pivotData2);
    var datasets = [];
    var slocColors = {
        '-1000': 'rgb(255, 0, 0)', 
        '1003': 'rgb(0, 0, 255)', 
        '1007': 'rgb(34, 221, 34)', 
        '1009': 'rgb(255, 165, 0)', 
        '1017': 'rgb(0, 0, 0)'
    };

    ['-1000','1003', '1007', '1009', '1017'].forEach(function(sloc) {
        var data = labels.map(function(bulan) {
            return pivotData2[bulan][sloc] ? pivotData2[bulan][sloc]['average'] : 0;
        });

        datasets.push({
            label: sloc,
            data: data,
            borderColor: slocColors[sloc],
            backgroundColor: slocColors[sloc],
        });
    });

    var ctx = document.getElementById('slocLineChart2').getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets,
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var slocData3 = {!! json_encode($slocData3) !!};
    slocData3 = slocData3.filter(item => item.penyebab_sloc !== '-');
    var labels = slocData3.map(item => item.sloc + ' ' + item.penyebab_sloc);
    var data = slocData3.map(item => item.count);

    var backgroundColors = slocData3.map(item => {
        if (item.sloc === '-1000') {
            return 'rgba(255, 0, 0)';
        } else if (item.sloc === '1003') {
            return 'rgba(0, 0, 255)';
        } else if (item.sloc === '1007') {
            return 'rgba(34, 221, 34)';
        } else if (item.sloc === '1009') {
            return 'rgba(255, 165, 0)';
        } else {
            return 'rgba(0, 0, 0)';
        }
    });

    var ctx = document.getElementById('verticalBarChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Count',
                data: data,
                backgroundColor: backgroundColors,
                borderColor: 'rgba(54, 162, 235)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var data = {
        labels: ['EYESOUL', 'INFORMA', 'INFORMA ELEKTRONIK', 'WELLNESS'],
        datasets: [
            {
                label: '-1000',
                backgroundColor: 'rgba(255, 0, 0)',
                data: {!! json_encode(array_column($pivotData4, '-1000','BU')) !!}
            },
            {
                label: '1003',
                backgroundColor: 'rgba(0, 0, 255)',
                data: {!! json_encode(array_column($pivotData4, '1003','BU')) !!}
            },
            {
                label: '1007',
                backgroundColor: 'rgba(34, 221, 34)',
                data: {!! json_encode(array_column($pivotData4, '1007','BU')) !!}
            },
            {
                label: '1009',
                backgroundColor: 'rgba(255, 165, 0)',
                data: {!! json_encode(array_column($pivotData4, '1009','BU')) !!}
            },
            {
                label: '1017',
                backgroundColor: 'rgba(0, 0, 0)',
                data: {!! json_encode(array_column($pivotData4, '1017','BU')) !!}
            }
        ]
    };

        var config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        };

        var myChart = new Chart(document.getElementById('verticalBarChart1'), config);
</script>

<script>
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable();

        $('#bulanFilter').change(function() {
            var bulan = $(this).val();

            if (bulan !== '') {
                table.columns(0).search(bulan).draw();
            } else {
                table.columns(0).search('').draw();
            }
        });
    });
</script>

@endpush


--------------------------------$_COOKIE


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
use Auth;
use Carbon\Carbon;
use File;
use ZipArchive;


class SLocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

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
        
        return view('sloc.index',compact('data','no'));
    }

    public function index1(){

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
        
        return view('sloc.index1',compact('data','no'));
    }
    
    public function index2(){

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
        
        return view('sloc.index2',compact('data','no'));
    }

    public function dashboard()
    {
        $slocData1 = SLoc::select('bulan', 'sloc')
                    ->get();
        
        $pivotData1 = [];

        foreach ($slocData1 as $data) {
            if (!isset($pivotData1[$data->bulan])) {
                $pivotData1[$data->bulan] = [
                    '-1000' => 0,
                    '1003' => 0,
                    '1007' => 0,
                    '1009' => 0,
                    '1017' => 0,
                ];
            }
            $pivotData1[$data->bulan][$data->sloc]++;
        }


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

        
        $slocData3 = SLoc::select('sloc','penyebab_sloc')
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

        $slocData5 = SLoc::select('bulan','site', 'site_name', 'sloc', 'status_sloc')
                ->whereIn('status_sloc', ['Not Update', 'In Progress', 'Done'])
                ->get();
        
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
                    '1007 Not Update' => 0, // Initialize key for 1007
                    '1007 In Progress' => 0, // Initialize key for 1007
                    '1007 Done' => 0, // Initialize key for 1007
                    '1009 Not Update' => 0, // Initialize key for 1007
                    '1009 In Progress' => 0, // Initialize key for 1007
                    '1009 Done' => 0, // Initialize key for 1007
                    '1017 Not Update' => 0,
                    '1017 In Progress' => 0,
                    '1017 Done' => 0,
                ];
            }

            // Increment sesuai status dan sloc
            $pivotData5[$site][$sloc . ' ' . $status]++;
            
        }

        return view('sloc.dashboard', compact('pivotData4','pivotData1','slocData3','pivotData2','pivotData5','slocData4'));
    }

    public function import_excel(Request $request) 
    {

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        
        $file = $request->file('file');
        
        $nama_file = rand().$file->getClientOriginalName();
        
        $file->move('file_sloc',$nama_file);

        Excel::import(new SLocImport, public_path('/file_sloc/'.$nama_file));

        Session::flash('Sukses','Data SLoc Berhasil Diimport!');

        return redirect('/sloc');
    }
    
    public function export_excel()
    {
        return Excel::download(new SLocExport, 'datasloc.xlsx');
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
    {
        {
            $x = SLoc::find($id);
            $array_update = [

            'bulan' => $request->input('bulan') , 
            'weekly' => $request->input('weekly') , 
            'update_data' => $request->input('update_data') , 
            'site' => $request->input('site') , 
            'site_name' => $request->input('site_name') , 
            'article' => $request->input('article') , 
            'article_name' => $request->input('article_name') , 
            'sloc' => $request->input('sloc') , 
            'qty' => $request->input('qty') ,
            'penyebab_sloc' => $request->input('penyebab_sloc') ,
            'followup_sloc' => '-',
            'detail_followup' => $request->input('detail_followup') ,
            'tp_sloc' => '1900-01-01',
            'pic_tp' => '-',
            'no_dokumen' => '-',
            'qty_solving' => $request->input('qty_solving') ,
            'evident' => '-',
            'tgl_solving' => $request->input('tgl_solving') ,
            'aging_sloc' => '9999',
            'aging_solve' => $request->input('aging_solve') ,
            'status_sloc' => $request->input('status_sloc') ,
                 ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update003(Request $request, $id)
    {
        {
            $x = SLoc::find($id);
            $array_update = [

            'bulan' => $request->input('bulan') , 
            'weekly' => $request->input('weekly') , 
            'update_data' => $request->input('update_data') , 
            'site' => $request->input('site') , 
            'site_name' => $request->input('site_name') , 
            'article' => $request->input('article') , 
            'article_name' => $request->input('article_name') , 
            'sloc' => $request->input('sloc') , 
            'qty' => $request->input('qty') ,
            'penyebab_sloc' => $request->input('penyebab_sloc') ,
            'followup_sloc' => $request->input('followup_sloc') ,
            'detail_followup' => $request->input('detail_followup') ,
            'tp_sloc' => '1900-01-01',
            'pic_tp' => '-',
            'no_dokumen' => '-',
            'qty_solving' => $request->input('qty_solving') ,
            'evident' => '-',
            'tgl_solving' => $request->input('tgl_solving') ,
            'aging_sloc' => '9999',
            'aging_solve' => $request->input('aging_solve') ,
            'status_sloc' => $request->input('status_sloc') ,
                 ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update007(Request $request, $id)
    {
        {
            $x = SLoc::find($id);
            $array_update = [

            'bulan' => $request->input('bulan') , 
            'weekly' => $request->input('weekly') , 
            'update_data' => $request->input('update_data') , 
            'site' => $request->input('site') , 
            'site_name' => $request->input('site_name') , 
            'article' => $request->input('article') , 
            'article_name' => $request->input('article_name') , 
            'sloc' => $request->input('sloc') , 
            'qty' => $request->input('qty') ,
            'penyebab_sloc' => $request->input('penyebab_sloc') ,
            'followup_sloc' => '-',
            'detail_followup' => $request->input('detail_followup') ,
            'tp_sloc' => $request->input('tp_sloc') ,
            'pic_tp' => $request->input('pic_tp') ,
            'no_dokumen' => $request->input('no_dokumen') ,
            'qty_solving' => $request->input('qty_solving') ,
            'evident' => '-',
            'tgl_solving' => $request->input('tgl_solving') ,
            'aging_sloc' =>  $request->input('aging_sloc') ,
            'aging_solve' => $request->input('aging_solve') ,
            'status_sloc' => $request->input('status_sloc') ,
                 ];
            $x->update($array_update);
            return redirect('/sloc')->with('Berhasil Melakukan Update');
        }
    }

    public function update009(Request $request, $id)
    {
        {
            $x = SLoc::find($id);
            $array_update = [

            'bulan' => $request->input('bulan') , 
            'weekly' => $request->input('weekly') , 
            'update_data' => $request->input('update_data') , 
            'site' => $request->input('site') , 
            'site_name' => $request->input('site_name') , 
            'article' => $request->input('article') , 
            'article_name' => $request->input('article_name') , 
            'sloc' => $request->input('sloc') , 
            'qty' => $request->input('qty') ,
            'penyebab_sloc' => $request->input('penyebab_sloc') ,
            'followup_sloc' => '-',
            'detail_followup' => $request->input('detail_followup') ,
            'tp_sloc' => $request->input('tp_sloc') ,
            'pic_tp' => $request->input('pic_tp') ,
            'no_dokumen' => $request->input('no_dokumen') ,
            'qty_solving' => $request->input('qty_solving') ,
            'evident' => '-',
            'tgl_solving' => $request->input('tgl_solving') ,
            'aging_sloc' =>  $request->input('aging_sloc') ,
            'aging_solve' => $request->input('aging_solve') ,
            'status_sloc' => $request->input('status_sloc') ,
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
        $file->move($tujuan_upload,$file->getClientOriginalName());
        
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


    public function deleteAll(){
        DB::table('sloc')->delete();
        return redirect(route('sloc.index'))->with('Berhasil Menghapus Semua Data');
    }
    
    public function destroy(SLoc  $sloc)
    {
        $sloc->delete();

        return redirect()->route('sloc.index')->withStatus(__('Data Sukses Terhapus.'));
    }

    // public function get_service_serial_kbm(Request $req)
    // {
    //     // print($req->serialnumber);die;
    //     $mySerialNumber = $req->serialnumber;
    //     $data = Service::where('serialnumber', '=', $mySerialNumber)->get();
    //     return $data;
    // }
}
