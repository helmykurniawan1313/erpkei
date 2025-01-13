@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">SERVICE PAGE</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Edit Service</h4>
                        <p class="text-muted m-b-30 font-13">
                            You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                        </p>
                        <form method="POST" action="/dashboard/services/{{ $service->id }}" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Service Name</label>
                                    <input type="text" class="form-control " id="name" name="name" required autofocus value="{{ old('name', $service->name) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image" class="col-form-label">  Image 1</label>
                                    <input type="hidden" name="oldImage" value="{{ $service->image1 }}">
                                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="image1" name="image1" onchange="previewImage1()">
                                    <br>
                                    <img class="img-preview1 img-fluid mb-3 col-sm-5 d-block" src="{{ $service->image2 ? asset('storage/' . $service->image2) : '' }}">
                                </div>
                            </div>
                            <div class="form-row">
                              
                                <div class="form-group col-md-6">
                                    <label for="image" class="col-form-label">  Image 2</label>
                                    <input type="hidden" name="oldImage" value="{{ $service->image2 }}">
                                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="image2" name="image2" onchange="previewImage2()">
                                    <br>
                                    <img class="img-preview2 img-fluid mb-3 col-sm-5 d-block" src="{{ $service->image2 ? asset('storage/' . $service->image2) : '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image" class="col-form-label">  Image 3</label>
                                    <input type="hidden" name="oldImage" value="{{ $service->image3 }}">
                                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="image3" name="image3" onchange="previewImage3()">
                                    <br>
                                    <img class="img-preview3 img-fluid mb-3 col-sm-5 d-block" src="{{ $service->image3 ? asset('storage/' . $service->image3) : '' }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="body" class="col-form-label">Blog Body Text</label>
                                    <textarea class="summernote" id="body" type="text" name="body" value="{{ old('body', $service->body) }}">{{ $service->body }}
                                      
                                    </textarea>    
                                   
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="body" class="col-form-label">Blog Body Text</label>
                                    <textarea class="summernote" id="body2" type="text" name="body2" value="{{ old('body2', $service->body2) }}">{{ $service->body2 }}
                                      
                                    </textarea>    
                                   
                                </div>
                            </div>
                          
                         
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Update Service</button>
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