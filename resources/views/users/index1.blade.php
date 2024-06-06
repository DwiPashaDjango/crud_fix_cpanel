@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h1"><font color= #212529> <span class="fa fa-map-marker-alt fa-fw"></span> Users Contact Infromation </font></h1>
    </div>
    <div class="container">
            <div class="table-responsive">
                <table  id="dt"  class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Site 1</th>
                        <th>Site 2</th>
                        <th>Site 3</th>
                        <th>Site 4</th>

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
                        <td>{{$item->email}}</td>
                        <td>{{$item->role}}</td>
                        <td>{{$item->site1}}</td>
                        <td>{{$item->site2}}</td>
                        <td>{{$item->site3}}</td>
                        <td>{{$item->site4}}</td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- ini cuman untuk bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- ini untuk datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>

    </body>
</html>
@endsection
