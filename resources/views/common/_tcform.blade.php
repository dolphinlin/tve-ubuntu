<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">News Create</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i>News
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					{!! FORM::open(array('url' => 'post')) !!}
						<fieldset class="form-group">
							{{ FORM::label('title', 'Title') }}
							{{ FORM::text('title', '', array('class' => 'form-control'))}}
						</fieldset>

						<fieldset class="form-group">
							{{ FORM::label('content', 'Content') }}
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
							{{ FORM::submit('Submit', array('class' => 'form-control btn btn-primary')) }}
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