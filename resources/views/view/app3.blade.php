<!DOCTYPE html>
<html>
<head>
  <title>Yuntech-TVE</title>
  	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="css/app.css">
    @yield('css')
 	<meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes" />
</head>
<body>
  <div id="app">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="brand-logo">
            </div>
          </div>
        </div>
      </div>
      @include('common._navbar')
			@include('common._navwrapper')
		<div class="container">
        <hr class="featurette-divider">
				@yield('content')

		</div>
	@yield('other')

  @include('common._footer')
	</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
@yield('js')
</body>
</html>
