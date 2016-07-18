{{--   <div class="container-fluid">
    <div class="row">
      {{ HTML::image('image/head.png') }}
    </div>
  </div> --}}
  <div class="container clerfix">
    <nav class="navbar navbar-default" role="navigation">
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
              <a href="/">首頁</a>
            </li>
            <li class={!! Route::current()->getUri() == 'post'? '"active"':'' !!}>
              <a href="post">公告列表</a>
            </li>
            <li class={!! Route::current()->getUri() == 'teacher'? '"active"':'' !!}>
              <a href="teacher">系所簡介</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">系所資源 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="{!! Route::current()->getUri() == 'forms'? 'active':'' !!}"><a href="forms" >表單下載</a></li>
                <li><a href="netres">網路資源</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">One more separated link</a></li>
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
