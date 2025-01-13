@extends('dashboard.layouts.mains')

@section('container')
@foreach($debts as $debt)

@endforeach

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">HUTANG KARYAWAN</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            
           
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title text-center"><b>Daftar Hutang Karyawan</b></h4>
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                                <a href="/dashboard/employeedebt/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Buat Data Hutang / Piutang Baru</a>
                            </div>
                                
                        </div>
                        @if (session()->has('success'))
                        <div class="alert alert-success col-lg-12 text-center" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                            <tr>

                                <th class="col-5 text-center">Nama Karyawan</th>
                                <th class="col-5 text-center">Nominal</th>
                                <th class="col-1 text-center">Action</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($debts as $debt)
                                @if($debt->difference != 0)
                            <tr>
                              
                           
                              
                               
                                <td class="text-center">{{ $debt->name }}</td>
                                <td class="text-right">{{ "Rp. ".number_format($debt->difference) }}</td>

                                

                                <td class="text-center">  
                                    <a href="/dashboard/employeedebt/{{ $debt->performer_id }}/detail" type="button" class="btn btn-warning waves-effect w-md waves-light">Detail</a>
                                    
                           
                                </td>
                                @endif
                            @endforeach
                               
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable-buttons').DataTable({
                dom: 'Bfrtip', // Ensure this is included to enable the buttons
                lengthChange: false,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    { 
                        extend: 'pdfHtml5', 
                        orientation: 'portrait', 
                        exportOptions: { 
                            columns: [0,1] 
                        }, 
                        customize: function (doc) { 
                            doc.defaultStyle.fontSize = 11; // Set font size 
                            doc.content[1].table.widths = [ '50%','50%' ]; // Set widths for each column 
                            doc.styles.tableHeader = { alignment: 'left', fillColor: '#d36e6e' }; // Set header style
                           
                            doc.defaultStyle.alignment = 'left'; 
                            // Add custom header color 
                            doc['header'] = (function() {
                                return { 
                                    columns: [ 
                                        { 
                                            alignment: 'left', 
                                            text: 'Laporan Hutang Karyawan', 
                                            fontSize: 12, 
                                            margin: [10, 0] } 
                                        ], 
                                        margin: 20 
                                    };
                                });
                        } 
                    }, 
                    'colvis' 
                ]
            }).buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection