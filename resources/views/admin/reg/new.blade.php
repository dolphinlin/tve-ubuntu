@extends('view.app2')

@section('content')
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">新增法規</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div>

      <!-- /.row -->
      <div class="row">
          <div class="col-lg-6">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <i class="fa fa-list-alt fa-fw"></i>新增法規
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
          					{!! FORM::open(array('url' => '/api/reg')) !!}
          						<fieldset class="form-group">
          							{{ FORM::label('name', '法規') }}
          							{{ FORM::text('name', '', array('class' => 'form-control', 'required' => ''))}}
          						</fieldset>

                      <fieldset class="form-group">
                        {{ FORM::label('number', '項目編號') }}
                        {{ FORM::text('number', '', array('class' => 'form-control', 'required' => ''))}}
                      </fieldset>

                      <label for="url">連結</label>
                      <fieldset class="form-group">
                          <a id="lfm" data-input="urlInput" data-preview="holder" style="float: right" class="btn btn-primary">
                            <i class="fa fa-file-o"></i> 瀏覽伺服器
                          </a>
                          <div style="overflow: hidden; padding-right: .5em;">
                             <input class="form-control" id="urlInput" style="width: 100%;" name="url" type="text" required>
                          </div>​
                      </fieldset>

                      <fieldset class="form-group">
                        {{ FORM::label('day', '最後修訂日期') }}
                        {{ FORM::date('day', '', array('class' => 'form-control', 'required' => ''))}}
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
	  <script src="/js/reg.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script type="text/javascript">
        $('#lfm').filemanager('file');
    </script>
@stop
