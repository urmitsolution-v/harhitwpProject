@extends('layout.admin')
@section('title', 'Menu Tools - ')

@section('header')
    <style>
        input[type="number"] {
            width: 80px;
        }
    </style>
@endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Menu Tools : {{ $menu->title }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Menu Tools</li>
                                </ol>
                            </div>

                       

                        </div>
                         <div class="page-builder-button mb-3">
                            <a href="/admin/page-builder/{{ $menu->id }}" class="btn btn-primary">Open Page Builder</a>
                        </div>
                    </div>
                    
                </div>

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
<form method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered w-100 table-striped table-hover">
                <thead>
                    <tr>
                        <th>Section Name</th>
                        <th>Position</th>
                        <th>Select</th>
                    </tr>
                </thead>
              @php
$tools = collect(json_decode($menu->tools, true));
$selectedSections = $tools->pluck('position', 'section')->toArray();

    $allSections = [
        'breaducump' => 'Breadcrumb',
        'contentsection' => 'Content Section',
        'editor' => 'Editor',
        'form' => 'Form',
    ];
@endphp

<tbody>
    @foreach ($allSections as $key => $label)
        <tr>
            <td>
                <label for="section_{{ $key }}" class="mb-0">{{ $label }}</label>
            </td>
            <td>
                <input
                    type="number"
                    name="position[{{ $key }}]"
                    min="1"
                    class="form-control"
                    placeholder="e.g. 1"
                    value="{{ $selectedSections[$key] ?? '' }}">
            </td>
            <td>
                <input
                    type="checkbox"
                    id="section_{{ $key }}"
                    name="selected_sections[]"
                    value="{{ $key }}"
                    {{ isset($selectedSections[$key]) ? 'checked' : '' }}>
            </td>
        </tr>
    @endforeach
</tbody>

            </table>
            <div class="mt-3">
                <button type="submit" class="btn btn-success">Save Menu Tools</button>
            </div>
        </div>
    </div>
</form>



            </div>
        </div>
    </div>
@endsection
