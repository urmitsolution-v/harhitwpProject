@extends('layout.admin')
@section('title', 'We’re the Best - ')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <!-- Form -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">We’re the Best</h4>

                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $row->title ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Short -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Short Description</label>
                                            <input type="text" class="form-control" name="short_description" value="{{ $row->short_description ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Upload Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                                    @if ($info->image)
                                                        <img src="{{ url('uploads') }}/{{ $info->image }}" class="img-thumbnail mt-2" width="200" height="200" style="object-fit: cover;" alt="">
                                                    @endif
                                            </div>
                                        </div>

                                           <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" class="form-control" name="button_name" value="{{ $row->button_name ?? '' }}">
                                        </div>
                                    </div>


                                </div>


                                   <div class="row">

                                      <div class="col-12">
                                        <h4 class="card-title mb-4">Ecosystem</h4>
                                      </div>

                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ecosystem Title</label>
                                            <input type="text" class="form-control" name="e_title" value="{{ $row->e_title ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Short -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Ecosystem Short Description</label>
                                            <input type="text" class="form-control" name="e_short_description" value="{{ $row->e_short_description ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Ecosystem Upload Image</label>
                                                <input type="file" accept="image/*" name="image_2" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                                    @if ($info->image_2)
                                                        <img src="{{ url('uploads') }}/{{ $info->image_2 }}" class="img-thumbnail mt-2" width="200" height="200" style="object-fit: cover;" alt="">
                                                    @endif
                                            </div>
                                        </div>
                                    <!-- Submit -->
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div>
@endsection
