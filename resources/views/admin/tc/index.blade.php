@extends('view.app2')

@section('content')
	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">教師列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>

	    <!-- /.row -->
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <i class="fa fa-list-alt fa-fw"></i>教師
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
	                </div>
	                <!-- /.panel-body -->
	                    <div class="dataTable_wrapper">
	                        <table width="100%" class="table table-bordered table-hover table-striped" id="data-table">
	                            <thead>
	                                <tr>
	                                    <th>#</th>
	                                    <th>Name</th>
	                                    <th>Title</th>
	                                    <th width="20%">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            @foreach ($query as $q)
	                                <tr>
	                                    <td>{{$q->id}}</td>
	                                    <td>{{$q->name}}</td>
	                                    <td>{{$q->title}}</td>
	                                    <td>
											{!! FORM::open(array('url' => 'post/'.$q->id , 'method' => 'delete')) !!}
											<a href="/api/teacher/{{ $q->id }}" class="btn btn-default btn-xs" v-on:click="getTcContent('{{'/api/teacher/' . $q->id }}', $event)" >View</a>
									        <a href="/api/teacher/{{ $q->id }}/edit" class="btn btn-xs btn-info">Edit</a>
									        {!! FORM::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
											{!! FORM::close() !!}
	                                    </td>
	                                </tr>
	                            @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	            </div>
	            <!-- /.panel -->

	        </div>
	        <!-- /.col-lg-12 -->

	    </div>
	    <!-- /.row -->
	</div>
@stop

@section('other')
	@include('common._tcmodal')
@stop

@section('bottom')
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>


	<script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/metisMenu/dist/metisMenu.min.js"></script>
	<script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/raphael/raphael-min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/morrisjs/morris.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>
	<script src="/js/teacher.js"></script>
@stop
