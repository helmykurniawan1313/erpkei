@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">TAMBAH HUTANG / PIUTANG KARYAWAN</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Tambah Hutang / Piutang Karyawan</h4>
                        <form method="POST" action="/dashboard/employeedebt" class="mb-5" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="title" class="col-form-label">Tanggal</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="cashflow_date" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="slug" class="col-form-label">Keterangan Transaksi</label>
                                    <input type="text" class="form-control" id="cashflow_name" name="cashflow_name" required value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Pihak Pengaju atau Pembayar Hutang</label>
                                    <select required class="form-control select2" name="performer_id" required>
                                        <option value="">Pilih Nama Pengguna</option>
                                        @foreach($performers as $performer)
                                        <option {{ old('user_id') == $performer->id ? 'selected' : '' }} value="{{ $performer->id }}">{{ $performer->name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Perusahaan</label>
                                    <select required class="form-control select2" name="company_id" required>
                                        <option value="">Pilih Perusahaan</option>
                                        @foreach($companys as $company)
                                        <option {{ old('company_id') == $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Kategori Transaksi</label>
                                    <select required class="form-control select2" id="cashflow_category_id" name="cashflow_category_id" required>
                                        <option value="" selected>Pilih Kategori Transaksi</option>
                                        @foreach($cashflow_categories as $cashflow)
                                        <option value="{{ $cashflow->id }}">{{ $cashflow->cashflow_category_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="transaction_category_id" name="transaction_category_id" value="">
                                </div>
                              
                                
                               
                                
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" placeholder="" class="form-control autonumber" data-a-sign="Rp. " data-a-sep="." data-a-dec="," required>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Buat Data</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
</div>

@endsection
