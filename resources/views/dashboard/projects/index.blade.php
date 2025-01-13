@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">PROJECT PAGE</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            
            @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>List Project</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <a href="/dashboard/projects/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Create New Post</a>
                            </div>
                                <div class="form-group col-md-6">
                                    <a href="/dashboard/cats" class="btn btn-primary mb-3 col-12"><span><i class="fi-cog"></i></span> Add or Modify Categories</a>
                                </div>
                        </div>
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-1 text-center">#</th>
                                <th class="col-6 text-center">Title</th>
                                <th class="col-2 text-center">Category</th>
                                <th class="col-3 text-center">Action</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->cat->name }}</td>
                               
                                <td class="text-center">   
                                    <a href="/dashboard/projects/{{ $project->slug }}/edit" type="button" class="btn btn-warning waves-effect w-md waves-light">Edit</a>
                                    <form action="/dashboard/projects/{{ $project->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger waves-effect w-md waves-light" onclick="return confirm('Are you sure?')">
                                            Delete
                                        </button>
                                    </form>
                           
                            </td>
                            @endforeach
                               
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->



@endsection