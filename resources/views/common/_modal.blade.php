<div class="modal fade" id="ShowDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">
          @{{ post.title + '-' + filters[post.filter - 1].subclass }}
        </h4>
      </div>

      <div class="modal-body">
        <div class="Mcontent" id="ModalCont">
          @{{{ post.content }}}
        </div>
        <p></p>
        <div class="MFile" id="ModalFile">
          <a v-for="f in post.files" href="/uploads/@{{ f.path }}" target="_blank"><p>附件@{{$index + 1}} </p></a>
        </div>
      </div>

      <div class="modal-footer">
        <div class="MFilter" id="ModalFilter">
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
