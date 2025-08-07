@php
$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
@endphp

<div class="col-md-6">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
</div>
<div class="col-md-6">
    <label>Subtitle</label>
    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
</div>
<div class="col-md-6">
    <label>Month</label>
    <select name="month" class="form-control">
        @foreach($months as $m)
            <option value="{{ $m }}" {{ (old('month') == $m) ? 'selected' : '' }}>{{ $m }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <label>Year</label>
    <input type="number" name="year" class="form-control" value="{{ old('year' ?? date('Y')) }}">
</div>
<div class="col-md-6">
    <label>URL</label>
    <input type="text" name="url" class="form-control" value="{{ old('url' ?? '') }}">
</div>
<div class="col-md-6">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1" {{ old('status' ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status' ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
<div class="col-md-6">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
 
</div>
