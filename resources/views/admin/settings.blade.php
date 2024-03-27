@extends('layouts.master')
@section('content')

<div class="m-5">
    <h1> settings  </h1>
    <form action="{{route('settings.store')}}" method="post" id="settingsForm" name="settingsForm" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row mt-4">
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
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Copyright">Copyright  ar</label>
                    <input type="text" value="@isset($settings) {{ $settings->getTranslation('Copyright', 'ar') }} @endisset " name="Copyright" class="form-control" id="Copyright" placeholder="Copyright">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Copyright_en">Copyright en</label>
                    <input type="text" value="@isset($settings)  {{ $settings->getTranslation('Copyright', 'en') }}  @endisset " name="Copyright_en" class="form-control" id="Copyright_en" placeholder="Copyright_en ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Copyright_hb">Copyright hb</label>
                    <input type="text" value="@isset($settings)  {{ $settings->getTranslation('Copyright', 'hb') }}  @endisset " name="Copyright_hb" class="form-control" id="Copyright_hb" placeholder="Copyright_hb ">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Mobile">Mobile  ar</label>
                    <input type="text" value="@isset($settings) {{ $settings->getTranslation('Mobile', 'ar') }} @endisset " name="Mobile" class="form-control" id="Mobile" placeholder="Mobile">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Mobile_en">Mobile en</label>
                    <input type="text" value="@isset($settings)  {{ $settings->getTranslation('Mobile', 'en') }}  @endisset " name="Mobile_en" class="form-control" id="Mobile_en" placeholder="Mobile_en ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Mobile_hb">Mobile hb</label>
                    <input type="text" value="@isset($settings)  {{ $settings->getTranslation('Mobile', 'hb') }}  @endisset " name="Mobile_hb" class="form-control" id="Mobile_hb" placeholder="Mobile_hb ">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="whatsapp_num">WhatsApp number ar</label>
                    <input type="text" value="@isset($settings) {{  $settings->getTranslation('whatsapp_num', 'ar') }} @endisset " name="whatsapp_num" class="form-control" id="whatsapp_num" placeholder="WhatsApp number ar">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="whatsapp_num_en">WhatsApp number en</label>
                    <input type="text" value="@isset($settings){{  $settings->getTranslation('whatsapp_num', 'en') }} @endisset " name="whatsapp_num_en" class="form-control" id="whatsapp_num_en" placeholder="WhatsApp number en ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="whatsapp_num_hb">WhatsApp number hb</label>
                    <input type="text" value="@isset($settings) {{  $settings->getTranslation('whatsapp_num', 'hb') }} @endisset " name="whatsapp_num_hb" class="form-control" id="whatsapp_num_hb" placeholder="WhatsApp number hb">
                </div>
            </div>
           
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="navigate_menu">navigate menu  ar</label>
                    <input type="text" value="@isset($settings) {{  $settings->getTranslation('navigate_menu', 'ar') }} @endisset " name="navigate_menu" class="form-control" id="navigate_menu" placeholder="navigate menu ar">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="navigate_menu_en">navigate menu en</label>
                    <input type="text" value="@isset($settings){{  $settings->getTranslation('navigate_menu', 'en') }} @endisset " name="navigate_menu_en" class="form-control" id="navigate_menu_en" placeholder="navigate menu en ">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="navigate_menu_hb">navigate menu hb</label>
                    <input type="text" value="@isset($settings) {{  $settings->getTranslation('navigate_menu', 'hb') }} @endisset " name="navigate_menu_hb" class="form-control" id="navigate_menu_hb" placeholder="navigate menu hb">
                </div>
            </div>
           
        </div>

        
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="facebook">facebook Link</label>
                    <input type="text" value="@isset($settings) {{ $settings->facebook }} @endisset " name="facebook" class="form-control" id="facebook" placeholder="facebook Link">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="instagram">Instagram Link</label>
                    <input type="text" value="@isset($settings) {{ $settings->instagram }} @endisset " name="instagram" class="form-control" id="instagram" placeholder="instagram Link">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tiktok">tiktok Link</label>
                    <input type="text" value="@isset($settings) {{ $settings->tiktok }} @endisset " name="tiktok" class="form-control" id="tiktok" placeholder="tiktok Link">
                </div>
            </div>
        </div>

        <div class="row mt-4">
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="Working_from">Working hours (Mon-Sat) </label>
                    <input type="text" value="@isset($settings) {{ $settings->Working_from }} @endisset " name="Working_from" class="form-control" id="Working_from" placeholder="Working_from ">
                </div>
            </div>
           
            <div class="col-md-3">
                <div class="form-group">
                    <label for="sunday_from">Sunday hours (Sunday) </label>
                    <input type="text" value="@isset($settings) {{ $settings->sunday_from }} @endisset " name="sunday_from" class="form-control" id="sunday_from" placeholder="sunday_from">
                </div>
            </div>
            
        </div>
        
        <div class="row mt-4">
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