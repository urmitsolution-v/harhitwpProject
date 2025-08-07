@extends('layout.admin')

@section('title', 'Home Image')


<style>
    .imageup{
        width: 100px;
    height: 100px;
    object-fit: contain;
    padding: 10px;
    border-radius: 10px;
    border: 2px solid #eee;
    margin: 8px;
    }
    .bannerimg {
        object-fit: cover;
        margin-top: 20px;
    }
</style>

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Home Image</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Home Image Details</h4>

                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-check-all me-2"></i>
                                    {{ Session::get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <form method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Image for Favicon or main image -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Main Image </label>
                                            <input type="file" class="form-control img-thumbnail" name="image" id="formrow-firstname-input" placeholder="Select main image" >
                                            <img src="{{ url($data ?? "") }}" class="bannerimg img-thumbnail" width="100" height="100" alt="Image"> 

                                           
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more images section -->
                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <div class="form-group">
                                            <label class="floating-label" for="description">List Content (Add More Images)</label>
                                            <div id="lists_content">
                                                @if(isset($row->lists) && is_array(json_decode($row->lists)))
                                                    @foreach (json_decode($row->lists) as $key => $item)
                                                        <div class="listitem d-flex mb-2 align-items-center">
                                                            <input type="file" name="image_2[]" class="form-control">
                                                            <img src="{{ asset($item->image) }}" width="10%" class="img-thumbnail imageup" alt="Image">
                                                            
                                                            <!-- Remove button if not the first image -->
                                                            @if($key == 0)
                                                            <button type="button" class="btn btn-danger closebutton" onclick="removeImage(this, '{{ $item->image }}')" id="closebutton">
                                                                <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                    <path d="M5 11V13H19V11H5Z"></path>
                                                                </svg>
                                                            
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
                                                
                                                
                                                   </button>
                                                                <button type="button" class="btn btn-primary" id="appendmore">
                                                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                                                    </svg>
                                                                </button>
                                                                
                                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@section('footer')
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
