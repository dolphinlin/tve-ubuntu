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


                      <label for="url">連結</label>
                      <fieldset class="form-group">
                          <a id="lfm" data-input="urlInput" data-preview="holder" style="float: right" class="btn btn-primary">
                            <i class="fa fa-file-o"></i> 瀏覽伺服器
                          </a>
                          <div style="overflow: hidden; padding-right: .5em;">
                             <input class="form-control" id="urlInput" style="width: 100%;" name="url" type="text" required>
                          </div>​
                        <img id="holder" style="margin-top:15px;max-height:100px;">
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
        <div class="row">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <i class="fa fa-list-alt fa-fw"></i>管理分類
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              {!! FORM::open(array('url' => '/api/formfilter', 'class' => '')) !!}
              <fieldset class="form-group">
                <select class="form-control" name="filter" id="filter" v-model="ff.id">
                  <option v-for="f in fs" :value="f.id">
                  @{{ f.title }}
                  </option>
                </select>
              </fieldset>
              <div class="row">
                <fieldset class="form-froup col-lg-6">
                  <button type="button" class="form-control btn btn-success" v-on:click="getFDFilter(ff.id)">編輯</button>
                </fieldset>
                <fieldset class="form-froup col-lg-6">
                  <button type="button" name="button" class="form-control btn btn-danger" v-on:click="deleteFD()">刪除</button>
                </fieldset>
              </div>

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
  @include('common._editfdfilter')
@stop

@section('bottom')
  <script src="/js/metisMenu/metisMenu.min.js"></script>
  <script src="/js/raphael/raphael.min.js"></script>
  <script src="/js/morrisjs/morris.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="/js/sb-admin-2.min.js"></script>
	<script src="/js/formdata.js"></script>
  <script src="/vendor/laravel-filemanager/js/lfm.js"></script>

  <script type="text/javascript">
      $('.deleteForm').on("submit", function(){
      return confirm("Do you want to delete this item?");
      });
      $('#lfm').filemanager('file');
  </script>

@stop
