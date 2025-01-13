@extends('dashboard.layouts.mains')
@section('container')


@if(count($errors) > 0)
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br/>
	@endforeach
</div>
@endif

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">HERO IMAGE</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
		
			<div class="row">
				
                <div class="col-md-12">
					@if (session()->has('succes'))
			<div class="alert alert-success col-lg-12" role="alert">
				{{ session('succes') }}
			</div>
				@endif
			
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Add New Image Hero</h4>
                        <p class="text-muted m-b-30 font-13">
                            You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                        </p>
						<form action="/dashboard/uploadmainimage/proses" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="keterangan" class="col-form-label">Name</label>
                                    <input type="text" class="form-control " id="keterangan" name="keterangan" required autofocus value="{{ old('keterangan') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="file" class="col-form-label"> Image</label>
                                    <input type="file" class="filestyle"  data-buttontext="Select Image" data-buttonname="btn-primary" accept="image/*" id="file" name="file" required onchange="previewImage()">
                                    <br>
                                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" height="200" />
                                </div>
                            </div>
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Upload Image</button>
						</form>
					</div>
					@if (session()->has('success'))
									<div class="alert alert-success col-lg-12" role="alert">
										{{ session('success') }}
										@endif
									</div>
						<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title">List Hero Image</h4>
									<p class="text-muted m-b-30 font-13">
										You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
									</p>
									
									<table id="datatable" class="table table-bordered">
										<thead>
										<tr>
											
											<th class="text-center">Name</th>
											<th class="col-3 text-center">Image</th>
											<th class="col-2 text-center">Action</th>
										   
										</tr>
										</thead>
					
					
										<tbody>
											@foreach($mainimage as $g)
										<tr>
											
											
											<td>{{$g->keterangan}}</td>
											<td><img width="200px" src="{{ url('/data_file/'.$g->file) }}"></td>
											<td class="text-center">   
										
												<a class="btn btn-danger" href="/dashboard/uploadmainimage/hapus/{{ $g->id }}" onclick="return confirm('Are you sure?')">Delete</a>
									   
											</td>
										</tr>
										@endforeach
										   
									   
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
                </div>
            </div>
		</div> <!-- end row -->
	</div> <!-- container -->
</div> <!-- content -->
<script>
	function previewImage() {
        const image = document.querySelector('#file');
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