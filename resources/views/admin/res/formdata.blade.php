@extends('view.app2')
@section('content')
	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">資源列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>

	    <!-- /.row -->
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <i class="fa fa-list-alt fa-fw"></i>表單
	                </div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                    <div class="dataTable_wrapper">
	                        <table width="100%" class="table table-bordered table-hover table-striped" id="data-table">
	                            <thead>
	                                <tr>
	                                    <th>標題</th>
	                                    <th>分類</th>
	                                    <th width="20%">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            @foreach ($query as $q)
	                                <tr>
	                                    <td>{{$q->title}}</td>
	                                    <td>
	                                        @if ($filters[$q->filter-1])
	                                            {{ $filters[$q->filter-1]->title }}
	                                        @endif
	                                    </td>
	                                    <td>
											{!! FORM::open(array('url' => '/api/formdata/'.$q->id , 'method' => 'delete')) !!}
									        <a href="#" class="btn btn-xs btn-info" v-on:click="getFormdata({{$q->id}})">編輯</a>
									        {!! FORM::submit('刪除', ['class' => 'btn btn-xs btn-danger']) !!}
											{!! FORM::close() !!}
	                                    </td>
	                                </tr>
	                            @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	                <!-- /.panel-body -->
	            </div>
	            <!-- /.panel -->

	        </div>
	        <!-- /.col-lg-12 -->

	    </div>
	    <!-- /.row -->
	</div>
@stop

@section('other')
	@include('common._resformmodal')
@stop

@section('bottom')
		<script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/metisMenu/dist/metisMenu.min.js"></script>
		<script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/raphael/raphael-min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/morrisjs/morris.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>
		<script src="/js/formdata.js"></script>

    <script>
	    $(document).ready(function() {
	        $('#data-table').DataTable({
	                responsive: true,
	                "order": [[ 0, "desc" ]]
	        });
	    });
    </script>
@stop
