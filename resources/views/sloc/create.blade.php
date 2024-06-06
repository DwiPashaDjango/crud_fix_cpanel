@extends('layouts.app')
  
@section('content')
@include('layouts.headers.cards')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h1"><span class="fa fa-map-marker-alt fa-fw"></span>Data Penambahan SLoc</h1>
    </div>
   
    <form action="{{route('listkbm.store')}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    <div class="container wrap mb-5">
        <div class="row">
        <div class="col-md-6 mb-3">
                <label>Serial Number</label>
                <input  type="text" name="serialnumber" class="form-control" width="276" required>
            </div>
             <div class="col-md-6 mb-3">
                <label>Nama Produk</label>
                <input  type="text" name="namaproduk" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Area</label>
                <select name="area" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Gudang Kedoya (HO)">Gudang Kedoya (HO)</option>
                                        <option value="REGIONAL JAKARTA">REGIONAL JAKARTA</option>
                                        <option value="WITEL BEKASI">WITEL BEKASI</option>
                                        <option value="WITEL BOGOR">WITEL BOGOR</option>
                                        <option value="WITEL JAKARTA BARAT">WITEL JAKARTA BARAT</option>
                                        <option value="WITEL JAKARTA PUSAT">WITEL JAKARTA PUSAT</option>
                                        <option value="WITEL JAKARTA SELATAN">WITEL JAKARTA SELATAN</option>
                                        <option value="WITEL JAKARTA TIMUR">WITEL JAKARTA TIMUR</option>
                                        <option value="WITEL JAKARTA UTARA">WITEL JAKARTA UTARA</option>
                                        <option value="WITEL SERANG">WITEL SERANG</option>
                                        <option value="WITEL TANGERANG">WITEL TANGERANG</option>
                                        
                                        <option value="WITEL BANDUNG">WITEL BANDUNG</option>
                                        <option value="WITEL BANDUNG BARAT">WITEL BANDUNG BARAT</option>
                                        <option value="WITEL CIREBON">WITEL CIREBON</option>
                                        <option value="WITEL KARAWANG">WITEL KARAWANG</option>
                                        <option value="WITEL SUKABUMI">WITEL SUKABUMI</option>
                                        <option value="WITEL TASIKMALAYA">WITEL TASIKMALAYA</option>

                                        <option value="WITEL DI YOGYAKARTA (YOGYAKARTA)">WITEL DI YOGYAKARTA (YOGYAKARTA)</option>
                                        <option value="WITEL KUDUS">WITEL KUDUS</option>
                                        <option value="WITEL MAGELANG">WITEL MAGELANG</option>
                                        <option value="WITEL PEKALONGAN">WITEL PEKALONGAN</option>
                                        <option value="WITEL PURWOKERTO">WITEL PURWOKERTO</option>
                                        <option value="WITEL SEMARANG">WITEL SEMARANG</option>
                                        <option value="WITEL SOLO">WITEL SOLO</option>

                                        <option value="REGIONAL JATIM">REGIONAL JATIM</option>
                                        <option value="WITEL DENPASAR">WITEL DENPASAR</option>
                                        <option value="WITEL GRESIK">WITEL GRESIK</option>
                                        <option value="WITEL JEMBER">WITEL JEMBER</option>
                                        <option value="WITEL KEDIRI">WITEL KEDIRI</option>
                                        <option value="WITEL KUPANG">WITEL KUPANG</option>
                                        <option value="WITEL MADIUN">WITEL MADIUN</option>
                                        <option value="WITEL MADURA">WITEL MADURA</option>
                                        <option value="WITEL MALANG">WITEL MALANG</option>
                                        <option value="WITEL MATARAM">WITEL MATARAM</option>
                                        <option value="WITEL PASURUAN">WITEL PASURUAN</option>
                                        <option value="WITEL SIDOARJO">WITEL SIDOARJO</option>
                                        <option value="WITEL SINGARAJA">WITEL SINGARAJA</option>
                                        <option value="WITEL SURABAYA">WITEL SURABAYA</option>
                                        <option value="WITEL SURABAYA SELATAN">WITEL SURABAYA SELATAN</option>
                                        <option value="WITEL SURABAYA UTARA">WITEL SURABAYA UTARA</option>

                                        <option value="REGIONAL KALIMANTAN">REGIONAL KALIMANTAN</option>
                                        <option value="WITEL BALIKPAPAN">WITEL BALIKPAPAN</option>
                                        <option value="WITEL BANJARMASIN">WITEL BANJARMASIN</option>
                                        <option value="WITEL PALANGKARAYA">WITEL PALANGKARAYA</option>
                                        <option value="WITEL PONTIANAK">WITEL PONTIANAK</option>
                                        <option value="WITEL SAMARINDA">WITEL SAMARINDA</option>
                                        <option value="WITEL TARAKAN">WITEL TARAKAN</option>
                                       
                                        <option value="WITEL AMBON">WITEL AMBON</option>
                                        <option value="WITEL Gorontalo">WITEL Gorontalo</option>
                                        <option value="WITEL JAYAPURA">WITEL JAYAPURA</option>
                                        <option value="WITEL KENDARI">WITEL KENDARI</option>
                                        <option value="WITEL MAKASSAR">WITEL MAKASSAR</option>
                                        <option value="WITEL MANADO">WITEL MANADO</option>
                                        <option value="WITEL PALU">WITEL PALU</option>
                                        <option value="WITEL PARE-PARE">WITEL PARE-PARE</option>
                                        <option value="WITEL SORONG">WITEL SORONG</option>

                                        <option value="WITEL ACEH(BANDA ACEH)">WITEL ACEH(BANDA ACEH)</option>
                                        <option value="WITEL BATAM">WITEL BATAM</option>
                                        <option value="WITEL BENGKULU">WWITEL BENGKULU</option>
                                        <option value="WITEL JAMBI">WITEL JAMBI</option>
                                        <option value="WITEL LAMPUNG">WITEL LAMPUNG</option>
                                        <option value="WITEL MEDAN">WITEL MEDAN</option>
                                        <option value="WITEL PADANG">WITEL PADANG</option>
                                        <option value="WITEL PALEMBANG">WITEL PALEMBANG</option>
                                        <option value="WITEL PANGKAL PINANG">WITEL PANGKAL PINANG</option>
                                        <option value="WITEL PEKANBARU">WITEL PEKANBARU</option>
                                        <option value="WITEL PEMATANG SIANTAR">WITEL PEMATANG SIANTAR</option>
                </select>
            </div>
          <div class="col-md-6 mb-3">
                <label>Regional</label>
                <select name="regional" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                        <option value="JAKARTA">JAKARTA</option>
                                        <option value="JAWA BARAT">JAWA BARAT</option>
                                        <option value="JAWA TENGAH">JAWA TENGAH</option>
                                        <option value="JAWA TIMUR BALINUSRA">JAWA TIMUR BALINUSRA</option>
                                        <option value="KALIMANTAN">KALIMANTAN</option>
                                        <option value="KTI">KTI</option>
                                        <option value="SUMATERA">SUMATERA</option>
                </select>
            </div>
             <div class="col-md-6 mb-3">
                <label>Nomor PO</label>
                <input  type="text" name="nomorpo" class="form-control" width="276" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Company</label>
                <select name="company" class="form-control" style="width:276" required>
                    <option value="">----- Pilih -----</option>
                                        <option value="Telkom Akses">Telkom Akses</option>
                                        <option value="Adi Sarana Group">Adi Sarana Group</option>
                                        <option value="CV RAJAWALI ERA MANDIRI">CV RAJAWALI ERA MANDIRI</option>
                                        <option value="CV Wirasana">CV Wirasana</option>
                                        <option value="CV.GLOBAL ENGINEERING">CV.GLOBAL ENGINEERING</option>
                                        <option value="DARMATECH INFOMEDIA">DARMATECH INFOMEDIA</option>
                                        <option value="DKU">DKU</option>
                                        <option value="Golden Star Perkasa">Golden Star Perkasa</option>
                                        <option value="Kopegtel">Kopegtel</option>
                                        <option value="PT AKUR SENTOSA ABADI">PT AKUR SENTOSA ABADI</option>
                                        <option value="PT ARTHAYA WIRANATA TEKNOLOGI">PT ARTHAYA WIRANATA TEKNOLOGI</option>
                                        <option value="PT Autobagus Utama">PT Autobagus Utama</option>
                                        <option value="PT Batavia Properindo">PT Batavia Properindo</option>
                                        <option value="PT Bumi Jasa Utama">PT Bumi Jasa Utama</option>
                                        <option value="PT CSM">PT CSM</option>
                                        <option value="PT Mitra Pinasthika Mustika Rent">PT Mitra Pinasthika Mustika Rent</option>
                                        <option value="PT Mitra Sarana Group">PT Mitra Sarana Group</option>
                                        <option value="PT Zhafeera Jaya Kaltim">PT Zhafeera Jaya Kaltim</option>
                                        <option value="PT. ANANDA KARYA NUGRAHA">PT. ANANDA KARYA NUGRAHA</option>
                                        <option value="PT. GAYA MASA TEKNIKA">PT. GAYA MASA TEKNIKA</option>
                                        <option value="PT. Graha Sarana Duta">PT. Graha Sarana Duta</option>
                                        <option value="PT. KREASI DUMAI">PT. KREASI DUMAI</option>
                                        <option value="PT. PRIMA ANUGERAH SANTOSO">PT. PRIMA ANUGERAH SANTOSO</option>
                                        <option value="PT. Surya Sudeco">PT. Surya Sudeco</option>
                                        <option value="Takari">Takari</option>
                                        <option value="Waskita">Waskita</option>
                                        <option value="Impress Fund">Impress Fund</option>
                </select>
            </div>
              <div class="col-md-6 mb-3">
                <label>Jenis KBM</label>
                <input  type="text" name="jeniskbm" class="form-control" width="276" required>
            </div>
             <div class="col-md-6 mb-3">
                <label>Kir</label>
                <input  type="date" name="kir" class="form-control" width="276" required>
            </div>
             <div class="col-md-6 mb-3">
                <label>Pajak</label>
                <input  type="date" name="pajak" class="form-control" width="276" required>
            </div>
             <div class="col-md-6 mb-3">
                <label>Kontrak</label>
                <input  type="date" name="kontrak" class="form-control" width="276" required>
            </div>
             <div class="col md-12">
                <div>
                <button type="submit" class="btn btn-success">Tambah Data KBM</button>
            </div>
        </div>
    </div>
    </form>
</main>
@endsection