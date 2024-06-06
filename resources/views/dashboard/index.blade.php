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
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                 <center> <h3 class="mb-0"><font color= #212529>Sloc Line Chart</font></h3> </center>
                </div> 
              </div>
              <a href="service.export_excel" class="btn btn-sm btn-primary">Download</a>
            </div>
            <div class="card-body p-3">
              <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                 <center><h3 class="mb-0"><font color= #212529>Reason Bar Chart SLoc</h3></font></center>
                </div>    
              </div>
               <a href="listkbm.export_excel" class="btn btn-sm btn-primary">Download</a>
            </div>
            <div class="table-responsive">
              <!-- Projects table
               BAR CHART DISINI -->
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')

@endpush