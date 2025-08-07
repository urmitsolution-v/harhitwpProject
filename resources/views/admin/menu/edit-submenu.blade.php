@extends('layout.admin')
@section('title', 'Edit Submenu')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Edit Submenu</h4>
                    </div>
                </div>
            </div>

            <!-- Success Alert -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Form -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Submenu Details</h4>

                            <form method="POST">
                                @csrf

                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Submenu Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title', $submenu->title) }}" class="form-control" id="title" placeholder="Enter submenu title">
                                    @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Slug -->
                             <!-- Link Type Selection -->
<div class="mb-3">
    <label for="link_type" class="form-label">Link Type <span class="text-danger">*</span></label>
    <select name="link_type" id="link_type" class="form-select">
        <option value="slug" {{ old('link_type', $submenu->link_type) == 'slug' ? 'selected' : '' }}>Slug</option>
        <option value="external" {{ old('link_type', $submenu->link_type) == 'external' ? 'selected' : '' }}>External Link</option>
    </select>
    @error('link_type')
    <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<!-- Slug Field -->
<div class="mb-3" id="slug-field">
    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
    <input type="text" name="slug" value="{{ old('slug', $submenu->slug) }}" readonly class="form-control" id="slug" placeholder="Auto-generated or enter manually">
    @error('slug')
    <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

<!-- External Link Field -->
<div class="mb-3" id="external-link-field">
    <label for="external_link" class="form-label">External Link <span class="text-danger">*</span></label>
    <input type="url" name="external_link" value="{{ old('external_link', $submenu->external_link) }}" class="form-control" id="external_link" placeholder="https://example.com">
    @error('external_link')
    <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>


                                <!-- Parent Category -->
                                <div class="mb-3">
                                    <label for="parent_category" class="form-label">Parent Menu <span class="text-danger">*</span></label>
                                    <select name="parent_category" class="form-select">
                                        <option value="">-- Select Parent Menu --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('parent_category', $submenu->parent_category) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_category')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-select">
                                        <option value="Y" {{ old('status', $submenu->status) == 'Y' ? 'selected' : '' }}>Active</option>
                                        <option value="N" {{ old('status', $submenu->status) == 'N' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success w-md">Update Submenu</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->
@endsection

@section('footer')
<script>
    // Auto-generate slug from title
    document.addEventListener('DOMContentLoaded', function () {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function () {
            const slug = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            slugInput.value = slug;
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const linkTypeSelect = document.getElementById('link_type');
        const slugField = document.getElementById('slug-field');
        const externalField = document.getElementById('external-link-field');

        function toggleFields() {
            if (linkTypeSelect.value === 'slug') {
                slugField.style.display = 'block';
                externalField.style.display = 'none';
            } else {
                slugField.style.display = 'none';
                externalField.style.display = 'block';
            }
        }

        // Run initially and on change
        toggleFields();
        linkTypeSelect.addEventListener('change', toggleFields);
    });
</script>

@endsection
