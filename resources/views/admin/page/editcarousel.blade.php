@extends('view.app2')

@section('content')
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">首頁廣告 - 編輯 - {{$carouselData->title}}</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div>

      <!-- /.row -->
      <div class="row">
          <div class="col-lg-12">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <i class="fa fa-list-alt fa-fw"></i>廣告
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
          					{!! FORM::open(array('url' => '/api/pageinfo/carousel/' . $carouselData->id, 'method' => 'put')) !!}
                      <label for="url">連結（圖片大小 1200*316）</label>
                      <fieldset class="form-group">
                          <a id="lfm" data-input="urlInput" data-preview="holder" style="float: right" class="btn btn-primary">
                            <i class="fa fa-file-o"></i> 瀏覽伺服器
                          </a>
                          <div style="overflow: hidden; padding-right: .5em;">
                             <input class="form-control" id="urlInput" style="width: 100%;" name="url" type="text" value="{{$carouselData->url}}" required>
                          </div>​
                      </fieldset>

                      <fieldset class="form-froup">
                        {{ FORM::label('title', '標題') }}
          							{{ FORM::text('title', $carouselData->title, array('class' => 'form-control')) }}
          						</fieldset>

                      <p></p>
          						<fieldset class="form-froup">
          							{{ FORM::submit('送出', array('class' => 'form-control btn btn-primary')) }}
          						</fieldset>

          					{!! FORM::close() !!}
                  </div>
                  <!-- /.panel-body -->
              </div>
        </div>
      </div>
      <!-- /.row -->
  </div>

@stop

@section('other')
@stop

@section('bottom')
    <script src="/js/metisMenu/metisMenu.min.js"></script>
		<script src="/js/raphael/raphael.min.js"></script>
		<script src="/js/morrisjs/morris.min.js"></script>
		<script src="/js/sb-admin-2.min.js"></script>

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script type="text/javascript">
        $('#lfm').filemanager('image');
    </script>
@stop
