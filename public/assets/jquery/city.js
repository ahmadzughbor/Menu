let host = document.location;

let TableUrl = new URL('/admin/city', host.origin);
var table = $('#table_city').DataTable({
    processing: true,
    ajax: TableUrl,
    columns: [
        { data: "DT_RowIndex", name: "DT_RowIndex"},
        { data: "reference_id", name: "reference_id"},
        { data: "ar_name", name: "ar_name"},
        { data: "en_name", name: "en_name"},
        { data: "country.name", name: "country.name"},
        { data: "action", name: "action"},
    ]
});

//  view modal city
$(document).on('click', '#button_add_city', function (e) {
    e.preventDefault();
    $('#modal_add_city').modal('show');
});

let AddUrl = new URL('admin/city', host.origin);
// city admin
$(document).on('click', '#new_city_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_new_city')[0]);
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
                $('#modal_add_city').modal('hide');
                $('#form_new_city')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let EditUrl = new URL('admin/city', host.origin);
// view modification data
$(document).on('click', '#showModalEditCity', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_edit_city').modal('show');
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
                $('#ar_name').val(response.data.ar_name);
                $('#en_name').val(response.data.en_name);
                $("#country_id option[value='" + response.data.country_id + "']").prop("selected", true);
            }
        }
    });
});

let UpdateUrl = new URL('admin/city', host.origin);
$(document).on('click', '#edit_city_submit', function (e) {
    e.preventDefault();
    let formdata = new FormData($('#form_edit_city')[0]);
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
                $('#modal_edit_city').modal('hide');
                $('#form_edit_city')[0].reset();
                table.ajax.reload(null, false);
            }
        }
    });
});

let DeleteUrl = new URL('admin/city', host.origin);
$(document).on('click', '#showModalDeleteCity', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#modal_delete_city').modal('show');
    gg(id);
});
function gg(id) {
    $(document).off("click", "#deleteCity").on("click", "#deleteCity", function (e) {
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
                    $('#modal_delete_city').modal('hide');
                    table.ajax.reload(null, false);
                }
            }
        });
    });
}

let statusUrl = new URL('admin/status/city', host.origin);
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

