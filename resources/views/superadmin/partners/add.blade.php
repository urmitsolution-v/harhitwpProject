@extends('layout.admin')
@section('title', 'New Partner - ')
@section('content')

    <div class="main-content">
        
          @if(isset(request()->type) && request()->type == "investment")
            @php
                $title = "Our Grantees";
            @endphp
            
            @else
            @php
                $title = "Partners";
            @endphp

            @endif
            

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
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{$title ?? ""}}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">{{$title ?? ""}} Details</h4>



                                <form method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        
                                        @if(isset(request()->type) && request()->type == "investment")
                                        
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Title </label>
                                                <input type="text"  name="title" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Redirect Url</label>
                                                <input type="text" name="redirect_url" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        
                                        @endif
                                        
                                        
                                         <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">
                                                <input type="text" hidden name="tyoe" class="form-control" value="{{request()->type}}" id="formrow-firstname-input"
                                                    placeholder="">
                                            </div>
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
