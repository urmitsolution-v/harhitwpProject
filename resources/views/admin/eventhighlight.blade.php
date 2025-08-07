@extends('layout.admin')
@section('title', 'Government Solutions')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Event Highlight</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                @csrf

                                @php
                                    $infoOne = json_decode($row->info_one ?? '{}', true);
                                @endphp

                                {{-- Section Title --}}
                                <div class="mb-3">
                                    <label class="form-label">Section Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $infoOne['title'] ?? '' }}" placeholder="Enter section title">
                                </div>

                                {{-- Subtitle --}}
                                <div class="mb-3">
                                    <label class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="subtitle" value="{{ $infoOne['subtitle'] ?? '' }}" placeholder="Enter subtitle">
                                </div>

                                {{-- Description --}}
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="editor" class="form-control">{{ $row->info_two ?? '' }}</textarea>
                                </div>

                                {{-- Image Uploads --}}
                                <div class="row">
                                    @for ($i = 1; $i <= 3; $i++)
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Image {{ $i }}</label>
                                            <input type="file" name="image_{{ $i }}" accept="image/*" class="form-control">
                                            @php
                                                $imageField = 'image' . $i;
                                            @endphp
                                            @if (!empty($row->$imageField))
                                                <img src="{{ url('uploads/' . $row->$imageField) }}" class="img-thumbnail mt-2" width="100">
                                            @endif
                                        </div>
                                    @endfor
                                </div>

                                {{-- Button Details --}}
                                <div class="mt-4">
                                    <h5>Button Details</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" name="button_name" class="form-control" value="{{ $infoOne['button_name'] ?? '' }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Button URL</label>
                                            <input type="url" name="button_url" class="form-control" value="{{ $infoOne['button_url'] ?? '' }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Open Button In</label>
                                            <select name="button_target" class="form-select">
                                                <option value="_self" {{ ($infoOne['button_target'] ?? '') === '_self' ? 'selected' : '' }}>Same Tab</option>
                                                <option value="_blank" {{ ($infoOne['button_target'] ?? '') === '_blank' ? 'selected' : '' }}>New Tab</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Show Button</label>
                                            <select name="show_button" class="form-select">
                                                <option value="Yes" {{ ($infoOne['show_button'] ?? '') === 'Yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="No" {{ ($infoOne['show_button'] ?? '') === 'No' ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- Submit --}}
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

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

@endsection
