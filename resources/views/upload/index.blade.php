@extends('view.app3')

@section('content')
  <div class="container">
    {!! FORM::open(array('url'=>'/upload','method'=>'POST', 'files'=>true)) !!}
    <div class="control-group">
      {!! FORM::file('files[]', array('multiple'=>true)) !!}
      <p></p>
      {!! Form::submit('Submit', array('class'=>'btn btn-info')) !!}

    </div>
    {!! Form::close() !!}

  </div>
@endsection

@section('js')
  <script src="http://gregpike.net/demos/bootstrap-file-input/bootstrap.file-input.js"></script>
  <script type="text/javascript">
  </script>
@endsection
