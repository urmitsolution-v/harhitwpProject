@extends('layout.admin')
@section('title', 'About Us - ')

@section('content')

<style>
    .uploaded_width{
        width: 150px;
    height: 150px;
    object-fit: cover;
    }
</style>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Working Areas</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Working Area Details</h4>


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

                                  <!--<div class="col-md-4">-->
                                  <!--          <div class="mb-3">-->
                                  <!--              <label for="image1" class="form-label">Image1</label>-->
                                  <!--              <input type="file" class="form-control" name="image1" id="image1"-->
                                  <!--                  placeholder="">-->
                                  <!--                  @if (isset($data->image1))-->
                                  <!--                      <img src="{{ url('uploads') }}/{{ $data->image1 }}" class="img-thumbnail mt-3 uploaded_width" alt="">-->
                                  <!--                  @endif-->
                                  <!--          </div>-->
                                  <!--      </div>-->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="image2" class="form-label">Image2</label>
                                                <input type="file" name="image2" class="form-control" id="image2"
                                                    placeholder="">
                                                    @if (isset($data->image2))
                                                    <img src="{{ url('uploads') }}/{{ $data->image2 }}" class="img-thumbnail mt-3 uploaded_width" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="image3" class="form-label">Image3</label>
                                                <input type="file" name="image3" class="form-control" id="image3"
                                                    placeholder="">
                                                    @if (isset($data->image3))
                                                    <img src="{{ url('uploads') }}/{{ $data->image3 }}" class="img-thumbnail mt-3 uploaded_width" alt="">
                                                @endif
                                            </div>
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
