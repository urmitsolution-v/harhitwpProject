@extends('layout.admin')
@section('title', 'Counters - ')

@section('content')

<style>
    .formgrouptext{
        background-color: #0082a4;
    padding: 17px;
    color: #fff;
    border-radius: 9px;
    }
</style>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Counters</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Counters</h4>
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
                                     
                                        <div class="col-md-3">
                                            <div class="mb-3 formgrouptext">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="value1" value="{{ $row->value1 ?? "" }}" id="sluggenrate" placeholder="">
                                                <label for="formrow-firstname-input" class="form-label mt-2">Value</label>
                                                <input type="text" class="form-control" name="title1" value="{{ $row->title1 }}" id="sluggenrate" placeholder="">
                                                 @error('title1')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="mb-3 formgrouptext">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="value2" value="{{ $row->value2 ?? "" }}" id="sluggenrate" placeholder="">
                                                <label for="formrow-firstname-input" class="form-label mt-2">Value</label>
                                                
                                                <input type="text" class="form-control" name="title2" value="{{ $row->title2 }}" id="sluggenrate" placeholder="">
                                                 @error('title2')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="mb-3 formgrouptext">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="value3" value="{{ $row->value3 ?? "" }}" id="sluggenrate" placeholder="">
                                                <label for="formrow-firstname-input" class="form-label  mt-2">Value</label>
                                                
                                                <input type="text" class="form-control" name="title3" value="{{ $row->title3 }}" id="sluggenrate" placeholder="">
                                                 @error('title3')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="mb-3 formgrouptext">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="value4" value="{{ $row->value4 ?? "" }}" id="sluggenrate" placeholder="">
                                                <label for="formrow-firstname-input" class="form-label mt-2">Value</label>
                                               
                                                <input type="text" class="form-control" name="title4" value="{{ $row->title4 }}" id="sluggenrate" placeholder="">
                                                 @error('title4')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>
                                       
                                       
                                       
                                        <div class="col-md-3">
                                            <div class="mb-3 formgrouptext">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="value5" value="{{ $row->value5 ?? "" }}" id="sluggenrate" placeholder="">
                                                <label for="formrow-firstname-input" class="form-label mt-2">Value</label>
                                                
                                                <input type="text" class="form-control" name="title5" value="{{ $row->title5 }}" id="sluggenrate" placeholder="">
                                                 @error('title5')
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
    </div>
@endsection
