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
                        <h4 class="mb-sm-0 font-size-18">Haicl Strengthening Partners</h4>
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

                                     <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Button Name</label>
                                            <input type="text" class="form-control" name="button_name" value="{{ $row->button_name ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- Short -->
                                     <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Description</label>
                                            <textarea name="description" id="editor" cols="30" rows="10" placeholder="Description"
                                                class="form-control editor">{{ $info->aboutlongtext }}</textarea>
                                        </div>

                                    <!-- Image Upload Section -->
                                    <div class="col-md-12 mt-4">
                                        <label class="form-label">Partnes First Line Image List</label>
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


                                    <!-- Second To-Do Image List -->
<div class="col-md-12 mt-5">
    <label class="form-label">Partnes Second Line Image List</label>
    <div id="second-image-upload-wrapper">
        <div class="input-group mb-2">
            <input type="file" name="second_todo_images[]" class="form-control" accept="image/*">
            <button type="button" class="btn btn-danger remove-second-image">Remove</button>
        </div>
    </div>
    <button type="button" id="add-second-image" class="btn btn-info mt-2">+ Add Image</button>
</div>

<!-- Existing Second To-Do Images -->
@if (!empty($second_todo_images))
    <div class="col-md-12 mt-3">
        <label class="form-label">Uploaded Second To-Do Images</label>
        <div class="d-flex flex-wrap gap-2 mt-2" id="existing-second-images">
            @foreach ($second_todo_images as $key => $image)
                <div class="position-relative" style="width: 150px;">
                    <img src="{{ url('uploads/' . $image) }}" class="img-thumbnail" style="width: 100%; height: 150px; object-fit: cover;">
                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-existing-second-image" data-index="{{ $key }}">&times;</button>
                    <input type="hidden" name="existing_second_images[]" value="{{ $image }}">
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
    document.addEventListener("DOMContentLoaded", function () {
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


    // Add/Remove Second To-Do Images
document.getElementById('add-second-image').addEventListener('click', function () {
    let wrapper = document.getElementById('second-image-upload-wrapper');
    wrapper.insertAdjacentHTML('beforeend', `
        <div class="input-group mb-2">
            <input type="file" name="second_todo_images[]" class="form-control" accept="image/*">
            <button type="button" class="btn btn-danger remove-second-image">Remove</button>
        </div>`);
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-second-image')) {
        e.target.closest('.input-group').remove();
    }
    if (e.target.classList.contains('remove-existing-second-image')) {
        const container = e.target.closest('div.position-relative');
        if (container) container.remove();
    }
});

</script>
@endsection
@endsection
