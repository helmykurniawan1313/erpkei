@extends('dashboard.layouts.mains')

@section('container')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@php
    $debt = $cashflows->first();
@endphp

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Daftar Transaksi Hutang {{ $debtname->performer->name }}</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
          
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="card m-b-30">
                                <div class="card-header">
                                    Sisa Hutang
                                </div>
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        @if($debtname) 
                                        <h4 class="text-left"><b>{{ $debtname->performer->name }}</b></h4> 
                                        @endif
                                        <h2 class="text-left"><b>{{ "Rp. " . number_format($result->difference) }}</b></h2> 
                                        <footer><cite title="Source Title">Total sisa hutang saat ini</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card m-b-30">
                                <div class="card-header">
                                    Tambah Hutang / Bayar Hutang
                                </div>
                                <div class="card-body">
                                    <blockquote class="card-bodyquote">
                                        <a href="/dashboard/employeedebt/{{ $debt->performer_id }}/createdebt?performer_name={{ $debt->performer->name }}" class="btn btn-danger mb-3 col-12"><span><i class="fi-arrow-up"></i></span> Tambah Hutang</a>
                                        <a href="/dashboard/employeedebt/{{ $debt->performer_id }}/paydebt?performer_name={{ $debt->performer->name }}" class="btn btn-success mb-3 col-12"><span><i class="fi-arrow-down"></i></span> Bayar Hutang</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('success'))
                    <div class="alert alert-success col-lg-12 text-center" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('danger'))
                    <div class="alert alert-danger col-lg-12 text-center" role="alert">
                        {{ session('danger') }}
                    </div>
                    @endif
                    <div class="card m-b-30">
                        <div class="card-header">
                            Daftar Transaksi Hutang {{ $debtname->performer->name }}
                        </div>
                       
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="col-2 text-center">Tanggal</th>
                                        <th class="col-2 text-center">Kategori</th>
                                        <th class="col-2 text-center">Verifikator</th>
                                        <th class="col-3 text-center">Nominal</th>
                                        <th class="col-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cashflows as $cashdebt)
                                    <tr>
                                        <td class="text-center">{{ $cashdebt->cashflow_date }}</td>
                                        <td class="text-center">{{ $cashdebt->transaction_category->transaction_category_name }}</td>
                                        <td class="text-center">{{ $cashdebt->verifier->name }}</td>
                                        <td class="text-right">{{ "Rp. " . number_format($cashdebt->nominal) }}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item dripicons-pencil" href="/dashboard/employeedebt/{{ $cashdebt->id }}/edit"> Edit</a>
                                                    <form action="/dashboard/employeedebt/{{ $cashdebt->id }}/del" method="post" class="d-inline" id="delete-form-{{ $cashdebt->id }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="dropdown-item dripicons-trash btn-danger sa-params" data-form-id="delete-form-{{ $cashdebt->id }}">  Hapus</button>
                                                        <input type="hidden" name="performer_id" value="{{ $cashdebt->performer_id }}">
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div> <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
</div>
<!-- jQuery -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.sa-params').on('click', function(e) {
            e.preventDefault();
            var formId = $(this).data('form-id');
            var form = $('#' + formId);

            Swal.fire({
            title: 'Apa Anda Yakin???',
            text: "Anda tidak akan bisa mengembalikan data ini jika telah dihapus !!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Iya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
            });
        });
    });
</script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable-buttons').DataTable({
                dom: 'Bfrtip', // Ensure this is included to enable the buttons
                lengthChange: false,
                pageLength: 25, // Set the number of rows per page
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
                            columns: [0,1,2,3]
                        }
                    },
                    { 
                        extend: 'pdfHtml5', 
                        orientation: 'portrait', 
                        exportOptions: { 
                            columns: [0,1,2,3] 
                        }, 
                        customize: function (doc) { 
                            doc.defaultStyle.fontSize = 7; // Set font size 
                            doc.content[1].table.widths = [ '25%','25%','25%','25%' ]; // Set widths for each column 
                            doc.styles.tableHeader = { alignment: 'left', fillColor: '#d36e6e' }; // Set header style
                           
                            doc.defaultStyle.alignment = 'left'; 
                            // Add custom header color 
                            doc['header'] = (function() {
                                return { 
                                    columns: [ 
                                        { 
                                            alignment: 'left', 
                                            text: 'Laporan Hutang {{ $debtname->performer->name }} ', 
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
