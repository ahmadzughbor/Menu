let host = document.location;

let TableUrl = new URL('/admin/order', host.origin);
var table = $('#table_orders').DataTable({
    processing: true,
    ordering: false,
    ajax: {
        url: TableUrl,
        data: function (d) {
            d.all = $('#all').val()
            d.order_status = $('#order_status').val()
            d.order_payment_status = $('#order_payment_status').val()
            d.form = $('#form').val()
            d.to = $('#to').val()
        },
    },
    columns: [
        {data: "checkbox" ,name: "checkbox" ,orderable: false},
        {data: "reference_number",name: "reference_number"},
        {data: "client.name",name: "client.name"},
        {data: "created_at_actually",name: "created_at_actually"},
        {data: "delivery.name",name: "delivery.name"},
        {data: "payment_method.name",name: "payment_method.name"},
        {data: "customer_notes",name: "customer_notes"},
        {data: "status_name",name: "status_name"},
        {data: "pay_status",name: "pay_status"},
        {data: "total",name: "total"},
        {data: "action", name: "action"},
    ],
    order: []
});

$(document).ready(function() {
    $(".check_orders").click(function() {
        if ($(this).is(":checked")) {
            $(".check_order").prop("checked", true);
        } else {
            $(".check_order").prop("checked", false);
        }
    });
});

let UpdateStatusUrl = new URL('admin/order/status', host.origin);
$(document).on('change', '#status', function (e) {
    e.preventDefault();
    var id =  $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: UpdateStatusUrl + '/' + id,
        data:{
            "status": $(this).val() + ""
        },
        success: function (response) {
            $("#alert_success").removeAttr("hidden");
            $('#text_success').html("");
            $('#text_success').text(response.message);
            table.ajax.reload(null, false);
        }
    });
});

let UpdatePaymentStatusUrl = new URL('admin/order/payment/status', host.origin);
$(document).on('change', '#is_paid', function (e) {
    e.preventDefault();
    var id =  $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: UpdatePaymentStatusUrl + '/' + id,
        data:{
            "is_paid": $(this).val() + ""
        },
        success: function (response) {
            $("#alert_success").removeAttr("hidden");
            $('#text_success').html("");
            $('#text_success').text(response.message);
            table.ajax.reload(null, false);
        }
    });
});

$(document).on('click', '#refresh_table', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

$(document).on('change', '#all', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

$(document).on('change', '#order_status', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

$(document).on('change', '#order_payment_status', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

$(document).on('change', '#form', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

$(document).on('change', '#to', function (e) {
    e.preventDefault();
    table.ajax.reload(null, false);
});

let ShowOrderUrl = new URL('admin/order', host.origin);
$(document).on('click', '#show_order', function (e) {
    e.preventDefault();
    var id =  $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: ShowOrderUrl + '/' + id + "?type=ajax",
        success: function (response) {
            $("#cancel_order").attr("data-id" , response.data.id);
            $("#totalProducts").text("Value of products: " + response.data.total_cost);
            $("#delivery").text("Delivery: " + response.data.delivery.delivery_cost);
            $("#total_cost_with_currency").text("Total summation: " + response.data.total_cost_with_currency);
            $("#client_name").text("Name: " + response.data.client.name);
            $("#client_phone").text("Phone: " + response.data.client.mobile);
            $("#client_location").text("Location: " + response.data.country.name + " " + response.data.city.ar_name);
            if(response.data.is_paid == 1){
                $("#client_payment_status").text("Payment status: Paid");
            }else{
                $("#client_payment_status").text("Payment status: Unpaid");
            }
            const boxes = document.querySelectorAll('.product');
            boxes.forEach(box => {
                box.remove();
            });
            const divBoxes = document.getElementById("products");
            for (var i = 0; i < response.data.products.length; i++) {
                let html =` <div class="d-flex align-items-sm-center mb-7 product">
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <div class="flex-grow-1 me-2 row">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Name: ${response.data.products[i].product.name}</a>
                                        <span class="text-muted fw-bold d-block fs-7">Sku: ${response.data.products[i].product.sku}</span>
                                    </div>
                                    <span class="badge badge-success fw-bolder my-2">Quantity: ${response.data.products[i].quantity}</span>
                                    <span class="badge badge-info fw-bolder my-2" style="margin: 5px;">Price: ${response.data.products[i].unit_price} SAR</span>
                                    <span class="badge badge-dark fw-bolder my-2">Total: ${response.data.products[i].unit_price * response.data.products[i].quantity} SAR</span>
                                </div>
                            </div>`;
                divBoxes.insertAdjacentHTML("afterbegin", html);
            }
            $('#modal_show_order').modal('show');
        }
    });
});

$(document).on('click', '#close_model', function (e) {
    e.preventDefault();
    $('#modal_show_order').modal('hide');
});

$(document).on('click', '#cancel_order', function (e) {
    e.preventDefault();
    var id =  $(this).data("id");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        url: UpdateStatusUrl + '/' + id,
        data:{
            "status": "canceled"
        },
        success: function (response) {
            $("#alert_success").removeAttr("hidden");
            $('#text_success').html("");
            $('#text_success').text(response.message);
            table.ajax.reload(null, false);
        }
    });
    $('#modal_show_order').modal('hide');
});



