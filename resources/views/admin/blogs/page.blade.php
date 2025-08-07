@extends('layout.admin')
@section('title', 'Page Info & Seo - ')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                  <div class="mb-3">
                        <a href="/admin/teams" class="btn btn-primary">Back</a>
                    </div>

                                <h4 class="card-title mb-4">Page Info & Blog Page Seo</h4>


                                <form method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                       
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" required name="title" value="{{ $row->title ?? "" }}"  placeholder="">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" name="subtitle" value="{{ $row->subtitle ?? "" }}" id="sluggenrate" placeholder="">
                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Upload  Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>


                                            @if ($setting->image)
                                                <img width="100" class="img-thumbnail mb-3" src="{{ url('') }}/uploads/{{ $setting->image }}" alt="">
                                            @endif

                                        </div>

                                       
                                         <div class="col-md-12">
               <div class="bg-light p-3 rounded-2 border shadow mb-3">
                 <div class="h4">SEO Information</div>
                   <div class="row">
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $row->meta_title ?? '') }}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Meta Tags</label>
                        <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $row->meta_tags ?? '') }}">
                    </div>
                    <div class="mb-3 col-12">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $row->meta_description ?? '') }}</textarea>
                    </div>
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
