@extends('layout.admin')
@section('title', 'Edit Insight - ')


@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Insight</h4>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Insight Details</h4>

                         
                            <form method="POST"  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" id="sluggenrate" value="{{ old('title', $row->title) }}">
                                            @error('title') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="slug" id="slugbox" value="{{ old('slug', $row->slug) }}">
                                        </div>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Upload Image</label>
                                          
                                            <input type="file" name="image" class="form-control" accept="image/*">
                                              @if($row->image)
                                                <div class="mb-2">
                                                    <img src="{{ asset('uploads/' . $row->image) }}" class="mt-2 img-thumbnail" width="150" alt="Image">
                                                </div>
                                            @endif
                                        </div>
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

                                <!-- Description -->
                                <div class="row">
                                      <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Description</label>
                                            <textarea name="short_description" cols="30" rows="3" placeholder="Short Description"
                                                class="form-control editor">{{ old('short_description', $row->short_description) }}</textarea>
                                        </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" id="editor" class="form-control editor">{{ old('description', $row->description) }}</textarea>
                                    </div>
                                </div>

                                <!-- SEO -->
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="card-title mb-4">SEO Details</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Title</label>
                                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $row->meta_title) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Meta Tags</label>
                                            <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $row->meta_tags) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $row->meta_description) }}</textarea>
                                    </div>
                                </div>

                                <!-- Status & Feature -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="Y" {{ old('status', $row->status) == 'Y' ? 'selected' : '' }}>Active</option>
                                                <option value="N" {{ old('status', $row->status) == 'N' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Is Featured</label>
                                            <select name="show_home_page" class="form-select">
                                                <option value="Y" {{ old('show_home_page', $row->show_home_page) == 'Y' ? 'selected' : '' }}>Yes</option>
                                                <option value="N" {{ old('show_home_page', $row->show_home_page) == 'N' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('show_home_page') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-md">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col-xl-12 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

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
