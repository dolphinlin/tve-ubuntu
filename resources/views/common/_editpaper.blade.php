<div class="modal fade" id="ShowForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">編輯類別</h4>
      </div>

      <div class="modal-body">
        <!---->
        {!! FORM::open(array('url' => '/api/paper/@{{paper.id}}', 'method' => 'put')) !!}
          <fieldset class="form-group">
            {{ FORM::label('year', '學年') }}
            <input type="number" name="year" id="year" class="form-control" min="85" max="{{date('Y')-1911}}" :value="paper.year" required>
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('number', '學號') }}
            <input type="text" name="number" id="number" class="form-control" :value="paper.number">
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('auth', '姓名') }}
            <input type="text" name="auth" id="auth" class="form-control" :value="paper.auth" required>
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('title', '論文名稱') }}
            <input type="text" name="title" id="title" class="form-control" :value="paper.title" required>
          </fieldset>

          <fieldset class="form-group">
            <label for="teacher">指導老師</label>
            <select class="form-control" name="teacher" id="teacher">
              <option v-for="t in teachers" :value="t.id" :="{'selected' : (t.id == paper.teacher)}">
              @{{ t.name }}
              </option>
            </select>
          </fieldset>
          <p></p>
          <fieldset class="form-froup">
            {{ FORM::submit('送出', array('class' => 'form-control btn btn-primary')) }}
          </fieldset>

        {!! FORM::close() !!}
        <!---->

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
