@extends('layout.admin')
@section('title', 'Entrepreneurship - ')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Quality Products</h4>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Update Details</h4>

                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{ $row->title ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Short -->
                                    {{-- <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Short</label>
                                            <input type="text" class="form-control" name="short" value="{{ $row->short ?? '' }}">
                                        </div>
                                    </div> --}}

                                    <!-- Description -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" rows="4" class="form-control">{{ $row->description ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Text To-Do List -->
                                    <div class="col-md-12">
                                        <label class="form-label">To-Do List (Text)</label>
                                        <div id="todo-list-wrapper">
                                            @if (!empty($todo_titles))
                                                @foreach ($todo_titles as $title)
                                                    <div class="input-group mb-2">
                                                        <input type="text" name="todo_titles[]" class="form-control" value="{{ $title }}">
                                                        <button type="button" class="btn btn-danger remove-todo">Remove</button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <button type="button" id="add-todo" class="btn btn-info mt-2">+ Add Todo</button>
                                    </div>

                                    <!-- Image Upload Section -->
                                    <div class="col-md-12 mt-4">
                                        <label class="form-label">To-Do Image List</label>
                                        <div id="image-upload-wrapper">
                                            <div class="input-group mb-2">
                                                <input type="file" name="todo_images[]" class="form-control" accept="image/*">
                                                <button type="button" class="btn btn-danger remove-image">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-image" class="btn btn-info mt-2">+ Add Image</button>
                                    </div>

                                    <!-- Existing Images (Removable) -->
                                    @if (!empty($todo_images))
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Uploaded Images</label>
                                            <div class="d-flex flex-wrap gap-2 mt-2" id="existing-images">
                                                @foreach ($todo_images as $key => $image)
                                                    <div class="position-relative" style="width: 150px;">
                                                        <img src="{{ url('uploads/' . $image) }}" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover;">
                                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-existing-image" data-index="{{ $key }}">
                                                            &times;
                                                        </button>
                                                        <input type="hidden" name="existing_images[]" value="{{ $image }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Submit -->
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div>

@section('footer')
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Add/Remove Text Todo
        document.getElementById('add-todo').addEventListener('click', function () {
            let wrapper = document.getElementById('todo-list-wrapper');
            wrapper.insertAdjacentHTML('beforeend', `
                <div class="input-group mb-2">
                    <input type="text" name="todo_titles[]" class="form-control" placeholder="Enter task">
                    <button type="button" class="btn btn-danger remove-todo">Remove</button>
                </div>`);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-todo')) {
                e.target.closest('.input-group').remove();
            }
        });

        // Add/Remove New Images
        document.getElementById('add-image').addEventListener('click', function () {
            let wrapper = document.getElementById('image-upload-wrapper');
            wrapper.insertAdjacentHTML('beforeend', `
                <div class="input-group mb-2">
                    <input type="file" name="todo_images[]" class="form-control" accept="image/*">
                    <button type="button" class="btn btn-danger remove-image">Remove</button>
                </div>`);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-image')) {
                e.target.closest('.input-group').remove();
            }
        });

        // Remove Existing Uploaded Image
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-existing-image')) {
                const container = e.target.closest('div.position-relative');
                if (container) container.remove();
            }
        });
    });
</script>
@endsection
@endsection
