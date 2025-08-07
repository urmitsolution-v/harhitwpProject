@extends('layout.admin')
@section('title', 'Partners - ')
@section('content')
  <div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            
            @if(isset(request()->type) && request()->type == "investment")
            @php
                $title = "Our Grantees";
            @endphp
            
            @else
            @php
                $title = "Partners";
            @endphp

            @endif
            
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title ?? "" }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">{{ $title ?? "" }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- all errors / --}}
        

            <div class="row">

                <div class="col-12">
                    <div class="mb-3">
                        <a href="/admin/new-partner?type={{request()->type}}" class="btn btn-primary">New</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-striped table-centered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset('uploads/'.$item->image) }}" alt="{{ $item->name }}" width="50"></td>
                                            <td>
                                                @if($item->status == 'Y')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/admin/edit-partner/{{ $item->id }}?type={{request()->type}}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="/admin/delete/partners/{{ $item->id }}/{{ $item->image }}"  style="display:inline;">
                                                    @csrf
                                                   
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h5 class="font-size-16">Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }} entries</h5>
                                    </div>
                                    <div>
                                        {{ $data->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

</div>
@endsection
