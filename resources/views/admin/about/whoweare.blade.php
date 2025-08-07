@extends('layout.admin')
@section('title', 'Who We Are - ')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <form id="submitform">
                            <div class="row g-xl-4">
                                <div class="col-xl-12">
                                    <h4 class="mb-3 fw-semibold fs-16">Who We Are</h4>

                                    <!-- Basic Information -->
                                    <div class="accordion mb-3" id="staticAccordion1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#basicInfo" aria-expanded="true">
                                                    Basic Information
                                                </button>
                                            </h2>
                                            <div id="basicInfo" class="accordion-collapse collapse ">
                                                <div class="accordion-body">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" id="title" name="title" value="{{ old('title', $data->title ?? '') }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="short_description" class="form-label">Short Description</label>
                                                        <textarea id="short_description" name="short_description" class="form-control">{{ old('short_description', $data->short_description ?? '') }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editor" class="form-label">Description</label>
                                                        <textarea name="description" id="editor" class="form-control">{{ old('description', $data->description ?? '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SEO Information -->
                                    <div class="accordion mb-3" id="staticAccordion2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#seoInfo">
                                                    SEO Information
                                                </button>
                                            </h2>
                                            <div id="seoInfo" class="accordion-collapse collapse">
                                                <div class="accordion-body">
                                                    <div class="mb-3">
                                                        <label for="meta_title" class="form-label">Meta Title</label>
                                                        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $data->meta_title ?? '') }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="meta_tags" class="form-label">Meta Tags</label>
                                                        <input type="text" id="meta_tags" name="meta_tags" value="{{ old('meta_tags', $data->meta_tags ?? '') }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="meta_description" class="form-label">Meta Description</label>
                                                        <textarea id="meta_description" name="meta_description" class="form-control">{{ old('meta_description', $data->meta_description ?? '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- New Dynamic Item Form -->
                                    <div class="accordion mb-3">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#addNewSection">
                                                    Add New Section
                                                </button>
                                            </h2>
                                            <div id="addNewSection" class="accordion-collapse collapse">
                                                <div class="accordion-body">
                                                    <div class="mb-3">
                                                        <label for="new_title" class="form-label">Title</label>
                                                        <input type="text" id="new_title" name="new_title" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_description" class="form-label">Description</label>
                                                        <textarea id="new_description" name="new_description" class="form-control"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="new_status" class="form-label">Status</label>
                                                        <select id="new_status" name="new_status" class="form-control">
                                                            <option value="Y">Active</option>
                                                            <option value="N">Inactive</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-2">
                                                        <button type="button" id="addSectionBtn" class="btn btn-secondary">Add Section</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" id="submitButton" class="btn btn-primary">Update Page</button>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <!-- Dynamic Table of Sections -->
                        <hr class="my-4">
                        <h5 class="mb-3">Existing Sections</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($items as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <span class="badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                                {{ $item->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/admin/who-we-are/update/{{$item->id}}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.who-we-are.item.delete', $item->id) }}" method="POST" style="display:inline-block;">
                                                @csrf @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="4">No items found.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div> 
                </div> 
            </div>
        </div>
    </div>
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

    CKEDITOR.replace('new_description', {
      'extraPlugins': '',
      'filebrowserImageBrowseUrl': '<?= url('admin') ?>/ckeditor/plugins/imgbrowse/imgbrowse.html',
      'filebrowserImageUploadUrl': '<?= url('admin') ?>/ckeditor/plugins/iaupload.php',
      'extraAllowedContent': 'audio[]{}',
       font_names: 'Poppins/Poppins, sans-serif;',
        contentsCss: 'https://fonts.googleapis.com/css2?family=Poppins&display=swap',
        bodyClass: 'poppins-font'
  });

    CKEDITOR.replace('strategy_description', {
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
$('#submitform').on('submit', function(e) {
    e.preventDefault();

    for (var instance in CKEDITOR.instances)
        CKEDITOR.instances[instance].updateElement();

    let formData = new FormData(this);

    $.ajax({
        url: "/admin/who-we-are",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        beforeSend: function() {
            $('#submitButton').attr('disabled', true).text('Updating...');
        },
        success: function(response) {
            $('#submitButton').attr('disabled', false).text('Update Page');

            if (response.status) {
                iziToast.success({
                    title: 'Success',
                    message: response.message,
                    position: 'topRight'
                });
            } else {
                iziToast.error({
                    title: 'Error',
                    message: 'Something went wrong',
                    position: 'topRight'
                });
            }
        },
        error: function(xhr) {
            $('#submitButton').attr('disabled', false).text('Update Page');

            let errors = xhr.responseJSON.errors;
            let errorMsg = '';
            for (let field in errors) {
                errorMsg += errors[field][0] + '<br>';
            }

            iziToast.error({
                title: 'Validation Error',
                message: errorMsg,
                position: 'topRight',
                timeout: 7000,
            });
        }
    });
});


 $('#addSectionBtn').on('click', function() {
        let title = $('#new_title').val();
        let description = CKEDITOR.instances['new_description'].getData();
        let status = $('#new_status').val();

        $.ajax({
            url: "/admin/who-we-are-store",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                title: title,
                description: description,
                status: status
            },
            success: function(response) {
                iziToast.success({ title: 'Success', message: response.message, position: 'topRight' });
                location.reload();
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMsg = '';
                for (let field in errors) {
                    errorMsg += errors[field][0] + '<br>';
                }
                iziToast.error({ title: 'Validation Error', message: errorMsg, position: 'topRight' });
            }
        });
    });

</script>
@endsection
@endsection
