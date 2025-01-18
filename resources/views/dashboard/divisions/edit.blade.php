@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">EDIT DIVISI</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">UBAH DIVISI</h4>
                        <p class="text-muted m-b-30 font-13">

                        </p>
                        <form method="POST" action="/dashboard/divisions/{{ $divisiondata->id }}" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Nama Kategori</label>
                                    <input type="text" class="form-control " id="division_name" name="division_name" required autofocus value="{{ old('division_name', $divisiondata->division_name) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category" class="col-form-label"> Departemen</label>
                                    <select required class="form-control select2" name="department_id">
                                        <option value="">Pilih Departemen</option>
                                        @foreach($departments as $department) 
                                        <option {{ old('department_id', $divisiondata->department_id) == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->department_category_name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="slug" class="col-form-label">Keterangan</label>
                                    <input type="text" class="form-control " id="division_information" name="division_information" required value="{{ old('division_information', $divisiondata->division_information) }}">
                                </div>
                            </div>
                          <br>
                         
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Ubah Divisi</button>
                           
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