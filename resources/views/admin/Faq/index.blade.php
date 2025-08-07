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
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['height', ['height']]
            ],
             fontNames: ['Poppins'],
                fontNamesIgnoreCheck: ['Poppins'],
        });
    });
</script>



@endsection

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h4 class="mb-4">FAQ Page Settings</h4>

            <form method="POST" action="{{ route('faq.settings.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Basic Info</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Page Title</label>
                                    <input type="text" name="title" class="form-control" required value="{{ old('title', $setting->title ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label>Sub Description</label>
                                    <textarea name="sub_description" rows="4" class="form-control">{{ old('sub_description', $setting->sub_description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SEO Info -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">SEO Info</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $setting->meta_title ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Tags</label>
                                    <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $setting->meta_tags ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <button class="btn btn-success">Update Info</button>
                </div>
            </form>

            <!-- FAQ Table -->
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>FAQs</span>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#faqModal">+ Add FAQ</button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="30%">Question</th>
                                <th width="60%">Answer</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{!! $faq->answer !!}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editFaqModal{{ $faq->id }}">Edit</button>
                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editFaqModal{{ $faq->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('faq.update', $faq->id) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit FAQ</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Question</label>
                                                    <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Answer</label>
                                                    <textarea name="answer" class="form-control summernote" rows="4" required>{!! $faq->answer !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-success">Update</button>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @empty
                                <tr><td colspan="3" class="text-center">No FAQs found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add FAQ Modal -->
            <div class="modal fade" id="faqModal" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('faq.store') }}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add FAQ</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Question</label>
                                    <input type="text" name="question" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Answer</label>
                                    <textarea name="answer" class="form-control summernote" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success">Save</button>
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
