@extends('layout.admin')
@section('title', 'Careers - ')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Careers</h4>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <form method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Left Content -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required value="{{ old('title', $career->title ?? '') }}">
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="editor" class="form-control">{{ old('description', $career->description ?? '') }}</textarea>
                                </div>

                                <!-- To-Do List -->
                                <div class="mb-3">
                                    <label class="form-label">To-Do List</label>
                                    <div id="lists_content">
                                        @php
                                            $lists = old('lists', $career->lists ?? []);
                                        @endphp
                                        @forelse($lists as $item)
                                        <div class="listitem d-flex mt-2">
                                            <input type="text" name="lists[]" class="form-control" value="{{ $item }}" placeholder="Enter item">
                                            <button type="button" class="btn btn-danger closebutton ms-2">-</button>
                                        </div>
                                        @empty
                                        <div class="listitem d-flex mt-2">
                                            <input type="text" name="lists[]" class="form-control" placeholder="Enter item">
                                            <button type="button" class="btn btn-danger closebutton ms-2">-</button>
                                        </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm mt-2" id="appendmore">+ Add More</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Right Media -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <!-- Media Type -->
                                <div class="mb-3">
                                    <label class="form-label">Media Type</label>
                                    <select name="media_type" id="media_type" class="form-select">
                                        <option value="">Select</option>
                                        <option value="youtube" {{ old('media_type', $career->media_type ?? '') == 'youtube' ? 'selected' : '' }}>YouTube</option>
                                        <option value="file" {{ old('media_type', $career->media_type ?? '') == 'file' ? 'selected' : '' }}>File</option>
                                    </select>
                                </div>

                                <!-- YouTube URL -->
                                <div class="mb-3 {{ old('media_type', $career->media_type ?? '') == 'youtube' ? '' : 'd-none' }}" id="youtube_input">
                                    <label class="form-label">YouTube Video URL</label>
                                    <input type="text" name="youtube_link" class="form-control" placeholder="https://youtube.com/" value="{{ old('youtube_link', $career->youtube_link ?? '') }}">
                                </div>

                                <!-- File Upload -->
                                <div class="mb-3 {{ old('media_type', $career->media_type ?? '') == 'file' ? '' : 'd-none' }}" id="file_input">
    <label class="form-label">Upload File</label>
    <input type="file" name="media_file" class="form-control">

    @if (!empty($career->media_file))
        <small class="text-muted d-block mt-2">Current File:</small>

        @php
            $ext = pathinfo($career->media_file, PATHINFO_EXTENSION);
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];
        @endphp

        @if (in_array(strtolower($ext), $imageExtensions))
            <img src="{{ asset('uploads/' . $career->media_file) }}" alt="Uploaded Image" class="img-thumbnail mt-2" style="max-height: 200px;">
        @else
            <p class="mt-2"><i class="bi bi-file-earmark"></i> {{ $career->media_file }}</p>
        @endif
    @endif
</div>


                                <!-- Page Design -->
                                <div class="mb-3">
                                    <label class="form-label">Page Design</label>
                                    <select name="page_design" class="form-select" required>
                                        <option value="">Select Layout</option>
                                        <option value="left_content_right_media" {{ old('page_design', $career->page_design ?? '') == 'left_content_right_media' ? 'selected' : '' }}>Left Content - Right Media</option>
                                        <option value="right_content_left_media" {{ old('page_design', $career->page_design ?? '') == 'right_content_left_media' ? 'selected' : '' }}>Right Content - Left Media</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="mb-3">SEO Settings</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $career->meta_title ?? '') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="meta_tags" class="form-label">Meta Tags</label>
                                        <input type="text" name="meta_tags" class="form-control" placeholder="e.g. career, jobs" value="{{ old('meta_tags', $career->meta_tags ?? '') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $career->meta_description ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Media type show/hide
    $('#media_type').on('change', function () {
        let type = $(this).val();
        $('#youtube_input').toggleClass('d-none', type !== 'youtube');
        $('#file_input').toggleClass('d-none', type !== 'file');
    }).trigger('change'); // auto trigger on page load if preselected

    // Add more list items
    $('#appendmore').click(function () {
        var html = `
            <div class="listitem d-flex mt-2">
                <input type="text" name="lists[]" class="form-control" placeholder="Enter item">
                <button type="button" class="btn btn-danger closebutton ms-2">-</button>
            </div>`;
        $('#lists_content').append(html);
    });

    // Remove list item
    $(document).on('click', '.closebutton', function () {
        $(this).closest('.listitem').remove();
    });
</script>
@endsection
