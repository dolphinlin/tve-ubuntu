@extends('view.app2')

@section('content')
	@include('common._tcform')

@stop

@section('other')
@stop

@section('bottom')

	<script src="/js/metisMenu/metisMenu.min.js"></script>
	<script src="/js/raphael/raphael.min.js"></script>
	<script src="/js/morrisjs/morris.min.js"></script>

	<!-- DataTables JavaScript -->
	<script src="/js/sb-admin-2.min.js"></script>
	<script src="/js/teacher.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script type="text/javascript">
			$('#lfm').filemanager('image');
	</script>

@stop
