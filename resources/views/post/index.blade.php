@extends('view.app')

@section('content')
	<section class="container">
		<div class="row">
{{-- 			<button class="btn btn-default col-lg-4 col-lg-offset-4 " id="testBtn" v-on:click="getFilter">
				New Post
			</button> --}}
		</div>
	</section>
<div class="panel panel-info">
  <div class="panel-body">
		<div class="container-fluid">
			<div class="row">
				<ul class="nav nav-tabs ">
					<li role="presentation" v-on:click="setFilter(0, $event)" :class="{ 'active' : (filterby == 0) }"><a href="#">All</a></li>
					<li role="presentation" v-for="f in filters" v-on:click="setFilter(f.id, $event)" :class="{ 'active' : (filterby == f.id) }" ><a href="#">@{{f.subclass}}</a></li>
				</ul>
				<div class="container-fluid postEntry">
					<div class="col-lg-2 col-xs-3">
						<strong>
							分類
						</strong>
					</div>
					<div class="col-lg-8 col-xs-5">
						<strong>
							標題
						</strong>
					</div>
					<div class="col-lg-2 col-xs-4">
						<strong>
							日期
						</strong>
					</div>
				</div>
				<section class="container-fluid">
					<div class="row" v-cloak>
						<div v-if="posts.data | subclass | count">
							<a v-for="p in posts.data | subclass " href="/post/@{{ p.id}}" class="ajax_modal" v-on:click="getPostContent('/post/' + p.id, $event)" >
								<div class="container-fluid postEntry">
									<div class="col-lg-2 col-xs-3">@{{ p.created_at | dateProcess 'md' }}</div>
									<div class="col-lg-8 col-xs-5">@{{ p.title }}</div>
									<div class="col-lg-2 col-xs-4">
										<span class="label label-primary">
											@{{ filters[p.filter - 1].subclass }}
										</span>
									</div>
								</div>
							</a>
						</div>
						<div v-else>
							<div class="row text-center">
								此分類尚無公告
							</div>
						</div>
					</div>
				</section>
  		</div>
		</div>
		<div class="row text-center">
			<nav>
				<ul class="pagination">
					<li :class="{ 'disabled' : (pages.prev_page_url == null) }" >
						<a v-if="pages.prev_page_url != null" href="#" v-on:click="getPage(pages.prev_page_url)" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>

						<a v-else href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li v-for="pg in pages.last_page" :class="{ 'active' : (pages.current_page == $index+1) }" ><a href="#" v-on:click="getPage('/api/post/all?page=' + (pg + 1))">@{{pg+1}}</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>

		</div>
	</div>
</div>



@stop

@section('other')
	@include('common._modal')
	<style>
		[v-cloak] {
		  display: none;
		}
	</style>
@stop
