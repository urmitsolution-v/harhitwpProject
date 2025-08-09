@extends('layout.admin')
@section('title', 'Publications')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">{{ env('APP_NAME') }} News</h4>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#publicationModal" onclick="openPublicationModal()">+ New {{ env('APP_NAME') }} News</button>
            </div>
            <!-- Publications Table -->
            <div class="card mt-0">
                
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="card-header">All {{ env('APP_NAME') }} News</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <!--<th>Published By</th>-->
                                {{-- <th>Button Name</th>
                                <th>URL</th>
                                <th>Open In</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publications as $pub)
                                <tr>
                                    <td><img src="{{ asset('uploads/publications/' . $pub->image) }}" width="80"></td>
                                    <td>{{ $pub->title }}</td>
                                    <!--<td>{{ $pub->published_by }}</td>-->
                                    {{-- <td>{{ $pub->button_name }}</td>
                                    <td>{{ $pub->button_url }}</td>
                                    <td>{{ $pub->target == '_blank' ? 'New Tab' : 'Same Tab' }}</td> --}}
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="editPublication({{ $pub }})">Edit</button>
                                        <form action="{{ route('publications.destroy', $pub->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this publication?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($publications->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No publications found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal for Create/Edit -->
            <div class="modal fade" id="publicationModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data" id="publicationForm">
                        @csrf
                        <input type="hidden" name="id" id="pub_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add / Edit Publication</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" required id="pub_title">
                                </div>
                              
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    <div id="pub_image_preview" class="mt-2"></div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save Publication</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function openPublicationModal() {
        $('#publicationForm')[0].reset();
        $('#pub_id').val('');
        $('#pub_image_preview').html('');
    }

    function editPublication(pub) {
        $('#pub_id').val(pub.id);
        $('#pub_title').val(pub.title);
        $('#pub_description').val(pub.description);
        $('#pub_published_by').val(pub.published_by);
        $('#pub_button_name').val(pub.button_name);
        $('#pub_button_url').val(pub.button_url);
        $('#pub_target').val(pub.target);
        $('#pub_image_preview').html(`<img src="/uploads/publications/${pub.image}" width="100">`);
        $('#publicationModal').modal('show');
    }
</script>
@endsection
