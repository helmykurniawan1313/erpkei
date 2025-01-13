
   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Adminox - Responsive Web App Kit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/dashboard/assets/images/favicon.ico">

        <!-- App css -->
        <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="/dashboard/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="/dashboard/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="" class="text-success">
                                                <span> <img src="/storage/{{ $profile[0]->company_logo }}" alt="" height="100"></span>
                                            </a>
                                            
                                            
                                        </h2>
                                       <h4 class="text-center"> {{ $profile[0]->company_name }} </h4>
                                        @if (session()->has('success'))             
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                           
                                        </div>
                                        @endif
                                         @if (session()->has('loginError'))             
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('loginError') }}
                                       
                                        </div>
                                        @endif
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                                        <p class="m-b-0">Login to your Admin account</p>
                                    </div>
                                    <div class="account-content">
                                        <form action="/login" method="POST">
                                            @csrf

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    {{-- <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a> --}}
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required="" name="password" id="password" placeholder="Password" required>
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">

                                                    {{-- <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Remember me
                                                        </label>
                                                    </div> --}}

                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>

                                        </form>

                                        {{-- <div class="row">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <button type="button" class="btn m-r-5 btn-facebook waves-effect waves-light">
                                                        <i class="fa fa-facebook"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-googleplus waves-effect waves-light">
                                                        <i class="fa fa-google"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-twitter waves-effect waves-light">
                                                        <i class="fa fa-twitter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="/dashboard/assets/js/jquery.min.js"></script>
        <script src="/dashboard/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="/dashboard/assets/js/bootstrap.min.js"></script>
        <script src="/dashboard/assets/js/metisMenu.min.js"></script>
        <script src="/dashboard/assets/js/waves.js"></script>
        <script src="/dashboard/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="/dashboard/assets/js/jquery.core.js"></script>
        <script src="/dashboard/assets/js/jquery.app.js"></script>

    </body>
</html>
