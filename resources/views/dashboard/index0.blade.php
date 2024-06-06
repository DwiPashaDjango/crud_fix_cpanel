    @extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
              <!-- Card stats -->
         
         
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center" style="margin-bottom: 15px;">
                <div class="col">
                 <center> <h3 class="mb-0"><font color= #212529>Rooms Reporting Monitoring</font></h3> </center>
                </div> 
              </div>
              @if(Auth::user()->role=="Admin" )
              <a href="room.export_excel" class="btn btn-sm btn-primary">Download</a>
              @endif
              @if(Auth::user()->role=="PIC" )
              <a href="room.export_excel" class="btn btn-sm btn-primary">Download</a>
              @endif
              <label>Filter By</label>
              <select name="filter_by" id="filter_by" class="btn btn-sm btn-primary" style="width:15%" required>
                    <option value="">-- Pilih --</option>
                    <option value="regional" <?php if($data['filter_by']=='regional'){echo 'selected';} ?> >Regional</option>
                    <option value="tahun" <?php if($data['filter_by']=='tahun'){echo 'selected';} ?> >Tahun</option>
                </select>
              <label>Select</label>
              <select name="selected" id="selected" class="btn btn-sm btn-primary" style="width:20%" required>
                    <option value="">-- Pilih --</option>
                    <?php if($data['filter_by']=='regional') { ?>
                      @foreach($data['regional'] as $regional)
                      <option value="{{str_replace(' ', '-',$regional->regional)}}" <?php if($data['selected']==str_replace(" ", "-", $regional->regional)){echo 'selected';} ?>  >{{$regional->regional}}</option>
                      @endforeach
                    <?php } ?>
                    <?php if($data['filter_by']=='tahun') { ?>
                      @foreach($data['tahun'] as $tahun)
                      <option value="{{$tahun->tahun}}" <?php if($data['selected']==$tahun->tahun){echo 'selected';} ?> >{{$tahun->tahun}}</option>
                      @endforeach
                    <?php } ?>
                </select>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
             <table class="table align-items-center table-flush">
                <thead class="#">
                  <tr>
                    <th scope="col">Regional</th>
                    <th scope="col">Luas</th>
                    <th scope="col">Baserent</th>
                    <th scope="col">Service Charge</th>
                    <th scope="col">Total Baserent</th>
                    <th scope="col">Total Service Charge</th>
                  </tr>
                </thead>
                <?php if($data['filter_by']=='regional') { ?>
                <tbody>
                  <?php foreach ($data['data'] as $value) { ?>
                    <tr>
                      <th scope="row">{{$value->area}}</th>
                      <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->luas}}</center></td>
                      <td><i class="fas fa-wrench text-success mr-3"></i>{{$value->baserent}}</td>
                      <td><i class="fas fa-user-edit text-success mr-3"></i>{{$value->servicecharge}}</td>
                      <td><i class="fas fa-check-circle text-success mr-3"></i>Rp. {{number_format($value->totalbr,2)}}</td>
                      <td><i class="fas fa-check-circle text-success mr-3"></i>Rp. {{number_format($value->totalsc,2)}}</td>
                    </tr>
                  <?php } ?>
                </tbody>
                <?php } elseif($data['filter_by']=='tahun') { ?>
                <tbody>
                  <?php foreach ($data['data'] as $value) { ?>
                    <tr>
                      <th scope="row">{{$value->regional}}</th>
                      <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->luas}}</center></td>
                      <td><i class="fas fa-wrench text-success mr-3"></i>{{$value->baserent}}</td>
                      <td><i class="fas fa-user-edit text-success mr-3"></i>{{$value->servicecharge}}</td>
                      <td><i class="fas fa-check-circle text-success mr-3"></i>Rp. {{number_format($value->totalbr,2)}}</td>
                      <td><i class="fas fa-check-circle text-success mr-3"></i>Rp. {{number_format($value->totalsc,2)}}</td>
                    </tr>
                  <?php } ?>
                </tbody>
                <?php } elseif($data['filter_by']=='' || $data['selected']=='' || $data['filter_by']!='namaasset' || $data['filter_by']!='tahun_asset') { ?>
                 <tbody>
                  <?php foreach ($data['data'] as $value) { ?>
                    <tr>
                      <th scope="row">{{$value->regional}}</th>
                      <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->luas}}</center></td>
                      <td><i class="fas fa-wrench text-success mr-3"></i>{{$value->baserent}}</td>
                      <td><i class="fas fa-user-edit text-success mr-3"></i>{{$value->servicecharge}}</td>
                      <td><i class="fas fa-check-circle text-success mr-3"></i>Rp. {{number_format($value->totalbr,2)}}</td>
                      <td><i class="fas fa-check-circle text-success mr-3"></i>Rp. {{number_format($value->totalsc,2)}}</td>
                    </tr>
                  <?php } ?>
                </tbody>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center" style="margin-bottom: 15px;">
                <div class="col">
                 <center><h3 class="mb-0"><font color= #212529>Monitoring Assets Non Inv</h3></font></center>
                </div>    
              </div>
               @if(Auth::user()->role=="Admin" )
               <a href="listkbm.export_excel" class="btn btn-sm btn-primary">Download</a>
               @endif
               @if(Auth::user()->role=="PIC" )
               <a href="listkbm.export_excel" class="btn btn-sm btn-primary">Download</a>
               @endif
                <label>Filter By</label>
              <select name="filter_by" id="filter_by_asset" class="btn btn-sm btn-primary" style="width:35%" required>
                    <option value="">-- Pilih --</option>
                    <option value="nama_asset" <?php if($data['filter_by']=='nama_asset'){echo 'selected';} ?> >Nama Asset</option>
                    <option value="tahun_asset" <?php if($data['filter_by']=='tahun_asset'){echo 'selected';} ?> >Tahun</option>
                </select>
                <label>Select</label>
                <select name="selected" id="selected_asset" class="btn btn-sm btn-primary" style="width:40%" required>
                    <option value="">-- Pilih --</option>
                    <?php if($data['filter_by']=='nama_asset') { ?>
                      @foreach($data['nama_asset'] as $nama_asset)
                      <option value="{{str_replace(' ', '-',$nama_asset->namaasset)}}" <?php if($data['selected']==str_replace(" ", "-", $nama_asset->namaasset)){echo 'selected';} ?>  >{{$nama_asset->namaasset}}</option>
                      @endforeach
                    <?php } ?>
                    <?php if($data['filter_by']=='tahun_asset') { ?>
                      @foreach($data['tahun_asset'] as $tahun_asset)
                      <option value="{{$tahun_asset->tahun}}" <?php if($data['selected']==$tahun_asset->tahun){echo 'selected';} ?> >{{$tahun_asset->tahun}}</option>
                      @endforeach
                    <?php } ?>

                </select>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="#">
                  <tr>
                    <th>Regional</th>
                    <th>Kondisi Baik</th>
                    <th>Kondisi Rusak</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if($data['filter_by']=='nama_asset') { ?>
                       <?php foreach ($data['data_asset'] as $value) { ?>
                        <tr>
                          <th scope="row">{{$value->regional}}</th>   
                            <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->kondisi_baik}}</center></td>
                            <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->kondisi_rusak}}</center></td>
                        </tr>
                      <?php } ?>
                    <?php }elseif($data['filter_by']=='tahun_asset') { ?>
                       <?php foreach ($data['data_asset'] as $value) { ?>
                        <tr>
                          <th scope="row">{{$value->regional}}</th>   
                            <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->kondisi_baik}}</center></td>
                            <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->kondisi_rusak}}</center></td>
                        </tr>
                      <?php } ?>
                     <?php }elseif($data['filter_by']=='' || $data['selected']=='' || $data['selected']!='regional' || $data['selected']!='tahun') { ?>
                      <?php foreach ($data['data_asset'] as $value) { ?>
                        <tr>
                          <th scope="row">{{$value->regional}}</th>   
                            <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->kondisi_baik}}</center></td>
                            <td><i class="fab fa-wpforms text-success mr-3"></i>{{$value->kondisi_rusak}}</center></td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>


