@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">TAMBAH DEPARTEMEN BARU</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">TAMBAH DEPARTEMEN BARU</h4>
                        <p class="text-muted m-b-30 font-13">

                        </p>
                        <form method="POST" action="/dashboard/departments" class="mb-5" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Nama Department</label>
                                    <input type="text" class="form-control " id="department_category_name" name="department_category_name" required autofocus value="{{ old('department_category_name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control " id="department_category_information" name="department_category_information" required value="{{ old('department_category_information') }}">
                                </div>
                            </div>
                          <br>
                         
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Buat Departemen Baru</button>
                           
                        </form>

                    </div>
                </div>
            </div>
    
        </div> <!-- container -->
    </div> <!-- content -->
</div>



<script type="text/javascript" src="/dashboard/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="/dashboard/plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="/dashboard/plugins/autocomplete/countries.js"></script>
<script type="text/javascript" src="/dashboard/assets/pages/jquery.autocomplete.init.js"></script>
       

@endsection