<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>{{ $setting['title'] ?? config('app.name') }}</title>
<meta content="{{ $setting['description'] }}" name="description">
<meta content="{{ $setting['keyword'] }}" name="keywords">

<!-- Favicons -->
<link href="{{ asset('landing/img/favicon.png') }}" rel="icon">
<link href="{{ asset('landing/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i"
    rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('landing/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('landing/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
<link href="{{ asset('landing/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('landing/vendor/venobox/venobox.css') }}" rel="stylesheet">
<link href="{{ asset('landing/vendor/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('landing/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">>
