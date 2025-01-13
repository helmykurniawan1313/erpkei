@extends('dashboard.layouts.mains')

@section('container')

<div class="content-page">
   <?php $date = $cashflow->cashflow_date;
   

   ?>

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Update Blog Post</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Update Blog Post Page</h4>
                        <p class="text-muted m-b-30 font-13">
                            You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                        </p>
                        <form method="POST" action="/dashboard/employeedebt/{{ $cashflow->id }}/edit" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            
                          
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="title" class="col-form-label">Tanggal</label>
                                    <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="cashflow_date" required value="{{ old('cashflow_date', date("m/d/Y", strtotime($date))) }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="form-group col-md-10">
                                    <label for="slug" class="col-form-label">Nama Transaksi</label>
                                    <input type="text" class="form-control " id="cashflow_name" name="cashflow_name" required value="{{ old('cashflow_name', $cashflow->cashflow_name) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Penanggung Jawab</label>
                                    <select required class="form-control select2" name="performer_id" required disabled>
                                        <option value="">Pilih Asal Sumber Dana</option>
                                        @foreach($performers as $performer)
                                        <option {{ old('performer_id', $cashflow->performer_id) == $performer->id ? 'selected' : '' }} value="{{ $performer->id }}">{{ $performer->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="performer_id" value="{{ $cashflow->performer_id }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Perusahaan</label>
                                    <select required class="form-control select2" name="company_id" required disabled>
                                        <option value="">Pilih Perusahaan</option>
                                        @foreach($companys as $company)
                                        <option {{ old('company_id', $cashflow->company_id) == $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->company_name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="company_id" value="{{ $cashflow->company_id }}">
                                </div>
                            
                            
                                <div class="form-group col-md-4">
                                    <label for="category" class="col-form-label">Kategori Transaksi</label>
                                    <select required class="form-control select2" id="cashflow_category_id" name="cashflow_category_id" required>
                                        <option value="">Pilih Kategori Transaksi</option>
                                        @foreach($cashflow_categories as $cashflow_category)
                                        <option {{ old('cashflow_category', $cashflow->cashflow_category_id) == $cashflow_category->id ? 'selected' : '' }} value="{{ $cashflow_category->id }}">{{ $cashflow_category->cashflow_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input hidden id="transaction_category_id" name="transaction_category_id" value="">
                                
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        const cashflowCategorySelect = document.querySelector('#cashflow_category_id');
                                        const transactionCategoryInput = document.querySelector('#transaction_category_id');
                                
                                        // Define the mapping between cashflow_category_id and transaction_category_id
                                        const categoryMapping = {
                                            1: 3, // Example: cashflow_category_id 1 corresponds to transaction_category_id 3
                                            2: 4, // Example: cashflow_category_id 2 corresponds to transaction_category_id 4
                                            // Add more mappings as needed
                                        };
                                
                                        cashflowCategorySelect.addEventListener('change', function () {
                                            const selectedCategoryId = parseInt(cashflowCategorySelect.value, 10);
                                            const correspondingTransactionCategoryId = categoryMapping[selectedCategoryId] || '';
                                
                                            // Update the hidden input value
                                            transactionCategoryInput.value = correspondingTransactionCategoryId;
                                        });
                                
                                        // Trigger change event to set initial value on page load
                                        cashflowCategorySelect.dispatchEvent(new Event('change'));
                                    });
                                </script>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" placeholder="" class="form-control autonumber" data-a-sign="Rp. " data-a-sep="." data-a-dec="," required value = "{{ old('nominal', $cashflow->nominal) }}">
                                    
                                
                                </div>
                          
                         
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Update Blog Post</button>
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

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection