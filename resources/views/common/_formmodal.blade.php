<div class="modal fade" id="ShowForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">New Post</h4>
      </div>

      <div class="modal-body">
        <!---->
		{!! FORM::open(array('url' => 'post')) !!}
			<fieldset class="form-group">
				{{ FORM::label('title', 'Title') }}
				{{ FORM::text('title', '', array('class' => 'form-control'))}}
			</fieldset>

			<fieldset class="form-group">
				{{ FORM::label('content', 'Content') }}
				{{ FORM::textarea('content', '', array('class' => 'ckEditor'))}}
			</fieldset>

			<fieldset class="form-group">
				<select class="form-control" name="filter" id="filter">
					<option v-for="f in filters" :value="f.id">
					@{{ f.subclass }}
					</option>
				</select>
			</fieldset>

			<fieldset class="form-froup">
				{{ FORM::submit('Submit', array('class' => 'form-control btn btn-primary')) }}
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