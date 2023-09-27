let host = document.location;

let TableUrl = new URL('/admin/deliveryCompany', host.origin);
var table = $('#table_deliveryCompany').DataTable({
    processing: true,
    ajax: TableUrl,
    columns: [
        { data: "DT_RowIndex", name: "DT_RowIndex"},
        { data: "reference_id", name: "reference_id"},
        { data: "image", name: "image"},
        { data: "name", name: "name"},
        { data: "code", name: "code"},
        { data: "delivery_cost", name: "delivery_cost"},
        { data: "action", name: "action"},
    ]
});

//  view modal deliveryCompany
$(document).on('click', '#button_add_deliveryCompany', function (e) {
    e.preventDefault();
    $('#modal_add_deliveryCompany').modal('show');
});

let AddUrl = new URL('admin/deliveryCompany', host.origin);
// deliveryCompany admin
$(document).on('click', '#new_deliveryCompany_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_new_deliveryCompany')[0]);
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
                $('#modal_add_deliveryCompany').modal('hide');
                $('#form_new_deliveryCompany')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let EditUrl = new URL('admin/deliveryCompany', host.origin);
// view modification data
$(document).on('click', '#showModalEditDeliveryCompany', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_edit_deliveryCompany').modal('show');
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
                $('#reference_id').val(response.data.reference_id);
                $('#name').val(response.data.name);
                $('#code').val(response.data.code);
                $('#delivery_cost').val(response.data.delivery_cost);
            }
        }
    });
});

let UpdateUrl = new URL('admin/deliveryCompany', host.origin);
$(document).on('click', '#edit_deliveryCompany_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_edit_deliveryCompany')[0]);
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
                $('#modal_edit_deliveryCompany').modal('hide');
                $('#form_edit_deliveryCompany')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let DeleteUrl = new URL('admin/deliveryCompany', host.origin);
$(document).on('click', '#showModalDeleteDeliveryCompany', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_delete_deliveryCompany').modal('show');
    gg(id);
});
function gg(id) {
    $(document).off("click", "#deleteDeliveryCompany").on("click", "#deleteDeliveryCompany", function (e) {
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
                    $('#modal_delete_deliveryCompany').modal('hide');
                    table.ajax.reload(null, false);
                }
            }
        });
    });
}

let statusUrl = new URL('admin/status/deliveryCompany', host.origin);
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
$(document).on('click', '#refresh_table', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

