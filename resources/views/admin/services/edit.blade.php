@extends('layout.admin')
@section('title', 'Edit Service - ')

@section('content')


<style>
    .uploadedimage {
        width: 100px;
        height: 100px;
        margin-top: 15px;
    }

</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Update Service</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Service Details : {{ $service->title }}</h4>


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
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="mb-3">-->
                                    <!--        <label for="formrow-firstname-input" class="form-label">Select Category</label>-->

                                    <!--        <select name="category" class="form-control" id="">-->
                                    <!--            @foreach(App\Models\Category::where('status','Y')->where('type','service')->latest()->get() as $key => $value)-->
                                    <!--            <option value="{{ $value->id }}" <?= $service->category == $value->id ? "selected" : "" ?>>{{ $value->title }}</option>-->
                                    <!--            @endforeach-->

                                    <!--        </select>-->
                                    <!--        @error('status')-->
                                    <!--        <div class="text-danger mt-1">{{ $message }}</div>-->
                                    <!--        @enderror-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Service Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $service->title }}" id="sluggenrate" placeholder="">
                                        </div>
                                    </div>
                                    
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">CMS Title</label>
                                            <input type="text" class="form-control" name="cmstitle" value="{{ $service->cmstitle }}" id="sluggenrate" placeholder="">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="slug" value="{{ $service->slug }}" id="slugbox" placeholder="">
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const sluggenrate = document.getElementById('sluggenrate');
                                            const slugbox = document.getElementById('slugbox');

                                            sluggenrate.addEventListener('input', function() {
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Upload Banner Box Image</label>
                                            <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input" placeholder="">

                                            @if($service->image)
                                            <img class="uploadedimage img-thumbnail" src="{{ url('') }}/Service-image/{{ $service->image }}" alt="">
                                            @else

                                            @endif

                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Post Icon</label>
                                            <input type="file" accept="image/*" name="icon" class="form-control" id="formrow-firstname-input" placeholder="">

                                            @if($service->icon)
                                            <img class="uploadedimage img-thumbnail" src="{{ url('') }}/Service-image/{{ $service->icon }}" alt="">
                                            @else

                                            @endif

                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Short Description</label>
                                        <textarea name="short_description"  cols="30" rows="10" style="min-height: 56px ! IMPORTANT;height: 80px;" placeholder="Description" class="form-control">{{ $service->short_description }}</textarea>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Description</label>
                                        <textarea name="description" id="editor" cols="30" rows="2"  placeholder="Description" class="form-control editor">{{ $service->description }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title mb-4">fAQ</h4>
                                    </div>



                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="floating-label" for="description">List Content</label>
                                            <div id="lists_content">
                                                @if(isset($service->lists) && $service->lists !== null && is_array(json_decode($service->lists)))
                                                    @foreach (json_decode($service->lists) as $key => $item)
                                                        <div class="listitem  mb-2">
                                                            <input type="text" name="faqtitle[]" class="form-control mt-3" value="{{ $item->title ?? '' }}" placeholder="Enter title">
                                                            <textarea type="text" name="dec[]" class="form-control mt-3 mb-3" row="3" value="{{ $item->dec ?? '' }}" placeholder="Enter description">{{ $item->dec ?? '' }}</textarea>
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
                                                    <div class="listitem mb-2">
                                                        <input type="text" name="faqtitle[]" class="form-control mt-2 mb-2" placeholder="Enter title">
                                                        <textarea type="text" name="dec[]" rows="3" class="form-control" placeholder="Enter Desc"></textarea>
                                                        <button type="button" class="btn btn-primary mt-2" id="appendmore">
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
                                        <h4 class="card-title mb-4">Seo Details</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title" value="{{ $service->meta_title }}" id="title" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Meta Tags</label>
                                            <input type="text" class="form-control" name="meta_tags" value="{{ $service->meta_tags }}" id="title" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="title" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" cols="10" rows="2" placeholder="Description" class="form-control">{{ $service->meta_description }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="Y" <?= $service->status == "Y" ? "selected" : "" ?>>Active</option>
                                                <option value="N" <?= $service->status == "N" ? "selected" : "" ?>>Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Show FAQ</label>
                                            <select name="faq_status" class="form-control" id="">
                                                <option value="Y"  <?= $service->faq_status == "Y" ? "selected" : "" ?>>Yes</option>
                                                <option value="N"  <?= $service->faq_status == "N" ? "selected" : "" ?>>No</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Home Page Featured</label>
                                            <select name="featured" class="form-control" id="">
                                                <option value="Y"  <?= $service->featured == "Y" ? "selected" : "" ?>>Yes</option>
                                                <option value="N"  <?= $service->featured == "N" ? "selected" : "" ?>>No</option>
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
    // Add more list items dynamically
    $('#appendmore').click(function(){
        var html = '<div class="listitem mt-2"><input type="text" name="faqtitle[]" class="form-control mb-2" placeholder="Enter title"><textarea type="text" name="dec[]" class="form-control mb-2" placeholder="Enter Desc" row="3"></textarea><button type="button" class="btn btn-danger closebutton"  id="closebutton"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11V13H19V11H5Z"></path></svg></button></div>';
        $('#lists_content').append(html);
    });

    // Remove a list item dynamically
    $(document).on("click", "#closebutton", function() {
        $(this).parents('.listitem').remove();
    });
</script>
@endsection

@endsection
