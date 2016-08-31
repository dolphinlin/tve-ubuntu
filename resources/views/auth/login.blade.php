@extends('view.app')

@section('content')
<div class="container-fluid">

	<div class="row">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<ul style="color:red;">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
						{!! FORM::open(array('url' => 'login')) !!}
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<fieldset class="form-group">
								{{ FORM::text('email', '', array('class' => 'form-control', 'placeholder' => 'User', 'autofocus'))}}
							</fieldset>

							<fieldset class="form-group">
								{{ FORM::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
							</fieldset>

							<fieldset class="form-froup">
								{{ FORM::submit('登入', array('class' => 'form-control btn btn-success btn-block')) }}
							</fieldset>

						{!! FORM::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
