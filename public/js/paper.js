(function() {
  var app;

  Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

  app = new Vue({
    el: '#app',
    data: {
      teachers: [],
      papers: [],
      pages: [],
      filterby: 1,
      paper: {
        title: '',
        auth: '',
        number: '',
        year: 0,
        teacher: 0
      },
      ff: {
        id: 1,
        name: ''
      }
    },
    filters: {
      subclass: function(data, fl) {
        var that;
        that = this;
        if (fl === void 0) {
          console.log('enter normal');
          return data.filter(function(f) {
            if (f.filter === that.filterby) {
              return f;
            }
          });
        } else {
          return data.filter(function(f) {
            if (f.filter === fl) {
              return f;
            }
          });
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
      $.ajax({
        method: 'GET',
        url: '/api/paper/allteacher',
        success: function(res) {
          console.log('qq1233');
          that.teachers = res;
          return that.ff.id = 1;
        }
      });
      return that.$http.get('/api/paper/all?page=1').then((function(_this) {
        return function(res) {
          console.log(res.data);
          that.pages = res.data;
          return that.papers = res.data.data;
        };
      })(this), (function(_this) {
        return function(res) {
          return alter('Get Error');
        };
      })(this));
    },
    methods: {
      changeData: function(id) {
        var that;
        that = this;
        return that.filterby = id;
      },
      getTeacher: function(id) {
        var that;
        that = this;
        return that.$http.get('/api/papert/' + id).then((function(_this) {
          return function(res) {
            console.log(res.data);
            that.ff = res.data;
            $('#ShowForm').modal({
              keyboard: false
            });
            return {
              show: true
            };
          };
        })(this), (function(_this) {
          return function(res) {
            return alter('Get Error');
          };
        })(this));
      },
      deleteTeacher: function(token) {
        var that;
        that = this;
        console.log(token);
        return $.ajax({
          method: 'post',
          url: '/api/formfilter/' + that.ff.id,
          data: {
            _method: 'delete',
            _token: token
          },
          success: function(msg) {
            return location.reload();
          }
        });
      },
      deleteFD: function() {
        var that;
        that = this;
        return that.$http["delete"]('/api/papert/' + that.ff.id).then((function(_this) {
          return function(response) {
            console.log('success');
            return that.$http.get('/api/paper/allteacher').then(function(res) {
              that.teachers = res.data;
              that.ff.id = 1;
              return console.log(res);
            }, function(res) {
              return alter('Get Error');
            });
          };
        })(this), (function(_this) {
          return function(response) {
            console.log('error');
            return alter('Delete Error');
          };
        })(this));
      },
      getPage: function(n) {
        var that;
        that = this;
        return $.ajax({
          method: 'GET',
          url: n,
          success: function(res) {
            that.pages = res;
            return that.papers = res.data;
          }
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=paper.js.map
