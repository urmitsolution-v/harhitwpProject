@extends('layout.admin')
@section('title', 'Global DPI Summit')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('global-dpi-summit.store') }}" method="POST" enctype="multipart/form-data">
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

                {{-- Section 1: Banner Details --}}
                <div class="card mb-4">
    <div class="card-header"><strong>Section 1: Banner Details</strong></div>
    <div class="card-body">
        
          <div class="mb-3 ">
            <label>Image</label>
            <input type="file" name="dpi_image" class="form-control" accept="image/*">
            @if($dpi->dpi_image)
                <div class="mt-2">
                    <img src="{{ asset($dpi->dpi_image) }}" alt="Banner Image" class=" bg-dark p-2 rounded w-auto" height="80">
                </div>
            @endif
        </div>
        
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="banner_title" class="form-control" value="{{ old('banner_title', $dpi->banner_title) }}">
        </div>

        <div class="mb-3">
            <label>Sub Description</label>
            <textarea name="banner_sub_description" class="form-control">{{ old('banner_sub_description', $dpi->banner_sub_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Button Name</label>
            <input type="text" name="banner_button_name" class="form-control" value="{{ old('banner_button_name', $dpi->banner_button_name) }}">
        </div>

        <div class="mb-3">
            <label>Button Link</label>
            <input type="text" name="banner_link" class="form-control" value="{{ old('banner_link', $dpi->banner_link) }}">
        </div>

        <div class="mb-3">
            <label>Open Link In</label>
            <select name="banner_link_target" class="form-control">
                <option value="_self" {{ old('banner_link_target', $dpi->banner_link_target) == '_self' ? 'selected' : '' }}>Same Tab</option>
                <option value="_blank" {{ old('banner_link_target', $dpi->banner_link_target) == '_blank' ? 'selected' : '' }}>New Tab</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Banner Image</label>
            <input type="file" name="banner_image" class="form-control" accept="image/*">
            @if($dpi->banner_image)
                <div class="mt-2">
                    <img src="{{ asset($dpi->banner_image) }}" alt="Banner Image" height="80">
                </div>
            @endif
        </div>
    </div>
</div>


                {{-- Section 2: Logos Section --}}
            <div class="card mb-4">
    <div class="card-header"><strong>Section 2: Logos Section</strong></div>
    <div class="card-body">
        <div id="logo-list">
            {{-- Existing logos --}}
            @if(isset($dpi) && $dpi->logos)
                @foreach($dpi->logos as $index => $logo)
                    <div class="row logo-item mb-3 w-100" data-id="{{ $logo->id }}">
                        <div class="col-md-4">
                            <input type="text" name="existing_logos[{{ $logo->id }}][name]" class="form-control" value="{{ $logo->logo_name }}">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            {{-- Display existing logo image --}}
                            <img src="{{ asset($logo->logo_image) }}" height="40">
                            <input type="file" name="existing_logos[{{ $logo->id }}][image]" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger delete-logo" data-id="{{ $logo->id }}">Delete</button>
                        </div>
                    </div>
                @endforeach
            @endif

            {{-- New logo input --}}
            <div class="row logo-item mb-3">
                <div class="col-md-6">
                    <input type="text" name="logos[0][name]" class="form-control" placeholder="Logo Name">
                </div>
                <div class="col-md-6">
                    <input type="file" name="logos[0][image]" class="form-control" accept="image/*">
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-sm btn-primary mt-2" id="add-logo">Add Another Logo</button>
    </div>
</div>

<script>
    let logoIndex = 1;

    document.getElementById('add-logo').addEventListener('click', function () {
        const container = document.getElementById('logo-list');
        const newRow = document.createElement('div');
        newRow.className = 'row logo-item mb-3';
        newRow.innerHTML = `
            <div class="col-md-6">
                <input type="text" name="logos[${logoIndex}][name]" class="form-control" placeholder="Logo Name">
            </div>
            <div class="col-md-6">
                <input type="file" name="logos[${logoIndex}][image]" class="form-control" accept="image/*">
            </div>
        `;
        container.appendChild(newRow);
        logoIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-logo')) {
            const logoId = e.target.getAttribute('data-id');
            const row = e.target.closest('.logo-item');
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete_logo_ids[]';
            input.value = logoId;
            row.appendChild(input);
            row.style.display = 'none';
        }
    });
</script>


                {{-- Section 3: Content Section --}}
             <div class="card mb-4">
    <div class="card-header"><strong>Section 3: Content Section</strong></div>
    <div class="card-body">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="content1_title" class="form-control" value="{{ old('content1_title', $dpi->content1_title ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="content1_description" id="editor" class="form-control">{{ old('content1_description', $dpi->content1_description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label><br>
            @if(!empty($dpi->content1_image))
                <img src="{{ asset($dpi->content1_image) }}" height="100" width="100" class="mb-2">
            @endif
            <input type="file" name="content1_image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Section Style</label>
            <select name="content1_style" class="form-control">
                <option value="left" {{ old('content1_style', $dpi->content1_style ?? '') == 'left' ? 'selected' : '' }}>Left to Right</option>
                <option value="right" {{ old('content1_style', $dpi->content1_style ?? '') == 'right' ? 'selected' : '' }}>Right to Left</option>
            </select>
        </div>
    </div>
</div>


                {{-- Section 4: Image Section --}}
            <div class="card mb-4">
    <div class="card-header"><strong>Section 4: Image Section</strong></div>
    <div class="card-body">
        <div class="mb-3">
            <label>Upload an Image</label><br>
            @if(!empty($dpi->image_section))
                <img src="{{ asset($dpi->image_section) }}" height="100" width="100" class="mb-2">
            @endif
            <input type="file" name="image_section" class="form-control" accept="image/*">
        </div>
    </div>
</div>


                {{-- Section 5: Content Section 2 --}}
               <div class="card mb-4">
    <div class="card-header"><strong>Section 5: Content Section 2</strong></div>
    <div class="card-body">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="content2_title" class="form-control" value="{{ old('content2_title', $dpi->content2_title ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="content2_description" id="editor2" class="form-control">{{ old('content2_description', $dpi->content2_description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label><br>
            @if (!empty($dpi->content2_image))
                <img src="{{ asset($dpi->content2_image) }}" height="100" width="100" class="mb-2">
            @endif
            <input type="file" name="content2_image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>Section Style</label>
            <select name="content2_style" class="form-control">
                <option value="left" {{ old('content2_style', $dpi->content2_style ?? '') == 'left' ? 'selected' : '' }}>Left to Right</option>
                <option value="right" {{ old('content2_style', $dpi->content2_style ?? '') == 'right' ? 'selected' : '' }}>Right to Left</option>
            </select>
        </div>
    </div>
</div>
{{-- Section 6: SEO Settings --}}
<div class="card mb-4">
    <div class="card-header"><strong>Section 6: SEO Settings</strong></div>
    <div class="card-body">
        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $dpi->meta_title ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Meta Tags (comma separated)</label>
            <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $dpi->meta_tags ?? '') }}">
        </div>
        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control">{{ old('meta_description', $dpi->meta_description ?? '') }}</textarea>
        </div>
    </div>
</div>



                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>

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

<script>
if(CKEDITOR) {

  CKEDITOR.replace('editor2', {
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
