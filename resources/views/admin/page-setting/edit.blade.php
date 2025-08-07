@extends('layout.admin')
@section('title', 'New Page - ')

@section('content')


<style>
    .uploadedimage{
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
                        <h4 class="mb-sm-0 font-size-18">Update Page</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Update Page Details</h4>
                            <h4 class="card-title mb-4"><u>Can manage sections also </u></h4>


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
                                            <input type="text" class="form-control" name="title" value="{{ $newpage->title }}" id="sluggenrate" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Page Name</label>
                                            <input type="text" class="form-control" name="pagename" value="{{ $newpage->pagename }}" id="slugbox" placeholder="">
                                        </div>
                                    </div>

                                    {{-- <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const sluggenrate = document.getElementById('sluggenrate');
                                            const slugbox = document.getElementById('slugbox');
                                    
                                            sluggenrate.addEventListener('input', function () {
                                                // Keep the input text exactly the same in the slugbox
                                                slugbox.value = sluggenrate.value;
                                            });
                                        });
                                    </script> --}}
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Breadcump Title</label>
                                            <input type="text" class="form-control" name="bradcump_title" value="{{ $newpage->bradcump_title }}" id="sluggenrate" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Page Title</label>
                                            <input type="text" class="form-control" name="pagetitle" value="{{ $newpage->pagetitle }}" id="slugbox" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Page Subtitle</label>
                                            <input type="text" class="form-control" name="pagesubtitle" value="{{ $newpage->pagesubtitle }}" id="slugbox" placeholder="">
                                        </div>
                                    </div>


                                  
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Image</label>
                                            <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input" placeholder="">
                                       
                                            @if($newpage->image)
                                            <img class="uploadedimage img-thumbnail" src="{{ url('') }}/uploads/{{ $newpage->image }}" alt="">
                                            @else

                                            @endif
                                         </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    
                                       <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Page Description</label>
                                        <textarea name="short_desc"  cols="30" rows="3" placeholder="Description" class="form-control ">{{ $newpage->short_desc }}</textarea>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Description</label>
                                        <textarea name="description" id="editor" cols="30" rows="10" placeholder="Description" class="form-control editor">{{ $newpage->description }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title mb-4">Seo Details</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta" value="{{ $newpage->meta }}" id="title" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Meta Tags</label>
                                            <input type="text" class="form-control" name="tag" value="{{ $newpage->tag }}" id="title" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Meta Description</label>
                                        <textarea name="meta_d" cols="10" rows="2" placeholder="Description" class="form-control">{{ $newpage->meta_d }}</textarea>
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
    $('#appendmore').click(function() {
        var html = '<div class="listitem d-flex mt-2"><input type="text" name="lists[]" class="form-control"><button type="button" class="btn btn-danger closebutton"  id="closebutton"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11V13H19V11H5Z"></path></svg></button></div>';

        $('#lists_content').append(html);

    })


    $(document).on("click", "#closebutton", function() {
        $(this).parents('.listitem').remove();
    });

</script>

@endsection

@endsection
