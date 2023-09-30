@extends('layouts.master')
@section('content')

<div class="m-5">
    <h1> settings : الاعدادت </h1>
    <form action="{{route('settings.store')}}" method="post" id="settingsForm" name="settingsForm" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Address">Address  ar</label>
                    <input type="text" value="@isset($settings) {{ $settings->getTranslation('Address', 'ar') }} @endisset " name="Address" class="form-control" id="Address" placeholder="Address">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Address_en">Address en</label>
                    <input type="text" value="@isset($settings)  {{ $settings->getTranslation('Address', 'en') }}  @endisset " name="Address_en" class="form-control" id="Address_en" placeholder="Address_en ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Address_hb">Address hb</label>
                    <input type="text" value="@isset($settings)  {{ $settings->getTranslation('Address', 'hb') }}  @endisset " name="Address_hb" class="form-control" id="Address_hb" placeholder="Address_hb ">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="whatsapp_num">WhatsApp number</label>
                    <input type="text" value="@isset($settings) {{ $settings->whatsapp_num }} @endisset " name="whatsapp_num" class="form-control" id="whatsapp_num" placeholder="WhatsApp number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Mobile">mobile number</label>
                    <input type="text" value="@isset($settings) {{ $settings->Mobile }} @endisset " name="Mobile" class="form-control" id="Mobile" placeholder="Mobile number">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="facebook">facebook Link</label>
                    <input type="text" value="@isset($settings) {{ $settings->facebook }} @endisset " name="facebook" class="form-control" id="facebook" placeholder="facebook Link">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instagram">Instagram Link</label>
                    <input type="text" value="@isset($settings) {{ $settings->instagram }} @endisset " name="instagram" class="form-control" id="instagram" placeholder="instagram Link">
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="app_logo">app logo</label>

                    <input type="file" name="app_logo" class="form-control" id="app_logo" placeholder="app_logo">
                </div>
            </div>
          
        </div>
        @if($settings)
            @if($settings->app_logo)
            <img src="{{asset('storage/images/' . $settings->app_logo)}}" alt="" width="60" height="60">
            @endif
            @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="background_image">site background image</label>

                    <input type="file" name="background_image" class="form-control" id="background_image" placeholder="background_image">
                </div>
            </div>
            
        </div>
        @if($settings)
            @if($settings->background_image)
            <img src="{{asset('storage/images/' . $settings->background_image)}}" alt="" width="80px" height="80px">
            @endif
            @endif

        <div class="col-md-12">
            <button id="saveBtn" class="btn btn-primary mt-3">Save</button>
        </div>
    </form>
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

    $(document).on('click', '#saveBtn', function(e) {
        e.preventDefault();

        var form = $("#settingsForm")[0];
        var data = new FormData(form)
        var url = $("#settingsForm").attr('action');
        $.ajax({
            data: data,
            url: url,
            type: "POST",
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#whatsappLink').val(data.whatsappLink);
                $('#instagramLink').val(data.instagramLink);
                $('#facebookLink').val(data.facebookLink);
                $('#twitterLink').val(data.whatsappLink);
                $('#tiktokLink').val(data.tiktokLink);
                $('#snapchatLink').val(data.snapchatLink);

                toastr.success('done');


            },
            error: function(data) {
                toastr.error(data.responseJSON.message);

            }
        });
    });
</script>
@stop