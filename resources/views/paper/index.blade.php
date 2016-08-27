@extends('view.app3')

@section('content')
  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Panel heading</div>

    <!-- Table -->
    <table class="table table-hover">
      <thead>
        <th>
          #
        </th>
        <th>
          學號
        </th>
        <th>
          姓名
        </th>
        <th>
          論文名稱
        </th>
        <th>
          指導老師
        </th>
      </thead>
      <tbody>
        <tr v-for="p in papers">
          <td>
            @{{p.id}}
          </td>
          <td>
            @{{p.number}}
          </td>
          <td>
            @{{p.auth}}
          </td>
          <td>
            @{{p.title}}
          </td>
          <td>
            @{{teachers[p.teacher-1].name}}
          </td>
        </tr>
      </tbody>
    </table>

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
          <li v-for="pg in pages.last_page" :class="{ 'active' : (pages.current_page == $index+1) }" ><a href="#" v-on:click="getPage('/api/paper/all?page=' + (pg + 1))">@{{pg+1}}</a></li>
          <li :class="{ 'disabled' : (pages.next_page_url == null) }" >
            <a href="#" v-on:click="getPage(pages.next_page_url)" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div>
@endsection

@section('js')
  <script src="/js/paper.js"></script>
@endsection
