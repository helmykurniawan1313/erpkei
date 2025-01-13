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
                        @if (session()->has('error'))
                        <div class="alert alert-error col-lg-8" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
    <form method="POST" action="/dashboard/setting/changepass/{{ $users[0]->username }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email" class="col-form-label">Old Password</label>
                <input type="password" class="form-control " id="oldpassword" name="oldpassword" required autofocus value="">
            </div>
        </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email" class="col-form-label">New Password</label>
                    <input type="password" class="form-control " id="newpassword" name="newpassword" required autofocus value="">
                </div>
                <div class="form-group col-md-6">
                    <label for="username" class="col-form-label">Retype Password</label>
                    <input type="password" data-parsley-equalto="#newpassword" class="form-control" id="password2" name="password2"  value="">
                </div>
            </div>
           
            

           
        
            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Update Post</button>
        

      


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