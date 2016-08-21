<!DOCTYPE html>
<html>
<head>
  <title>Manager Sys</title>
  	<link href="/css/app.css" rel="stylesheet">

    <link href="/js/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 	<link href="/css/sb-admin-2.css" rel="stylesheet">

  <meta id="token" name="token" value="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes" />
</head>
<body>
	<div id="app">
		<div class="wrapper">
			@include('common._navbar2')
			@yield('content')
		</div>
		@yield('other')
	</div>


  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
  <script src="//cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
    @yield('bottom')
</body>
</html>
