let host = document.location;

let TableUrl = new URL('/admin/user', host.origin);
var table = $('#table_users').DataTable({
    processing: true,
    ajax: TableUrl,
    columns: [
        { data: "DT_RowIndex", name: "DT_RowIndex" },
        { data: "name", name: "name"},
        { data: "email", name: "email"},
        { data: "user_name", name: "user_name"},
        { data: "created_at", name: "created_at" },
        { data: "action", name: "action" },
    ]
});

//  view modal user
$(document).on('click', '#button_add_user', function (e) {
    e.preventDefault();
    $('#modal_add_user').modal('show');
});

let AddUrl = new URL('admin/user', host.origin);
// user admin
$(document).on('click', '#new_user_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_new_user')[0]);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: AddUrl,
        data: formdata,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status == false) {
                $("#alert_error").removeAttr("hidden");
                $('#text_alert').html("");
                $('#text_alert').text(response.message);
            } else {
                $("#alert_success").removeAttr("hidden");
                $('#text_success').html("");
                $('#text_success').text(response.message);
                $('#modal_add_user').modal('hide');
                $('#form_new_user')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let EditUrl = new URL('admin/user', host.origin);
// view modification data
$(document).on('click', '#showModalEditUser', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_edit_user').modal('show');
    $.ajax({
        type: 'GET',
        url: EditUrl + '/' + id + '/edit',
        data: "",
        success: function (response) {
            if (response.status == 404) {
                $("#alert_edite_error").removeAttr("hidden");
                $('#text_edite_alert').html("");
                $('#text_edite_alert').text(response.message);
            } else {
                $('#id').val(id);
                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#user_name').val(response.data.user_name);
            }
        }
    });
});

let UpdateUrl = new URL('admin/user', host.origin);
$(document).on('click', '#edit_user_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_edit_user')[0]);
    console.log(formdata);
    var id = $('#id').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: UpdateUrl + '/' + id,
        data: formdata,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status == false) {
                // errors
                $("#alert_edite_error").removeAttr("hidden");
                $('#text_edite_alert').html("");
                $('#text_edite_alert').text(response.message);
            } else {
                $("#alert_success").removeAttr("hidden");
                $('#text_success').html("");
                $('#text_success').text(response.message);
                $('#modal_edit_user').modal('hide');
                $('#form_edit_user')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let DeleteUrl = new URL('admin/user', host.origin);
$(document).on('click', '#showModalDeleteUser', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_delete_user').modal('show');
    gg(id);
});
function gg(id) {
    $(document).off("click", "#deleteUser").on("click", "#deleteUser", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: DeleteUrl + '/' + id,
            data: '',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == false) {
                    // errors
                    $('#list_error_message3').html("");
                    $('#list_error_message3').addClass("alert alert-danger");
                    $('#list_error_message3').text(response.message);
                } else {
                    $("#alert_success").removeAttr("hidden");
                    $('#text_success').html("");
                    $('#text_success').text(response.message);
                    $('#modal_delete_user').modal('hide');
                    table.ajax.reload(null, false);
                }
            }
        });
    });
}

let statusUrl = new URL('admin/status/user', host.origin);
$(document).on('click', '#status', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PUT',
        url: statusUrl + '/' + id,
        data: "",
        success: function (response) {
            if (response.status == 400) {
                // errors
                $('#list_error_message3').html("");
                $('#list_error_message3').addClass("alert alert-danger");
                $('#list_error_message3').text(response.message);
            } else {
                $('#error_message').html("");
                $('#error_message').addClass("alert alert-success");
                $('#error_message').text(response.message);
                table.ajax.reload(null, false);
            }
        }
    });
});
