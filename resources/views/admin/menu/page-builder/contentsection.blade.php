@php
    $index = $index ?? 0;
    $section = $section ?? ['title' => '', 'description' => '', 'lists' => [], 'button' => [], 'image' => '', 'design' => 'left-image'];
@endphp

<div class="border rounded p-3 mb-4 bg-light position-relative content-section-block">
    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="this.closest('.content-section-block').remove()">×</button>
    <div class="row">
    <div class="form-group mb-3 col-md-6">
        <label><strong>Title</strong></label>
        <input type="text" name="contentsection[{{ $index }}][title]" class="form-control" placeholder="Enter title" value="{{ $section['title'] }}">
    </div>

    <div class="form-group mb-3 col-md-6">
        <label><strong>Description</strong></label>
        <textarea name="contentsection[{{ $index }}][description]" class="form-control" rows="3" placeholder="Enter description">{{ $section['description'] }}</textarea>
    </div>
    </div>

    <div class="form-group mb-3">
        <label><strong>List Items</strong></label>
        <div id="list-container-{{ $index }}" class="list-group row">
            @if (!empty($section['lists']))
                @foreach ($section['lists'] as $liIndex => $listItem)
                    <div class="input-group mb-2 list-group-item">
                        <input type="text" name="contentsection[{{ $index }}][lists][{{ $liIndex }}]" class="form-control" value="{{ $listItem }}" placeholder="List item">
                        <button type="button" class="btn btn-danger" onclick="this.closest('.list-group-item').remove()">×</button>
                    </div>
                @endforeach
            @endif
        </div>
        <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addListItem({{ $index }})">+ Add List Item</button>
    </div>

  <div class="row">
  <div class="form-group mb-3 col-md-3">
        <label><strong>Button Name</strong></label>
        <input type="text" name="contentsection[{{ $index }}][button][name]" class="form-control" placeholder="Enter button name" value="{{ $section['button']['name'] ?? '' }}">
    </div>

    <div class="form-group mb-3 col-md-3">
        <label><strong>Button URL</strong></label>
        <input type="url" name="contentsection[{{ $index }}][button][url]" class="form-control" placeholder="https://" value="{{ $section['button']['url'] ?? '' }}">
    </div>

    <div class="form-group mb-3 col-md-3">
        <label><strong>Button Target</strong></label>
        <select name="contentsection[{{ $index }}][button][target]" class="form-control">
            <option value="_self" {{ ($section['button']['target'] ?? '') === '_self' ? 'selected' : '' }}>Same Tab (_self)</option>
            <option value="_blank" {{ ($section['button']['target'] ?? '') === '_blank' ? 'selected' : '' }}>New Tab (_blank)</option>
        </select>
    </div>
     <div class="form-group mb-3 col-md-3">
        <label><strong>Design Type</strong></label>
        <select name="contentsection[{{ $index }}][design]" class="form-control">
            <option value="left-image" {{ ($section['design'] ?? '') === 'left-image' ? 'selected' : '' }}>Left Image & Right Content</option>
            <option value="right-image" {{ ($section['design'] ?? '') === 'right-image' ? 'selected' : '' }}>Right Image & Left Content</option>
        </select>
    </div>
  </div>

    <div class="form-group mb-3">
        <label><strong>Upload Image</strong></label>
        <input type="file" name="contentsection[{{ $index }}][image]" class="form-control-file">
        @if (!empty($section['image']))
            <div class="mt-2">
                <img src="{{ asset($section['image']) }}" alt="Section Image" style="max-height: 100px;">
            </div>
        @endif
    </div>

   
</div>
