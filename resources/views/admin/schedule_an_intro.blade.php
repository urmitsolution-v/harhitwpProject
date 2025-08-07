@extends('layout.admin')
@section('title', 'About Us - ')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Schedule An Intro</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Schedule An Intro Details</h4>
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
                                                <label for="formrow-firstname-input" class="form-label">Headline</label>
                                                <input type="text" class="form-control" name="headline" value="{{ $row->headline }}" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ $row->title }}" id="title" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Tag Line</label>
                                                <input type="text" class="form-control" name="tag_line" value="{{ $row->tag_line }}" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Update Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="image" placeholder="">
                                              
                                                @if (isset($data->image))
                                                <img src="{{ url('uploads') }}/{{ $data->image }}" class="img-thumbnail mt-3">
                                                @endif
                                              
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div> <!-- Error message for the "video" field -->
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        
                                        

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Description</label>
                                            <textarea name="description" id="editor" cols="30" rows="10" placeholder="Description"
                                                class="form-control editor">{{ $row->description }}</textarea>

                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group">
                                                <label class="floating-label" for="description">List Content</label>
                                                <div id="lists_content">

                                                    @if(isset($row->lists))
                                                        @foreach (json_decode($row->lists) as $key => $item)

                                                    <div class="listitem d-flex mb-2">
                                                        <input type="text" value="{{ $item }}" name="lists[]" class="form-control">

                                                        @if($key == 0)
                                                        <button type="button" class="btn btn-primary" id="appendmore"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg></button>

                                                        @else
                                                        <button type="button" class="btn btn-danger closebutton" id="closebutton"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11V13H19V11H5Z"></path></svg></button>
                                                        @endif
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    <div class="listitem d-flex mb-2">
                                                        <input type="text" value="" name="lists[]" class="form-control">
                                                        <button type="button" class="btn btn-primary" id="appendmore"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path></svg></button>
                                                    </div>
                                                    @endif
                                            </div>
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

@section('header')

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


@endsection
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


     
       <script src="<?= url('admin') ?>/ckeditor/ckeditor.js"></script>
<script>
if(CKEDITOR) {

  CKEDITOR.replace('editor', {
      'extraPlugins': '',
      'filebrowserImageBrowseUrl': '<?= url('admin') ?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
      'filebrowserImageUploadUrl': '<?= url('admin') ?>/ckeditor/plugins/iaupload.php',
      'extraAllowedContent': 'audio[]{}',
  });
}

</script>


<script>
    $('#appendmore').click(function(){
        var html = '<div class="listitem d-flex mt-2"><input type="text" name="lists[]" class="form-control"><button type="button" class="btn btn-danger closebutton"  id="closebutton"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11V13H19V11H5Z"></path></svg></button></div>';
        $('#lists_content').append(html);

    })


    $(document).on("click", "#closebutton", function() {
        $(this).parents('.listitem').remove();
    });
</script>

@endsection

@endsection
