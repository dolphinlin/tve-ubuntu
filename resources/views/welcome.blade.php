@extends('view.app')

@section('css')
  <link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
    	<div class="col-lg-8 col-xs-12">

        <h3><i class="fa fa-newspaper-o" style="font-size:40px;color:#337ab7;"></i>  <strong>最新消息</strong></h3>
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
        <h3><i class="fa fa-film" style="font-size:40px;color:#337ab7;"></i>  關於我們</h3>
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
    	<div class="col-lg-8 col-xs-12 pull-right">

        <h3 class="text-right"><strong>近期活動</strong></h3>
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
                    <span class="label label-info">
                      @{{ filters[posts[p].filter - 1].subclass }}
                    </span>
                  </div>
                  <div class="col-lg-8 col-xs-5">@{{ posts[p].title | strLenPoc 7 }}</div>
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

      </div>
    </div>
@stop
@section('other')
  @include('common._modal')
@stop

@section('js')
  <script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
@endsection
