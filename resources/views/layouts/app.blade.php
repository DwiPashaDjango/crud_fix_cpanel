<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ICONIC</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/logo.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    var t = $('#dataTables').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": [0,5]
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );

$(document).ready(function() {
    var t = $('#dt').DataTable();
    } );
    
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ]
    } );
} );
</script>

<script type="text/javascript">
$(document).on("click", ".delete", function (e) {
    e.preventDefault();
    var _self = $(this);

    var textData    = _self.data('text');
    var valueData   = _self.data('value');
    $(".modalDataText").text(textData);
    $(".modalDataValue").val(valueData);

    $(_self.attr('href')).modal('show');
});
$("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp(3000);
});
</script>

<script type="text/javascript">
$(document).on("click", ".import", function (e) {
    e.preventDefault();
    var _self = $(this);

    $(_self.attr('href')).modal('show');
});
$(document).on("click", ".deleteAll", function (e) {
    e.preventDefault();
    var _self = $(this);

    $(_self.attr('href')).modal('show');
});
</script>

<!-- <script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
</script> -->

<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 20; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            //$(wrapper).clone().prependTo('.clone')
            //$(wrapper).clone().appendTo('.clone').append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $(wrapper).clone().appendTo('.clone').find("input[type='text']").val(""); //add input box
            $('.input_fields_wrap').on('click',function(){
                val = $(this).find(".my_kelas").val();
                if (val == "2" ) {
                    $(".my_tarifbrr").html("<option value='40768' selected>40768</option>");
                    $(".my_tarifscc").html("<option value='77219' selected>77219</option>");
                } else if (val == "3" ) {
                    $(".my_tarifbrr").html("<option value='40769' selected>40769</option>");
                    $(".my_tarifscc").html("<option value='77218' selected>77218</option>");
                }
                 else {           
                    $(".my_tarifbrr").html("<option value='40760' selected>40760</option>");
                    $(".my_tarifscc").html("<option value='77210' selected>77210</option>");
                }
            });
        }
    });
    
    // $('.clone').on("click",".remove_field", function(e){ //user click on remove text
    //  e.preventDefault(); $(this).parent('div.input_fields_wrap').remove(); x--;
    // });
    $('.wrap').on("click",".remove_field", function(){
        //alert('ok');
        $('.wrap').find('.input_fields_wrap').not(':first').last().remove();
    });
});
</script>
</body>
</html>

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
