@extends('view.app')

@section('css')
  <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
    	<div class="col-lg-8 col-xs-12">

        <h3><i class="fa fa-commenting-o" style="font-size:40px;color:#337ab7;"></i>  {{ trans('messages.title1') }}</h3>
        <hr class="smhr hr-left">
        <div class="thumbnail text-left">
            <div class="caption">
            {{-- <h3>Thumbnail label</h3> --}}
              <div class="container-fluid postEntry">
                <div class="col-lg-2 col-xs-4  text-left">
                  <strong>
                    分類
                  </strong>
                </div>
                <div class="col-lg-8 col-xs-5">
                  <strong>
                    標題
                  </strong>
                </div>
                <div class="col-lg-2 col-xs-3">
                  <strong>
                    日期
                  </strong>
                </div>
              </div>
              <a v-for="p in 5" href="/post/@{{ posts[p].id}}" class="ajax_modal" v-on:click="getPostContent('/post/' + posts[p].id, $event)" >
                <div class="container-fluid postEntry">
                  <div class="col-lg-2 col-xs-4">
                    <span class="label label-primary">
                      @{{ filters[posts[p].filter - 1].subclass }}
                    </span>
                  </div>
                  <div class="col-lg-8 col-xs-5">@{{ posts[p].title | strLenPoc 15 }}</div>
                  <div class="col-lg-2 col-xs-3">[@{{ posts[p].created_at | dateProcess 'date' }}]</div>
                </div>
              </a>
              <p></p>
              <div class="container-fluid">
                <p><a href="/post" class="btn btn-danger pull-right" role="button">More</a></p>
              </div>
            </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-12">
        <h3><i class="fa fa-film" style="font-size:40px;color:#337ab7;"></i>  {{ trans('messages.title2') }}</h3>
        <hr class="smhr hr-left">
        <video id="my-video" class="video-js" controls preload="auto" width="100%" height="270"
        poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
          <source src="MY_VIDEO.mp4" type='video/mp4'>
          <source src="MY_VIDEO.webm" type='video/webm'>
          <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a web browser that
            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
          </p>
        </video>

      </div>
    </div>
    <hr class="featurette-divider" >
    <div class="row">
    	<div class="col-lg-7 col-xs-12 pull-right">

        <h3 class="text-right"><i class="fa fa-bell-o" style="font-size:40px;color:#337ab7;"></i> {{ trans('messages.title3') }}</h3>
        <hr class="smhr hr-right">
        <div class="thumbnail text-left">
            <div class="caption">
            {{-- <h3>Thumbnail label</h3> --}}
              <div class="container-fluid postEntry">
                <div class="col-lg-2 col-xs-4  text-left">
                  <strong>
                    分類
                  </strong>
                </div>
                <div class="col-lg-7 col-xs-5">
                  <strong>
                    標題
                  </strong>
                </div>
                <div class="col-lg-3 col-xs-3">
                  <strong>
                    日期
                  </strong>
                </div>
              </div>
              <a v-for="p in 5" href="/post/@{{ posts[p].id}}" class="ajax_modal" v-on:click="getPostContent('/post/' + posts[p].id, $event)" >
                <div class="container-fluid postEntry">
                  <div class="col-lg-2 col-xs-4">
                    <span class="label label-info">
                      @{{ filters[posts[p].filter - 1].subclass }}
                    </span>
                  </div>
                  <div class="col-lg-7 col-xs-5">@{{ posts[p].title | strLenPoc 7 }}</div>
                  <div class="col-lg-3 col-xs-3">[@{{ posts[p].created_at | dateProcess 'date' }}]</div>
                </div>
              </a>
              <p></p>
              <div class="container-fluid">
                <p><a href="/post" class="btn btn-danger pull-right" role="button">More</a></p>
              </div>
            </div>
        </div>
      </div>
      <div class="col-lg-5 col-xs-12">
        <h3 class="text-right"><i class="fa fa-link" style="font-size:40px;color:#337ab7;"></i>  {{ trans('messages.title4') }}</h3>
        <hr class="smhr hr-right">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="http://www.tve.yuntech.edu.tw/tveadmin/submenu/pic/0319-%E6%88%90%E5%93%A1%E5%B0%88%E5%8D%80-0120120320030955.jpg" alt="Chania">
          </div>

          <div class="item">
            <img src="http://www.tve.yuntech.edu.tw/tveadmin/submenu/pic/00320150727053403.jpg" alt="Chania">
          </div>

          <div class="item">
            <img src="http://www.tve.yuntech.edu.tw/tveadmin/submenu/pic/0319-%E8%AC%9B%E5%BA%A7%E5%AD%B8%E7%BF%92%E7%B6%B2-0120120320031059.jpg" alt="Flower">
          </div>

          <div class="item">
            <img src="http://www.tve.yuntech.edu.tw/tveadmin/submenu/pic/0319-%E9%9B%B2%E5%A4%A7%E6%9D%8F%E5%A3%87-0120120320031131.jpg" alt="Flower">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>
    </div>
@stop
@section('other')
  @include('common._modal')
@stop

@section('js')
  <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
@endsection
