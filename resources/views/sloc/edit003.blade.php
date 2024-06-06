@extends('layouts.app')
  
@section('content')
@include('layouts.headers.cards')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><font color= #212529>  <span class="fa fa-edit fa-fw"></span> Update Progress 1003</font></h1>
    </div>
    
                
                <form method="POST" action="{{route('sloc.update003',[$data->id])}}" autocomplete="off" enctype="multipart/form-data">
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
                <div class="col-md-6 mb-4">
                <label>Penyebab / Jenis Sloc</label>
                <select name="penyebab_sloc" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                        <option value="Booking Aktif">Booking Aktif</option>
                                        <option value="Booking Gantung">Booking Gantung</option>
                </select></div>
                <div class="col-md-6 mb-4">
                <label>Follow Up Sloc (1003)</label>
                <select name="followup_sloc" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                        <option value="Fulfillment">Fulfillment</option>
                                        <option value="Helpdesk IT">Helpdesk IT</option>
                                        <option value="System">System</option>
                                        <option value="Adj Bu Hetty">Adj Bu Hetty</option>
                                        <option value="Buat BA Bu Hetty">Buat BA Bu Hetty</option>
                                        <option value="TUGU">TUGU</option>
                </select></div>
                <div class="col-md-6 mb-3">
                <label>Detail Follow Up Sloc</label>
                <input  type="text" name="detail_followup" class="form-control" value="{{$data->detail_followup}}" width="276" required></div>
                <div class="col-md-6 mb-3">
                <label>Qty Solving</label>
                <input  type="integer" id="qty_solving" name="qty_solving" class="form-control" value="{{$data->qty_solving}}" width="276" required></div>
                <div class="col-md-6 mb-4">
                <label>Status</label>
                <select id = status name="status_sloc" class="form-control" value="{{$data->status_sloc}} style="width:276" readonly>
                    <option value="">----- Pilih -----</option>
                                        <option value="Not Update">Not Update</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Done">Done</option>
                </select></div>
                <div class="col-md-6 mb-3">
                <label>Tgl Solving / Progress</label>
                <input  type="date" id = "tgl_solving" name="tgl_solving" class="form-control"  width="276" required></div>
                <div class="col-md-6 mb-3">
                <label>Aging Solve</label>
                <input  type="integer" id ="aging_solve" name="aging_solve" class="form-control" width="276" readonly></div>
                <div class="col-md-12">
                    <a href="{{route('sloc.index')}}" class="btn btn-secondary">Batal</a>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
                </form> 
        </div>
    </div>
</main>
<script>
    function calculateAgingSolve() {
        var updateData = new Date(document.getElementById('update_data').value).getTime(); // Ubah nilai Update Data ke dalam format waktu
        var tglSolving = new Date(document.getElementById('tgl_solving').value).getTime(); // Ubah nilai Tgl Solving ke dalam format waktu
        var difference = tglSolving - updateData; // Hitung selisih waktu antara Tgl Solving dan Update Data
        var daysDifference = Math.floor(difference / (1000 * 60 * 60 * 24)); // Konversi selisih waktu ke dalam hari
        document.getElementById('aging_solve').value = daysDifference; // Tampilkan selisih waktu dalam Aging Solve
    }

    // Panggil fungsi calculateAgingSolve saat nilai Tgl Solving berubah
    document.getElementById('tgl_solving').addEventListener('input', calculateAgingSolve);


    function updateStatus() {
        var qty = parseFloat(document.getElementById('qty').value);
        var qty_solving = parseFloat(document.getElementById('qty_solving').value);
        var status = document.getElementById('status');

        if (qty_solving === qty) {
            status.value = 'Done';
        } else {
            status.value = 'In Progress';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateStatus();
    });

    document.getElementById('qty_solving').addEventListener('input', updateStatus);
</script>
@endsection