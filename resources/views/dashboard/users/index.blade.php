@extends('dashboard.layouts.mains')

@section('container')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">PENGGUNA</h4>
                    <div class="clearfix"></div>
                </div>
            </div>
       
            
        
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title text-center"><b>Daftar Pengguna</b></h4>
                        <p class="text-muted font-13 m-b-30">
                        </p>
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                                <a href="/dashboard/users/create" class="btn btn-primary mb-3 col-12"><span><i class="fi-plus"></i></span> Tambah Pengguna Baru</a>
                            </div>
                           
                        </div>
                        @if (session()->has('success'))
                        <div class="alert alert-success col-lg-12 text-center" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session()->has('danger'))
                        <div class="alert alert-danger col-lg-12 text-center" role="alert">
                            {{ session('danger') }}
                        </div>
                        @endif
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="col-1 text-center">#</th>
                                <th class="col-2 text-center">Nama Pengguna</th>
                                <th class="col-2 text-center">Email</th>
                                <th class="col-1 text-center">Divisi</th>
                                <th class="col-1 text-center">Departemen</th>
                                <th class="col-2 text-center">Action</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach($userdatas as $userdata)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userdata->name }}</td>
                                    <td>{{ $userdata->email }}</td>
                                    <td>{{ $userdata->division->division_name ?? "" }}</td>
                                    <td>{{ $userdata->department->department_category_name ?? "" }}</td>
                                   
                               
                               
                                    <td class="text-center">   
                                    <a href="/dashboard/users/{{ $userdata->id }}/edit" type="button" class="btn btn-warning waves-effect w-md waves-light dripicons-pencil"> Edit</a>
                                    <form action="/dashboard/users/{{ $userdata->id }}" method="post" class="d-inline" id="delete-form-{{ $userdata->id }}">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-warning waves-effect w-md waves-light dripicons-trash btn-danger sa-params" data-form-id="delete-form-{{ $userdata->id }}">  Hapus</button>
                                    </form>
                                    </td>
                                @endforeach
                               
                           
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end row -->
      

        
        </div> <!-- container -->
    </div> <!-- content -->


</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.sa-params').on('click', function(e) {
            e.preventDefault();
            var formId = $(this).data('form-id');
            var form = $('#' + formId);

            Swal.fire({
                title: 'Apa Anda Yakin???',
                text: "Anda tidak akan bisa mengembalikan data ini jika telah dihapus !!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Iya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']
        });

        table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );

</script>

@endsection