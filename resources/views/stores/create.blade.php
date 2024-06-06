@extends('layouts.app')
  
@section('content')
@include('layouts.headers.cards')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    </div>
   
    <form action="{{route('stores.store')}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    <div class="container wrap mb-5">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>BU</label>
                <select name="bu" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                    <option value="INFORMA">INFORMA</option>
                                    <option value="INFORMA ELEKTRONIK">INFORMA ELEKTRONIK</option>
                                    <option value="EYESOUL">EYESOUL</option>
                                    <option value="WELLNESS">WELLNESS</option>
                                    <option value="SELMA">SELMA</option>
                                    <option value="SUSEN">SUSEN</option>
                                    <option value="PETKINGDOM">PETKINGDOM</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>STATUS</label>
                <select name="status" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="CLOSING">CLOSING</option>
                                        <option value="PROJECT">PROJECT</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label>BU LEGACY</label>
                <input  type="text" name="bu_legacy" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>SITE</label>
                <input  type="text" name="site" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>SITE NAME</label>
                <input  type="text" name="site_name" class="form-control" width="276" required>
            </div>
             <div class="col-md-6 mb-3">
                <label>KOTA</label>
                <input  type="text" name="kota" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>LUAS M2</label>
                <input  type="decimal" name="luas" class="form-control" width="276" required>
                <h12>example : 1000.10</h12>
            </div>
            
            <div class="col-md-6 mb-3">
                <label>OPENING</label>
                <input  type="date" name="opening" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>CLOSING</label>
                <input  type="date" name="closing" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>ALAMAT</label>
                <input  type="text" name="alamat" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>POSTL</label>
                <input  type="text" name="postl" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>TERITORIAL</label>
                <input  type="text" name="teritorial" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>AM</label>
                <input  type="text" name="am" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>SM 1</label>
                <input  type="text" name="sm1" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>SM 2</label>
                <input  type="text" name="sm2" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>SM 3</label>
                <input  type="text" name="sm3" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 1</label>
                <input  type="text" name="dsm1" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 2</label>
                <input  type="text" name="dsm2" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 3</label>
                <input  type="text" name="dsm3" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 4</label>
                <input  type="text" name="dsm4" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 5</label>
                <input  type="text" name="dsm5" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 6</label>
                <input  type="text" name="dsm6" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 7</label>
                <input  type="text" name="dsm7" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>DSM 8</label>
                <input  type="text" name="dsm8" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>ICO 1</label>
                <input  type="text" name="ico1" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>ICO 2</label>
                <input  type="text" name="ico2" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>ICO 3</label>
                <input  type="text" name="ico3" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>ICO 4</label>
                <input  type="text" name="ico4" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>EMAIL SM</label>
                <input  type="text" name="email_sm" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>EMAIL ICO</label>
                <input  type="text" name="email_ico" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>AVAYA CS</label>
                <input  type="text" name="avayacs" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>AVAYA BO</label>
                <input  type="text" name="avayabo" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>UPDATE PADA</label>
                <input  type="date" name="update_data" class="form-control" width="276" required>
            </div>
             <div class="col md-12">
                <div>
                <button type="submit" class="btn btn-success">Tambah Data Store</button>
                <a href="{{ route('stores.index') }}" class="btn btn-success my-3" target="#">Cancel Tambah Data</a>
            </div>
        </div>
    </div>
    </form>
</main>

@endsection
<script>
    // Mendapatkan elemen input tanggal
    var updateDataInput = document.getElementById('update_data');

    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = new Date().toISOString().slice(0, 10);

    // Mengatur nilai input tanggal dengan tanggal hari ini
    updateDataInput.value = today;
</script>