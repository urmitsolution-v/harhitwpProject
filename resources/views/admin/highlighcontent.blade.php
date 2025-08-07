@extends('layout.admin')
@section('title', 'Highlight Content')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container card py-4">
            <h3 class="mb-3">
                Highlight Content
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createModal">Add Highlight</button>
            </h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Month-Year</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($highlights as $highlight)
                        <tr>
                            <td>{{ $highlight->title }}</td>
                            <td>{{ $highlight->month }} {{ $highlight->year }}</td>
                            <td>
                                <span class="badge bg-{{ $highlight->status ? 'success' : 'danger' }}">
                                    {{ $highlight->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                @if($highlight->image)
                                    <img src="{{ asset($highlight->image) }}" width="60">
                                @endif
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $highlight->id }}">Edit</button>

                                <!-- Delete -->
                                <form action="{{ route('highlights.destroy', $highlight->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $highlight->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('highlights.update', $highlight->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Highlight</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body row g-3">
                                            @include('admin.highlight._form2', ['highlight' => $highlight])
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('highlights.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Create Highlight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    @include('admin.highlight._form')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
