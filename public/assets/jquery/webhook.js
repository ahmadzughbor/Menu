let host = document.location;

let TableUrl = new URL('/admin/webhook', host.origin);
var table = $('#table_webhook').DataTable({
    processing: true,
    ajax: TableUrl,
    columns: [
        { data: "DT_RowIndex", name: "DT_RowIndex"},
        { data: "reference_id", name: "reference_id"},
        { data: "client.name", name: "client.name"},
        { data: "target_url", name: "target_url"},
        { data: "event", name: "event"},
        { data: "subscriber", name: "subscriber"},
    ]
});
