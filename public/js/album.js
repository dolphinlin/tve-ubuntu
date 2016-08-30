(function() {
  var app;

  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

  app = new Vue({
    el: '#app',
    data: {
      albums: [],
      album: {
        id: 0,
        title: '',
        description: '',
        photos: []
      },
      pages: {
        current_page: 1,
        last_page: 1,
        next_page_url: '',
        prev_page_url: ''
      }
    },
    filters: {
      dateProcess: function(date, format) {
        var d, that;
        that = this;
        d = new Date(date);
        if (d === null) {
          return null;
        } else {
          if (format === 'date') {
            return d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
          } else {
            return (d.getMonth() + 1) + '-' + d.getDate();
          }
        }
      },
      count: function(arr) {
        console.log(arr.length);
        return arr.length;
      }
    },
    ready: function() {
      var that;
      that = this;
      console.log('ready read');
      return $.ajax({
        method: 'GET',
        url: '/api/album?page=1',
        success: function(res) {
          that.pages = res;
          that.albums = res.data;
          return console.log('get success');
        }
      });
    },
    methods: {
      getAlbum: function(id) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/album/' + id,
          success: function(res) {
            that.album = res;
            console.log('get success');
            return $(this).lightGallery({
              dynamic: true,
              dynamicEl: res.photos
            });
          }
        });
      },
      getPage: function(n) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/album?page=' + n,
          success: function(res) {
            that.pages = res;
            return that.albums = res.data;
          }
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=album.js.map
