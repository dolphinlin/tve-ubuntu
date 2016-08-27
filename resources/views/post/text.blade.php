@extends('view.app')

@section('content')
	{{ FORM::textarea('content', '', array('class' => 'ckEditor'))}}
@stop