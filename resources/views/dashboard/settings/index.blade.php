@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
           
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">SETTING PAGE</h4>
                       
                      

                        <div class="clearfix"></div>
                    </div>
                </div>
           
        

            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Account Setting</h4>
                        <div class="form-row">
                            <div class="form-group col-md-6 ">
                                <a href="/dashboard/setting/{{ $users->username }}/edit" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Edit User</a>
                            </div>
                                <div class="form-group col-md-6">
                                    <a href="/dashboard/setting/changepass/{{ $users->username }}/edit" class="btn btn-primary mb-3 col-12"><span><i class="fi-cog"></i></span> Change Password</a>
                                </div>
                        </div>
                     
                        <p class="text-muted m-b-30 font-13">
                            @if (session()->has('success'))
                        <div class="alert alert-success col-lg-12" role="alert">
                           {{ session('success') }}
                        </div>
                        @endif
                        </p>
                      
                    </form>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="main_header" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $users->email }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="main_body" class="col-form-label">Username</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $users->username }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="main_header" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $users->name }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="main_body" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" readonly="" value="{{ $users->password }}">
                                </div>
                            </div>
                            

                            
                         
                           
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div> <!-- content -->
</div>
@endsection