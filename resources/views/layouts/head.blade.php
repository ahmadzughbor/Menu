<meta charset="UTF-8">
<title> @yield('title', env('APP_NAME')) </title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset("assets/media/logos/favicon.ico") }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<link href="{{ asset("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("assets/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>


@yield('css')

