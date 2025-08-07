@php
    $breaducump = $breaducump ?? []; // ensure it's set
@endphp

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📍 Breaducump Section</h5>
        <small>Position: {{ $position }}</small>
    </div>
    <div class="card-body">

        <div class="form-group mb-3">
            <label for="breaducump-title"><strong>Title</strong></label>
            <input type="text" name="breaducump[title]" id="breaducump-title" class="form-control" placeholder="Enter title..." value="{{ $breaducump['title'] ?? '' }}">
        </div>

        <div class="form-group mb-3">
            <label for="breaducump-description"><strong>Description</strong></label>
            <textarea name="breaducump[description]" id="breaducump-description" class="form-control" rows="3" placeholder="Enter description...">{{ $breaducump['description'] ?? '' }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="breaducump-banner"><strong>Banner Image</strong></label>
            <input type="file" name="breaducump[banner_image]" id="breaducump-banner" class="form-control-file">
            @if (!empty($breaducump['banner_image']))
                <div class="mt-2">
                    <img src="{{ asset($breaducump['banner_image']) }}" alt="Banner" style="max-height: 100px;">
                </div>
            @endif
        </div>

        <div class="form-group mb-4">
            <label for="breaducump-bgcolor"><strong>Background Color</strong></label>
            <input type="color" name="breaducump[background_color]" id="breaducump-bgcolor" class="form-control form-control-color" value="{{ $breaducump['background_color'] ?? '#ffffff' }}">
        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">🔘 Buttons</h5>
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addBreaducumpButton()">+ Add Button</button>
        </div>

        <div id="breaducump-buttons-container" class="row">
            @if (!empty($breaducump['buttons']) && is_array($breaducump['buttons']))
                @foreach ($breaducump['buttons'] as $index => $button)
                    <div class="col-md-4 mb-3 breaducump-button-group">
                        <div class="border p-3 rounded bg-light position-relative">
                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="this.closest('.breaducump-button-group').remove()">×</button>
                            <div class="form-group">
                                <label><strong>Name</strong></label>
                                <input type="text" name="breaducump[buttons][{{ $index }}][name]" class="form-control" value="{{ $button['name'] ?? '' }}" placeholder="Button name">
                            </div>
                            <div class="form-group mt-2">
                                <label><strong>URL</strong></label>
                                <input type="text" name="breaducump[buttons][{{ $index }}][url]" class="form-control" value="{{ $button['url'] ?? '' }}" placeholder="https://">
                            </div>
                            <div class="form-group mt-2">
                                <label><strong>Target</strong></label>
                                <select name="breaducump[buttons][{{ $index }}][target]" class="form-control">
                                    <option value="_self" {{ ($button['target'] ?? '') === '_self' ? 'selected' : '' }}>Same Tab (_self)</option>
                                    <option value="_blank" {{ ($button['target'] ?? '') === '_blank' ? 'selected' : '' }}>New Tab (_blank)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</div>




<script>
        let breaducumpButtonIndex = {{ isset($breaducump['buttons']) ? count($breaducump['buttons']) : 0 }};

    function addBreaducumpButton() {
        const container = document.getElementById('breaducump-buttons-container');
        const html = `
        <div class="col-md-4 mb-3 breaducump-button-group">
            <div class="border p-3 rounded bg-light position-relative">
                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="this.closest('.breaducump-button-group').remove()">×</button>
                <div class="form-group">
                    <label><strong>Name</strong></label>
                    <input type="text" name="breaducump[buttons][${breaducumpButtonIndex}][name]" class="form-control" placeholder="Button name">
                </div>
                <div class="form-group mt-2">
                    <label><strong>URL</strong></label>
                    <input type="text" name="breaducump[buttons][${breaducumpButtonIndex}][url]" class="form-control" placeholder="https://">
                </div>
                <div class="form-group mt-2">
                    <label><strong>Target</strong></label>
                    <select name="breaducump[buttons][${breaducumpButtonIndex}][target]" class="form-control">
                        <option value="_self">Same Tab (_self)</option>
                        <option value="_blank">New Tab (_blank)</option>
                    </select>
                </div>
            </div>
        </div>`;
        container.insertAdjacentHTML('beforeend', html);
        breaducumpButtonIndex++;
    }

</script>