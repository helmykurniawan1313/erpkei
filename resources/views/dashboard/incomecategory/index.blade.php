@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">KATEGORI PEMASUKAN</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            
        
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title text-center"><b>Daftar kategori Pemasukan</b></h4>
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                                <a href="/dashboard/incomecategory/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Tambah Kategori Baru</a>
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
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-1 text-center">#</th>
                                <th class="col-6 text-center">Nama Kategori</th>
                                <th class="col-3 text-center">Action</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->cashflow_category_name }}</td>
                               
                               
                                    <td class="text-center">   
                                    <a href="/dashboard/incomecategory/{{ $category->id }}/edit" type="button" class="btn btn-warning waves-effect w-md waves-light">Edit</a>
                                    {{-- <form action="/dashboard/incomecategory/{{ $category->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger waves-effect w-md waves-light" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form> --}}
                           
                                    </td>
                                @endforeach
                               
                           
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end row -->
      

        
        </div> <!-- container -->
    </div> <!-- content -->


</div>
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>

@endsection