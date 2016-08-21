@extends('view.app2')

@section('content')
	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="page-header">文章列表</h1>
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>

	    <!-- /.row -->
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <i class="fa fa-list-alt fa-fw"></i>文章
	                </div>
	                <!-- /.panel-heading -->
	                <div class="panel-body">
	                    <div class="dataTable_wrapper">
	                        <table width="100%" class="table table-bordered table-hover table-striped" id="data-table">
	                            <thead>
	                                <tr>
	                                    <th width="20%">日期</th>
	                                    <th>標題</th>
	                                    <th>分類</th>
	                                    <th width="20%">Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            @foreach ($query as $q)
	                                <tr>
	                                    <td>{{$q->created_at}}</td>
	                                    <td>{{$q->title}}</td>
	                                    <td>
	                                        @if ($filters[$q->filter-1])
	                                            {{ $filters[$q->filter-1]->subclass }}
	                                        @endif
	                                    </td>
	                                    <td>
											{!! FORM::open(array('url' => 'post/'.$q->id , 'method' => 'delete', 'class' => 'deleteForm')) !!}
											<a href="/post/{{ $q->id }}" class="btn btn-default btn-xs" v-on:click="getPostContent('{{'/post/' . $q->id }}', $event)" >預覽</a>
									        <a href="/post/{{ $q->id }}/edit" class="btn btn-xs btn-info">編輯</a>
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
@endsection

@section('other')
	@include('common._modal')
@stop

@section('bottom')
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>


		<script src="/js/metisMenu/metisMenu.min.js"></script>
		<script src="/js/raphael/raphael-min.js"></script>
		<script src="/js/morrisjs/morris.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="/js/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="/js/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="/js/datatables-responsive/dataTables.responsive.js"></script>
		<script src="/js/sb-admin-2.js"></script>
	<script src="/js/app.js"></script>

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
