@extends('layout.admin')
@section('title', 'Categories - ')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


@php
            $type = isset($_GET['type']) ? $_GET['type'] : '';
$type = str_replace('_', ' ', $type);
$type = ucwords($type); // Capitalize the first letter of each word

        @endphp
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Categories</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-capitalize">Update {{ $type }} Categories Details</h4>


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
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ $row->title }}"  id="formrow-firstname-input"
                                                    placeholder="">
                                                    @error('title')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Status</label>
                                               <select name="status" class="form-control" id="">
                                                <option value="Y" <?= $row->status == "Y" ? "selected" : "" ?>>Active</option>
                                                <option value="N" <?= $row->status == "N" ? "selected" : "" ?>>Inactive</option>
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
