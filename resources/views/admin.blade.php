<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" href="<%= BASE_URL %>favicon.ico"> -->

    <title>Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('admin/css/main.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/iconfont.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/material-icons/material-icons.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/vuesax.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/prism-tomorrow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('admin/css/app.css')) }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/logo/favicon.png') }}">
</head>

<body>
    <noscript>
        <strong>
            We're sorry but Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template doesn't work properly without
            JavaScript enabled. Please enable it to continue.
        </strong>
    </noscript>

    <div id="app">
    </div>

    <!-- <script src="admin/js/app.js"></script> -->
    <script src="{{ asset(mix('admin/js/app.js')) }}"></script>
</body>

</html>
