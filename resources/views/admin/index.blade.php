@extends('layouts.master')
@section('content')

<div class="m-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="javascript:void(0)" class="btn btn-primary  " id="createNewproduct"> add product</a>
            <!-- <h6 class="m-0 font-weight-bold text-primary">slider</h6> -->

        </div>
        <div class="container">
            <h1>Product Section</h1>
            <table class="table table-bordered table-striped data-table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Cover</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows go here -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="productForm" name="productForm" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">title en </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title_en" name="title_en" placeholder="Enter title_en" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">title ar</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">title hb</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title_hb" name="title_hb" placeholder="Enter title_hb" value="" maxlength="50" required="">
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">description en</label>
                            <div class="col-sm-12">

                                <textarea class="form-control" id="description_en" name="description_en" placeholder="Enter description_en"> </textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">description ar</label>
                            <div class="col-sm-12">

                                <textarea class="form-control" id="description" name="description" placeholder="Enter Name"> </textarea>
                            </div>
                        </div>
                        <br>
                       
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">description hb</label>
                            <div class="col-sm-12">

                                <textarea class="form-control" id="description_hb" name="description_hb" placeholder="Enter description_hb"> </textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">product cover</label>
                            <div class="col-sm-12">
                                <input type="file" id="cover" name="cover">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">product  en photos</label>
                            <div class="col-sm-12">
                                <input type="file" multiple id="photos" name="photos[]">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">product ar photos</label>
                            <div class="col-sm-12">
                                <input type="file" multiple id="photos_ar" name="photos_ar[]">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">product hb photos</label>
                            <div class="col-sm-12">
                                <input type="file" multiple id="photos_hb" name="photos_hb[]">
                            </div>
                        </div>

                        <br>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')


<script type="text/javascript">
    $(function() {

        /*------------------------------------------
         --------------------------------------------
         Pass Header Token
         --------------------------------------------
         --------------------------------------------*/
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*------------------------------------------
        --------------------------------------------
        Render DataTable
        --------------------------------------------
        --------------------------------------------*/
    });

    $(document).ready(function() {
        $('#createNewproduct').click(function() {
            $('#saveBtn').val("create-product");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Create New product");
            $("#productForm").attr('action', "{{ route('product.store') }}");

            $('#ajaxModel').modal('show');
        });

        $(document).on('click', '.editproduct', function() {
            var id = $(this).data('productid');
            var url = $(this).data('url');
            debugger;
            $.ajax({
                data: id,
                url: "{{ route('product.edit') }}" + '/' + id,
                type: "get",
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    debugger;
                    $('#title').val(data.title.ar);
                    $('#title_en').val(data.title.en);
                    $('#title_hb').val(data.title.hb);
                    $('#description').val(data.description.ar);
                    $('#description_en').val(data.description.en);
                    $('#description_hb').val(data.description.hb);

                    $("#productForm").attr('action', url);
                    $('#ajaxModel').modal('show');


                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $(document).on('click', '.deleteproduct', function() {

            var product_id = $(this).data("productid");
            Swal.fire({
                title: 'Are you sure about the deletion process?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'yes',
                denyButtonText: `no`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Saved!', '', 'success')

                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('product.delete') }}" + '/' + product_id,
                        success: function(data) {
                            table.draw();
                            toastr.success('تمت العملية بنجاح');

                        },
                        error: function(data) {
                            toastr.error('فشلت العملية');
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        });

        $('#saveBtn').click(function(e) {

            var form = $("#productForm")[0];
            e.preventDefault();
            var data = new FormData(form)
            var url = $("#productForm").attr('action');
            debugger;
            $.ajax({
                data: data,
                url: url,
                type: "POST",
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {

                    $('#ajaxModel').modal('hide');
                    toastr.success('تمت العملية بنجاح');

                    table.ajax.reload();
                },
                error: function(data) {
                    console.log('Error:', data);
                    toastr.error(data.responseJSON.message);

                    $('#saveBtn').html('Save Changes');
                }
            });
        });
    });
    getdata();

    var table = $('.data-table').DataTable();

    function getdata() {

        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false, // Disable search

            ajax: "{{ route('product.data') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'cover',
                    name: 'cover'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    }
</script>
@stop