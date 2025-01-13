@extends('dashboard.layouts.mains')

@section('container')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">PROFILE PAGE</h4>
                    <div class="clearfix"></div>
                </div>
            </div>

            <!-- Form row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Edit Profile</h4>
                        <p class="text-muted m-b-30 font-13">
                            @if (session()->has('success'))
                            <div class="alert alert-success col-lg-12" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                        </p>

                        <form method="POST" action="/dashboard/profile/{{ $profile[0]->id }}" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="company_name" class="col-form-label">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" required autofocus value="{{ old('company_name', $profile[0]->company_name) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="about" class="col-form-label">Address</label>
                                <textarea class="summernote" id="address" name="address" rows="10">{{ $profile[0]->address }}</textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email_1" class="col-form-label">Email 1</label>
                                    <input type="text" class="form-control" id="email_1" name="email_1" autofocus value="{{ old('email_1', $profile[0]->email_1) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_2" class="col-form-label">Email 2</label>
                                    <input type="text" class="form-control" id="email_2" name="email_2" autofocus value="{{ old('email_2', $profile[0]->email_2) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telp" class="col-form-label">Phone</label>
                                    <input type="text" class="form-control" id="telp" name="telp" autofocus value="{{ old('telp', $profile[0]->telp) }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="whatsapp" class="col-form-label">Whatsapp</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" autofocus value="{{ old('whatsapp', $profile[0]->whatsapp) }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="company_logo" class="col-form-label">Image</label>
                                    <br>
                                    <input type="hidden" name="oldImage" value="{{ $profile[0]->company_logo }}">
                                    <input type="file" class="filestyle" data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="company_logo" name="company_logo" onchange="previewImage()">
                                    <img class="img-preview2 img-fluid mb-3 col-sm-5 d-block" src="{{ $profile[0]->company_logo ? asset('storage/' . $profile[0]->company_logo) : '' }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container -->
    </div> <!-- content -->
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#company_logo');
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
