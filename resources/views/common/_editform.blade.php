<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">編輯 - {{ $p->id }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i>文章
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					{!! FORM::open(array('url' => '/post/'.$p->id, 'method' => 'put', 'files'=>true)) !!}
						<fieldset class="form-group">
							{{ FORM::label('title', '標題') }}
							{{ FORM::text('title', $p->title, array('class' => 'form-control'))}}
						</fieldset>

						<fieldset class="form-group">
							{{ FORM::label('content', '內容') }}
							{{ FORM::textarea('content', $p->content, array('class' => 'ckEditor'))}}
						</fieldset>

            <fieldset class="form-froup">
              {!! FORM::file('files[]', array('multiple'=>true)) !!}
            </fieldset>
            <p>
              <strong>
                選擇檔案上傳將會覆蓋，若要刪除請將下方打勾。
              </strong>
            </p>
            <fieldset>
              <div class="checkbox">
                  <label>
                    <input type="checkbox" id="delFile" name="delFile"> 刪除附件
                  </label>
                </div>
            </fieldset>

						<fieldset class="form-group">
                            <select name="filter" id="filter" class="form-control">
                                @foreach($filters as $f)
                                    <option value="{{ $f->id }}"
                                        @if($f->id == $p->filter)
                                            selected
                                        @endif
                                    >{{ $f->subclass }}</option>
                                @endforeach
                            </select>
						</fieldset>

						<fieldset class="form-froup">
							{{ FORM::submit('更新', array('class' => 'form-control btn btn-primary')) }}
						</fieldset>

					{!! FORM::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
</div>
