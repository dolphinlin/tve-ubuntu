@extends('view.app3')

@section('content')
<div class="container-fluid">
<div class="col-lg-4 hidden-xs">
	<div class="list-group">
	  <a href="#" class="list-group-item" v-for="t in teachers" :class="{ 'active' : (selected == t.id) }" v-on:click="changePanel(t.id, $event)">
	    @{{ t.name + '    ' + t.title }}
	  </a>
	</div>
</div>
	<div class="col-lg-8 col-xs-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			@{{ teacher.name + '  ' }} <strong>@{{teacher.title}}</strong>
		  </div>
		  <div class="panel-body">
		    <div class="col-lg-4">
		    	<img class="img-rounded" alt="200x200" style="width: 200px; height: 200px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22200%22%20height%3D%22200%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3C!--%0ASource%20URL%3A%20holder.js%2F200x200%0ACreated%20with%20Holder.js%202.8.2.%0ALearn%20more%20at%20http%3A%2F%2Fholderjs.com%0A(c)%202012-2015%20Ivan%20Malopinsky%20-%20http%3A%2F%2Fimsky.co%0A--%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%3C!%5BCDATA%5B%23holder_155ddcdb194%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%5D%5D%3E%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_155ddcdb194%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%2F%3E%3Cg%3E%3Ctext%20x%3D%2274.4375%22%20y%3D%22104.5%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
		    </div>
		    <div class="col-lg-8">
		    	<div class="row tcrow">
		    		<strong>
		    			Position:
		    		</strong>
		    		@{{ teacher.position }}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			EduLevel:
		    		</strong>
		    		@{{ teacher.edulevel }}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			Office:
		    		</strong>
		    		@{{teacher.office}}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			Communication:
		    		</strong>
		    		@{{ teacher.communication }}
		    	</div>
		    	<div class="row tcrow">
		    		<strong></strong>
		    	</div>
		    	<div class="row tcrow">
		    		<strong></strong>
		    	</div>
		    	<div class="row tcrow">
		    		<strong></strong>
		    	</div>
		    </div>
		  </div>
		</div>
	</div>
</div>
@stop

@section('js')
	<script src="/js/teacher.js"></script>
@endsection
