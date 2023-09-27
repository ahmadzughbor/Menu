let host = document.location;

let TableUrl = new URL('/admin/client', host.origin);
var table = $('#table_clients').DataTable({
    processing: true,
    ajax: TableUrl,
    columns: [
        { data: "DT_RowIndex", name: "DT_RowIndex"},
        { data: "serial_number", name: "serial_number"},
        { data: "user.user_name", name: "user.user_name"},
        { data: "name", name: "name"},
        { data: "email", name: "email"},
        { data: "mobile", name: "mobile"},
        { data: "code", name: "code"},
        { data: "store_name", name: "store_name"},
        { data: "status_name", name: "status_name"},
        { data: "action", name: "action"},
    ]
});

let EditUrl = new URL('admin/client', host.origin);
// view modification data
$(document).on('click', '#showModalEditClient', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_edit_client').modal('show');
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
                $('#serial_number').val(response.data.serial_number);
                $('#name').val(response.data.name);
                $('#email').val(response.data.email);
                $('#mobile').val(response.data.mobile);
                $('#code').val(response.data.code);
                $('#store_name').val(response.data.store_name);
            }
        }
    });
});

let UpdateUrl = new URL('admin/client', host.origin);
$(document).on('click', '#edit_client_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_edit_client')[0]);
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
                $('#modal_edit_client').modal('hide');
                $('#form_edit_client')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let DeleteUrl = new URL('admin/client', host.origin);
$(document).on('click', '#showModalDeleteClient', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_delete_client').modal('show');
    gg(id);
});
function gg(id) {
    $(document).off("click", "#deleteClient").on("click", "#deleteClient", function (e) {
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
                    $('#modal_delete_client').modal('hide');
                    table.ajax.reload(null, false);
                }
            }
        });
    });
}

//  view edit status
$(document).on('click', '#showModalEditStatus', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_edit_status').modal('show');
    console.log(id);
    changeStatus(id);
});

function changeStatus(iid){
    let statusUrl = new URL('admin/status/client', host.origin);
    $(document).on('click', '#status', function (e) {
        e.preventDefault();
        var id = iid;
        var status = $(this).data('status');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: statusUrl + '/' + id,
            data: {
                "status":status,
            },
            success: function (response) {
                if (response.status == 400) {
                    // errors
                    $("#alert_edite_error").removeAttr("hidden");
                    $('#text_edite_alert').html("");
                    $('#text_edite_alert').text(response.message);
                } else {
                    $("#alert_success").removeAttr("hidden");
                    $('#text_success').html("");
                    $('#text_success').text(response.message);
                    $('#modal_edit_status').modal('hide');
                    table.ajax.reload(null, false);
                }
            }
        });
    });
}

$(document).on('click', '#refresh_table', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

