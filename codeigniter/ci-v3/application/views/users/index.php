<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <!-- Bootstrap CSS for buttons, layout, and popup modal. -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <!-- DataTables CSS with Bootstrap 5 styling. -->
    <link
        href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css"
        rel="stylesheet"
    >
    <style>
        /* Highlight the selected table row. */
        #usersTable tbody tr.selected-row > * {
            background-color: #dbeafe !important;
        }
        /* Make table rows look clickable. */
        #usersTable tbody tr {
            cursor: pointer;
        }
        /* Keep action buttons together. */
        .action-buttons {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container-fluid mt-4 px-4">
    <h2 class="mb-4">User Management</h2>
    <!-- Show success and error messages. -->
    <div id="messageBox" class="alert d-none" role="alert"></div>
    <!-- Action buttons for the selected user. -->
    <div class="action-buttons">
        <button type="button" id="newUserBtn" class="btn btn-primary">
            New
        </button>
        <button type="button" id="editUserBtn" class="btn btn-warning" disabled>
            Edit
        </button>
        <button type="button" id="deleteUserBtn" class="btn btn-danger" disabled>
            Delete
        </button>
    </div>
    <!-- DataTables will add its default search, sorting, and pagination controls. -->
    <table id="usersTable" class="table table-striped table-bordered w-100">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <!-- DataTables loads the user records using Ajax. -->
        </tbody>
    </table>
</div>
<!-- Create/Edit user popup modal. -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="userForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalTitle">New User</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <!-- Store the selected user ID when editing. -->
                    <input type="hidden" id="user_id" name="user_id">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name *</label>
                        <input
                            type="text"
                            class="form-control"
                            id="first_name"
                            name="first_name"
                            maxlength="100"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name *</label>
                        <input
                            type="text"
                            class="form-control"
                            id="last_name"
                            name="last_name"
                            maxlength="100"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            maxlength="255"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="mobile_number" class="form-label">Mobile Number</label>
                        <input
                            type="text"
                            class="form-control"
                            id="mobile_number"
                            name="mobile_number"
                            maxlength="20"
                        >
                    </div>
                    <!-- Display validation errors from the server. -->
                    <div id="formError" class="alert alert-danger d-none"></div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>
                    <button type="submit" id="saveUserBtn" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Load jQuery for Ajax requests and event handling. -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Load Bootstrap JavaScript for the popup modal. -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Load DataTables JavaScript. -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<!-- Load DataTables Bootstrap integration. -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    // Define URLs generated by CodeIgniter.
    const listUrl = <?= json_encode(site_url('UserController/ajax_list')); ?>;
    const createUrl = <?= json_encode(site_url('UserController/create')); ?>;
    const updateUrl = <?= json_encode(site_url('UserController/update')); ?>;
    const deleteUrl = <?= json_encode(site_url('UserController/delete')); ?>;
    // Get CSRF information in case CSRF protection is enabled in CodeIgniter.
    const csrfName = <?= json_encode($this->security->get_csrf_token_name()); ?>;
    let csrfHash = <?= json_encode($this->security->get_csrf_hash()); ?>;
    const csrfEnabled = <?= $this->config->item('csrf_protection') ? 'true' : 'false'; ?>;
    // Keep track of the currently selected user.
    let selectedUser = null;
    // Initialize the Bootstrap modal.
    const userModal = new bootstrap.Modal(document.getElementById('userModal'));
    // Initialize DataTables with client-side searching, sorting, and pagination.
    const table = new DataTable('#usersTable', {
        ajax: {
            url: listUrl,
            type: 'GET',
            dataSrc: 'data'
        },
        columns: [
            { data: 'id' },
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'email' },
            {
                data: 'mobile_number',
                render: function (data, type) {
                    // Return plain text for display, search, and sorting.
                    return data || '';
                }
            },
            { data: 'created_at' }
        ],
        // Show the newest user IDs first.
        order: [[0, 'desc']],
        // Display 10 records per page by default.
        pageLength: 10,
        // Allow users to change the page length.
        lengthMenu: [5, 10, 25, 50, 100],
        // Configure the default empty-table message.
        language: {
            emptyTable: 'No users found.'
        }
    });
    // Display a message above the table.
    function showMessage(message, type) {
        $('#messageBox')
            .removeClass('d-none alert-success alert-danger alert-warning')
            .addClass('alert-' + type)
            .text(message);
    }
    // Clear the selected row and disable Edit/Delete buttons.
    function clearSelection() {
        selectedUser = null;
        $('#usersTable tbody tr').removeClass('selected-row');
        $('#editUserBtn, #deleteUserBtn').prop('disabled', true);
    }
    // Update the CSRF hash when CodeIgniter returns a new one.
    function updateCsrfHash(response) {
        if (response && response.csrfHash) {
            csrfHash = response.csrfHash;
        }
    }
    // Add the CSRF token to write requests when protection is enabled.
    function addCsrfToken(data) {
        if (csrfEnabled) {
            data[csrfName] = csrfHash;
        }
        return data;
    }
    // Display the New User popup.
    $('#newUserBtn').on('click', function () {
        $('#userForm')[0].reset();
        $('#user_id').val('');
        $('#userModalTitle').text('New User');
        $('#saveUserBtn').text('Save');
        $('#formError').addClass('d-none').text('');
        userModal.show();
    });
    // Select a user by clicking a table row.
    $('#usersTable tbody').on('click', 'tr', function () {
        const rowData = table.row(this).data();
        // Ignore clicks on an empty-table placeholder row.
        if (!rowData) {
            return;
        }
        // Clicking the selected row again deselects it.
        if (selectedUser && String(selectedUser.id) === String(rowData.id)) {
            clearSelection();
            return;
        }
        // Remove the previous selection.
        $('#usersTable tbody tr').removeClass('selected-row');
        // Highlight the newly selected row.
        $(this).addClass('selected-row');
        // Save the selected user's data.
        selectedUser = rowData;
        // Enable Edit and Delete.
        $('#editUserBtn, #deleteUserBtn').prop('disabled', false);
    });
    // Open the Edit User popup with the selected user's data.
    $('#editUserBtn').on('click', function () {
        if (!selectedUser) {
            return;
        }
        $('#userForm')[0].reset();
        $('#user_id').val(selectedUser.id);
        $('#first_name').val(selectedUser.first_name);
        $('#last_name').val(selectedUser.last_name);
        $('#email').val(selectedUser.email);
        $('#mobile_number').val(selectedUser.mobile_number || '');
        $('#userModalTitle').text('Edit User');
        $('#saveUserBtn').text('Update');
        $('#formError').addClass('d-none').text('');
        userModal.show();
    });
    // Save a new user or update the selected user.
    $('#userForm').on('submit', function (event) {
        event.preventDefault();
        const userId = $('#user_id').val();
        // Choose the correct endpoint for create or update.
        const url = userId
            ? updateUrl + '/' + encodeURIComponent(userId)
            : createUrl;
        // Collect form values.
        const data = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            mobile_number: $('#mobile_number').val()
        };
        // Include the CSRF token when enabled.
        addCsrfToken(data);
        // Prevent duplicate submissions while the request is running.
        $('#saveUserBtn').prop('disabled', true);
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {
                updateCsrfHash(response);
                if (!response.success) {
                    $('#formError')
                        .removeClass('d-none')
                        .text(response.message || 'Please check the submitted information.');
                    return;
                }
                userModal.hide();
                clearSelection();
                // Refresh the records without resetting the current page.
                table.ajax.reload(null, false);
                showMessage(response.message, 'success');
            },
            error: function (xhr) {
                // Update the token if a JSON error response includes a new hash.
                if (xhr.responseJSON) {
                    updateCsrfHash(xhr.responseJSON);
                }
                const message = xhr.responseJSON && xhr.responseJSON.message
                    ? xhr.responseJSON.message
                    : 'The request failed. Check the browser console and server logs.';
                $('#formError')
                    .removeClass('d-none')
                    .text(message);
            },
            complete: function () {
                $('#saveUserBtn').prop('disabled', false);
            }
        });
    });
    // Soft-delete the selected user after confirmation.
    $('#deleteUserBtn').on('click', function () {
        if (!selectedUser) {
            return;
        }
        const confirmed = confirm(
            'Are you sure you want to delete ' +
            selectedUser.first_name + ' ' + selectedUser.last_name + '?'
        );
        if (!confirmed) {
            return;
        }
        // Include the CSRF token when enabled.
        const data = addCsrfToken({});
        $('#deleteUserBtn').prop('disabled', true);
        $.ajax({
            url: deleteUrl + '/' + encodeURIComponent(selectedUser.id),
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {
                updateCsrfHash(response);
                if (!response.success) {
                    showMessage(response.message || 'Unable to delete the user.', 'danger');
                    $('#deleteUserBtn').prop('disabled', false);
                    return;
                }
                clearSelection();
                // Refresh the table after deletion.
                table.ajax.reload(null, false);
                showMessage(response.message, 'success');
            },
            error: function (xhr) {
                if (xhr.responseJSON) {
                    updateCsrfHash(xhr.responseJSON);
                }
                const message = xhr.responseJSON && xhr.responseJSON.message
                    ? xhr.responseJSON.message
                    : 'Unable to delete the user. Check the browser console and server logs.';
                showMessage(message, 'danger');
                $('#deleteUserBtn').prop('disabled', false);
            }
        });
    });
    // Clear selection when DataTables redraws the table.
    table.on('draw', function () {
        clearSelection();
    });
</script>
</body>
</html>