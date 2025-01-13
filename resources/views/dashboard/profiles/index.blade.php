@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
           
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">PROFILE PAGE</h4>
                       
                      

                        <div class="clearfix"></div>
                    </div>
                </div>
           
        

            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Profile</h4>
                        <p class="text-muted m-b-30 font-13">
                            @if (session()->has('success'))
                        <div class="alert alert-success col-lg-12" role="alert">
                           {{ session('success') }}
                        </div>
                        @endif
                        </p>

                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="company_name" class="col-form-label">Company Name</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $profile[0]->company_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address </label>
                                <textarea class="form-control" rows="8" readonly="">{{ $profile[0]->address }}</textarea>
                            </div>
                        
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email_1" class="col-form-label">Email 1</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $profile[0]->email_1 }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_2" class="col-form-label">Email 2</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $profile[0]->email_2 }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email_1" class="col-form-label">Phone</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $profile[0]->telp }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_2" class="col-form-label">Whatsapp</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $profile[0]->whatsapp }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_logo" class="col-form-label"> Company Logo</label>
                                    <br>
                                    <img src="/storage/{{ $profile[0]->company_logo}}" class="rounded" width="200px">
                                </div>
                            </div>
                         
                            <a href="/dashboard/profiles/{{ $profile[0]->id }}/edit" class="btn btn-block btn-primary waves-effect waves-light">Edit Profile</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div> <!-- content -->
</div>

@endsection