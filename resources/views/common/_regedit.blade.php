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
            {{ FORM::label('name', '法規') }}
            <input type="text" name="name" id="name" class="form-control" :value="reg.name">
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('number', '項目編號') }}
            <input type="text" name="number" id="number" class="form-control" :value="reg.number" required>
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('url', '網址') }}
            <input type="text" name="url" id="url" class="form-control" :value="reg.url" required>
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('day', '最後修訂日期') }}
            <input type="date" name="day" id="day" class="form-control" :value="reg.day" required>
          </fieldset>

          <fieldset class="form-group">
            <label for="filter">分類</label>
            <select class="form-control" name="filter" id="filter">
              <option v-for="t in fs" :value="t.id" :="{'selected' : (t.id == reg.filter)}">
              @{{ t.title }}
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
