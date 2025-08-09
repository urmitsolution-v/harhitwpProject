@extends('layout.admin')
@section('title', 'Investments')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <form method="POST" action="{{ url()->current() }}">
                @csrf

                <div class="row">
                    {{-- <div class="col-md-6">
                        <!-- Title -->
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required value="{{ old('title', $investment->title ?? '') }}">
                                </div>

                                <!-- Sub Description -->
                                <div class="mb-3">
                                    <label class="form-label">Sub Description</label>
                                    <textarea name="sub_description" rows="4" class="form-control">{{ old('sub_description', $investment->sub_description ?? '') }}</textarea>
                                </div>

                                <!-- To Do List -->
                        

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- SEO -->
                        <div class="card">
                            <div class="card-body">
                                <h5>SEO</h5>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $investment->meta_title ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Tags</label>
                                    <input type="text" name="meta_tags" class="form-control" value="{{ old('meta_tags', $investment->meta_tags ?? '') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $investment->meta_description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                        <div class="mb-3">
                                    <label class="form-label">Video Training List</label>
                                    <div id="todo_wrapper">
                                        @if(!empty($investment->todo_list))
                                            @foreach($investment->todo_list as $item)
                                                <div class="todo-item mb-3">
                                                    <input type="text" name="todo_title[]" class="form-control mb-2" placeholder="Title" value="{{ $item['title'] ?? '' }}" required>
                                                    <textarea name="todo_description[]" class="form-control mb-2 todo-description" placeholder="Description" rows="3">{{ $item['description'] ?? '' }}</textarea>
                                                    <button type="button" class="btn btn-danger remove-todo mb-2">Remove</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="todo-item mb-3">
                                                <input type="text" name="todo_title[]" class="form-control mb-2" placeholder="Title" required>
                                                <textarea name="todo_description[]" class="form-control mb-2" placeholder="Description" rows="3"></textarea>
                                                <button type="button" class="btn btn-danger remove-todo mb-2">Remove</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-primary btn-sm" id="add_more_todo">+ Add More</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@section('header')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endsection

@section('scripts')
<!-- Include Summernote CSS & JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

<script>
    // function initializeSummernote(selector) {
    //     $(selector).summernote({
    //         height: 250,
    //         toolbar: [
    //             ['style', ['style']],
    //             ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //             ['fontname', ['fontname']],
    //             ['fontsize', ['fontsize']],
    //             ['color', ['color']],
    //             ['para', ['ul', 'ol', 'paragraph']],
    //             ['insert', ['picture', 'link', 'video', 'hr']],
    //             ['view', ['fullscreen', 'codeview', 'help']],
    //         ],
    //         fontNames: ['Poppins'],
    //         fontNamesIgnoreCheck: ['Poppins'],
    //         fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36', '48', '64']
    //     });
    // }

    $(document).ready(function () {
        // Initialize existing editors
        // initializeSummernote('.todo-description');

        // Add more todo items
        $('#add_more_todo').click(function () {
            let newItem = $(`
                <div class="todo-item mb-3">
                    <input type="text" name="todo_title[]" class="form-control mb-2" placeholder="Title" required>
                    <textarea name="todo_description[]" class="form-control mb-2 todo-description" placeholder="Description" rows="3"></textarea>
                    <button type="button" class="btn btn-danger remove-todo mb-2">Remove</button>
                </div>
            `);
            $('#todo_wrapper').append(newItem);
            // initializeSummernote(newItem.find('.todo-description'));
        });

        // Remove todo item and destroy Summernote instance
        $(document).on('click', '.remove-todo', function () {
            // let editor = $(this).closest('.todo-item').find('.todo-description');
            // if (editor.hasClass('summernote')) {
            //     editor.summernote('destroy');
            // }
            $(this).closest('.todo-item').remove();
        });
    });
</script>
@endsection
