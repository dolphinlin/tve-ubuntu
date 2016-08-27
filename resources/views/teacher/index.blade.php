@extends('view.app3')

@section('content')
<div class="container-fluid">
<div class="col-lg-4 hidden-xs">
	<div class="list-group">
	  <a href="#" class="list-group-item" v-for="t in teachers" :class="{ 'active' : (selected == t.id) }" v-on:click="changePanel(t.id, $event)">
	    @{{ t.name + '    '}} <strong>@{{t.title}}</strong>
	  </a>
	</div>
</div>
	<div class="col-lg-8 col-xs-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			@{{ teacher.name + '  ' }} <strong>@{{teacher.position}}</strong>
		  </div>
		  <div class="panel-body">
		    <div class="col-lg-4">
		    	<img class="img-rounded" alt="200x200" style="width: 200px; height: 200px;" :src="teacher.pic" data-holder-rendered="true">
		    </div>
		    <div class="col-lg-8">
		    	<div class="row tcrow">
		    		<strong>
		    			最高學歷:&emsp;
		    		</strong>
		    		@{{ teacher.edulevel }}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			研究室:&emsp;&emsp;
		    		</strong>
		    		@{{ teacher.office }}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			聯絡方式:&emsp;
		    		</strong>
		    		@{{teacher.communication}}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			Mail:&emsp;&emsp;&emsp;
		    		</strong>
		    		@{{ teacher.email }}
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			個人網站:&emsp;
		    		</strong>
						<a :href="teacher.web" target="_blank">連結</a>
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			教師著作:&emsp;
		    		</strong>
						<a :href="teacher.tecwri" target="_blank">連結</a>
		    	</div>
		    	<div class="row tcrow">
		    		<strong>
		    			學術專長:&emsp;
		    		</strong>
						@{{teacher.expertise}}
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
