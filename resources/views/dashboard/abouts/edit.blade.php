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
       

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Edit About Us</h4>
                        <p class="text-muted m-b-30 font-13">
                            {{-- You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts. --}}
                        </p>
    <form method="POST" action="/dashboard/about/{{ $about[0]->id }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
    
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="main_header" class="col-form-label">Main Header Title</label>
                    <input type="text" class="form-control " id="main_header" name="main_header" required autofocus value="{{ old('main_header', $about[0]->main_header) }}">
                </div>
                <div class="form-group col-md-9">
                    <label for="main_body" class="col-form-label">Secondary Header Title</label>
                    <input type="text" class="form-control @error('main_body') is-invalid @enderror" id="main_body" name="main_body" required value="{{ old('main_body', $about[0]->main_body) }}">
                </div>
            </div>
            <div class="form-group">
                <label for="ourstory" class="col-form-label">Our Story</label>
                <textarea class="summernote" id="ourstory"  name="ourstory">
                    {{ old('ourstory', $about[0]->ourstory) }}
                </textarea>    
               
            </div>
            <div class="form-group">
                <label for="about" class="col-form-label">Vision</label>
                <textarea class="summernote" id="about"  name="about" rows="10">
                    {{ old('ourstory', $about[0]->about) }}
                </textarea>    
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="client" class="col-form-label">Client Total</label>
                    <input type="text" class="form-control" data-parsley-type="number" id="client" name="client" required value="{{ old('client', $about[0]->client) }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="project" class="col-form-label">Project Total</label>
                    <input type="text" class="form-control" data-parsley-type="number" id="project" name="project" required value="{{ old('project', $about[0]->project) }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="support" class="col-form-label">Support Hours Total</label>
                    <input type="text" class="form-control" data-parsley-type="number" id="support" name="support" required value="{{ old('support', $about[0]->support) }}">
                   
                </div>
                <div class="form-group col-md-3">
                    <label for="employee" class="col-form-label"> Employees Total</label>
                    <input type="text" class="form-control" data-parsley-type="number" id="employee" name="employee" required value="{{ old('employee', $about[0]->employee) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="background" class="col-form-label"> Background</label>
                    <br>
                    <input type="hidden" name="oldImage" value="{{ $about[0]->background }}">
                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="background" name="background" onchange="previewImage()">
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ $about[0]->background ? asset('storage/' . $about[0]->background) : '' }}" height="200" />
                   
                </div>
                <div class="form-group col-md-4">
                    <label for="image1" class="col-form-label"> Our Story Image</label>
                    <br>
                    <input type="hidden" name="oldImage" value="{{ $about[0]->image1 }}">
                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="image1" name="image1" onchange="previewImage1()">
                    <img class="img-preview1 img-fluid mb-3 col-sm-5 d-block" src="{{ $about[0]->image1 ? asset('storage/' . $about[0]->image1) : '' }}" height="200" />
                  
                </div>
                <div class="form-group col-md-4">
                    <label for="image2" class="col-form-label"> Image</label>
                    <br>
                    <input type="hidden" name="oldImage" value="{{ $about[0]->image2 }}">
                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="image2" name="image2" onchange="previewImage2()">
                    <img class="img-preview2 img-fluid mb-3 col-sm-5 d-block" src="{{ $about[0]->image2 ? asset('storage/' . $about[0]->image2) : '' }}">
                   
                    
                </div>
            </div>
        
            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light" >Update Post</button>
        

      


        {{-- <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="text" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div> --}}

    </form>
</div>
</div> <!-- container -->

</div> <!-- content -->

<footer class="footer text-right">
    2017 - 2018 © Adminox. - Coderthemes.com
</footer>

</div>

<script>
    const main_header = document.querySelector('#mainheader');
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
        const image = document.querySelector('#background');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
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

</script>
@endsection