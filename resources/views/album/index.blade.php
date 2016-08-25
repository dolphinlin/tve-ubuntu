@extends('view.app3')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.21/css/lightgallery.min.css">
@endsection
@section('content')
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">活動剪影</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="panel panel-primary">
        <div class="panel-body">
          <p v-for="a in albums">
            <a href="#" v-on:click="getAlbum(a.id)" id="dynamic">@{{a.title + a.id}}</a>
          </p>

        </div>
      </div>
    </div>

  </div>

</div>


@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.21/js/lightgallery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.21/js/lg-fullscreen.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.21/js/lg-thumbnail.min.js"></script>
  <script src="/js/album.js"></script>
@endsection