@extends('layout.admin')
@section('title', 'Inclusivity Pulse for DPI')
@section('content')

<style>
    .team-card {
    display: block;
    cursor: pointer;
    text-align: center;
    border: 2px solid #ddd;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease-in-out;
    background: #f9f9f9;
}

.team-card input[type="checkbox"] {
    display: none;
}

.team-card input[type="checkbox"] {
    display: none;
}

.team-card-inner {
    transition: all 0.2s;
    border: 2px solid transparent;
    padding: 10px;
    cursor: pointer;
}

.team-card input[type="checkbox"]:checked + .team-card-inner {
    border-color: #007bff;
    background-color: #f0f8ff;
}

.team-card-inner {
    padding: 15px;
}

.team-card img {
    width: 100%;
    max-height: 120px;
    object-fit: cover;
    border-radius: 8px;
}

.team-card h6 {
    margin-top: 10px;
    font-size: 16px;
    color: #333;
}

.team-card input[type="checkbox"]:checked + .team-card-inner {
    background-color: #d4edda;
    border: 2px solid #28a745;
    color: #155724;
}

</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('pulse-for-dpi.submit') }}" method="POST" enctype="multipart/form-data">
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

                {{-- Section 1: Banner Section --}}
              <div class="card mb-4">
    <div class="card-header"><strong>Banner Section</strong></div>
    <div class="card-body">
        <div class="mb-3">
            <label for="banner_title">Title</label>
            <input type="text" name="banner_title" id="banner_title" class="form-control"
                value="{{ old('banner_title', $pulse->banner_title ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="banner_subdescription">Sub Description</label>
            <textarea name="banner_subdescription" id="banner_subdescription" class="form-control" rows="3">{{ old('banner_subdescription', $pulse->banner_subdescription ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="banner_image">Banner Image</label>
            <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*">
            
            @if (!empty($pulse->banner_image))
                <div class="mt-2">
                    <img src="{{ asset($pulse->banner_image) }}" alt="Banner Image" class="img-thumbnail" style="height: 100px;">
                </div>
            @endif
        </div>
    </div>
</div>


                {{-- Section 2: Content Section --}}
               <div class="card mb-4">
    <div class="card-header"><strong>Content Section</strong></div>
    <div class="card-body">

        {{-- Title --}}
        <div class="mb-3">
            <label for="content_title">Title</label>
            <input type="text" id="content_title" name="content_title" class="form-control"
                value="{{ old('content_title', $pulse->content_title ?? '') }}">
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="content_description">Description</label>
            <textarea id="content_description" name="content_description" class="form-control" rows="4">{{ old('content_description', $pulse->content_description ?? '') }}</textarea>
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="content_image">Image</label>
            <input type="file" id="content_image" name="content_image" class="form-control" accept="image/*">
            @if (!empty($pulse->content_image) && file_exists(public_path($pulse->content_image)))
                <img src="{{ asset($pulse->content_image) }}" height="80" class="mt-2 border">
            @endif
        </div>

        {{-- Layout --}}
        <div class="mb-3">
            <label for="content_layout">Section Layout</label>
            <select name="content_layout" id="content_layout" class="form-control">
                <option value="left" {{ old('content_layout', $pulse->content_layout ?? '') == 'left' ? 'selected' : '' }}>Left to Right</option>
                <option value="right" {{ old('content_layout', $pulse->content_layout ?? '') == 'right' ? 'selected' : '' }}>Right to Left</option>
            </select>
        </div>

    </div>
</div>





                {{-- Section 3: Advanced Content Section --}}
<!--                <div class="card mb-4">-->
<!--    <div class="card-header d-flex justify-content-between align-items-center">-->
<!--        <strong>Advanced Content Section</strong>-->
<!--        <button type="button" class="btn btn-sm btn-primary" onclick="addEditor()">Add New Editor</button>-->
<!--    </div>-->
<!--    <div class="card-body" id="advanced-editor-container">-->

<!--        {{-- Existing editors --}}-->
<!--        @php $editorIndex = 0; @endphp-->
<!--        @if (!empty($pulse->editors))-->
<!--            @foreach ($pulse->editors as $editor)-->
<!--                @php $uniqueId = 'summernote_' . $editorIndex; @endphp-->
<!--                <div class="mb-4 editor-wrapper">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-12 mb-3">-->
<!--                            <label>Editor Layout</label>-->
<!--                            <select name="editor_layouts[]" class="form-control">-->
<!--                                <option value="col-6" {{ $editor->editor_layout == 'col-6' ? 'selected' : '' }}>50% Width</option>-->
<!--                                <option value="col-12" {{ $editor->editor_layout == 'col-12' ? 'selected' : '' }}>Full Width</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="mb-3">-->
<!--                        <label>Editor Content</label>-->
<!--                        <textarea name="editor_contents[]" id="{{ $uniqueId }}" class="form-control summernote-initial">{{ $editor->editor_content }}</textarea>-->
<!--                    </div>-->
<!--                    <hr>-->
<!--                </div>-->
<!--                @php $editorIndex++; @endphp-->
<!--            @endforeach-->
<!--        @endif-->

<!--        {{-- New editors will be appended here --}}-->
<!--    </div>-->
<!--</div>-->


{{-- Section 3: Advanced Content Section --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Advanced Content Section</strong>
        <button type="button" class="btn btn-sm btn-primary" onclick="addEditor()">Add New Editor</button>
    </div>
    <div class="card-body" id="advanced-editor-container">
        {{-- Existing editors --}}
        @php $editorIndex = 0; @endphp
        @if (!empty($pulse->editors))
            @foreach ($pulse->editors as $editor)
                @php $uniqueId = 'summernote_' . $editorIndex; @endphp
                <div class="mb-4 editor-wrapper border p-3 rounded position-relative">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-editor-btn" aria-label="Close" onclick="this.closest('.editor-wrapper').remove()"></button>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Editor Layout</label>
                            <select name="editor_layouts[]" class="form-control">
                                <option value="col-6" {{ $editor->editor_layout == 'col-6' ? 'selected' : '' }}>50% Width</option>
                                <option value="col-12" {{ $editor->editor_layout == 'col-12' ? 'selected' : '' }}>Full Width</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Editor Content</label>
                        <textarea name="editor_contents[]" id="{{ $uniqueId }}" class="form-control summernote-initial">{{ $editor->editor_content }}</textarea>
                    </div>
                </div>
                @php $editorIndex++; @endphp
            @endforeach
        @endif
        {{-- New editors will be appended here --}}
    </div>
</div>




             <div class="card mb-4">
                    <div class="card-header"><strong>CMS Section</strong></div>
                    <div class="card-body row">
                        <div class="mb-3 col-md-6">
                            <label>Title</label>
                            <input type="text" name="cms_title" class="form-control" value="{{ old('cms_title', $pulse->cms_title ?? '') }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Image</label>
                            <input type="file" name="cms_image" class="form-control" accept="image/*">
                            @if (!empty($pulse->cms_image))
                                <img src="{{ asset($pulse->cms_image) }}" height="80" class="mt-2">
                            @endif
                        </div>
                          <div class="mb-3 col-12">
                        <label>Editor Content</label>
                        <textarea name="cms_editor" id="editor" class="form-control">{{ $pulse->cms_editor }}</textarea>
                    </div>
                    </div>
                </div>



                {{-- Section 4: Timeline Section --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Timeline Section</strong></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="timeline_title" class="form-control" value="{{ old('timeline_title', $pulse->timeline_title ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="timeline_image" class="form-control" accept="image/*">
                            @if (!empty($pulse->timeline_image))
                                <img src="{{ asset($pulse->timeline_image) }}" height="80" class="mt-2">
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Section 5: Team Section --}}
              {{-- Section 5: Team Section --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>Team Section</strong>
        <button type="button" class="btn btn-sm btn-primary" onclick="addTeamMember()">Add Team Member</button>
    </div>
    <div class="card-body" id="team-member-container">
       
        
   @foreach ($pulse->teams as $index => $member)
    @php $rand = rand(1111111,9999999); @endphp
    <div class="team-member border p-3 rounded mb-3 position-relative">
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="this.closest('.team-member').remove()"></button>

        <input type="hidden" name="team_members[{{ $rand }}][id]" value="{{ $member->id }}">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="team_members[{{ $rand }}][name]" class="form-control" value="{{ $member->name }}">
            </div>
            
            <div class="col-md-6 mb-3">
                <label>Position</label>
                <input type="text" name="team_members[{{ $rand }}][position]" class="form-control" value="{{ $member->position }}">
            </div>
            <div class="col-md-6 mb-3">
                <label>Image</label>
                <input type="file" name="team_members[{{ $rand }}][image]" class="form-control" accept="image/*">
                @if ($member->image)
                    <img src="{{ asset($member->image) }}" class="img-thumbnail mt-2" width="100">
                @endif
            </div>
             <div class="col-md-6 mb-3">
                <label>Company</label>
                <input type="text" name="team_members[{{ $rand }}][company]" class="form-control" value="{{ $member->company ?? "" }}">
            </div>
        </div>
    </div>
@endforeach



    </div>
</div>



                {{-- Section 6: SEO Settings --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>SEO Settings</strong></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $pulse->meta_title ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label>Meta Tags</label>
                            <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $pulse->meta_tags ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea name="meta_description" class="form-control">{{ old('meta_description', $pulse->meta_description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('header')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    let editorCount = {{ isset($editorIndex) ? $editorIndex : 0 }};

    function addEditor() {
        const container = document.getElementById('advanced-editor-container');
        const uniqueId = `summernote_${editorCount++}`;

        const section = document.createElement('div');
        section.classList.add('mb-4', 'editor-wrapper');
        section.innerHTML = `
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label>Editor Layout</label>
                    <select name="editor_layouts[]" class="form-control">
                        <option value="col-6">50% Width</option>
                        <option value="col-12">Full Width</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label>Editor Content</label>
                <textarea name="editor_contents[]" id="${uniqueId}" class="form-control summernote"></textarea>
            </div>
            <hr>
        `;
        container.appendChild(section);

        // Initialize Summernote
        $(`#${uniqueId}`).summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['picture', 'link', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            fontNames: ['Poppins'],
            fontNamesIgnoreCheck: ['Poppins'],
            fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36', '48', '64'],
        });
    }

    $(document).ready(function () {
        // Initialize existing editors
        $('.summernote-initial').each(function () {
            $(this).summernote({
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['picture', 'link', 'video', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                fontNames: ['Poppins'],
                fontNamesIgnoreCheck: ['Poppins'],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36', '48', '64'],
            });
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

<script>

let teamIndex = Date.now();

function addTeamMember() {
    const container = document.getElementById('team-member-container');
    const rand = 'new_' + teamIndex++;

    const html = `
    <div class="team-member border p-3 rounded mb-3 position-relative">
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="this.closest('.team-member').remove()"></button>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="team_members[${rand}][name]" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Position</label>
                <input type="text" name="team_members[${rand}][position]" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Image</label>
                <input type="file" name="team_members[${rand}][image]" class="form-control" accept="image/*">
            </div>
              <div class="col-md-6 mb-3">
                <label>Position</label>
                <input type="text" name="team_members[${rand}][company]" class="form-control">
            </div>
        </div>
    </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
}

</script>


@endsection

