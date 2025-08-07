@extends('layout.admin')
@section('title', 'Countries')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Countries</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Countries</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Country Button -->
            <div class="row mb-3">
                <div class="col-12">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCountryModal">Add Country</button>
                </div>
            </div>

            <!-- Success Message -->
            @if(Session::has('success'))
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Country Table -->
            <div class="card">
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name(s)</th>
                                <th>Image(s)</th>
                                <th>Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countries as $country)
                            <tr>
                                <td>{{ ucfirst($country->type) }}</td>
                                <td>
                                        {{ $country->name }}
                                   
                                </td>
                                <td>
                                    @if($country->type === 'single')
                                        <img src="{{ asset($country->image) }}" width="60">
                                    @else
                                        @foreach(json_decode($country->images, true) as $img)
                                            <img src="{{ asset($img) }}" width="50" class="me-1 mb-1">
                                        @endforeach
                                    @endif
                                </td>
                                 <td>
                                        {{ $country->slug }}
                                   
                                </td>
                                <td>
                                    @if($country->status == 'Y')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.country.edit', $country->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.country.destroy', $country->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.country.cms', $country->id) }}" class="btn btn-success btn-sm">CMS</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Create Country Modal -->
<div class="modal fade" id="createCountryModal" tabindex="-1" aria-labelledby="createCountryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('admin.country.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add Country</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          
          <!-- Type -->
          <div class="mb-3">
            <label>Type</label>
            <select name="type" id="countryType" class="form-control" required>
              <option value="single">Single</option>
              <option value="group">Group</option>
            </select>
          </div>

          <!-- Single Country Fields -->
          <div id="singleCountryFields">
            <div class="mb-3">
              <label>Country Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
              <label>Country Image</label>
              <input type="file" name="image" class="form-control">
            </div>
          </div>

          <!-- Group Country Fields -->
          <div id="groupCountryFields" style="display: none;">
            <div class="mb-3">
              <label>Group Country Names (comma separated)</label>
              <input type="text" name="names" class="form-control">
            </div>
            <div class="mb-3">
              <label>Group Country Images</label>
              <div id="groupImages">
                <input type="file" name="images[]" class="form-control mb-2">
              </div>
              <button type="button" id="addMoreImages" class="btn btn-info btn-sm mt-2">+ Add More Images</button>
            </div>
          </div>

          <!-- Status -->
          <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="Y">Active</option>
              <option value="N">Inactive</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Country</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const typeSelect = document.getElementById('countryType');
    const singleFields = document.getElementById('singleCountryFields');
    const groupFields = document.getElementById('groupCountryFields');

    typeSelect.addEventListener('change', function () {
        if (this.value === 'group') {
            singleFields.style.display = 'none';
            groupFields.style.display = 'block';
        } else {
            singleFields.style.display = 'block';
            groupFields.style.display = 'none';
        }
    });

    document.getElementById('addMoreImages').addEventListener('click', function () {
        const input = document.createElement('input');
        input.type = 'file';
        input.name = 'images[]';
        input.className = 'form-control mb-2';
        document.getElementById('groupImages').appendChild(input);
    });
});
</script>
@endsection
