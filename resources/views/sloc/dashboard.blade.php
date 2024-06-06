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
                    <div class="d-flex justify-content-between">
                        <div>
                            <center><h3 class="mb-0"><font color="#212529">Sloc Trend</font></h3></center>
                        </div>
                        <div>
                            <label for="">Site : </label>
                            <select name="site_name" id="site_name" class="">
                                <option value="All">All</option>
                                @foreach ($sites as $sts)
                                    <option value="{{$sts->site}}">{{$sts->site}}</option>
                                @endforeach
                            </select>
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
                {{-- <div class="row align-items-center">
                    <div class="col">
                        
                    </div>
                    <div>
                    
                    </div>
                    <div class="col1">
                        <select id="bulanFilter" class="form-control">
                            <option value="">Pilih Bulan</option>
                            <option value="Jan">Januari</option>
                            <option value="Feb">Febuari</option>
                        </select>
                    </div> 
                </div> --}}
                <div class="d-flex justify-content-between">
                    <div><a href="sloc.export_excel" class="btn btn-sm btn-primary mr-3">Download</a></div>
                    <div><center><h3 class="mb-0"><font color="#212529">Site - SLoc Status</font></h3><br></center></div>
                    <div>
                        <form action="{{route('sloc.dashboard')}}" method="GET">
                            <div class="input-group mb-3">
                                <select name="month" id="month" class="form-control">
                                    <option value="">- All -</option>
                                    @php
                                        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
                                        $selectedMonth = request('month', old('month'));
                                    @endphp
                                    @foreach ($month as $mth)
                                        <option value="{{$mth}}" {{$selectedMonth === $mth ? 'selected' : ''}}>{{$mth}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary" type="button"><i class="fas fa-filter"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table align-items-center table-flush" border="1">
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
    var ctx2 = document.getElementById('slocLineChart1').getContext('2d');
    var myLineChart2 = null;

    getAllSlocTrend('All');
    $('#site_name').change(function(e) {
        e.preventDefault();
        let site = $(this).val();
        getAllSlocTrend(site);
    });

    function getAllSlocTrend(site) {
        $.ajax({
            url: "{{route('sloc.get.sloc.trend')}}",
            method: "GET",
            data: {
                site: site
            },
            dataType: 'json',
            success: function(data) {
                // Hancurkan chart yang sudah ada jika ada
                if (myLineChart2) {
                    myLineChart2.destroy();
                }
                
                // Buat chart baru dengan data yang diperbarui
                myLineChart2 = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: '-1000',
                                data: data.datasets['-1000'],
                                borderColor: 'rgb(255, 0, 0)',
                                backgroundColor: 'rgba(255, 0, 0)',
                            },
                            {
                                label: '1003',
                                data: data.datasets['1003'],
                                borderColor: 'rgb(0, 0, 255)',
                                backgroundColor: 'rgba(0, 0, 255)',
                            },
                            {
                                label: '1007',
                                data: data.datasets['1007'],
                                borderColor: 'rgb(34, 221, 34)',
                                backgroundColor: 'rgba(34, 221, 34)',
                            },
                            {
                                label: '1009',
                                data: data.datasets['1009'],
                                borderColor: 'rgb(255, 165, 0)',
                                backgroundColor: 'rgba(255, 165, 0)',
                            },
                            {
                                label: '1017',
                                data: data.datasets['1017'],
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
                                // Tambahkan pengaturan untuk sumbu x jika diperlukan
                            }]
                        }
                    }
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

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
                table.columns(1).search(bulan).draw();
            } else {
                table.columns(1).search('').draw();
            }
        });
    });
</script>

@endpush