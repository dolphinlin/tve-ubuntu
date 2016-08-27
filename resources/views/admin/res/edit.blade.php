@extends('view.app2')

@section('content')
	@include('common._editform')
@stop

@section('other')
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
	<script src="/js/formdata.js"></script>

@stop
