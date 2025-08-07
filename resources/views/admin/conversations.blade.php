@extends('layout.admin')
@section('title', 'Conversation Enquiries')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Conversation Enquiries</h4>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                       <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped w-100">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="conversationTable">
                                    <tr><td colspan="5" class="text-center">Loading...</td></tr>
                                </tbody>
                            </table>
                            <div id="paginationLinks" class="mt-3 d-flex justify-content-end"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Contact Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="contactModalBody">
        <div class="text-center text-muted">Loading...</div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetchConversations();
    });

    function fetchConversations(page = 1) {
        fetch(`/admin/fetch-conversations?page=${page}`)
        .then(res => {
            if (!res.ok) throw new Error("Network error");
            return res.json();
        })
        .then(data => {
            let html = '';
            if (data.data.length === 0) {
                html = `<tr><td colspan="5" class="text-center">No data found</td></tr>`;
            } else {
                data.data.forEach((conv, i) => {
                    html += `
                        <tr>
                            <td>${i + 1}</td>
                            <td>${conv.first_name} ${conv.last_name}</td>
                            <td>${conv.email}</td>
                            <td>${new Date(conv.created_at).toLocaleString()}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    onclick="viewContact('${conv.first_name} ${conv.last_name}', '${conv.email}', \`${conv.message}\`, '${conv.organization ?? 'N/A'}', '${new Date(conv.created_at).toLocaleString()}')">View</button>
                            </td>
                        </tr>`;
                });
            }
            document.getElementById('conversationTable').innerHTML = html;
            document.getElementById('paginationLinks').innerHTML = data.pagination;
            bindPagination();
        })
        .catch(err => {
            console.error(err);
            document.getElementById('conversationTable').innerHTML = `<tr><td colspan="5" class="text-danger text-center">Failed to load data.</td></tr>`;
        });
    }

    function bindPagination() {
        document.querySelectorAll('#paginationLinks a').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const page = new URL(this.href).searchParams.get('page');
                fetchConversations(page);
            });
        });
    }

    function viewContact(name, email, message, organization, createdAt) {
        document.getElementById('contactModalBody').innerHTML = `
            <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> ${name}</li>
                <li class="list-group-item"><strong>Email:</strong> ${email}</li>
                <li class="list-group-item"><strong>Organization:</strong> ${organization}</li>
                <li class="list-group-item"><strong>Message:</strong><br>${message}</li>
                <li class="list-group-item"><strong>Created At:</strong> ${createdAt}</li>
            </ul>
        `;
    }
</script>
@endsection
