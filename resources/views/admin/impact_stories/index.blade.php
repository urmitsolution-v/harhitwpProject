@extends('layout.admin')
@section('title', 'FAQ Settings')
@section('content')

@section('header')

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                // Only text-related tools
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['fontname', ['fontname']],
                ['height', ['height']]
            ]
        });
    });
</script>


@endsection

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card ">
                <div class="card-header d-flex justify-content-between align-items-center">
        <h4>All Impact Stories</h4>
        <a href="{{ route('stories.create') }}" class="btn btn-success">+ Add New Story</a>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stories as $story)
                <tr>
                    <td>{{ $story->title }}</td>
                    <td>{{ ucfirst($story->status) }}</td>
                    <td>{{ $story->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('stories.edit', $story->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('stories.destroy', $story->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this story?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection
