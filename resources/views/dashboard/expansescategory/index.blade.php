@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">KATEGORI PENGELUARAN</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            
           
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title text-center"><b>Daftar Kategori Pengeluaran</b></h4>
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                                <a href="/dashboard/expansescategory/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Tambah Kategori Pengeluaran</a>
                            </div>
                        </div>
                        @if (session()->has('success'))
                        <div class="alert alert-success col-lg-12 text-center" role="alert">
                            {{ session('success') }}
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
                                    <a href="/dashboard/expansescategory/{{ $category->id }}/edit" type="button" class="btn btn-warning waves-effect w-md waves-light">Edit</a>
                                    {{-- <form action="/dashboard/expansescategory/{{ $category->id }}" method="post" class="d-inline">
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

@endsection