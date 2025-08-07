@extends('layout.admin')
@section('title', 'Menu Tools - ')
@section('content')


<style>
    input.form-control{
        width: 100% !important;
    }
    </style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Update Page Builder : {{ $menu->title ?? "" }}</h4>
                    </div>
                </div>
            </div>

            <!-- Success Alert -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Form -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h4 class="card-title mb-4">Category Details</h4> --}}

                            <form  method="POST" enctype="multipart/form-data">

                               <div class="mb-3 d-flex justify-content-end align-items-center">
                                 <button type="submit" class="btn btn-success">Save & Publish</button>
                               </div>



                                @csrf
@php
    $sortedSections = collect($selectedSections)->sortBy(function ($position, $section) {
        return $position;
    });
@endphp

@foreach ($sortedSections as $section => $position)
    @if($section === 'breaducump')
        {{-- Breaducump Section --}}
      @include('admin.menu.page-builder.breaducump', ['breaducump' => json_decode($menu->breadcump_data, true) ?? []])
      
      @elseif ($section === 'contentsection')

      @php
    $contentSections = json_decode($menu->contentsection,true) ?? [];
@endphp

<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📘 Content Section</h5>
        <button type="button" class="btn btn-sm btn-light" onclick="addContentSection()">+ Add Section</button>
    </div>

    <div class="card-body" id="content-section-container">
        @foreach ($contentSections as $secIndex => $section)
            @include('admin.menu.page-builder.contentsection', ['index' => $secIndex, 'section' => $section])
        @endforeach
    </div>

    <template id="content-section-template">
    @include('admin.menu.page-builder.contentsection', ['index' => '__INDEX__', 'section' => null])
</template>

</div>

    @else
        {{-- Other Sections (You can expand this as needed) --}}
        <div class="section" style="border:1px dashed #999; padding:10px; margin-bottom:15px;">
            <strong>Section:</strong> {{ $section }} <br>
            <strong>Position:</strong> {{ $position }}
        </div>
    @endif
@endforeach

                            
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->


@section('scripts')

<script src="{{ url('js') }}/page-builder.js"></script>

<script>
        let contentSectionIndex = {{ count($contentSections) }};

    function addContentSection() {
        const container = document.getElementById('content-section-container');
        let template = document.getElementById('content-section-template').innerHTML;
        template = template.replace(/__INDEX__/g, contentSectionIndex);
        container.insertAdjacentHTML('beforeend', template);
        contentSectionIndex++;
    }

    function addListItem(sectionIndex) {
        const listContainer = document.getElementById(`list-container-${sectionIndex}`);
        const listItemIndex = listContainer.querySelectorAll('.list-group-item').length;

        const html = `
            <div class="input-group mb-2 list-group-item">
                <input type="text" name="contentsection[${sectionIndex}][lists][${listItemIndex}]" class="form-control" placeholder="List item">
                <button type="button" class="btn btn-danger" onclick="this.closest('.list-group-item').remove()">×</button>
            </div>`;
        listContainer.insertAdjacentHTML('beforeend', html);
    }
</script>
@endsection

@endsection
