<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{ $page_title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     
         <!-- Plugins css-->
         <link href="/dashboard/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
         <link href="/dashboard/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
         <link href="/dashboard/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
         <link href="/dashboard/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
         <link rel="stylesheet" href="/dashboard/plugins/switchery/switchery.min.css">
 <!-- Sweet Alert -->
 {{-- <link href="/dashboard/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css"> --}}
        <!-- Plugins css -->
        <link href="/dashboard/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="/dashboard/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="/dashboard/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="/dashboard/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="/dashboard/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

          <!-- Tooltipster css -->
        <link rel="stylesheet" href="/dashboard/plugins/tooltipster/tooltipster.bundle.min.css">


          <!--Footable-->
        <link href="/dashboard/plugins/footable/css/footable.core.css" rel="stylesheet">

           <!-- C3 charts css -->
        {{-- <link href="/dashboard/plugins/c3/c3.min.css" rel="stylesheet" type="text/css"  /> --}}
        <!--chartist Chart CSS -->
        {{-- <link rel="stylesheet" href="/dashboard/plugins/chartist/css/chartist.min.css"> --}}
  <!-- DataTables -->
  <link href="/dashboard/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/dashboard/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- Responsive datatable examples -->
  <link href="/dashboard/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

  <link href="/dashboard/plugins/billboard/billboard.css" rel="stylesheet" />

   {{-- <!-- Sweet-Alert  -->
   <script src="/dashboard/plugins/sweet-alert2/sweetalert2.min.js"></script>
   <script src="/dashboard/assets/pages/jquery.sweet-alert.init.js"></script> --}}
     <!-- Summernote css -->
     <link href="/dashboard/plugins/summernote/summernote-bs4.css" rel="stylesheet" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/dashboard/assets/images/favicon.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

        <!-- App css -->
        <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="/dashboard/assets/js/modernizr.min.js"></script>
   
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
           
    
            @include('dashboard.layouts.headers')

            
                    @include('dashboard.layouts.sidebars')

                 
                        @yield('container')
                    
            
        </div>

               
       

    <!-- Your HTML content -->

    <!-- jQuery (necessary for SweetAlert2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



              
              <!-- jQuery  -->
        <script src="/dashboard/assets/js/jquery.min.js"></script>
        <script src="/dashboard/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="/dashboard/assets/js/bootstrap.min.js"></script>
        <script src="/dashboard/assets/js/metisMenu.min.js"></script>
        <script src="/dashboard/assets/js/waves.js"></script>
        <script src="/dashboard/assets/js/jquery.slimscroll.js"></script>

        

        <!-- plugin js -->
        <script src="/dashboard/plugins/moment/moment.js"></script>
        <script src="/dashboard/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="/dashboard/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="/dashboard/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="/dashboard/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="/dashboard/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="/dashboard/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="/dashboard/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
        
        <!-- Init js -->
        <script src="/dashboard/assets/pages/jquery.form-pickers.init.js"></script>


           
    <!-- Counterjs  -->
    <script src="/dashboard/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="/dashboard/plugins/counterup/jquery.counterup.min.js"></script>
                
    <!-- App js -->
                <script src="/dashboard/assets/js/jquery.core.js"></script>
                <script src="/dashboard/assets/js/jquery.app.js"></script>

           
       

        <script src="/dashboard/plugins/switchery/switchery.min.js"></script>
        <script src="/dashboard/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="/dashboard/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="/dashboard/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
        <script src="/dashboard/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="/dashboard/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="/dashboard/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>



        <!-- Init Js file -->
        <script type="text/javascript" src="/dashboard/assets/pages/jquery.form-advanced.init.js"></script>
        <script type="text/javascript" src="/dashboard/plugins/parsleyjs/parsley.min.js"></script>

  {{-- <!-- Sweet-Alert  -->
  <script src="/dashboard/plugins/sweet-alert2/sweetalert2.min.js"></script>
  <script src="/dashboard/assets/pages/jquery.sweet-alert.init.js"></script> --}}

  <!-- Billboard.js  -->
  <script type="text/javascript" src="/dashboard/plugins/billboard/billboard.js"></script>
  
 <!--Summernote js-->
 <script src="/dashboard/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- Tooltipster js -->
    <script src="/dashboard/plugins/tooltipster/tooltipster.bundle.min.js"></script>
    <script src="/dashboard/assets/pages/jquery.tooltipster.js"></script>



<!--C3 Chart-->
{{-- <script type="text/javascript" src="/dashboard/plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="/dashboard/plugins/c3/c3.min.js"></script> --}}

<!--Echart Chart-->
{{-- <script src="/dashboard/plugins/echart/echarts-all.js"></script> --}}

<!--Chartist Chart-->
{{-- <script src="/dashboard/plugins/chartist/js/chartist.min.js"></script>
<script src="/dashboard/plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
<script src="/dashboard/assets/pages/jquery.chartist.init.js"></script> --}}

<!-- Dashboard init -->
{{-- <script src="/dashboard/assets/pages/jquery.dashboard.js"></script> --}}
  


  <!-- Required datatable js -->
  <script src="/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/dashboard/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="/dashboard/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="/dashboard/plugins/datatables/buttons.bootstrap4.min.js"></script>
  <script src="/dashboard/plugins/datatables/jszip.min.js"></script>
  <script src="/dashboard/plugins/datatables/pdfmake.min.js"></script>
  <script src="/dashboard/plugins/datatables/vfs_fonts.js"></script>
  <script src="/dashboard/plugins/datatables/buttons.html5.min.js"></script>
  <script src="/dashboard/plugins/datatables/buttons.print.min.js"></script>
  <script src="/dashboard/plugins/datatables/buttons.colVis.min.js"></script>



  <!-- Responsive examples -->
  <script src="/dashboard/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="/dashboard/plugins/datatables/responsive.bootstrap4.min.js"></script>
  <!--FooTable-->
  <script src="/dashboard/plugins/footable/js/footable.all.min.js"></script>

  <!--FooTable Example-->
  <script src="/dashboard/assets/pages/jquery.footable.js"></script>


       

  
  <script type="text/javascript">
    jQuery(function($) {
        $('.autonumber').autoNumeric('init');
    });
    </script>


  

 <script>
     jQuery(document).ready(function(){

         $('.summernote').summernote({
             height: 250,                 // set editor height
             minHeight: null,             // set minimum height of editor
             maxHeight: null,             // set maximum height of editor
             focus: false                 // set focus to editable area after initializing summernote
         });

         $('.inline-editor').summernote({
             airMode: true
         });

     });
 </script>

     <!-- Parsley js -->
     <script type="text/javascript" src="/dashboard/plugins/parsleyjs/parsley.min.js"></script>


     <script type="text/javascript">
         $(document).ready(function() {
             $('form').parsley();
         });
     </script>

  </body>
</html>
