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
                        <h4 class="m-t-0 header-title">TAMBAH PENGGUNA BARU</h4>
                        <p class="text-muted m-b-30 font-13"></p>
                        <form method="POST" action="/dashboard/users/{{ $userdata->id }}" class="mb-5" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name" class="col-form-label">Nama Pengguna <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required autofocus placeholder="Masukkan Nama" value="{{ old('name', $userdata->name) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name" class="col-form-label">Username<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="username" name="username" required autofocus placeholder="Masukkan Username Baru" disabled value="{{ old('username', $userdata->username) }}">
                                    <span id="usernameCheck"></span>
                                    <input type="hidden" name="username" value="{{ $userdata->username }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name" class="col-form-label">Email <span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="email" name="email" parsley-type="email" required autofocus placeholder="Masukkan Email" disabled value="{{ old('email', $userdata->email) }}">
                                    <span id="emailCheck"></span>
                                    <input type="hidden" name="email" value="{{ $userdata->email }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="department" class="col-form-label">Departemen</label>
                                    <select id="department" class="form-control" name="department_id" required>
                                        <option value="">Pilih Departemen</option>
                                        @foreach($departments as $department)
                                        <option {{ old('department_id', $userdata->department_id) == $department->id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->department_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="division" class="col-form-label">Divisi</label>
                                    <select id="division" class="form-control" name="division_id" required>
                                        <option value="">Pilih Divisi</option>
                                        <!-- Options will be loaded via AJAX -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="pass1">Password<span class="text-danger"> *</span></label>
                                    <input id="pass1" type="password" placeholder="Password" name="password" required class="form-control" value="{{ old('password', $userdata->password) }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passWord2">Konfirmasi Password <span class="text-danger"> *</span></label>
                                    <input data-parsley-equalto="#pass1" type="password" required placeholder="Konfirmasi Password" class="form-control" id="passWord2" value="{{ old('password', $userdata->password) }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Ubah Data Pengguna</button>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const departmentToDivisions = {
                                    @foreach($departments as $department)
                                        '{{ $department->id }}': [
                                            @foreach($department->divisions as $divisiondata)
                                                {
                                                    id: '{{ $divisiondata->id }}',
                                                    name: '{{ $divisiondata->division_name }}'
                                                },
                                            @endforeach
                                        ],
                                    @endforeach
                                };
                        
                                const departmentSelect = document.getElementById('department');
                                const divisionSelect = document.getElementById('division');
                                const initialDivisionId = '{{ old('division_id', $userdata->division_id) }}';  // Get initial division ID
                        
                                departmentSelect.addEventListener('change', function() {
                                    const selectedDepartment = this.value;
                                    const divisions = departmentToDivisions[selectedDepartment];
                        
                                    // Clear previous options
                                    divisionSelect.innerHTML = '<option value="">Pilih Divisi</option>';
                        
                                    // Enable or disable the division select box
                                    if (selectedDepartment) {
                                        divisionSelect.disabled = false;
                                        // Add new division options
                                        if (divisions) {
                                            divisions.forEach(function(division) {
                                                const option = document.createElement('option');
                                                option.value = division.id;
                                                option.textContent = division.name;
                                                option.selected = division.id == initialDivisionId;  // Pre-select if it matches the initial division
                                                divisionSelect.appendChild(option);
                                            });
                                        }
                                    } else {
                                        divisionSelect.disabled = true;
                                    }
                                });
                        
                                // Trigger change event to load divisions for the initial selected department
                                departmentSelect.dispatchEvent(new Event('change'));
                            });
                        </script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#email').on('blur', function() {
                                    var email = $(this).val();
                                    if (email.length > 0) {
                                        $.ajax({
                                            url: '{{ route("check.email") }}',
                                            method: 'POST',
                                            data: { email: email, _token: '{{ csrf_token() }}' },
                                            success: function(response) {
                                                if (!response.success) {
                                                    $('#emailCheck').html('<i class="fa fa-times-circle" aria-hidden="true"></i> Email is already taken').css('color', 'red');
                                                } else {
                                                    $('#emailCheck').text('Email is available').css('color', 'green');
                                                }
                                            }
                                        });
                                    } else {
                                        $('#emailCheck').text('');
                                    }
                                });

                                $('#username').on('blur', function() {
                                    var username = $(this).val();
                                    if (username.length > 0) {
                                        $.ajax({
                                            url: '{{ route("check.username") }}',
                                            method: 'POST',
                                            data: { username: username, _token: '{{ csrf_token() }}' },
                                            success: function(response) {
                                                if (!response.success) {
                                                    $('#usernameCheck').html('<i class="fa fa-times-circle" aria-hidden="true"></i> Username is already taken').css('color', 'red');
                                                } else {
                                                    $('#usernameCheck').text('Username is available').css('color', 'green');
                                                }
                                            }
                                        });
                                    } else {
                                        $('#usernameCheck').text('');
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
    
        </div> <!-- container -->
    </div> <!-- content -->
</div>




@endsection