@extends('layout.admin')

@section('title', 'Edit Impact Story')

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
                    <h4>Edit Impact Story</h4>
                </div>
                <div class="card-body table-responsive">

                    <form action="{{ route('stories.update', $impact_story->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ old('title', $impact_story->title) }}" class="form-control" required>
                        </div>

                           <div class="mb-3">
                            <label>Menu Title</label>
                            <input type="text" name="menu_title" value="{{ old('menu_title', $impact_story->menu_title) }}" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label>Short Description</label>
                            <textarea rows="3" name="short_description" class="form-control">{{ old('short_description', $impact_story->short_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Long Description</label>
                            <textarea name="content" class="form-control editor" id="editor">{{ old('content', $impact_story->content) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ old('status', $impact_story->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $impact_story->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Upload Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control">
                            @if ($impact_story->image)
                                <div class="mt-2">
                                    <img src="{{ asset($impact_story->image) }}" alt="Image" height="80">
                                </div>
                            @endif
                        </div>

                        <h5>SEO Section</h5>

                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $impact_story->meta_title) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Meta Tags</label>
                            <input type="text" name="meta_tags" value="{{ old('meta_tags', $impact_story->meta_tags) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control">{{ old('meta_description', $impact_story->meta_description) }}</textarea>
                        </div>

                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('stories.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
