@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
           
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">ABOUT US PAGE</h4>
                       
                      

                        <div class="clearfix"></div>
                    </div>
                </div>
           
        

            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">About us</h4>
                        <p class="text-muted m-b-30 font-13">
                            @if (session()->has('success'))
                        <div class="alert alert-success col-lg-12"  role="alert">
                           {{ session('success') }}
                        </div>
                        @endif
                        </p>

                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="main_header" class="col-form-label">Main Header Title</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $about[0]->main_header }}">
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="main_body" class="col-form-label">Secondary Header Title</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $about[0]->main_body }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ourstory" class="col-form-label">Our Story</label>
                                <textarea class="form-control" rows="8" readonly="">{{ $about[0]->ourstory }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="about" class="col-form-label">Vision</label>
                                <textarea class="form-control" rows="8" readonly="">{{ $about[0]->about }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="client" class="col-form-label">Client Total</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $about[0]->client }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="project" class="col-form-label">Project Total</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $about[0]->project }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="support" class="col-form-label">Support Hours Total</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $about[0]->support }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="employee" class="col-form-label"> Employees Total</label>
                                    <input type="text" class="form-control" readonly="" value="{{ $about[0]->employee }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="background" class="col-form-label"> Background</label>
                                    <br>
                                    <img src="/storage/{{ $about[0]->background }}" class="rounded" width="200px">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image1" class="col-form-label"> Our Story Image</label>
                                    <br>
                                    <img src="/storage/{{ $about[0]->image1 }}" class="rounded" width="200px">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image2" class="col-form-label"> Image</label>
                                    <br>
                                    <img src="/storage/{{ $about[0]->image2 }}" class="rounded" width="200px">
                                </div>
                            </div>
                         
                            <a href="/dashboard/abouts/{{ $about[0]->id }}/edit" class="btn btn-block btn-primary waves-effect waves-light">Edit About</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div> <!-- content -->
</div>
@endsection