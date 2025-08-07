@extends('layout.admin')
@section('title', 'Codevelop Impact')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row mb-3">
                <div class="col-12">
                    <h4 class="mb-0">Codevelop Impact - Update</h4>
                </div>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="">
                                @csrf

                                <!-- Title -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title', $row->info_one ?? '') }}" class="form-control" required>
                                </div>

                                <!-- To-Do List -->
                                <div class="mb-3">
                                    <label class="form-label">To-Do List</label>
                                    <div id="todo-list-wrapper">
                                        @php
                                            $lists = old('to_do_list') ?? json_decode($row->info_two ?? '[]', true);
                                        @endphp

                                       @foreach($lists as $index => $item)
    <div class="row g-2 align-items-center todo-item mb-2">
        <div class="col-md-4">
            <input type="text" name="to_do_list[{{ $index }}][title_1]" class="form-control" value="{{ $item['title_1'] ?? '' }}" placeholder="Title 1">
        </div>
        <div class="col-md-4">
            <input type="text" name="to_do_list[{{ $index }}][title_2]" class="form-control" value="{{ $item['title_2'] ?? '' }}" placeholder="Title 2">
        </div>
        <div class="col-md-3">
            <input type="text" name="to_do_list[{{ $index }}][title_3]" class="form-control" value="{{ $item['title_3'] ?? '' }}" placeholder="Title 3">
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger remove-todo">×</button>
        </div>
    </div>
@endforeach


                                        @if(empty($lists))
                                        @php
                                        $rand = rand();    
                                        @endphp
                                            <div class="row g-2 align-items-center todo-item mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" name="to_do_list[{{ $rand }}][title_1]" class="form-control" placeholder="Title 1">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="to_do_list[{{ $rand }}][title_2]" class="form-control" placeholder="Title 2">
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" name="to_do_list[{{ $rand }}][title_3]" class="form-control" placeholder="Title 3">
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger remove-todo">×</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="button" class="btn btn-secondary mt-2" id="add-todo">Add More</button>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addBtn = document.getElementById('add-todo');
        const wrapper = document.getElementById('todo-list-wrapper');

        let todoIndex = {{ count($lists) }}; // Keep track of current count

        addBtn.addEventListener('click', function () {
            const row = document.createElement('div');
            row.className = 'row g-2 align-items-center todo-item mb-2';
            row.innerHTML = `
                <div class="col-md-4">
                    <input type="text" name="to_do_list[${todoIndex}][title_1]" class="form-control" placeholder="Title 1">
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_do_list[${todoIndex}][title_2]" class="form-control" placeholder="Title 2">
                </div>
                <div class="col-md-3">
                    <input type="text" name="to_do_list[${todoIndex}][title_3]" class="form-control" placeholder="Title 3">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-todo">×</button>
                </div>
            `;
            wrapper.appendChild(row);
            todoIndex++; // Increment for next item
        });

        wrapper.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-todo')) {
                e.target.closest('.todo-item').remove();
            }
        });
    });
</script>
@endsection
