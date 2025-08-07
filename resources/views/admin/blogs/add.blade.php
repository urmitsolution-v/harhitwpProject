@extends('layout.admin')
@section('title', 'Create Blog - ')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">New Blog</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Blog Details</h4>


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
                                        
                                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Select Category</label>

                                                       <select name="category" class="form-control" id="">
                                                        @foreach(App\Models\Category::where('status','Y')->where('type','blogs')->latest()->get() as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                                        @endforeach

                                                       </select>
                                                       @error('status')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                     @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Blog Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="sluggenrate" placeholder="">
                                                 @error('title')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Slug</label>
                                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" id="slugbox" placeholder="">
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                const sluggenrate = document.getElementById('sluggenrate');
                                                const slugbox = document.getElementById('slugbox');

                                                sluggenrate.addEventListener('input', function () {
                                                    const slug = sluggenrate.value
                                                        .toLowerCase()
                                                        .trim()
                                                        .replace(/[^a-z0-9\s-]/g, '')
                                                        .replace(/\s+/g, '-')
                                                        .replace(/-+/g, '-');

                                                    slugbox.value = slug;
                                                });
                                            });
                                        </script>



                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Upload  Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Description</label>
                                            <textarea name="description" id="editor" cols="30" rows="10" placeholder="Description"
                                                class="form-control editor">{{ '' }}</textarea>
                                        </div>

                                            <div class="col-12">
                                                <h4 class="card-title mb-4">Seo Details</h4>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" id="title" placeholder="">
                                                </div>
                                                </div>

                                                <div class="col-md-6">

                                                <div class="mb-3">
                                                        <label for="title" class="form-label">Meta Tags</label>
                                                        <input type="text" class="form-control" name="meta_tags" value="{{ old('meta_tags') }}" id="title" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                        <label for="title" class="form-label">Meta Description</label>
                                                        <textarea name="meta_description" cols="10" rows="2" placeholder="Description"
                                                            class="form-control">{{ old('meta_description') }}</textarea>
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
                                               
                                               
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">Show Home Page</label>
                                                       <select name="show_home_page" class="form-control" id="">
                                                        <option value="Y">Active</option>
                                                        <option value="N">Inactive</option>
                                                       </select>
                                                       @error('show_home_page')
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
