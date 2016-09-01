
<div class="container" id="app3">
  <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div id="carousel-example-generic" style="height: 100%"   class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" >
            {{-- <div class="item active">
              <img src="http://i.imgur.com/4zYiWhB.gif" alt="...">
              <div class="carousel-caption">
              </div>
            </div> --}}
            <div v-for="c in carousel" class="item" :class="{'active' : $index == 0}">
              <img :src="c.url" :alt="c.title">
              <div class="carousel-caption">
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div> <!-- Carousel -->
      </div>


  </div>
</div>
