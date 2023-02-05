@extends('backend.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
            <div class="card-title">User Data</div>
            <div>
                <button id="refresh-table" class="btn"><i class="bi bi-arrow-clockwise"></i></button>
                <button id="create" class="btn"><i class="bi bi-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-borderless table-responsive table-sm nowrap" id="table-users"
                   style="width: 100%">
                <thead>
                <tr>
                    <td>No</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('css')
<link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.css" rel="stylesheet"
      type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
@endpush

@push('js')
<script src="{{ asset('assets/extensions/jquery/jquery.js') }}"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
<script>
    let columns = [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ];

    var table = $('#table-users').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        lengthMenu: [[5, 15, 25, 100, -1], [5, 15, 25, 100, "All"]],
        pageLength: 15,
        ajax: {
            url: '{{url("/users")}}'
        },
        columns: columns
    });

    table.on('click', '.editUser', function () {
        let id = $(this).data("id");
        window.location.href = '/users/' + id + '/edit';
    });

    table.on('click', '.deleteUser', function () {
        let id = $(this).data("id");
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                type: "DELETE",
                url: '/users/' + id,
                success: function (data) {
                    table.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    $('#refresh-table').on('click', function () {
        table.ajax.reload();
    });

    $('#create').on('click', function () {
        window.location.href = '/users/create';
    });

</script>
@endpush
