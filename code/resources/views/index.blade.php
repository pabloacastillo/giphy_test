<!DOCTYPE html>
<html>
<head>
	<title>{{ env('APP_NAME') }}</title>
	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

	<div id="app"></div>

	<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>