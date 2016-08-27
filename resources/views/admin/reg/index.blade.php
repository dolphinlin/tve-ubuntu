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
	                                    <th width="40%">標題</th>
																			<th>最後修訂日期</th>
	                                    <th>分類</th>
	                                    <th width="20%">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            @foreach ($query as $q)
	                                <tr>
	                                    <td>{{$q->name}}</td>
																			<td>{{$q->day}}</td>
	                                    <td>
	                                        @if ($qt[$q->filter-1])
	                                            {{ $qt[$q->filter-1]->title }}
	                                        @endif
	                                    </td>
	                                    <td>
											{!! FORM::open(array('url' => '/api/formdata/'.$q->id , 'method' => 'delete', 'class' => 'deleteForm')) !!}
									        <a href="#" class="btn btn-xs btn-info" v-on:click="getRegdata({{$q->id}})">編輯</a>
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
	@include('common._regedit')
@stop

@section('bottom')
	<script src="/js/metisMenu/metisMenu.min.js"></script>
	<script src="/js/raphael/raphael.min.js"></script>
	<script src="/js/morrisjs/morris.min.js"></script>

	<!-- DataTables JavaScript -->
	<script src="/js/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/js/datatables-plugins/dataTables.bootstrap.min.js"></script>
	<script src="/js/datatables-responsive/dataTables.responsive.js"></script>
	<script src="/js/sb-admin-2.min.js"></script>
		<script src="/js/reg.js"></script>

    <script>
	    $(document).ready(function() {
	        $('#data-table').DataTable({
	                responsive: true,
	                "order": [[ 0, "desc" ]]
	        });
	    });
    </script>
		<script type="text/javascript">
				 $('.deleteForm').on("submit", function(){
				return confirm("Do you want to delete this item?");
		});
		</script>
@stop
