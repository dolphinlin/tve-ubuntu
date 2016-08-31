(function() {
  var app;

  $(document).on("click", "#testBtn", function(e) {
    console.log("click" + e);
    return $('#ShowForm').modal({
      keyboard: false,
      show: true
    });
  });

  app = new Vue({
    el: '#app',
    data: {
      filters: [],
      posts: [],
      acts: [],
      pages: [],
      post: {
        id: 0,
        title: '',
        content: '',
        filter: 0,
        files: []
      },
      act: {
        id: 0,
        title: '',
        content: '',
        filter: 999
      },
      errors: '',
      filterby: 0,
      ff: {
        id: 1,
        subclass: ''
      }
    },
    filters: {
      subclass: function() {
        var that;
        that = this;
        if (that.filterby === 0) {
          console.log('All');
          return that.posts;
        } else {
          console.log('Filter');
          return that.posts.filter(function(p) {
            console.log;
            if (p.filter === that.filterby) {
              return p;
            }
          });
        }
      },
      dateProcess: function(date, format) {
        var d, that;
        that = this;
        d = new Date(date);
        if (date === null) {
          return null;
        } else {
          if (format === 'date') {
            return (d.getMonth() + 1) + '-' + d.getDate() + '-' + d.getFullYear();
          } else if (format === 'md') {
            return (d.getMonth() + 1) + '-' + d.getDate();
          } else if (format === 'y') {
            return d.getFullYear();
          } else {
            return null;
          }
        }
      },
      strLenPoc: function(str, n) {
        var s;
        s = str + '';
        if (s.length > n) {
          return s.substring(0, n - 1) + '...';
        } else {
          return s;
        }
      },
      count: function(arr) {
        return arr.length;
      }
    },
    ready: function() {
      var that;
      that = this;
      $.ajax({
        method: 'GET',
        url: '/api/post/all?page=1',
        success: function(res) {
          console.log(res.data);
          that.pages = res;
          console.log(that.pages);
          return that.posts = res.data;
        }
      });
      $.ajax({
        method: 'GET',
        url: '/api/act/all?page=1',
        success: function(res) {
          return that.acts = res.data;
        }
      });
      return that.getFilter();
    },
    methods: {
      getFilter: function() {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/filter',
          success: function(res) {
            that.filters = res;
            return console.log(that.filters);
          },
          error: function(res) {
            return that.errors = res.responseJSON.errors;
          }
        });
      },
      getPostContent: function(href, e) {
        var that;
        e.preventDefault();
        that = this;
        that.getFilter();
        return $.get(href, function(data) {
          console.log(data);
          that.post.id = data.id;
          console.log(that.post.id);
          that.post.title = data.title;
          that.post.content = data.content;
          that.post.filter = data.filter;
          return $('#ShowDialog').modal({
            keyboard: false,
            show: true
          }, $.get('/api/post/file/' + that.post.id, function(data) {
            console.log(data);
            return that.post.files = data;
          }));
        });
      },
      getActiveContent: function(href, e) {
        var that;
        e.preventDefault();
        that = this;
        that.getFilter();
        return $.get(href, function(data) {
          console.log(data);
          that.act = data;
          return $('#ActiveDialog').modal({
            keyboard: false,
            show: true
          });
        });
      },
      setFilter: function(f, e) {
        var that;
        e.preventDefault();
        that = this;
        if (f === 0) {
          that.filtercol = '';
        } else {
          that.filtercol = 'filter';
        }
        return that.filterby = f;
      },
      getPage: function(n) {
        var that;
        that = this;
        if (n !== null) {
          return $.ajax({
            method: 'GET',
            url: n,
            success: function(res) {
              console.log(res.data);
              that.pages = res;
              return that.posts = that.pages.data;
            }
          });
        }
      },
      getFDFilter: function(id) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: '/api/filter/' + id,
          success: function(res) {
            that.ff = res;
            $('#ShowForm').modal({
              keyboard: false
            });
            ({
              show: true
            });
            return console.log('get success');
          }
        });
      },
      deleteFDFilter: function(token) {
        var that;
        that = this;
        console.log(token);
        return $.ajax({
          method: 'POST',
          url: '/api/filter/' + that.ff.id,
          data: {
            _method: 'delete',
            _token: token
          },
          success: function(msg) {
            return location.reload();
          }
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=app.js.map
