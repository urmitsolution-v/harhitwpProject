@extends('layout.admin')
@section('title', 'Global DPI Summit Form')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Show Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Title --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Title & Logo</strong></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $dpi->title ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            @if(!empty($dpi->logo))
                                <img src="{{ asset($dpi->logo) }}" height="60" class="mt-2">
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Button Fields --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>Button Settings</strong></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Button Name</label>
                            <input type="text" name="button_name" class="form-control" value="{{ old('button_name', $dpi->button_name ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label>Button URL</label>
                            <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $dpi->button_url ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label>Open In</label>
                            <select name="button_target" class="form-control">
                                <option value="_self" {{ old('button_target', $dpi->button_target ?? '') == '_self' ? 'selected' : '' }}>Same Tab</option>
                                <option value="_blank" {{ old('button_target', $dpi->button_target ?? '') == '_blank' ? 'selected' : '' }}>New Tab</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- TODO List with YouTube Video --}}
                <div class="card mb-4">
                    <div class="card-header"><strong>ToDo List - YouTube Videos</strong></div>
                    <div class="card-body">
                        <div id="todo-list">
    @if(!empty($dpi->todos))
        @foreach($dpi->todos as $index => $todo)
            <div class="row mb-3 todo-item">
                <div class="col-md-3">
                    <input type="text" name="todos[{{ $loop->index }}][title]" class="form-control" placeholder="Title" value="{{ $todo['title'] }}">
                </div>
                <div class="col-md-3">
                    <input type="text" name="todos[{{ $loop->index }}][subtitle]" class="form-control" placeholder="Subtitle" value="{{ $todo['subtitle'] }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="todos[{{ $loop->index }}][youtube_link]" class="form-control" placeholder="YouTube Link" value="{{ $todo['youtube_link'] }}">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-todo">Remove</button>
                </div>
            </div>
        @endforeach
    @else
        <div class="row mb-3 todo-item">
            <div class="col-md-3">
                <input type="text" name="todos[0][title]" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-3">
                <input type="text" name="todos[0][subtitle]" class="form-control" placeholder="Subtitle">
            </div>
            <div class="col-md-4">
                <input type="text" name="todos[0][youtube_link]" class="form-control" placeholder="YouTube Link">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-todo">Remove</button>
            </div>
        </div>
    @endif
</div>

                        <button type="button" class="btn btn-primary" id="add-todo">Add More</button>
                    </div>
                </div>

                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-todo').addEventListener('click', function () {
        const container = document.getElementById('todo-list');
        const currentTodos = container.querySelectorAll('.todo-item');
        const todoIndex = currentTodos.length;

        const html = `
            <div class="row mb-3 todo-item">
                <div class="col-md-3">
                    <input type="text" name="todos[${todoIndex}][title]" class="form-control" placeholder="Title">
                </div>
                <div class="col-md-3">
                    <input type="text" name="todos[${todoIndex}][subtitle]" class="form-control" placeholder="Subtitle">
                </div>
                <div class="col-md-4">
                    <input type="text" name="todos[${todoIndex}][youtube_link]" class="form-control" placeholder="YouTube Link">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-todo">Remove</button>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-todo')) {
            e.target.closest('.todo-item').remove();

            // Optional: reindex remaining todos
            const items = document.querySelectorAll('.todo-item');
            items.forEach((item, index) => {
                item.querySelectorAll('input').forEach(input => {
                    const name = input.name;
                    const newName = name.replace(/todos\[\d+\]/, `todos[${index}]`);
                    input.name = newName;
                });
            });
        }
    });
</script>

@endsection
