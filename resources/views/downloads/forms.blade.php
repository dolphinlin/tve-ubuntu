@extends('view.app3')

@section('content')
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">表單下載</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">研究生手冊</a></li>
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
                  <span class="badge">@{{formdatas | subclass f.id | count}}</span>
                  @{{ f.title }}
                </a>

              </div>
            </div>
            <div class="col-lg-8">
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Panel heading</div>

                <!-- Table -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>
                        項目
                      </th>
                      <th width="30%">
                        項目編號
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="fd in formdatas | subclass ">
                      <td>
                        @{{fd.title}}
                      </td>
                      <td>
                        <a :href="fd.url">@{{fd.name}}</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="profile">...</div>
  </div>

</div>


@endsection

@section('js')
  <script src="/js/formdata.js"></script>
@endsection
