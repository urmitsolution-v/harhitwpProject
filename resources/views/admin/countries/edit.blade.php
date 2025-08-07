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
                        <h4 class="mb-0">Edit Country</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.country.index') }}">Countries</a></li>
                                <li class="breadcrumb-item active">Edit Country</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if(Session::has('success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

            {{-- show validation errros  --}}

            @if ($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif


            <!-- Edit Country Form -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.country.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Type -->
                        <div class="mb-3">
                            <label>Type</label>
                            <select name="type" id="countryType" class="form-control" required>
                                <option value="single" {{ $country->type == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="group" {{ $country->type == 'group' ? 'selected' : '' }}>Group</option>
                            </select>
                        </div>

                        <!-- Single Fields -->
                        <div id="singleCountryFields">
                            <div class="mb-3">
                                <label>Country Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $country->name }}">
                            </div>
                            <div class="mb-3">
                                <label>Current Image</label><br>
                                @if($country->image)
                                    <img src="{{ asset($country->image) }}" width="80">
                                @endif
                            </div>
                            <div class="mb-3">
                                <label>Replace Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>

                        <!-- Group Fields -->
                        <div id="groupCountryFields">
                            <div class="mb-3">
                                <label>Group Country Names (comma separated)</label>
                                <input type="text" name="names" class="form-control"
                                    value="{{ $country->name ?? "" }}">
                            </div>
                            <div class="mb-3">
                                <label>Current Images</label><br>
                                @foreach(json_decode($country->images, true) ?? [] as $img)
                                    <img src="{{ asset($img) }}" width="60" class="me-1 mb-1">
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label>Replace Images</label>
                                <div id="groupImages">
                                    <input type="file" name="images[]" class="form-control mb-2">
                                </div>
                                <button type="button" id="addMoreImages" class="btn btn-info btn-sm mt-2">+ Add More Images</button>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Y" {{ $country->status == 'Y' ? 'selected' : '' }}>Active</option>
                                <option value="N" {{ $country->status == 'N' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

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
        if (selectedType === 'group') {
            singleFields.style.display = 'none';
            groupFields.style.display = 'block';
        } else {
            singleFields.style.display = 'block';
            groupFields.style.display = 'none';
        }
    }

    // Initialize visibility on page load
    toggleFields();

    // Change visibility when type changes
    typeSelect.addEventListener('change', toggleFields);

    // Add more group image inputs
    document.getElementById('addMoreImages').addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.className = 'form-control mb-2';
        document.getElementById('groupImages').appendChild(input);
    });
});
</script>
@endsection
