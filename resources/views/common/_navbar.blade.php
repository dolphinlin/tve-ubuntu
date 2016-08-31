{{--   <div class="container-fluid">
    <div class="row">
      {{ HTML::image('image/head.png') }}
    </div>
  </div> --}}
  <div class="container clerfix">
    <nav class="navbar navbar-default" role="navigation" id="app2">
      <div class="container-fluid">
        <!-- Brand and oggle get grouped for better mobile display -->
        <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class={!! Route::current()->getUri() == '/' ? '"active"':'' !!}>
              <a href="/">{{trans('messages.nav1')}}</a>
            </li>
            <li class={!! Route::current()->getUri() == 'post'? '"active"':'' !!}>
              <a href="post">{{trans('messages.nav2')}}</a>
            </li>
            <li class={!! Route::current()->getUri() == 'regulation'? '"active"':'' !!}>
              <a href="regulation">{{trans('messages.nav6')}}</a>
            </li>
            <li class={!! Route::current()->getUri() == 'enroll'? '"active"':'' !!}>
              <a href="enroll">{{trans('messages.nav7')}}</a>
            </li>
            <li class={!! Route::current()->getUri() == 'teacher'? '"active"':'' !!}>
              <a href="teacher">{{trans('messages.nav5')}}</a>
            </li>
            <li class={!! Route::current()->getUri() == 'unit'? '"active"':'' !!}>
              <a href="unit">{{trans('messages.nav3')}}</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{trans('messages.nav4')}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="{!! Route::current()->getUri() == 'forms'? 'active':'' !!}"><a href="forms" >{{trans('messages.nav4-1')}}</a></li>
                <li><a href="netres">{{trans('messages.nav4-2')}}</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="paper">{{trans('messages.nav4-3')}}</a></li>
                <li><a href="album">{{trans('messages.nav4-4')}}</a></li>
                <li role="separator" class="divider"></li>
                <li><a :href="calendar.url">{{trans('messages.nav4-5')}}</a></li>
              </ul>
            </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
                <li>
                  <a href="logout">Logout</a>
                </li>
              @endif
            </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
