<div class="modal fade" id="ShowForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">修改表單</h4>
      </div>

      <div class="modal-body">
        <!---->
		{!! FORM::open(array('url' => '/api/netres/@{{netres.id}}', 'method' => 'put')) !!}

      <fieldset class="form-group">
        {{ FORM::label('name', '標題') }}
        {!! FORM::text('name', '@{{netres.name}}', array('class' => 'form-control'))!!}
      </fieldset>

			<fieldset class="form-group">
				{{ FORM::label('url', '網址') }}
				{!! FORM::text('url', '@{{netres.url}}', array('class' => 'form-control'))!!}
			</fieldset>

			<fieldset class="form-group">
				<select class="form-control" name="filter" id="filter">
					<option v-for="f in fs" :value="f.id" :="{'selected' : (f.id == netres.filter)}">
					@{{ f.title }}
					</option>
				</select>
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
