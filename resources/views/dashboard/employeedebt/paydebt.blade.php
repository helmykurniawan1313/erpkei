@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">BAYAR HUTANG | {{ $performer_name }}</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Bayar Hutang</h4>
                        <p class="text-muted m-b-30 font-13">
                        </p>
                        <form method="POST" action="/dashboard/employeedebt/createdebt" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <input hidden id="transaction_category_id" name="transaction_category_id" value="3">
                                                  
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
                                    <input type="text" class="form-control " id="cashflow_name" name="cashflow_name" required value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label"> Pemilik Hutang</label>
                                    <select required class="form-control select2" name="performer_id" required disabled>
                                        <option value="">Pilih Nama Pemilik Hutang</option>
                                        <option value="{{ $performer_id }}" selected>{{ $performer_name }}</option>
                                    </select>
                                    <input type="hidden" name="performer_id" value="{{ $performer_id }}">
                                </div>
                                                        
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label"> Perusahaan</label>
                                    <select required class="form-control select2" name="company_id" required disabled>
                                        <option value="">Pilih Perusahaan</option>
                                        <option  value="1" selected>KEI</option>
                                    </select>
                                    <input type="hidden" name="company_id" value="1">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label"> Kategori Transaksi</label>
                                    <select required class="form-control select2" name="cashflow_category_id" required disabled>
                                        <option value="">Pilih Kategori Transaksi</option>
                                        <option value="2" selected>Bayar Hutang</option>
                                    </select>
                                    <input type="hidden" name="cashflow_category_id" value="1">
                                </div>
                            </div>
                                                    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" placeholder="" class="form-control autonumber" data-a-sign="Rp. " data-a-sep="." data-a-dec=",">
                                </div>
                            </div>
                                                  
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Bayar Hutang {{ $performer_name }}</button>
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
   