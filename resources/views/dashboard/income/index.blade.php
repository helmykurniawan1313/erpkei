@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">PEMASUKAN</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
       
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <button type="button" id="tooltip-animation" class="btn btn-icon waves-effect btn-secondary float-right" title="Gunakan Search Sebagai Filter Export PDF / Excel Contoh ingin print bulan januari maka search 2025-01"><i class=" dripicons-question"></i></button>
                        <h4 class="m-t-0 header-title text-center"><b>Daftar Pemasukan</b></h4>
                       
                        <p class="text-muted font-13 m-b-30">
                           
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <a href="/dashboard/incomes/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Tambah Data Pemasukkan Baru</a>
                            </div>
                            <div class="form-group col-md-6">
                                <a href="/dashboard/incomecategory" class="btn btn-primary mb-3 col-12"><span><i class="fi-cog"></i></span> Tambah atau Ubah Kategori Pemasukan</a>
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
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1 text-center">Tanggal</th>
                                    <th class="col-3 text-center">Keterangan</th>
                                    <th class="col-1 text-center">Perusahaan</th>
                                    <th class="col-1 text-center">Kategori</th>
                                    <th class="col-1 text-center">Nomor PO</th>
                                    <th class="col-1 text-center">Nomor SO</th>
                                    <th class="col-1 text-center">Nomor TB</th>
                                    <th class="col-2 text-center">Nominal</th>
                                    <th class="col-1 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cashflows as $cashflow)
                                <tr>
                                    <td>{{ $cashflow->cashflow_date }}</td>
                                    <td>{{ $cashflow->cashflow_name }}</td>
                                    <td>{{ $cashflow->company->company_name }}</td>
                                    <td>{{ $cashflow->cashflow_category->cashflow_category_name }}</td>
                                    <td>{{ $cashflow->po_number }}</td>
                                    <td>{{ $cashflow->so_number }}</td>
                                    <td>{{ $cashflow->tb_number }}</td>
                                    <td>{{ "Rp. ".number_format($cashflow->nominal) }}</td>
                                    <td class="text-center">  
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item dripicons-pencil" href="/dashboard/incomes/{{ $cashflow->id }}/edit">  Edit</a>
                                                <form action="/dashboard/incomes/{{ $cashflow->id }}" method="post" class="d-inline" id="delete-form-{{ $cashflow->id }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="dropdown-item dripicons-trash btn-danger sa-params" data-form-id="delete-form-{{ $cashflow->id }}">  Hapus</button>
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
            </div> <!-- end row -->
            
        </div> <!-- container -->
    </div> <!-- content -->



    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable-buttons').DataTable({
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            modifier: {
                                search: 'applied'
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        orientation: 'portrait',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            modifier: {
                                search: 'applied'
                            }
                        }
                    },
                    'colvis'
                ]
            });
    
            // Append buttons to DataTable
            table.buttons().container().appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    
            // Event listener for the search input
            $('#datatable-buttons_filter input').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
    
@endsection
