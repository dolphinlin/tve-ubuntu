<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">新增教師</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i>教師
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
					{!! FORM::open(array('url' => '/api/teacher/' . $q->id, 'method' => 'put')) !!}
						<fieldset class="form-group">
							{{ FORM::label('name', '姓名') }}
							{{ FORM::text('name', $q->name, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('title', '職稱') }}
							{{ FORM::text('title', $q->title, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('position', '職位') }}
							{{ FORM::text('position', $q->position, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('edulevel', '最高學歷') }}
							{{ FORM::text('edulevel', $q->edulevel, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('office', '辦公室') }}
							{{ FORM::text('office', $q->office, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('communication', '聯絡方式') }}
							{{ FORM::text('communication', $q->communication, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('email', 'Mail') }}
							{{ FORM::email('email', $q->email, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('expertise', '學術專長') }}
							{{ FORM::text('expertise', $q->expertise, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('web', '個人網站') }}
							{{ FORM::text('web', $q->web, array('class' => 'form-control'))}}
						</fieldset>
            <fieldset class="form-group">
							{{ FORM::label('tecwri', '教師著作') }}
							{{ FORM::text('tecwri', $q->tecwri, array('class' => 'form-control'))}}
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
