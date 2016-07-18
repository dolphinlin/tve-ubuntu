@extends('view.app2')

@section('content')
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">新增表單下載</h1>
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
          					{!! FORM::open(array('url' => '/api/formdata')) !!}
          						<fieldset class="form-group">
          							{{ FORM::label('title', '標題') }}
          							{{ FORM::text('title', '', array('class' => 'form-control', 'required' => ''))}}
          						</fieldset>

                      <fieldset class="form-group">
          							{{ FORM::label('name', '項目編號') }}
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
        <div class="panel panel-danger">
          <div class="panel-heading">
            <i class="fa fa-list-alt fa-fw"></i>新增分類
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            {!! FORM::open(array('url' => '/api/formfilter')) !!}
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
      <!-- /.row -->
  </div>

@stop

@section('other')
@stop

@section('bottom')	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>


	<script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/metisMenu/dist/metisMenu.min.js"></script>
	<script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/raphael/raphael-min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/morrisjs/morris.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>
	<script src="/js/formdata.js"></script>

@stop