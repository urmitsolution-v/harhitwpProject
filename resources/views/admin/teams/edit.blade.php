@extends('layout.admin')
@section('title', 'Edit Team - ')
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
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Team</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Team Details</h4>

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
                                                <label for="formrow-firstname-input" class="form-label">Name</label>
                                                <input type="text" class="form-control" required name="name" value="{{ $team->name ?? "" }}"  placeholder="">
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Destination</label>
                                                <input type="text" class="form-control" name="sub_title" value="{{ $team->sub_title ?? "" }}" id="sluggenrate" placeholder="">
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Image</label>
                                                <input type="file" accept="image/*" name="image" class="form-control" id="formrow-firstname-input"
                                                    placeholder="">

                                                    @if($team->image)
                                                    <img class="uploadedimage img-thumbnail mt-2" width="100" src="{{ url('') }}/team-image/{{ $team->image }}" alt="">
                                                    @endif


                                            </div>
                                        </div>

                                         <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">Status</label>
                                                       <select name="status" class="form-select" id="">
                                                        <option value="Y" <?= $team->status == "Y" ? "selected" : "" ?>>Active</option>
                                                        <option value="N" <?= $team->status == "N" ? "selected" : "" ?>>Inactive</option>
                                                       </select>
                                                       @error('status')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">Team Type</label>
                                                       <select name="team_type" class="form-select" id="">
                                                        <option value="is_team" <?= $team->team_type == "is_team" ? "selected" : "" ?>>Teams</option>
                                                        <option value="investment_committee" <?= $team->team_type == "investment_committee" ? "selected" : "" ?>>Investment Committee</option>
                                                        <option value="technical_adviser" <?= $team->team_type == "technical_adviser" ? "selected" : "" ?>>Technical Advisors</option>
                                                       </select>
                                                       @error('status')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                                    </div>
                                                </div>
                                                
                                                
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Bio</label>
                                                <textarea name="bio" id="editor" cols="30" rows="5" class="form-control">{{ $team->description ?? "" }}</textarea>
                                            </div>
                                        </div>
                                 

                                         

                                               
{{--                                                 
                                                 <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-firstname-input" class="form-label">About Us Show</label>
                                                       <select name="show_about" class="form-control" id="">
                                                        <option value="N" <?= $team->show_about == "N" ? "selected" : "" ?>>Inactive</option>
                                                        <option value="Y" <?= $team->show_about == "Y" ? "selected" : "" ?>>Active</option>
                                                       </select>
                                                       @error('status')
                                                       <div class="text-danger mt-1">{{ $message }}</div>
                                                   @enderror
                                                    </div>
                                                </div> --}}
                                                

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

@section('footer')
  
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
