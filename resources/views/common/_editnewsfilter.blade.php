<div class="modal fade" id="ShowForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">編輯類別</h4>
      </div>

      <div class="modal-body">
        <!---->
		{!! FORM::open(array('url' => '/api/filter/@{{ff.id}}', 'method' => 'put')) !!}
			<fieldset class="form-group">
				{{ FORM::label('title', 'Title') }}
        <input type="text" name="title" id="title" class="form-control" :value="ff.subclass">
			</fieldset>

			<fieldset class="form-froup">
				{{ FORM::submit('更新', array('class' => 'form-control btn btn-primary')) }}
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
