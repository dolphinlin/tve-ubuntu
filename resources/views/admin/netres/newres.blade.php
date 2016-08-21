@extends('view.app2')

@section('content')
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">新增網路資源</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div>

      <!-- /.row -->
      <div class="row">
          <div class="col-lg-6">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <i class="fa fa-list-alt fa-fw"></i>新增連結
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
          					{!! FORM::open(array('url' => '/api/netres')) !!}
          						<fieldset class="form-group">
          							{{ FORM::label('name', '標題') }}
          							{{ FORM::text('name', '', array('class' => 'form-control', 'required' => ''))}}
          						</fieldset>

                      <fieldset class="form-group">
          							{{ FORM::label('url', '連結') }}
          							{{ FORM::text('url', '', array('class' => 'form-control', 'required' => ''))}}
          						</fieldset>



          						<fieldset class="form-group">
          							<select class="form-control" name="filter" id="filter">
          								<option v-for="f in fs" :value="f.id">
          								@{{ f.title }}
          								</option>
          							</select>
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
      <div class="col-lg-6">
        <div class="row">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <i class="fa fa-list-alt fa-fw"></i>新增分類
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              {!! FORM::open(array('url' => '/api/resfilter')) !!}
              <fieldset class="form-group">
                {{ FORM::label('title', '分類') }}
                {{ FORM::text('title', '', array('class' => 'form-control', 'required' => ''))}}
              </fieldset>

              <fieldset class="form-froup">
                {{ FORM::submit('新增', array('class' => 'form-control btn btn-primary')) }}
              </fieldset>

              {!! FORM::close() !!}
            </div>
            <!-- /.panel-body -->
          </div>
        </div>
        <div class="row">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <i class="fa fa-list-alt fa-fw"></i>刪除分類
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              {!! FORM::open(array('url' => '/api/resfilter')) !!}
              <fieldset class="form-group">
                <select class="form-control" name="filter" id="filter">
                  <option v-for="f in fs" :value="f.id">
                  @{{ f.title }}
                  </option>
                </select>
              </fieldset>

              <fieldset class="form-froup">
                {{ FORM::submit('刪除', array('class' => 'form-control btn btn-danger')) }}
              </fieldset>

              {!! FORM::close() !!}
            </div>
            <!-- /.panel-body -->
          </div>
        </div>
        </div>
      </div>
      <!-- /.row -->
  </div>

@stop

@section('other')
@stop

@section('bottom')
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script src="/js/metisMenu/metisMenu.min.js"></script>
		<script src="/js/raphael/raphael.min.js"></script>
		<script src="/js/morrisjs/morris.min.js"></script>
		<script src="/js/sb-admin-2.min.js"></script>
	<script src="/js/netres.js"></script>

@stop
