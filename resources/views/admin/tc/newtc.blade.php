@extends('view.app2')

@section('content')
	@include('common._tcform')
	
@stop

@section('other')
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

	<script>
		$('.ckEditor').ckeditor();
	</script>
@stop