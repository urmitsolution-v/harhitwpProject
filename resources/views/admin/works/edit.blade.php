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
                        <h4 class="mb-sm-0 font-size-18">Edit Why Choose Us</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Why Choose Us : {{ $work->title }}</h4>
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-check-all me-2"></i>
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $work->title }}" id="sluggenrate" placeholder="">

                                            @error('status')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Upload Image</label>
                                            <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input" placeholder="">

                                            @if($work->image)
                                            <img class="uploadedimage img-thumbnail" src="{{ url('') }}/work-image/{{ $work->image }}" alt="">
                                            @endif

                                        </div>




                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label">Description</label>
                                        <textarea name="description" id="editor" cols="30" rows="5" placeholder="Description" class="form-control ">{{ $work->description }}</textarea>
                                    </div>






                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="Y" <?=$work->status == "Y" ? "selected" : "" ?>>Active
                                                </option>
                                                <option value="N" <?=$work->status == "N" ? "selected" : ""
                                                    ?>>Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

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
