<div class="modal fade" id="ShowForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">編輯類別</h4>
      </div>

      <div class="modal-body">
        <!---->
        {!! FORM::open(array('url' => '/api/enroll/@{{enroll.id}}', 'method' => 'put')) !!}

          <fieldset class="form-group">
            {{ FORM::label('title', '標題') }}
            <input type="text" name="title" id="title" class="form-control" :value="enroll.title">
          </fieldset>

          <fieldset class="form-group">
            {{ FORM::label('url', '網址') }}
            <input type="text" name="url" id="url" class="form-control" :value="enroll.url" required>
          </fieldset>

          <fieldset class="form-group">
            <label for="type">分類</label>
            <select class="form-control" name="type" id="type">
              <option value="1" :="{'selected' : (enroll.type == 1)}">
                博士班
              </option>
              <option value="2" :="{'selected' : (enroll.type == 2)}">
                碩士班
              </option>
              <option value="3" :="{'selected' : (enroll.type == 3)}">
                碩士專班
              </option>
              <option value="4" :="{'selected' : (enroll.type == 4)}">
                考試試題
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