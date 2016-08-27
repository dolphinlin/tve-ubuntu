<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">新增文章</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i>文章
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
        					{!! FORM::open(array('url' => 'post', 'files'=>true)) !!}
        						<fieldset class="form-group">
        							{{ FORM::label('title', '標題') }}
        							{{ FORM::text('title', '', array('class' => 'form-control'))}}
        						</fieldset>

        						<fieldset class="form-group">
        							{{ FORM::label('content', '內容') }}
        							{{ FORM::textarea('content', '', array('class' => 'ckEditor'))}}
        						</fieldset>

        						<fieldset class="form-group">
        							<select class="form-control" name="filter" id="filter">
        								<option v-for="f in filters" :value="f.id">
        								@{{ f.subclass }}
        								</option>
        							</select>
        						</fieldset>
                    <fieldset class="form-froup">
                      {!! FORM::file('files[]', array('multiple'=>true)) !!}
                    </fieldset>
                    <p></p>
        						<fieldset class="form-froup">
        							{{ FORM::submit('送出', array('class' => 'form-control btn btn-primary')) }}
        						</fieldset>

        					{!! FORM::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="panel panel-danger">
                  <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i>管理分類
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                    {!! FORM::open(array('url' => '/api/formfilter', 'class' => '')) !!}
                    <fieldset class="form-group">
                      <select class="form-control" name="filter" id="filter" v-model="ff.id">
                        <option v-for="f in filters" :value="f.id">
                        @{{ f.subclass }}
                        </option>
                      </select>
                    </fieldset>
                    <div class="row">
                      <fieldset class="form-froup col-lg-6">
                        <button type="button" class="form-control btn btn-success" v-on:click="getFDFilter(ff.id)">編輯</button>
                      </fieldset>
                      <fieldset class="form-froup col-lg-6">
                        <button type="button" name="button" class="form-control btn btn-danger" v-on:click="deleteFDFilter('{{ csrf_token() }}')">刪除</button>
                      </fieldset>
                    </div>

                    {!! FORM::close() !!}
                  </div>
                  <!-- /.panel-body -->
                </div>

              </div>
              <div class="col-lg-6">
              <!-- /.panel -->
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <i class="fa fa-list-alt fa-fw"></i>新增分類
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  {!! FORM::open(array('url' => 'api/filter')) !!}
                  <fieldset class="form-group">
                    {{ FORM::label('subclass', '分類') }}
                    {{ FORM::text('subclass', '', array('class' => 'form-control'))}}
                  </fieldset>

                  <fieldset class="form-froup">
                    {{ FORM::submit('送出', array('class' => 'form-control btn btn-default')) }}
                  </fieldset>

                  {!! FORM::close() !!}
                </div>
                <!-- /.panel-body -->
              </div>
              <!-- /.panel -->
              </div>
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
</div>