<script type="text/javascript">
  $('#selected').change(function(){
    var filter_by = $('#filter_by').val();
    var selected = $('#selected').val();
      if(filter_by != '' && selected != ''){
          window.location = 'http://127.0.0.1:8000/dashboard.index0/'+filter_by+'/'+selected;
      }else{
          window.location = 'http://127.0.0.1:8000/dashboard.index0'
      }
  })

  $('#selected_asset').change(function(){
    var filter_by_asset = $('#filter_by_asset').val();
    var selected_asset = $('#selected_asset').val();
      if(filter_by_asset != '' && selected_asset != ''){
          window.location = 'http://127.0.0.1:8000/dashboard.index0/'+filter_by_asset+'/'+selected_asset;
      }else{
          window.location = 'http://127.0.0.1:8000/dashboard.index0'
      }
  })

  $("#filter_by").change(function () {
        var val = $(this).val();
        var option_regional = `<?php foreach($data['regional'] as $value){echo '<option value="'. str_replace(" ", "-", $value->regional) .'">'.$value->regional.'</option>';} ?>`
        var option_tahun = `<?php foreach($data['tahun'] as $value){echo '<option value="'. str_replace(" ", "-", $value->tahun) .'">'.$value->tahun.'</option>';} ?>`
        if (val == "regional") {
            $("#selected").html(`<option value="">-- Pilih --</option>`+option_regional);
        } else if (val == "tahun") {
            $("#selected").html(`<option value="">-- Pilih --</option>`+option_tahun);
        }
  });

  $("#filter_by_asset").change(function () {
        var val = $(this).val();
        var option_nama_asset = `<?php foreach($data['nama_asset'] as $value){echo '<option value="'. str_replace(" ", "-", $value->namaasset) .'">'.$value->namaasset.'</option>';} ?>`
        var option_tahun_asset = `<?php foreach($data['tahun_asset'] as $value){echo '<option value="'. str_replace(" ", "-", $value->tahun) .'">'.$value->tahun.'</option>';} ?>`
        if (val == "nama_asset") {
            $("#selected_asset").html(`<option value="">-- Pilih --</option>`+option_nama_asset);
        } else if (val == "tahun_asset") {
            $("#selected_asset").html(`<option value="">-- Pilih --</option>`+option_tahun_asset);
        }
  });
</script>

@endpush