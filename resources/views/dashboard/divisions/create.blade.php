@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">TAMBAH DIVISI BARU</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">TAMBAH DIVISI BARU</h4>
                        <p class="text-muted m-b-30 font-13">

                        </p>
                        <form method="POST" action="/dashboard/divisions" class="mb-5" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Nama Divisi</label>
                                    <input type="text" class="form-control " id="division_name" name="division_name" required autofocus value="{{ old('division_name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category" class="col-form-label"> Departemen</label>
                                    <select required class="form-control select2" name="department_id" required>
                                        <option value="">Pilih Departemen</option>
                                        @foreach($departments as $department) 
                                        <option {{ old('department_id') == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->department_category_name }}</option>
                                        @endforeach 
                                     
                                        
                                     </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="slug" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control " id="division_information" name="division_information" required value="{{ old('division_information') }}">
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





@endsection