<!DOCTYPE html>
<html lang="en" data-menu-color="light">
<head>
     <meta charset="utf-8" />
     <title>Login - {{ env('APP_NAME') }}</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="{{ env('APP_NAME') }}" />
     <meta name="author" content="{{ env('APP_NAME') }}" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <link rel="shortcut icon" href="{{ url('images') }}/logo.png">
     <link href="{{ url('newadmin') }}/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />
     <link href="{{ url('newadmin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <link href="{{ url('newadmin') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
     <script src="{{ url('newadmin') }}/assets/js/config.min.js"></script>

</head>

<body class="authentication-bg">

     <div class="account-pages pt-3">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-xl-5">
                         <div class="card auth-card">
                              <div class="card-body px-3 py-5">
                                   <div class="mx-auto mb-4 text-center auth-logo">
                                        <img src="{{ url('images') }}/logo.png" width="100" alt="">
                                   </div>

                                   <h2 class="fw-bold text-center fs-18">Sign In</h2>
                                   <p class="text-muted text-center mt-1 mb-4">Enter your email address and password to access admin panel.</p>

                                     @if (session()->has('error'))
                                    <div class="alert p-0 mt-1 text-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif

                                @if (session()->has('success'))
                                    <div class="alert alert-primary">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                   <div class="px-4">
                                        <form  class="authentication-form" method="post">
                                            @csrf
                                             <div class="mb-3">
                                                  <label class="form-label" for="example-email">Email</label>
                                                  <input type="email" id="example-email" name="email" class="form-control" placeholder="Enter your email">
                                                @error('email')
                                            <div class="alert p-0 mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                             <div class="mb-3">
                                                  <label class="form-label" for="example-password">Password</label>
                                                  <input type="text" id="example-password" name="password" class="form-control" placeholder="Enter your password">
                                            
                                             @error('password')
                                            <div class="alert p-0 mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                             <div class="mb-3">
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                       <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                  </div>
                                             </div>

                                             <div class="mb-1 text-center d-grid">
                                                  <button class="btn btn-primary" type="submit">Sign In</button>
                                             </div>
                                        </form>
                                   </div> <!-- end col -->
                              </div> <!-- end card-body -->
                         </div> <!-- end card -->
                    </div> <!-- end col -->
               </div> <!-- end row -->
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ url('newadmin') }}/assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ url('newadmin') }}/assets/js/app.js"></script>


</body>


<!-- Mirrored from techzaa.in/rasket/admin/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jul 2025 17:01:08 GMT -->
</html>