@extends('layout.admin')
@section('title', 'Why Choose Us - ')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">My Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">


                        <div class="card overflow-hidden">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-primary p-3">
                                            {{-- <h5 class="text-primary">Welcome Back !</h5> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="{{ url('') }}/uploads/{{ Auth::user()->image }}" width="100" height="100" alt="" class="img-thumbnail">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                                        <p class="text-muted mb-0 text-truncate">{{ Auth::user()->destination }}</p>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ 'Admin Profile' }}</h4>


                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <form method="post" action="/admin/updateprofileadmin" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="sluggenrate" placeholder="">

                                            @error('name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Profile Image</label>
                                            <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input" placeholder="">
                                            @error('image')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" id="sluggenrate" placeholder="">

                                            @error('email')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Destination</label>
                                            <input type="text" class="form-control" name="destination" value="{{ Auth::user()->destination }}" id="sluggenrate" placeholder="">

                                            @error('destination')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" id="sluggenrate" placeholder="">

                                            @error('phone')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>


                                </div>


                        </div>

                        <div>
                        </div>




                        </form>
                    </div>
                    <!-- end card body -->
                </div>



                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ 'Admin Profile' }}</h4>
                            <form method="post" action="/admin/change-password" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Currunt Password</label>
                                            <input type="text" class="form-control" name="currunt_password" id="sluggenrate" placeholder="">

                                            @error('currunt_password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">New Password</label>
                                            <input type="text" class="form-control" name="new_password" id="sluggenrate" placeholder="">

                                            @error('new_password')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Confirm Password</label>
                                            <input type="text" class="form-control" name="new_password_confirmation" id="sluggenrate" placeholder="">

                                            @error('new_password_confirmation')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>


                                </div>


                        </div>

                        <div>
                        </div>




                        </form>
                    </div>
                    <!-- end card body -->
                </div>


                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



</div>

@endsection
