@extends('view.app3')

@section('content')
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">招生資訊</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
      <div class="panel panel-primary">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="list-group">
                <a href="#" class="list-group-item" v-on:click="changeData(1)" :class="{ 'active' : (filterby == 1) }">
                  博士班
                </a>
                <a href="#" class="list-group-item" v-on:click="changeData(2)" :class="{ 'active' : (filterby == 2) }">
                  碩士班
                </a>
                <a href="#" class="list-group-item" v-on:click="changeData(3)" :class="{ 'active' : (filterby == 3) }">
                  碩士專班
                </a>
                <a href="#" class="list-group-item" v-on:click="changeData(4)" :class="{ 'active' : (filterby == 4) }">
                  考試試題
                </a>

              </div>
            </div>
            <div class="col-lg-8">
              <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">列表</div>

                <!-- Table -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th width="30%">
                        日期
                      </th>
                      <th>
                        標題
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="e in enrolls ">
                      <td>
                        [@{{e.created_at | dateProcess 'date' }}]
                      </td>
                      <td>
                        <a :href="e.url">@{{e.title}}</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
        </div>
      </div>
    </div>

  </div>


</div>


@endsection

@section('js')
  <script src="/js/enroll.js"></script>
@endsection
