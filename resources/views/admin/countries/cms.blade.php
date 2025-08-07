@extends('layout.admin')
@section('title', 'Edit Country')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Edit Country Data</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.country.index') }}">Countries</a></li>
                                <li class="breadcrumb-item active">Edit Country</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <!-- Edit Form -->
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf

                        <h4>Country - {{ $country->name ?? '' }}</h4>

                         <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $fetchedContent->title ?? '' }}">
                        </div>

                        <!-- 🔥 Country Content Section -->
                        <h5>Country Page Content</h5>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" id="editor" class="form-control" rows="5">{{ $fetchedContent->description ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>YouTube Embed Link</label>
                            <input type="text" name="youtube_iframe" class="form-control" value="{{ $fetchedContent->youtube_iframe ?? '' }}">
                            <small class="text-muted">Example: https://www.youtube.com/embed/xxxxxxx</small>
                        </div>

                        <div class="mb-3">
                            <label>Button Name</label>
                            <input type="text" name="button_name" class="form-control" value="{{ $fetchedContent->button_name ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label>Button Link</label>
                            <input type="text" name="button_link" class="form-control" value="{{ $fetchedContent->button_link ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label>Button Target</label>
                            <select name="button_target" class="form-control">
                                <option value="_self" {{ ($fetchedContent->button_target ?? '') == '_self' ? 'selected' : '' }}>Same Tab</option>
                                <option value="_blank" {{ ($fetchedContent->button_target ?? '') == '_blank' ? 'selected' : '' }}>New Tab</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Section Layout</label>
                            <select name="layout" class="form-control">
                                <option value="left" {{ ($fetchedContent->section_layout ?? '') == 'left' ? 'selected' : '' }}>Video Left / Text Right</option>
                                <option value="right" {{ ($fetchedContent->section_layout ?? '') == 'right' ? 'selected' : '' }}>Video Right / Text Left</option>
                            </select>
                        </div>


                        <hr>
<h5>SEO Information</h5>

<div class="mb-3">
    <label>Meta Title</label>
    <input type="text" name="meta_title" class="form-control" value="{{ $fetchedContent->meta_title ?? '' }}">
</div>

<div class="mb-3">
    <label>Meta Tags <small>(Comma Separated)</small></label>
    <input type="text" name="meta_tags" class="form-control" value="{{ $fetchedContent->meta_tags ?? '' }}">
</div>

<div class="mb-3">
    <label>Meta Description</label>
    <textarea name="meta_description" class="form-control" rows="3">{{ $fetchedContent->meta_description ?? '' }}</textarea>
</div>
<!-- ✅ End SEO Section -->

                        <!-- Submit -->
                        <button type="submit" class="btn btn-success">Update Country</button>
                        <a href="{{ route('admin.country.index') }}" class="btn btn-secondary">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.getElementById('countryType');
    const singleFields = document.getElementById('singleCountryFields');
    const groupFields = document.getElementById('groupCountryFields');

    function toggleFields() {
        const selectedType = typeSelect.value;
        singleFields.style.display = (selectedType === 'single') ? 'block' : 'none';
        groupFields.style.display = (selectedType === 'group') ? 'block' : 'none';
    }

    toggleFields();
    typeSelect.addEventListener('change', toggleFields);

    document.getElementById('addMoreImages').addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.className = 'form-control mb-2';
        document.getElementById('groupImages').appendChild(input);
    });
});
</script>

      
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


@endsection
