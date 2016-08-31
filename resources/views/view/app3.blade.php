<!DOCTYPE html>
<html>
<head>
  <title>{{ trans('messages.welcome') }}</title>
  {{-- {{this is test the locale lang}} --}}
  	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="/css/app.css">
    @yield('css')
 	<meta id="token" name="token" value="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes" />
</head>
<body>
  <div id="app">
    <div class="container">
      <div class="row col-lg-12">
        <p></p>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="brand-logo">
          </div>
        </div>
        <div class="col-lg-8 text-right clearfix">
          <div id="link" style="padding-top:45px">
            <a href="/">{{trans('messages.link1')}}</a>
            |
            <a href="#">{{trans('messages.link2')}}</a>
            |
            @if( LaravelLocalization::getCurrentLocale() == 'tw' )
              <a href="/en" target="_self">{{trans('messages.link3')}}</a>
            @else
              <a href="/" target="_self">{{trans('messages.link3')}}</a>
            @endif
            |
            <a href="https://www.yuntech.edu.tw/" target="_blank">{{trans('messages.link4')}}</a>
            |
            <a href="http://www.tec.yuntech.edu.tw/" target="_blank">{{trans('messages.link5')}}</a>
            |
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
<script src="//cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/page.js"></script>
@yield('js')
</body>
</html>
