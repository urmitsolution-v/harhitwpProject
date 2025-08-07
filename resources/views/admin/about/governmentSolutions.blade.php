@extends('layout.admin')
@section('title', 'Government Solutions - ')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Government Solutions</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Government Solutions Details</h4>
                            <form method="post" enctype="multipart/form-data" >
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $row->title ?? "" }}" id="title" placeholder="">
                                       </div>
                                    </div>
                                    
                                                    <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="formrow-firstname-input" class="form-label">Image</label>
                                                                <input type="file" accept="image/*" name="image_2" class="form-control" id="formrow-firstname-input"
                                                                    placeholder="">
                                                                    @if (isset($data->image_2))
                                                                        <img src="{{ url('') }}/uploads/{{ $data->image_2 }}" class="img-thumbnail mt-3" width="100" height="100" alt="">
                                                                    @endif
                                                            </div>
                                                        </div>


                                                         <div class="col-12 mt-4">
    <h4 class="card-title mb-3">Button Options</h4>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="button_name" class="form-label">Button Name</label>
        <input type="text" class="form-control" name="button_name" value="{{ $row->button_name ?? '' }}" id="button_name" placeholder="e.g. Learn More">
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="button_url" class="form-label">Button URL</label>
        <input type="url" class="form-control" name="button_url" value="{{ $row->button_url ?? '' }}" id="button_url" placeholder="e.g. https://example.com">
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="show_button" class="form-label">Show Button</label>
        <select class="form-select" name="show_button" id="show_button">
            <option value="Yes" {{ isset($row->show_button) && $row->show_button == 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ isset($row->show_button) && $row->show_button == 'No' ? 'selected' : '' }}>No</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label for="button_target" class="form-label">Button Target</label>
        <select class="form-select" name="button_target" id="button_target">
            <option value="_self" {{ isset($row->button_target) && $row->button_target == '_self' ? 'selected' : '' }}>Open in Same Tab</option>
            <option value="_blank" {{ isset($row->button_target) && $row->button_target == '_blank' ? 'selected' : '' }}>Open in New Tab</option>
        </select>
    </div>
</div>


                                </div>

                                    <div class="row">
                                        
                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Description</label>
                                            <textarea name="long_description" id="editor" cols="30" rows="10" placeholder="Description"
                                                class="form-control editor">{{ $data->aboutlongtext }}</textarea>

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
       font_names: 'Poppins/Poppins, sans-serif;',
        contentsCss: 'https://fonts.googleapis.com/css2?family=Poppins&display=swap',
        bodyClass: 'poppins-font'
  });
}


if(CKEDITOR) {

  CKEDITOR.replace('editor2', {
      'extraPlugins': '',
      'filebrowserImageBrowseUrl': '<?= url('admin') ?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
      'filebrowserImageUploadUrl': '<?= url('admin') ?>/ckeditor/plugins/iaupload.php',
      'extraAllowedContent': 'audio[]{}',
       font_names: 'Poppins/Poppins, sans-serif;',
        contentsCss: 'https://fonts.googleapis.com/css2?family=Poppins&display=swap',
        bodyClass: 'poppins-font'
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
