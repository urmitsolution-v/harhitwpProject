@extends('layout.admin')
@section('title', 'Categories - ')

@section('content')

@section('header')
        <!-- DataTables -->
        <link href="{{ url('admin') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('admin') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('footer')

        <!-- Required datatable js -->
        <script src="{{ url('admin') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/jszip/jszip.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

        <!-- Responsive examples -->
        <script src="{{ url('admin') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ url('admin') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="{{ url('admin') }}/assets/js/pages/datatables.init.js"></script>

@endsection

  <!-- ============================================================== -->
  <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

        @php
            $type = isset($_GET['type']) ? $_GET['type'] : '';
$type = str_replace('_', ' ', $type);
$type = ucwords($type); // Capitalize the first letter of each word

        @endphp

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{$type}} Categories</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">{{$type}} Categories</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">

                <div class="col-12">
                    <div class="mb-3">
                        <a href="/admin/new-categories?type={{ $_GET['type'] }}" class="btn btn-primary">New Category</a>
                    </div>
                </div>

                @if(Session::has('success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif


                <div class="col-12">
                    <div class="card">




                        <div class="card-body">
                            <table id="datatable-buttons" class="table table-striped table-centered table-hover">
                                <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        @if($value->status == "Y")
                                            <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inctive</span>
                                        @endif
                                    </td>
                                    <td>

                                        <a href="/admin/edit-category/{{ $value->id }}?type={{ $_GET['type'] }}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        @if(isset($value->image))
                                            @php
                                                $image = $value->image;
                                            @endphp
                                        @else
                                        @php
                                        $image = "no_image";
                                    @endphp
                                        @endif

                                        <a onclick="return confirm('Are You Sure ! Delete This.')" href="{{ route('deleterownew',['table' => 'category','id' => $value->id,'image' => $image]) }}" class="btn btn-danger btn-sm">
                                            Delete
                                        </a>


                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

</div>
@endsection
