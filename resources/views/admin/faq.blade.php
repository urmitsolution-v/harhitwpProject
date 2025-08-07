@extends('layout.admin')
@section('title', 'News & Articles')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Faq</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Faq Details</h4>

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
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Headline</label>
                                            <input type="text" class="form-control" name="headline" value="{{ $row->headline ?? '' }}" id="formrow-firstname-input" placeholder="Enter headline">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="floating-label" for="description">List Content</label>
                                            <div id="lists_content">
                                                @if(isset($row->lists) && $row->lists !== null && is_array(json_decode($row->lists)))
                                                    @foreach (json_decode($row->lists) as $key => $item)
                                                        <div class="listitem d-flex mb-2">
                                                            <input type="text" name="title[]" class="form-control" value="{{ $item->title ?? '' }}" placeholder="Enter title">
                                                            <input type="text" name="dec[]" class="form-control" value="{{ $item->dec ?? '' }}" placeholder="Enter slug">
                                                            {{-- <img src="{{ asset($item->image) }}" width="10%" alt="Image"> --}}

                                                            @if($key == 0)
                                                                <button type="button" class="btn btn-primary" id="appendmore">
                                                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                                    </svg>
                                                                </button>
                                                            @else
                                                                <button type="button" class="btn btn-danger closebutton" id="closebutton">
                                                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M5 11V13H19V11H5Z"></path>
                                                                    </svg>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="listitem d-flex mb-2">
                                                        <input type="text" name="title[]" class="form-control" placeholder="Enter title">
                                                        <input type="text" name="dec[]" class="form-control" placeholder="Enter dec">
                                                        <button type="button" class="btn btn-primary" id="appendmore">
                                                            <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('footer')
<script>
    // Add more list items dynamically
    $('#appendmore').click(function(){
        var html = '<div class="listitem d-flex mt-2"><input type="text" name="title[]" class="form-control" placeholder="Enter title"><input type="text" name="dec[]" class="form-control" placeholder="Enter dec"><button type="button" class="btn btn-danger closebutton"  id="closebutton"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11V13H19V11H5Z"></path></svg></button></div>';
        $('#lists_content').append(html);
    });

    // Remove a list item dynamically
    $(document).on("click", "#closebutton", function() {
        $(this).parents('.listitem').remove();
    });
</script>
@endsection
@endsection
