@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">CLIENT PAGE</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Add New Client</h4>
                        <p class="text-muted m-b-30 font-13">
                            {{-- You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts. --}}
                        </p>
                        <form method="POST" action="/dashboard/clients" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Client Name</label>
                                    <input type="text" class="form-control " id="name" name="name" required autofocus value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="client_logo" class="col-form-label"> Client Logo</label>
                                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="client_logo" name="client_logo" required onchange="previewImage()">
                                    <br>
                                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" height="200" />
                                </div>
                            </div>
                          
                         
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Create Client</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        const image = document.querySelector('#client_logo');
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


