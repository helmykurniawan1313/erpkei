@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">CLIENT PAGE</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            
            @if (session()->has('success'))
            <div class="alert alert-success col-lg-12" role="alert">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>List Client</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            {{-- DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>. --}}
                        </p>
                        
                        <a href="/dashboard/clients/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Add New Client</a>

                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="col-2 text-center">Image</th>
                                <th class="col-3 text-center">Action</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td class="text-center"><img src="/storage/{{ $client->client_logo }}" width="100"></td>
                                <td class="text-center">   
                                    <a href="/dashboard/clients/{{ $client->id }}/edit" type="button" class="btn btn-warning waves-effect w-md waves-light">Edit</a>
                                    <form action="/dashboard/clients/{{ $client->id }}" method="post" class="d-inline">
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
    
  
    
</div>


@endsection