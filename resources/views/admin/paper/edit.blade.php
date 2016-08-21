@extends('view.app2')

@section('content')
  <div id="page-wrapper">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">編輯畢業論文</h1>
          </div>
          <!-- /.col-lg-12 -->
      </div>

      <!-- /.row -->
      <div class="row">
          <div class="col-lg-6">
              <div class="panel panel-success">
                  <div class="panel-heading">
                      <i class="fa fa-list-alt fa-fw"></i>編輯論文
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
          					{!! FORM::open(array('url' => '/api/paper')) !!}
          						<fieldset class="form-group">
          							{{ FORM::label('year', '學年') }}
          							{{ FORM::number('year', date('Y')-1911, array('class' => 'form-control', 'required' => '','min' => "85", 'max' => date('Y')-1911))}}
          						</fieldset>

                      <fieldset class="form-group">
          							{{ FORM::label('number', '學號') }}
          							{{ FORM::text('number', '', array('class' => 'form-control', 'required' => '', 'maxlength' => 10))}}
          						</fieldset>

                      <fieldset class="form-group">
          							{{ FORM::label('auth', '姓名') }}
          							{{ FORM::text('auth', '', array('class' => 'form-control', 'required' => ''))}}
          						</fieldset>

                      <fieldset class="form-group">
          							{{ FORM::label('title', '論文名稱') }}
          							{{ FORM::text('title', '', array('class' => 'form-control', 'required' => ''))}}
          						</fieldset>

          						<fieldset class="form-group">
                        <label for="teacher">指導老師</label>
          							<select class="form-control" name="teacher" id="teacher">
          								<option v-for="t in teachers" :value="t.id">
          								@{{ t.name }}
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
              <i class="fa fa-list-alt fa-fw"></i>新增指導老師
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              {!! FORM::open(array('url' => '/api/papert')) !!}
              <fieldset class="form-group">
                {{ FORM::label('name', '指導老師') }}
                {{ FORM::text('name', '', array('class' => 'form-control', 'required' => ''))}}
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
              <i class="fa fa-list-alt fa-fw"></i>管理指導老師
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              {!! FORM::open(array('url' => '/api/papert', 'class' => '')) !!}
              <fieldset class="form-group">
                <select class="form-control" name="filter" id="filter" v-model="ff.id">
                  <option v-for="t in teachers" :value="t.id">
                  @{{ t.name }}
                  </option>
                </select>
              </fieldset>
              <div class="row">
                <fieldset class="form-froup col-lg-6">
                  <button type="button" class="form-control btn btn-success" v-on:click="getTeacher(ff.id)">編輯</button>
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
  @include('common._editteacher')
@stop

@section('bottom')
  <script src="/js/metisMenu/metisMenu.min.js"></script>
  <script src="/js/raphael/raphael.min.js"></script>
  <script src="/js/morrisjs/morris.min.js"></script>

  <!-- DataTables JavaScript -->
  <script src="/js/sb-admin-2.min.js"></script>

<script src="/js/paper.js"></script>
@stop
