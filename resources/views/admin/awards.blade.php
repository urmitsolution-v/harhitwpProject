@extends('layout.admin')
@section('title', 'About Us - ')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Awards</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Awards Details</h4>


                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                <form method="post" enctype="multipart/form-data" >
                                    @csrf


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="headline" class="form-label">Headline</label>
                                                <input type="text" class="form-control" name="headline" value="{{ $row->headline ?? "" }}" id="headline"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ $row->title ?? "" }}" id="title" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $row->phone ?? "" }}" id="phone" placeholder="">
                                            </div>
                                        </div>
                                    </div>


 <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="floating-label" for="description">List Content (Add More Images)</label>
                                            <div id="lists_content">
                                                @if(isset($row2->lists) && is_array(json_decode($row2->lists)))
                                                    @foreach (json_decode($row2->lists) as $key => $item)
                                                        <div class="listitem d-flex mb-2 align-items-center">
                                                            <input type="file" name="image_2[]" class="form-control">
                                                            <img src="{{ asset($item->image) }}" width="10%" class="img-thumbnail imageup" alt="Image">
                                                            
                                                            <!-- Remove button if not the first image -->
                                                            @if($key == 0)
                                                            <button type="button" class="btn btn-danger closebutton" onclick="removeImage(this, '{{ $item->image }}')" id="closebutton">
                                                                <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                    <path d="M5 11V13H19V11H5Z"></path>
                                                                </svg>
                                                            </button>
                                                               
                                                            @else
                                                                <button type="button" class="btn btn-danger closebutton" onclick="removeImage(this, '{{ $item->image }}')" id="closebutton">
                                                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M5 11V13H19V11H5Z"></path>
                                                                    </svg>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    
                                                    
                                                    
                                                                
                                                                
                                                                
                                                @else
                                                    <div class="listitem d-flex mb-2">
                                                        <input type="file" name="image_2[]" class="form-control">
                                                        <button type="button" class="btn btn-primary" id="appendmore">
                                                            <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            
                                             <button type="button" class="btn btn-primary mt-3" id="appendmore">
                                                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                                    </svg>
                                                                </button>
                                                                
                                                                
                                        </div>
                                    </div>

                                   
                                </div>
                                    <div class="row">
                                        
                                        

                                             


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                        </div>


                                    </div>
                            </div>

                            <div>
                            </div>




                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    </div>

@section('header')

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


@endsection
@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.editor').summernote({
                placeholder: '',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontSizes: ['8', '10', '12', '14', '16', '18', '20', '24', '28', '36', '48', '64', '82',
                    '150'
                ],
            });
        });
    </script>



<script>
    // Add more list items dynamically
    $('#appendmore').click(function(){
        var html = '<div class="listitem d-flex mt-2"><input type="file" name="image_2[]" class="form-control"><button type="button" class="btn btn-danger closebutton" id="closebutton"><svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M5 11V13H19V11H5Z"></path></svg></button></div>';
        $('#lists_content').append(html);
    });

    // Remove a list item dynamically
    $(document).on("click", "#closebutton", function() {
        $(this).parents('.listitem').remove();
    });

    // Preview the main image (favicon or primary image)
    function previewMainImage(event) {
        const previewContainer = document.getElementById('main-image-preview');
        previewContainer.innerHTML = '';  // Clear any existing preview
        const file = event.target.files[0];
        
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.width = 100;  // Set the preview image size
            img.classList.add('img-thumbnail');
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
    
    function removeImage(button, imagePath) {
    const parent = button.closest('.listitem');
    parent.remove();
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'remove_images[]';
    hiddenInput.value = imagePath;
    document.getElementById('lists_content').appendChild(hiddenInput);
}



</script>

@endsection

@endsection
