@extends('layout.admin')
@section('title', 'Who We Are - ')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <form id="submitform" method="post">
                            @csrf
                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            <div class="row g-xl-4">
                                <div class="col-xl-12">
                                    <h4 class="mb-3 fw-semibold fs-16">Who We Are</h4>

                                    <!-- Basic Information -->
                                   <div class="mb-3">
                                                        <label for="new_title" class="form-label">Title</label>
                                                        <input type="text" id="new_title" name="title" value="{{ $section->title }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_description" class="form-label">Description</label>
                                                        <textarea id="editor" name="description" class="form-control">{{ $section->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_status" class="form-label">Status</label>
                                                       <select id="new_status" name="status" class="form-control">
    <option value="Y" {{ $section->status == "Y" ? 'selected' : '' }}>Active</option>
    <option value="N" {{ $section->status == "N" ? 'selected' : '' }}>Inactive</option>
</select>

                                                    </div>
                            

                                    <div class="mt-3">
                                        <button type="submit" id="submitButton" class="btn btn-primary">Update Page</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                     
                    </div> 
                </div> 
            </div>
        </div>
    </div>
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

    CKEDITOR.replace('new_description', {
      'extraPlugins': '',
      'filebrowserImageBrowseUrl': '<?= url('admin') ?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
      'filebrowserImageUploadUrl': '<?= url('admin') ?>/ckeditor/plugins/iaupload.php',
      'extraAllowedContent': 'audio[]{}',
       font_names: 'Poppins/Poppins, sans-serif;',
        contentsCss: 'https://fonts.googleapis.com/css2?family=Poppins&display=swap',
        bodyClass: 'poppins-font'
  });

    CKEDITOR.replace('strategy_description', {
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
@endsection
@endsection
