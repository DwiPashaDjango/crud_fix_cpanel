@extends('layouts.app')
  
@section('content')
@include('layouts.headers.cards')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><font color= #212529>  <span class="fa fa-edit fa-fw"></span> View SLoc </font></h1>
    </div>
    
                
                <form method="POST" action="#" autocomplete="off" enctype="multipart/form-data">
                {{method_field('put')}}
                {{csrf_field()}}
                <div class="container wrap mb-5">
                <div class="row">
                <input type="hidden" name="bulan" value="{{$data->bulan}}">
                <div class="col-md-6 mb-3">
                <label>Weekly</label>
                <input  type="text" name="weekly" class="form-control" value="{{$data->weekly}}" width="276" readonly>
                </div>
                <div class="col-md-6 mb-3">
                <label>Update Data</label>
                <input  type="date" id="update_data" name="update_data" class="form-control" value="{{$data->update_data}}" width="276" readonly> </div>
                <div class="col-md-6 mb-3">
                <label>Site</label>
                <input  type="text" name="site" class="form-control" value="{{$data->site}}" width="276" readonly> </div>
                <div class="col-md-6 mb-3">
                <label>Site Name</label>
                <input  type="text" name="site_name" class="form-control" value="{{$data->site_name}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Article</label>
                <input  type="text" name="article" class="form-control" value="{{$data->article}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Article Name</label>
                <input  type="text" name="article_name" class="form-control" value="{{$data->article_name}}" width="276" readonly> </div>
                <div class="col-md-6 mb-3">
                <label>Sloc</label>
                <input  type="text" name="sloc" class="form-control" value="{{$data->sloc}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Qty</label>
                <input  type="integer" id="qty" name="qty" class="form-control" value="{{$data->qty}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Penyebab / Jenis Sloc</label>
                <input  type="text" id="penyebab_sloc" name="penyebab_sloc" class="form-control" value="{{$data->penyebab_sloc}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Follow Up Sloc (1003)</label>
                <input  type="text" id="followup_sloc" name="followup_sloc" class="form-control" value="{{$data->followup_sloc}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Detail Follow Up Sloc</label>
                <input  type="text" id="detail_followup" name="detail_followup" class="form-control" value="{{$data->detail_followup}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>TP Sloc</label>
                <input  type="text" id="tp_sloc" name="tp_sloc" class="form-control" value="{{$data->tp_sloc}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>PIC TP</label>
                <input  type="text" id="pic_tp" name="pic_tp" class="form-control" value="{{$data->pic_tp}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Receipt / LPPBDO-PO / No.SR</label>
                <input  type="text" id="no_dokumen" name="no_dokumen" class="form-control" value="{{$data->no_dokumen}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Qty Solving</label>
                <input  type="integer" id="qty_solving" name="qty_solving" class="form-control" value="{{$data->qty_solving}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Evident 1017</label>
                <input  type="text" id="evident" name="evident" class="form-control" value="{{$data->evident}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Tgl Solving / Progress</label>
                <input  type="date" id = "tgl_solving" name="tgl_solving" class="form-control" value="{{$data->tgl_solving}}"  width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Aging Sloc</label>
                <input  type="integer" id ="aging_sloc" name="aging_sloc" class="form-control" value="{{$data->aging_sloc}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Aging Solve</label>
                <input  type="integer" id ="aging_solve" name="aging_solve" class="form-control" value="{{$data->aging_solve}}" width="276" readonly></div>
                <div class="col-md-6 mb-3">
                <label>Status</label>
                <input  type="text" id="status_sloc" name="status_sloc" class="form-control" value="{{$data->status_sloc}}" width="276" readonly></div>
                
                <div class="col-md-12">
                    <a href="{{route('sloc.index1')}}" class="btn btn-secondary">Back</a>
                </div>
                </form> 
        </div>
    </div>
</main>
@endsection