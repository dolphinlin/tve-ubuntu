@extends('view.app3')

@section('content')
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">網路資源</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="panel panel-primary">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="list-group">
                <a href="#" class="list-group-item" v-for="f in fs" v-on:click="changeData(f.id)" :class="{ 'active' : (filterby == f.id) }">
                  <span class="badge">@{{netreses | subclass f.id | count}}</span>
                  @{{ f.title }}
                </a>

              </div>
            </div>
            <div class="col-lg-8">
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Panel heading</div>
                <div class="panel-body">
                  <a v-for="n in netreses | subclass" :href="n.url" target="_blank">
                    <div class="container-fluid postEntry">
                      <div class="col-lg-12">
                        @{{ n.name }}
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection

@section('js')
  <script src="/js/netres.js"></script>
@endsection
