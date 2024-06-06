@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
        <h1 class="h1"><font color= #212529> <span class="fa fa-map-marker-alt fa-fw"></span> Data </font></h1>
    <div class="container">
        @if(Auth::user()->role=="Admin" )
        <a href="#" class="btn btn-success my-3" target="#">Tambah Data</a>
    	<a href="data.export_excel" class="btn btn-success my-3">Download Data</a>
    	<button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#importExcel">Upload Data </button>
        <button type="button" class="btn btn-success my-3" data-toggle="modal" data-target="#deleteConfirm1">Hapus Semua Data</button>
        @endif
         @if(Auth::user()->role=="PIC" )
        <a href="#" class="btn btn-success my-3">Download Data</a>
        @endif
    </div>
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <!-- mengarahkan ke function import_excel -->
        <form method="post" action="{{ url('data.import_excel')}}" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
              <label>Pilih File Excel</label>
              <div class="form-group">
                <input type="file" name="file" required="required">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    	<div class="table-responsive">
    		<table id="dt"  class="table table-striped table-sm">
    			<thead>
    				<tr>
    					<th>#</th>
    					<th>Regional</th>
                        <th>Area</th>
    					<th>Gedung</th>
                        <th>Lokasi</th>
                        <th>Alamat</th>
                        @if(Auth::user()->role=="Admin" )
                        <th>Opsi</th>
                        @endif
    				</tr>
    			</thead>
    			<tbody>
                    @if(count($data['parse']) == 0)
                    <tr>
                        <td colspan="3"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->regional}}</td>
                        <td>{{$item->area}}</td>
                        <td>{{$item->gedung}}</td>
                        <td>{{$item->lokasi}}</td>
                        <td><a href="{{$item->alamat}}" target="_blank"><center><i class='fas fa-map-marker-alt' style='font-size:18px;color:red'></i></center></td>
                       
                            @if(Auth::user()->role=="Admin" )
                            <td>
                            <div class="btn-group" role="group" aria-label="Grup"><a href="#" type="button" class="btn btn-info btn-sm">Edit</a>
                            <div class="btn-group" role="group" aria-label="Grup"><button data-toggle="modal" data-url="#" data-target="#historyButton"  type="button" class="btn btn-info btn-sm">History</button>
                            <form action="#" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" onclick="confirm('{{ __("Anda yakin ingin menghapus data ini?") }}') ? this.parentElement.submit() : ''" class="btn btn-info btn-sm">Hapus</a></button>
                            </form>
                          </td>
                           @endif
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal History -->
<div class="modal fade" id="historyButton" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="modal-history">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal History -->

<!-- Modal Delete -->
<div class="modal fade" id="deleteConfirm" role="dialog">
    <div class="modal-dialog modal-sm">
        <form method="POST" action="#">
        {{method_field('delete')}}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus <strong class="modalDataText"></strong> ?</p>
                <input type="hidden" name="id" value="" class="modalDataValue">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>

<div class="modal fade" id="deleteConfirm1" role="dialog">
    <div class="modal-dialog modal-sm">
        <form method="GET" action="{{ route('data.deleteAll') }}">
        {{method_field('delete')}}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus semua data <strong class="modalDataText"></strong> ?</p>
                <input type="hidden" name="id" value="" class="modalDataValue">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
        {{csrf_field()}}
        </form>
    </div>
</div>
<!-- Modal Delete -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- ini cuman untuk bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- ini untuk datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


    </body>
</html>
@endsection
