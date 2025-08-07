@extends('layout.admin')
@section('title', 'Create Service - ')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">New Testimonial</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Testimonial Details</h4>

                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <form method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="sluggenrate" placeholder="">
                                              @error('name')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                                   </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Destination</label>
                                                <input type="text" class="form-control" name="destination" value="{{ old('destination') }}" id="slugbox" placeholder="">
                                            </div>
                                        </div>

                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Description</label>
                                            <textarea name="description" id="editor" cols="30" rows="3" placeholder="Description"
                                                class="form-control editor">{{ old('description') }}</textarea>
                                        </div>

                                        

                                <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
                                        </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">Rating</label>
                                                       <select name="rating" class="form-control" id="">
                                                        <option value="5">5</option>
                                                        <option value="4">4</option>
                                                        <option value="3">3</option>
                                                        <option value="2">2</option>
                                                        <option value="1">1</option>
                                                       </select>
                                                       @error('status')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                                    </div>
                                                </div>



                                                            <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">Status</label>
                                                       <select name="status" class="form-control" id="">
                                                        <option value="Y">Active</option>
                                                        <option value="N">Inactive</option>
                                                       </select>
                                                       @error('status')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                                    </div>
                                                </div>
                                                


                                        <div class="col-12">
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
