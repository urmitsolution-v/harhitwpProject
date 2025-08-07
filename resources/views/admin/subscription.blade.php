@extends('layout.admin')
@section('title', 'Contact Enquires - ')

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
        {{-- <script src="{{ url('admin') }}/assets/js/pages/datatables.init.js"></script> --}}
        <script>
            $(document).ready(function() {
                // Initialize DataTable
                $("#datatable").DataTable({
                    processing: true, // Show processing indicator
                    serverSide: true, // Enable server-side processing
                    ajax: {
                        url: "{{ route('subscription.admin') }}",
                        type: "GET", // HTTP method
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error); // Log error to the console
                            console.error("Response:", xhr.responseText); // Log server response
                        }
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // Row number
                        { data: 'email', name: 'email' }, // Category column
                        { data: 'created_at', name: 'created_at' }, // Category column
                        { data: 'action', name: 'action', orderable: false, searchable: false } // Action buttons
                    ],
                    pageLength: 10, // Number of records per page
                    ordering: false, // Disable ordering
                    drawCallback: function(settings) {
                        console.log("DataTable Draw Event Triggered", settings); // Log each draw event
                    }
                });

                // Add bootstrap styles to dropdown
                $(".dataTables_length select").addClass("form-select form-select-sm");
            });
            </script>



@endsection

  <!-- ============================================================== -->
  <div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Subscription</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Subscription</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100 table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Email</th>
                                        <th>Subscription Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>

</div>


@endsection
