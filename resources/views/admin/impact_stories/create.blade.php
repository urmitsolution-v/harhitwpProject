@extends('layout.admin')

@section('title', 'Impact Stories')

@section('header')
@endsection

@section('scripts')
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

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Add New Impact Story</h4>
                </div>
                <div class="card-body table-responsive">

                    <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Show Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Title --}}
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Menu Title</label>
                            <input type="text" name="menu_title" value="{{ old('menu_title') }}" class="form-control" required>
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-3">
                            <label>Short Description</label>
                            <textarea rows="3" name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                        </div>

                        {{-- Long Description --}}
                        <div class="mb-3">
                            <label>Long Description</label>
                            <textarea name="content" class="form-control editor" id="editor">{{ old('content') }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        {{-- Upload Image --}}
                        <div class="mb-3">
                            <label>Upload Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>

                        <h5>SEO Section</h5>

                        {{-- Meta Title --}}
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control">
                        </div>

                        {{-- Meta Tags --}}
                        <div class="mb-3">
                            <label>Meta Tags</label>
                            <input type="text" name="meta_tags" value="{{ old('meta_tags') }}" class="form-control">
                        </div>

                        {{-- Meta Description --}}
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>
                        </div>

                        <button class="btn btn-success">Save</button>
                        <a href="{{ route('stories.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
