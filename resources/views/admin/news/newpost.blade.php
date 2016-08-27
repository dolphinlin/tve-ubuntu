@extends('view.app2')

@section('content')
	@include('common._form')

@stop

@section('other')
	@include('common._editnewsfilter')
@stop

@section('bottom')
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>


	<		<script src="/js/metisMenu/metisMenu.min.js"></script>
			<script src="/js/raphael/raphael.min.js"></script>
			<script src="/js/morrisjs/morris.min.js"></script>

			<!-- DataTables JavaScript -->
			<script src="/js/datatables/js/jquery.dataTables.min.js"></script>
			<script src="/js/datatables-plugins/dataTables.bootstrap.min.js"></script>
			<script src="/js/datatables-responsive/dataTables.responsive.js"></script>
			<script src="/js/sb-admin-2.min.js"></script>
	<script src="/js/app.js"></script>

	<script>
  $('.ckEditor').ckeditor({
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  });
</script>
@stop
