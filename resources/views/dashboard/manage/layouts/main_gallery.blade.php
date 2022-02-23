<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Galerry | DigiPark</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="http://digipark-admin.test/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://digipark-admin.test/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://digipark-admin.test/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="http://digipark-admin.test/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="http://digipark-admin.test/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="http://digipark-admin.test/src/plugins/fancybox/dist/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="http://digipark-admin.test/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<!-- fancybox Popup css -->
</head>
<body>
    @include('dashboard.layouts.sidebar')
	<div class="mobile-menu-overlay"></div>
	<div class="main-container" style="padding-top: 10px;">
		<div class="pd-ltr-15 xs-pd-20-10">
			<div class="min-height-200px">
				@include('dashboard.layouts.header')
                @yield('container')
			</div>

            @include('dashboard.layouts.footer')
		</div>
	</div>
    <script src="http://digipark-admin.test/vendors/scripts/core.js"></script>
	<script src="http://digipark-admin.test/vendors/scripts/script.min.js"></script>
	<script src="http://digipark-admin.test/vendors/scripts/process.js"></script>
	<script src="http://digipark-admin.test/vendors/scripts/layout-settings.js"></script>
	<!-- fancybox Popup Js -->
	<script src="http://digipark-admin.test/src/plugins/fancybox/dist/jquery.fancybox.js"></script>
</body>
</html>
