<div class="modal fade" id="ShowForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ModalTitle">
          @{{ post.title + '-' + filters[post.filter - 1].subclass }}
        </h4>
      </div>

      <div class="modal-body">
        <div id="lightgallery">
          <a v-for="p in album.photos" :href="'/albums/' + p.image">
            <img :src="'/albums/' + p.image" alt="QQQQ">
          </a>
        </div>
      </div>

    </div>
  </div>
</div>
