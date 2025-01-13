@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">TAMBAH PEMASUKAN</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Tambah Catatan Pemasukan</h4>
                        <p class="text-muted m-b-30 font-13">

                        </p>
                        <form method="POST" action="/dashboard/incomes" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <input hidden id="transaction_category_id" name="transaction_category_id" value="1">
                          
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="title" class="col-form-label">Tanggal</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="cashflow_date" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="slug" class="col-form-label">Nama Transaksi</label>
                                    <input type="text" class="form-control " id="cashflow_name" name="cashflow_name" required value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label"> Sumber Dana</label>
                                    <select required class="form-control select2" name="performer_id" required>
                                        <option value="">Pilih Asal Sumber Dana</option>
                                        @foreach($performers as $performer) 
                                        <option {{ old('user_id') == $performer->id ? 'selected' : '' }} value="{{ $performer->id }}">{{ $performer->name }}</option>
                                        @endforeach 
                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label"> Perusahaan</label>
                                    <select required class="form-control select2" name="company_id" required>
                                        <option value="">Pilih Perusahaan</option>
                                        @foreach($companys as $company) 
                                        <option {{ old('company_id') == $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach 
                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label"> Kategori Transaksi</label>
                                    <select required class="form-control select2" name="cashflow_category_id" required>
                                        <option value="">Pilih Kategori Transaksi</option>
                                        @foreach($cashflow_categories as $cashflow) 
                                        <option {{ old('cashflow_category') == $cashflow->id ? 'selected' : '' }} value="{{ $cashflow->id }}">{{ $cashflow->cashflow_category_name }}</option>
                                        @endforeach 
                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="slug" class="col-form-label">PO</label>
                                    <input type="text" class="form-control " id="po_number" name="po_number"  value="{{ old('name') }}">
                                    <span class="font-14 text-muted">tidak wajib diisi</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="slug" class="col-form-label">SO</label>
                                    <input type="text" class="form-control " id="so_number" name="so_number"  value="{{ old('name') }}">
                                    <span class="font-14 text-muted">tidak wajib diisi</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="slug" class="col-form-label">TB</label>
                                    <input type="text" class="form-control " id="tb_number" name="tb_number"  value="{{ old('name') }}">
                                    <span class="font-14 text-muted">tidak wajib diisi</span>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" placeholder="" class="form-control autonumber" data-a-sign="Rp. " data-a-sep="." data-a-dec="," required>
                                    
                                
                                </div>
                            </div>
                          
                         
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Buat Catatan Pemasukan</button>
                        </form>
                    </div>
                </div>
            </div>
    
        </div> <!-- container -->
    </div> <!-- content -->
</div>



<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault()
    })


    function previewImage1() {
        const image = document.querySelector('#image1');
        const imgPreview = document.querySelector('.img-preview1');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewImage2() {
        const image = document.querySelector('#image2');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewImage3() {
        const image = document.querySelector('#image3');
        const imgPreview = document.querySelector('.img-preview3');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
   